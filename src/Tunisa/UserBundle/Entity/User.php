<?php
namespace Tunisa\UserBundle \Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */

class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string",length=255)
     *
     */
    protected $nom;

    /**
     * @ORM\Column(type="string",length=255)
     *
     */
    protected $prenom;

    /**
     * @ORM\Column(type="date")
     *
     */
    protected $date_de_naissance;

    /**
     * @ORM\Column(type="integer")
     *
     */
    protected $nbachat=0;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getDateDeNaissance()
    {
        return $this->date_de_naissance;
    }

    /**
     * @param mixed $date_de_naissance
     */
    public function setDateDeNaissance($date_de_naissance)
    {
        $this->date_de_naissance = $date_de_naissance;
    }

    /**
     * @return mixed
     */
    public function getNbachat()
    {
        return $this->nbachat;
    }

    /**
     * @param mixed $nbachat
     */
    public function setNbachat($nbachat)
    {
        $this->nbachat = $nbachat;
    }


}
