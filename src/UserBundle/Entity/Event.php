<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use UserBundle\Repository\EventRepository;


/**
 * Event
 *
 * @ORM\Table(name="Event")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\EventRepository")
 */
class Event
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_event", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_association", type="string", length=50, nullable=false)
     */
    private $nomEvent;




    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=45, nullable=false)
     */
    private $adresse;

    /**
     * @var integer
     *
     * @ORM\Column(name="capital", type="integer", nullable=false)
     */
    private $capital;


    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="chef_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $chefId;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="blob", length=16777215, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    public $nomImage;
    /**
     * @Assert\File(maxSize="500K")
     */
    public $file;

    public function getWebPath()
    {
        return null === $this->nomImage ? null : $this->getUploadDir() . '/' . $this->nomImage; //get uplodadDir blech parenthéses lihna ,ama l json ma9rahech
    }

    protected function getUploadRootDir()
    {
        return __DIR__ . '/../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir()
    {
        return 'images';
    }

    public function uploadProfilePicture()
    {
        if (null === $this->file) {
            return ;
        }
        else{

            $this->file->move($this->getUploadRootDir(),$this->file->getClientOriginalName());
            $this->nomImage=$this->file->getClientOriginalName();
            $this->file=null;
        }
    }

    /**
     * Set nomImage
     *
     * @param string $nomImage
     *
     * @return Categorie
     */
    public function setNomImage($nomImage)
    {
        $this->nomImage == $nomImage;
        return $this;
    }

    /**
     * Get nomImage
     *
     * @return string
     */
    public function getNomImage()
    {
        return $this->nomImage;
    }

    /**
     * @param int $idEvent
     */
    public function setIdEvent($idEvent)
    {
        $this->idEvent = $idEvent;
    }

    /**
     * @return string
     */
    public function getNomEvent()
    {
        return $this->nomEvent;
    }

    /**
     * @param string $nomEvent
     */
    public function setNomEvent($nomEvent)
    {
        $this->nomEvent = $nomEvent;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return int
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * @param int $capital
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;
    }

    /**
     * @return int
     */
    public function getChefId()
    {
        return $this->chefId;
    }

    /**
     * @param int $chefId
     */
    public function setChefId($chefId)
    {
        $this->chefId = $chefId;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @param string $adresse
     */
    public function setIMG($nimg)
    {
        $this->nomImage = $nimg;
    }

}
