<?php

namespace MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
    public function setCreateur(\MediaBundle\Entity\Personne $createur = null)
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
