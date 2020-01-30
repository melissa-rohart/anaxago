<?php

namespace Anaxago\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="Anaxago\CoreBundle\Repository\ProjectRepository")
 */
class Project
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
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var bool
     * 
     * @ORM\Column(name="financed", type="boolean")
     */
    private $financed;

    /**
     * @var integer
     * 
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount;

    /**
     * @var integer
     * 
     * @ORM\Column(name="financement", type="integer")
     */
    private $financement;


    /**
     * @ORM\OneToMany(targetEntity="Anaxago\CoreBundle\Entity\Investment", mappedBy="project", cascade={"persist"})
     */
    private $investments;

    public function __construct()
    {
        $this->investments = new ArrayCollection();
    }

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
     * Set slug
     *
     * @param string $slug
     *
     * @return Project
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Project
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Project
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
     * Set financed
     *
     * @param bool $financed
     *
     * @return Project
     */
    public function setFinanced($financed)
    {
        $this->financed = $financed;

        return $this;
    }

    /**
     * Get financed
     *
     * @return bool
     */
    public function getFinanced()
    {
        return $this->financed;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return Project
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set financement
     *
     * @param integer $financement
     *
     * @return Project
     */
    public function setFinancement($financement)
    {
        $this->financement = $financement;

        return $this;
    }

    /**
     * Get financement
     *
     * @return integer
     */
    public function getFinancement()
    {
        return $this->financement;
    }

    public function getInvestments()
    {
      return $this->investments;
    }
}

