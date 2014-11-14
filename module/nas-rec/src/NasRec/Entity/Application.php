<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

namespace NasRec\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Application
{
    const STATUS_OPEN = 'Open';
    const STATUS_IN_REVIEW = 'In Review';
    const STATUS_DECISION_PENDING = 'Decision Pending';
    const STATUS_HIRED = 'Hired';
    const STATUS_REJECTED = 'Rejected';
    const STATUS_RECOMMENDED_FOR_FUTURE = 'Recommended for Future';

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
    protected $status = self::STATUS_OPEN;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="User", inversedBy="applications", cascade={"persist"})
     */
    protected $user;

    /**
     * @var Collection|Position[]
     * @ORM\ManyToMany(targetEntity="Position", inversedBy="applications")
     */
    protected $positions;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $resume;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    public function __construct()
    {
        $this->positions = new ArrayCollection;
    }

    /**
     * @return Collection|Position[]
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * @param Collection|Position[] $positions
     */
    public function setPositions($positions)
    {
        $this->positions = $positions;
    }

    public function getPositionNames()
    {
        return $this->positions->map(function (Position $position) {
            return $position->getName();
        })->toArray();
    }

    /**
     * @return string
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * @param string $resume
     */
    public function setResume($resume)
    {
        $this->resume = $resume;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
