<?php

namespace MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genre
 *
 * @ORM\Table(name="genre", indexes={@ORM\Index(name="k_type_media", columns={"type_media"})})
 * @ORM\Entity
 */
class Genre
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
     * @var \TypeMedia
     *
     * @ORM\ManyToOne(targetEntity="TypeMedia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_media", referencedColumnName="id")
     * })
     */
    private $typeMedia;



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
     * @return Genre
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
     * Set typeMedia
     *
     * @param \MediaBundle\Entity\TypeMedia $typeMedia
     *
     * @return Genre
     */
    public function setTypeMedia(\MediaBundle\Entity\TypeMedia $typeMedia = null)
    {
        $this->typeMedia = $typeMedia;

        return $this;
    }

    /**
     * Get typeMedia
     *
     * @return \MediaBundle\Entity\TypeMedia
     */
    public function getTypeMedia()
    {
        return $this->typeMedia;
    }
    public function __toString()
    {
        return $this->getName();
    }
}
