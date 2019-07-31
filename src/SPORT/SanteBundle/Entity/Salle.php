<?php

namespace SPORT\SanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Salle
 *
 * @ORM\Table(name="salle")
 * @ORM\Entity(repositoryClass="SPORT\SanteBundle\Repository\SalleRepository")
 */
class Salle {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_salle", type="string", length=65)
     * @Assert\Length(
     *      min = 3,
     *      max = 50,
     *      minMessage = "le nombre de caractère doit  dépasser au minimum {{ limit }}  caractères",
     *      maxMessage = "le nombre de caractère ne doit pas dépasser au maximum {{ limit }} caractères"
     * )
     *  @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="le nom de la salle ne doit pas contenir un chiffre"
     * )
     */
    private $nomSalle;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_salle", type="string", length=150)
     * @Assert\Length(
     *      
     *      max = 150,
     *      maxMessage = "le nombre de caractère ne doit pas dépasser au maximum {{ limit }}  caractères"
     * )
     */
    private $adresseSalle;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_salle", type="string", length=65)
     * @Assert\Length(
     *      min = 3,
     *      max = 50,
     *      minMessage = "le nombre de caractère doit  dépasser au minimum {{ limit }}  caractères",
     *      maxMessage = "le nombre de caractère ne doit pas dépasser au maximum {{ limit }} caractères"
     * )
     *  @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="le nom de la ville ne doit pas contenir un chiffre"
     * )
     */
    private $villeSalle;

    /**
     * @var int
     *  @Assert\Regex(
     *     pattern="/^[0-9]{5,5}$/",
     *     match=true,
     *     message="le code postale n'est pas correcte"
     * )
     * @ORM\Column(name="cp_salle", type="integer")
     */
    private $cpSalle;

    /**
     * @var float
     *
     * @ORM\Column(name="latittude_salle", type="float")
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude_salle", type="float")
     */
    private $longitude;

    /**
     * @ORM\OneToMany(targetEntity="SPORT\SanteBundle\Entity\Seance", mappedBy="salle")
     */
    private $seances;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nomSalle
     *
     * @param string $nomSalle
     *
     * @return Salle
     */
    public function setNomSalle($nomSalle) {
        $this->nomSalle = $nomSalle;

        return $this;
    }

    /**
     * Get nomSalle
     *
     * @return string
     */
    public function getNomSalle() {
        return $this->nomSalle;
    }

    /**
     * Set adresseSalle
     *
     * @param string $adresseSalle
     *
     * @return Salle
     */
    public function setAdresseSalle($adresseSalle) {
        $this->adresseSalle = $adresseSalle;

        return $this;
    }

    /**
     * Get adresseSalle
     *
     * @return string
     */
    public function getAdresseSalle() {
        return $this->adresseSalle;
    }

    /**
     * Set villeSalle
     *
     * @param string $villeSalle
     *
     * @return Salle
     */
    public function setVilleSalle($villeSalle) {
        $this->villeSalle = $villeSalle;

        return $this;
    }

    /**
     * Get villeSalle
     *
     * @return string
     */
    public function getVilleSalle() {
        return $this->villeSalle;
    }

    /**
     * Set cpSalle
     *
     * @param integer $cpSalle
     *
     * @return Salle
     */
    public function setCpSalle($cpSalle) {
        $this->cpSalle = $cpSalle;

        return $this;
    }

    /**
     * Get cpSalle
     *
     * @return int
     */
    public function getCpSalle() {
        return $this->cpSalle;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->seances = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add seance
     *
     * @param \SPORT\SanteBundle\Entity\Seance $seance
     *
     * @return Salle
     */
    public function addSeance(\SPORT\SanteBundle\Entity\Seance $seance) {
        $this->seances[] = $seance;

        return $this;
    }

    /**
     * Remove seance
     *
     * @param \SPORT\SanteBundle\Entity\Seance $seance
     */
    public function removeSeance(\SPORT\SanteBundle\Entity\Seance $seance) {
        $this->seances->removeElement($seance);
    }

    /**
     * Get seances
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSeances() {
        return $this->seances;
    }

    /**
     * Set latittude
     *
     * @param float $latittude
     *
     * @return Salle
     */
    public function setLatitude($latittude) {
        $this->latitude = $latittude;

        return $this;
    }

    /**
     * Get latittude
     *
     * @return float
     */
    public function getLatitude() {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Salle
     */
    public function setLongitude($longitude) {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude() {
        return $this->longitude;
    }

}
