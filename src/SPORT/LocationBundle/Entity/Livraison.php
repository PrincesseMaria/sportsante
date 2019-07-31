<?php

namespace SPORT\LocationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SPORT\LocationBundle\Entity\Commande;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Livraison
 *
 * @ORM\Table(name="livraison")
 * @ORM\Entity(repositoryClass="SPORT\LocationBundle\Repository\LivraisonRepository")
 */
class Livraison
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
     * @var \DateTime
     *
     * @ORM\Column(name="datelivraison", type="datetime")
     * @Assert\GreaterThanOrEqual("today")
     */
    private $datelivraison;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateretour", type="datetime")
     * @Assert\GreaterThanOrEqual("today")
     */
    private $dateretour;
    
    /**
     * @ORM\ManyToOne(targetEntity="SPORT\LocationBundle\Entity\Commande", inversedBy="livraisons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commande;


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
     * Set datelivraison
     *
     * @param \DateTime $datelivraison
     *
     * @return Livraison
     */
    public function setDatelivraison($datelivraison)
    {
        $this->datelivraison = $datelivraison;

        return $this;
    }

    /**
     * Get datelivraison
     *
     * @return \DateTime
     */
    public function getDatelivraison()
    {
        return $this->datelivraison;
    }

    /**
     * Set dateretour
     *
     * @param \DateTime $dateretour
     *
     * @return Livraison
     */
    public function setDateretour($dateretour)
    {
        $this->dateretour = $dateretour;

        return $this;
    }

    /**
     * Get dateretour
     *
     * @return \DateTime
     */
    public function getDateretour()
    {
        return $this->dateretour;
    }

    /**
     * Set commande
     *
     * @param \SPORT\LocationBundle\Entity\Commande $commande
     *
     * @return Livraison
     */
    public function setCommande(\SPORT\LocationBundle\Entity\Commande $commande)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande
     *
     * @return \SPORT\LocationBundle\Entity\Commande
     */
    public function getCommande()
    {
        return $this->commande;
    }
}
