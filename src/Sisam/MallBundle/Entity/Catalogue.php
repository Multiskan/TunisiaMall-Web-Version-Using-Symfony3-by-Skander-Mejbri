<?php

namespace Sisam\MallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Catalogue
 *
 * @ORM\Table(name="catalogue", indexes={@ORM\Index(name="id-pack", columns={"id-pack"}), @ORM\Index(name="idProduit_fk", columns={"idProduit_fk"})})
 * @ORM\Entity
 */
class Catalogue
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
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="id-pack", type="integer", nullable=false)
     */
    private $idPack;

    /**
     * @var integer
     *
     * @ORM\Column(name="idProduit_fk", type="integer", nullable=false)
     */
    private $idproduitFk;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getIdPack()
    {
        return $this->idPack;
    }

    /**
     * @param int $idPack
     */
    public function setIdPack($idPack)
    {
        $this->idPack = $idPack;
    }

    /**
     * @return int
     */
    public function getIdproduitFk()
    {
        return $this->idproduitFk;
    }

    /**
     * @param int $idproduitFk
     */
    public function setIdproduitFk($idproduitFk)
    {
        $this->idproduitFk = $idproduitFk;
    }


}

