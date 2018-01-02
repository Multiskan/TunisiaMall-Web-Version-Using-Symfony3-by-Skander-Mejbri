<?php

namespace Sisam\MallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ouvrier
 *
 * @ORM\Table(name="ouvrier")
 * @ORM\Entity
 */
class Ouvrier
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="Tel", type="string", length=255, nullable=false)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="Mail", type="string", length=255, nullable=false)
     */
    private $mail;

    /**
     * @var integer
     *
     * @ORM\Column(name="jours", type="integer", nullable=false)
     */
    private $jours;


    /**
     * @var integer
     *
     * @ORM\Column(name="absence", type="integer", nullable=false)
     */
    private $absence;

    /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=255, nullable=false)
     */
    private $poste;



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
     *
     * @return Ouvrier
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Ouvrier
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
     * Set tel
     *
     * @param string $tel
     *
     * @return Ouvrier
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Ouvrier
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
     * @return int
     */
    public function getJours()
    {
        return $this->jours;
    }

    /**
     * @param int $jours
     */
    public function setJours($jours)
    {
        $this->jours = $jours;
    }




    /**
     * Set absence
     *
     * @param integer $absence
     *
     * @return Ouvrier
     */
    public function setAbsence($absence)
    {
        $this->absence = $absence;

        return $this;
    }

    /**
     * Get absence
     *
     * @return integer
     */
    public function getAbsence()
    {
        return $this->absence;
    }

    /**
     * Set poste
     *
     * @param string $poste
     *
     * @return Ouvrier
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * Get poste
     *
     * @return string
     */
    public function getPoste()
    {
        return $this->poste;
    }
}
