<?php

namespace SPORT\LocationBundle\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Materiel
 *
 * @ORM\Table(name="materiel")
 * @ORM\Entity(repositoryClass="SPORT\LocationBundle\Repository\MaterielRepository")
 */
class Materiel {

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
     * @ORM\Column(name="materiel_nom", type="string", length=150)
     * @Assert\Regex(
     *     pattern="/^[a-zA-Z]+$/",
     *     match=true,
     *     message="Veuillez respecter le type de ce champ"
     * )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Ce champ ne doit pas contenir de chiffre"
     * )
     */
    private $materielNom;

    /**
     * @var string
     *
     * @ORM\Column(name="materiel_marque", type="string", length=255)
     * @Assert\Regex(
     *     pattern="/^[a-zA-Z]+$/",
     *     match=true,
     *     message="Veuillez respecter le type de ce champ"
     * )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Ce champ ne doit pas contenir de chiffre"
     * )
     */
    private $materielMarque;

    /**
     * @var text
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="materiel_prixlocation", type="float")
     */
    private $materielPrixlocation;

    /**
     * @var float
     *
     * @ORM\Column(name="materiel_tva", type="float")
     */
    private $tvaPrix;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer")
     * @Assert\GreaterThanOrEqual(
     *     value = 1
     * )
     */
    private $quantite;

    /**
     * @ORM\ManyToOne(targetEntity="SPORT\LocationBundle\Entity\Category", inversedBy="materiaux")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToOne(targetEntity="SPORT\LocationBundle\Entity\Image", cascade={"persist"})
     */
    private $image;
    
     /**
     * @ORM\OneToMany(targetEntity="SPORT\LocationBundle\Entity\CommandeMateriel", mappedBy="materiel")
     */
    private $commandes;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set materielNom
     *
     * @param string $materielNom
     *
     * @return Materiel
     */
    public function setMaterielNom($materielNom) {
        $this->materielNom = $materielNom;

        return $this;
    }

    /**
     * Get materielNom
     *
     * @return string
     */
    public function getMaterielNom() {
        return $this->materielNom;
    }

    /**
     * Set materielMarque
     *
     * @param string $materielMarque
     *
     * @return Materiel
     */
    public function setMaterielMarque($materielMarque) {
        $this->materielMarque = $materielMarque;

        return $this;
    }

    /**
     * Get materielMarque
     *
     * @return string
     */
    public function getMaterielMarque() {
        return $this->materielMarque;
    }

    /**
     * Set materielPrixlocation
     *
     * @param double $materielPrixlocation
     *
     * @return Materiel
     */
    public function setMaterielPrixlocation($materielPrixlocation) {
        $this->materielPrixlocation = $materielPrixlocation;

        return $this;
    }

    /**
     * Get materielPrixlocation
     *
     * @return double
     */
    public function getMaterielPrixlocation() {
        return $this->materielPrixlocation;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Materiel
     */
    public function setQuantite($quantite) {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite() {
        return $this->quantite;
    }

    /**
     * Set category
     *
     * @param \SPORT\LocationBundle\Entity\Category $category
     *
     * @return Materiel
     */
    public function setCategory(\SPORT\LocationBundle\Entity\Category $category) {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \SPORT\LocationBundle\Entity\Category
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * Set tvaPrix
     *
     * @param float $tvaPrix
     *
     * @return Materiel
     */
    public function setTvaPrix($tvaPrix) {
        $this->tvaPrix = $tvaPrix;

        return $this;
    }

    /**
     * Get tvaPrix
     *
     * @return float
     */
    public function getTvaPrix() {
        return $this->tvaPrix;
    }

    /**
     * Set image
     *
     * @param \SPORT\LocationBundle\Entity\Image $image
     *
     * @return Materiel
     */
    public function setImage(\SPORT\LocationBundle\Entity\Image $image = null) {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \SPORT\LocationBundle\Entity\Image
     */
    public function getImage() {
        return $this->image;
    }


    /**
     * Set description
     *
     * @param text $description
     *
     * @return Materiel
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return text
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commandes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add commande
     *
     * @param \SPORT\LocationBundle\Entity\CommandeMateriel $commande
     *
     * @return Materiel
     */
    public function addCommande(\SPORT\LocationBundle\Entity\CommandeMateriel $commande)
    {
        $this->commandes[] = $commande;

        return $this;
    }

    /**
     * Remove commande
     *
     * @param \SPORT\LocationBundle\Entity\CommandeMateriel $commande
     */
    public function removeCommande(\SPORT\LocationBundle\Entity\CommandeMateriel $commande)
    {
        $this->commandes->removeElement($commande);
    }

    /**
     * Get commandes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandes()
    {
        return $this->commandes;
    }
}
