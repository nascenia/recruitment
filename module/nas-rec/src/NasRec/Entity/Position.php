<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

namespace NasRec\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Position
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $endDate;

    /**
     * @var Collection|Application[]
     * @ORM\OneToMany(targetEntity="Application", mappedBy="position")
     */
    protected $applications;

    public function __construct()
    {
        $this->applications = new ArrayCollection;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Collection|Application[]
     */
    public function getApplications()
    {
        return $this->applications;
    }

    /**
     * @param Collection|Application[] $applications
     */
    public function setApplications($applications)
    {
        $this->applications = $applications;
    }

    public function getOpenApplications()
    {
        $criteria = Criteria::create()
            ->where(Criteria::expr()->eq('status', Application::STATUS_OPEN))
            ->orWhere(Criteria::expr()->eq('status', Application::STATUS_IN_REVIEW))
            ->orWhere(Criteria::expr()->eq('status', Application::STATUS_DECISION_PENDING))
        ;
        return $this->applications->matching($criteria);
    }
}
