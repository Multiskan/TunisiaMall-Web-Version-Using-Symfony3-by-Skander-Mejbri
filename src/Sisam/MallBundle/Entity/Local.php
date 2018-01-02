<?php

namespace Sisam\MallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Local
 *
 * @ORM\Table(name="local")
 * @ORM\Entity
 */
class Local
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
     * @ORM\Column(name="Surface", type="string", length=255, nullable=false)
     */
    private $surface;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix_par_mois", type="integer", nullable=false)
     */
    private $prixParMois;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=false)
     */
    private $etat;
    /**
     * @var integer
     *
     * @ORM\Column(name="id_ou", type="integer", nullable=false)
     */
    private $idOu;



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
     * Set surface
     *
     * @param string $surface
     *
     * @return Local
     */
    public function setSurface($surface)
    {
        $this->surface = $surface;

        return $this;
    }

    /**
     * Get surface
     *
     * @return string
     */
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * Set prixParMois
     *
     * @param integer $prixParMois
     *
     * @return Local
     */
    public function setPrixParMois($prixParMois)
    {
        $this->prixParMois = $prixParMois;

        return $this;
    }

    /**
     * Get prixParMois
     *
     * @return integer
     */
    public function getPrixParMois()
    {
        return $this->prixParMois;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Local
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @return int
     */
    public function getIdOu()
    {
        return $this->idOu;
    }

    /**
     * @param int $idOu
     */
    public function setIdOu($idOu)
    {
        $this->idOu = $idOu;
    }

}
