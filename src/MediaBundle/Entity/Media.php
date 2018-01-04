<?php

namespace MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Media
 *
 * @ORM\Table(name="media", indexes={@ORM\Index(name="k_genre", columns={"genre"}), @ORM\Index(name="k_createur", columns={"createur"})})
 * @ORM\Entity
 */
class Media
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product media as PNG/JPG/GIF file.")
     * @Assert\File(maxSize = "2048k",mimeTypes = {"image/jpeg", "image/gif", "image/png"})
     */
    private $path;

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the media MP4/AVI/MKV File OR MP3 !!")
     * @Assert\File(maxSize = "25M",mimeTypes = {"video/mpeg", "video/mp4", "audio/mp3", "video/x-ms-wmv", "video/x-msvideo", "video/x-flv"})
     */
    private $file_path;

    /**
     * @return mixed
     */
    public function getFilePath()
    {
        return $this->file_path;
    }

    /**
     * @param mixed $file_path
     */
    public function setFilePath($file_path)
    {
        $this->file_path = $file_path;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=3, nullable=false)
     */
    private $extension;

    /**
     * @var \Personne
     *
     * @ORM\ManyToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createur", referencedColumnName="id")
     * })
     */
    private $createur;

    /**
     * @var \Genre
     *
     * @ORM\ManyToOne(targetEntity="Genre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="genre", referencedColumnName="id")
     * })
     */
    private $genre;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Media
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set extension
     *
     * @param string $extension
     *
     * @return Media
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set createur
     *
     * @param \MediaBundle\Entity\Personne $createur
     *
     * @return Media
     */
    public function setCreateur(Personne $createur = null)
    {
        $this->createur = $createur;
        return $this;
    }

    /**
     * Get createur
     *
     * @return \MediaBundle\Entity\Personne
     */
    public function getCreateur()
    {
        return $this->createur;
    }

    /**
     * Set genre
     *
     * @param \MediaBundle\Entity\Genre $genre
     *
     * @return Media
     */
    public function setGenre(\MediaBundle\Entity\Genre $genre = null)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return \MediaBundle\Entity\Genre
     */
    public function getGenre()
    {
        return $this->genre;
    }
    public function __toString()
    {
        return $this->getName();
    }
}
