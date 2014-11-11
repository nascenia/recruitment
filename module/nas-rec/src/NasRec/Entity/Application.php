<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

namespace NasRec\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Application
{
    const STATUS_OPEN = 'open';
    const STATUS_REVIEWED = 'reviewed';

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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="applications")
     */
    protected $user;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="User")
     */
    protected $position;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $resume;

    /**
     * @return User
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param User $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
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
}
