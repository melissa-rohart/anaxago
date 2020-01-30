<?php

namespace Anaxago\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Investment
 *
 * @ORM\Table(name="investment")
 * @ORM\Entity(repositoryClass="Anaxago\CoreBundle\Repository\InvestmentRepository")
 */
class Investment
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
     * @var integer
     *
     * @ORM\Column(name="asset", type="text")
     */
    private $asset;

    /**
     * @ORM\ManyToOne(targetEntity="Anaxago\CoreBundle\Entity\User", inversedBy="User", cascade={"persist"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Anaxago\CoreBundle\Entity\Project", inversedBy="Project", cascade={"persist"})
     */
    private $project;

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
     * Set asset
     *
     * @param integer $asset
     *
     * @return Investment
     */
    public function setAsset($asset)
    {
        $this->asset = $asset;

        return $this;
    }

    /**
     * Get asset
     *
     * @return integer
     */
    public function getAsset()
    {
        return $this->asset;
    }

    /**
     * Set user
     *
     * @param User $user
     *
     * @return Investment
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set project
     *
     * @param Project $project
     *
     * @return Investment
     */
    public function setProject($project)
    {
        $this->project = $project;

        return $this;
    }

    public function getProject()
    {
        return $this->project;
    }
}

