<?php

namespace Sio\SemiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participant
 *
 * @ORM\Table(name="participant")
 * @ORM\Entity(repositoryClass="Sio\SemiBundle\Entity\ParticipantRepository")
 */
class Participant
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer" )
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50  )
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50 )
     */
    private $prenom;

    /**
     * @ORM\ManyToOne(targetEntity="Sio\SemiBundle\Entity\Academie")
     * @ORM\JoinColumn(name="idAcademie", referencedColumnName="id")
     **/
    private $academie;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=150 )
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=30 )
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="resAdministrative", type="string", length=80 )
     */
    private $resadministrative;

    /**
     * @var string
     *
     * @ORM\Column(name="resFamilliale", type="string", length=80 )
     */
    private $resfamilliale;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=50 )
     */
    private $role;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastUpdate", type="datetime" )
     */
    private $lastupdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCrea", type="datetime" )
     */
    private $datecrea;




    /**
     * Set id
     *
     * @param integer $id
     * @return Participant
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set nom
     *
     * @param string $nom
     * @return Participant
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string lePays
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Participant
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set academie
     *
     * @param \Sio\SemiBundle\Entity\Academie $academie
     * @return Participant
     */
    public function setAcademie(\Sio\SemiBundle\Entity\Academie $academie = null)
    {
        $this->academie = $academie;
    
        return $this;
    }

    /**
     * Get academie
     *
     * @return \Sio\SemiBundle\Entity\Academie 
     */
    public function getAcademie()
    {
        return $this->academie;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Participant
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    
        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Participant
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set resadministrative
     *
     * @param string $resadministrative
     * @return Participant
     */
    public function setResadministrative($resadministrative)
    {
        $this->resadministrative = $resadministrative;
    
        return $this;
    }

    /**
     * Get resadministrative
     *
     * @return string 
     */
    public function getResadministrative()
    {
        return $this->resadministrative;
    }

    /**
     * Set resfamilliale
     *
     * @param string $resfamilliale
     * @return Participant
     */
    public function setResfamilliale($resfamilliale)
    {
        $this->resfamilliale = $resfamilliale;
    
        return $this;
    }

    /**
     * Get resfamilliale
     *
     * @return string 
     */
    public function getResfamilliale()
    {
        return $this->resfamilliale;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Participant
     */
    public function setRole($role)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set lastupdate
     *
     * @param \DateTime $lastupdate
     * @return Participant
     */
    public function setLastupdate($lastupdate)
    {
        $this->lastupdate = $lastupdate;
    
        return $this;
    }

    /**
     * Get lastupdate
     *
     * @return \DateTime 
     */
    public function getLastupdate()
    {
        return $this->lastupdate;
    }

    /**
     * Set datecrea
     *
     * @param \DateTime $datecrea
     * @return Participant
     */
    public function setDatecrea($datecrea)
    {
        $this->datecrea = $datecrea;
    
        return $this;
    }

    /**
     * Get datecrea
     *
     * @return \DateTime 
     */
    public function getDatecrea()
    {
        return $this->datecrea;
    }
}