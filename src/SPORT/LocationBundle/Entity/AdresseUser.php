<?php

namespace SPORT\LocationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SPORT\UserBundle\Entity\User;

/**
 * AdresseUser
 *
 * @ORM\Table(name="adresse_user")
 * @ORM\Entity(repositoryClass="SPORT\LocationBundle\Repository\AdresseUserRepository")
 */
class AdresseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=150)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="cpostale", type="integer")
     */
    private $cpostale;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     */
    private $pays;
    
    /**
     * @ORM\ManyToOne(targetEntity="SPORT\UserBundle\Entity\User", inversedBy="adresses")
     * @ORM\JoinColumn(nullable=true)
     */
    private $utilisateur;


    /**
     * Get id
     *
     * @return int
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
     * @return AdresseUser
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
     * @return AdresseUser
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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return AdresseUser
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set cpostale
     *
     * @param integer $cpostale
     *
     * @return AdresseUser
     */
    public function setCpostale($cpostale)
    {
        $this->cpostale = $cpostale;

        return $this;
    }

    /**
     * Get cpostale
     *
     * @return int
     */
    public function getCpostale()
    {
        return $this->cpostale;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return AdresseUser
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return AdresseUser
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set utilisateur
     *
     * @param \SPORT\UserBundle\Entity\User $utilisateur
     *
     * @return AdresseUser
     */
    public function setUtilisateur(\SPORT\UserBundle\Entity\User $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \SPORT\UserBundle\Entity\User
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
