<?php

namespace Sio\SemiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscription
 *
 * @ORM\Table(name="inscription")
 *@ORM\Entity(repositoryClass="Sio\SemiBundle\Entity\InscriptionRepository")
 */
class Inscription
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idParticipant", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Participant", cascade={"remove"})
	 * @ORM\JoinColumn(name="idParticipant", referencedColumnName="id")
     */
    private $idparticipant;

    /**
     * @var integer
     *
     * @ORM\Column(name="idSeance", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Seance",cascade={"remove"})
	 * @ORM\JoinColumn(name="idSeance", referencedColumnName="id")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idseance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateInscr", type="datetime", nullable=true)
     */
    private $dateinscr;



  /**
     * Set idparticipant
     *
     * @param \Sio\SemiBundle\Entity\Participant $idparticipant
     * @return Inscription
     */
    public function setIdparticipant(\Sio\SemiBundle\Entity\Participant $idparticipant)
    {
        $this->idparticipant = $idparticipant;
   
        return $this;
    }

    /**
     * Get idparticipant
     * @return \Sio\SemiBundle\Entity\Participant
     * @return integer 
     */
    public function getIdparticipant()
    {
        return $this->idparticipant;
    }

/**
     * Set idseance
     *
     * @param \Sio\SemiBundle\Entity\seance $idseance
     * @return Inscription
     */
    public function setIdseance(\Sio\SemiBundle\Entity\seance $idseance)
    {
        $this->idseance = $idseance;
    
        return $this;
    }
    

    /**
     * Get idseance
     *
     * @return \Sio\SemiBundle\Entity\seance 
     */
    public function getIdseance()
    {
        return $this->idseance;
    }

    /**
     * Set dateinscr
     *
     * @param \DateTime $dateinscr
     * @return Inscription
     */
    public function setDateinscr($dateinscr)
    {
        $this->dateinscr = $dateinscr;
    
        return $this;
    }

    /**
     * Get dateinscr
     *
     * @return \DateTime 
     */
    public function getDateinscr()
    {
        return $this->dateinscr;
    }
}