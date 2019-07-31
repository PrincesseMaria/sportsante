<?php

namespace SPORT\LocationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="SPORT\LocationBundle\Repository\CategoryRepository")
 */
class Category
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
     * @ORM\Column(name="category_nom", type="string", length=255)
     /**
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="La catégorie ne doit pas conténir un chiffre"
     * )
     * @Assert\Regex(
     *     pattern="/^[A-Za-z]+$/",
     *     match=true,
     *     message="La catégorie n'est pas conforme"
     * )
     */
    private $categoryNom;
    
    /**
     * @ORM\OneToMany(targetEntity="SPORT\LocationBundle\Entity\Materiel", mappedBy="category")
     */
    private $materiaux;


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
     * Set categoryNom
     *
     * @param string $categoryNom
     *
     * @return Category
     */
    public function setCategoryNom($categoryNom)
    {
        $this->categoryNom = $categoryNom;

        return $this;
    }

    /**
     * Get categoryNom
     *
     * @return string
     */
    public function getCategoryNom()
    {
        return $this->categoryNom;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->materiaux = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add materiaux
     *
     * @param \SPORT\LocationBundle\Entity\Materiel $materiaux
     *
     * @return Category
     */
    public function addMateriaux(\SPORT\LocationBundle\Entity\Materiel $materiaux)
    {
        $this->materiaux[] = $materiaux;
        $materiaux->setCategory(this);
        return $this;
    }

    /**
     * Remove materiaux
     *
     * @param \SPORT\LocationBundle\Entity\Materiel $materiaux
     */
    public function removeMateriaux(\SPORT\LocationBundle\Entity\Materiel $materiaux)
    {
        $this->materiaux->removeElement($materiaux);
    }

    /**
     * Get materiaux
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMateriaux()
    {
        return $this->materiaux;
    }
}
