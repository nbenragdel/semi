<?php

namespace Sio\SemiBundle\Controller;

use Sio\SemiBundle\Entity\Participant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\ORM\Query\Printer;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Tests\Common\Annotations\True;
use Doctrine\ORM\Query\Expr\Andx;

/**
 * @Route("/index")
 * @Template()
 */
class DefaultController extends Controller {
	/**
	 * @Route("/")
	 * @Route("/login", name="login")
	 * @Template()
	 */
	public function loginAction(Request $request) {
		$form1 = $this->createFormBuilder ()->add ( 'email', 'text', array (
				'label' => 'Votre email *',
				'attr' => array (
						'name' => 'email' 
				) 
		) )->add ( 'cle', 'text', array (
				'label' => 'Clé du séminaire *' 
		) )->add ( 'connexion', 'submit', array (
				'label' => 'connexion' 
		) )->getForm ();
		
		$form1->handleRequest ( $request );
		
		if ($request->getMethod () == 'POST') {
			if ($form1->isValid ()) {
				
				$alluser = $this->getDoctrine ()->getRepository ( "SioSemiBundle:Participant" )->findAll ();
				$clessemi = $this->getDoctrine ()->getRepository ( "SioSemiBundle:Seminaire" )->findAll ();
				
				$booleanCle = false;
				$booleanUser = false;
				foreach ( $clessemi as $clesemi ) {
					if ($clesemi->getCle () == $form1->get ( 'cle' )->getData ())
						$booleanCle = true;
				}
				
				foreach ( $alluser as $user ) {
					
					if ($user->getMail () == $form1->get ( 'email' )->getData ())
						$booleanUser = True;
				}
				
				if ($booleanCle and $booleanUser) {
					return $this->redirect ( $this->generateUrl ( 'participant' ) );
				}
				
				if ($booleanCle == false) {
					return $this->redirect ( $this->generateUrl ( 'login' ) );
				}
				
				$mail = $form1->get ( 'email' )->getData ();
				$cle = $form1->get ( 'cle' )->getData ();
				
				$form = $this->createFormBuilder ()->add ( 'email', 'text', array (
						'data' => $mail,
						'label' => 'Votre email *' 
				) )->add ( 'mail', 'text', array (
						'label' => 'Confirmation email *' 
				) )->add ( 'cle', 'text', array (
						'data' => $cle,
						'label' => 'Clé du séminaire *' 
				) )->add ( 'creation', 'submit', array (
						'label' => 'création dun compte' 
				) )->getForm ();
				
				return array (
						'formulaire' => $form->createView (),
						'legend' => "" 
				);
			} else {
				$mail = $form1->get ( 'email' )->getData ();
				$cle = $form1->get ( 'cle' )->getData ();
				return $this->redirect ( $this->generateUrl ( 'demandeinscription', array (
						'mail' => $mail,
						'cle' => $cle 
				) ) );
			}
		} 

		else {
			
			return array (
					'formulaire' => $form1->createView (),
					'legend' => "" 
			);
		}
	}
	
	/**
	 * @Route("/apropos", name="apropos")
	 * @Template()
	 */
	public function aproposAction() 

	{
		return array ();
	}
	/**
	 * @Route("/infoFin")
	 * @Template()
	 */
	public function infoFinAction() {
		return array ();
	}
	/**
	 * @Route("/demandeinscription" , name="demandeinscription")
	 * @Template()
	 */
	public function demandeinscriptionAction(Request $request) {
		$Participant = new Participant ();
		$form = $this->createFormBuilder ( $Participant )->add ( 'nom', 'text', array (
				'label' => '* Nom :' 
		) )->add ( 'prenom', 'text', array (
				'label' => '* Prénom :' 
		) )->add ( 'mail', 'text', array (
				'data' => $request->get ( 'mail' ),
				'label' => '* Mail :' 
		) )->add ( 'academie', 'entity', array (
				'class' => 'Sio\SemiBundle\Entity\Academie',
				'property' => 'nom',
				'multiple' => false,
				'required' => false 
		) )->add ( 'resfamilliale', 'text', array (
				'label' => ' * Ville de la résidence personnelle :' 
		) )->add ( 'resadministrative', 'text', array (
				'label' => ' * Ville de la résidence administrative :' 
		) )->add ( 'role', 'choice', array (
				'choices' => array (
						'Professeur' => 'Professeur',
						'IA-IPR' => 'IA-IPR',
						'IEN' => 'IEN',
						'Autre' => 'Autre' 
				),
				'expanded' => true,
				'multiple' => false 
		) )->

		getForm ();
		
		if ($request->getMethod () == 'POST') {
			$form->bind ( $request );
			if ($form->isValid ()) {
				$Participant = $form->getData();
				
				$em = $this->getDoctrine ()->getManager ();
				$em->persist ( $Participant );
				$em->flush ();
			}
		}
		
		return array (
				'formulaire' => $form->createView (),
				'legend' => "Vos informations personnelles" 
		);
	}
}
