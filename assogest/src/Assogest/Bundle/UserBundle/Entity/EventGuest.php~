<?php

namespace Assogest\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventGuest
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class EventGuest
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="guests")
     **/
    private $event;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="guests")
     **/
    private $user;

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
     * @return EventGuest
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
     * Set event
     *
     * @param \Assogest\Bundle\UserBundle\Entity\Event $event
     * @return EventGuest
     */
    public function setEvent(\Assogest\Bundle\UserBundle\Entity\Event $event = null)
    {
        $this->event = $event;
    
        return $this;
    }

    /**
     * Get event
     *
     * @return \Assogest\Bundle\UserBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set user
     *
     * @param \Assogest\Bundle\UserBundle\Entity\User $user
     * @return EventGuest
     */
    public function setUser(\Assogest\Bundle\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Assogest\Bundle\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}