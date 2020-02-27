<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Especes
 *
 * @ORM\Table(name="especes")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\EspecesRepository")
 */
class Especes
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
     * @ORM\ManyToOne(targetEntity="Articles_especesback")
     * @ORM\JoinColumn(name="article_id",referencedColumnName="id")
     */
    /**
     * @var int
     *
     * @ORM\Column(name="idEspeces", type="integer")
     */
    private $idEspeces;

    /**
     * @var int
     *
     * @ORM\Column(name="idCat", type="integer")
     */
    private $idCat;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;


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
     * Set idEspeces
     *
     * @param integer $idEspeces
     *
     * @return Especes
     */
    public function setIdEspeces($idEspeces)
    {
        $this->idEspeces = $idEspeces;

        return $this;
    }

    /**
     * Get idEspeces
     *
     * @return int
     */
    public function getIdEspeces()
    {
        return $this->idEspeces;
    }

    /**
     * Set idCat
     *
     * @param integer $idCat
     *
     * @return Especes
     */
    public function setIdCat($idCat)
    {
        $this->idCat = $idCat;

        return $this;
    }

    /**
     * Get idCat
     *
     * @return int
     */
    public function getIdCat()
    {
        return $this->idCat;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Especes
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Especes
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Especes
     */
    public function setImqge($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Especes
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
}

