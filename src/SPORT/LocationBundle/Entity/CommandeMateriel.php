<?php

namespace SPORT\LocationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommandeMateriel
 *
 * @ORM\Table(name="commande_materiel")
 * @ORM\Entity(repositoryClass="SPORT\LocationBundle\Repository\CommandeMaterielRepository")
 */
class CommandeMateriel {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite_commande", type="integer")
     */
    private $quantiteCommande;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set quantiteCommande
     *
     * @param integer $quantiteCommande
     *
     * @return CommandeMateriel
     */
    public function setQuantiteCommande($quantiteCommande) {
        $this->quantiteCommande = $quantiteCommande;

        return $this;
    }

    /**
     * Get quantiteCommande
     *
     * @return int
     */
    public function getQuantiteCommande() {
        return $this->quantiteCommande;
    }

    /**
     * @ORM\ManyToOne(targetEntity="SPORT\LocationBundle\Entity\Materiel",inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $materiel;

    /**
     * @ORM\ManyToOne(targetEntity="SPORT\LocationBundle\Entity\Commande")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commande;


    /**
     * Set materiel
     *
     * @param \SPORT\LocationBundle\Entity\Materiel $materiel
     *
     * @return CommandeMateriel
     */
    public function setMateriel(\SPORT\LocationBundle\Entity\Materiel $materiel)
    {
        $this->materiel = $materiel;

        return $this;
    }

    /**
     * Get materiel
     *
     * @return \SPORT\LocationBundle\Entity\Materiel
     */
    public function getMateriel()
    {
        return $this->materiel;
    }

    /**
     * Set commande
     *
     * @param \SPORT\LocationBundle\Entity\Commande $commande
     *
     * @return CommandeMateriel
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
