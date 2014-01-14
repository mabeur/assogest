<?php

namespace Assogest\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Comment
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Comment
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
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="record", type="datetime")
     */
    private $record;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comments")
     **/
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="comments")
     **/
    private $event = null;

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
     * Set record
     *
     * @param \DateTime $record
     * @return Comment
     */
    public function setRecord($record)
    {
        $this->record = $record;
    
        return $this;
    }

    /**
     * Get record
     *
     * @return \DateTime 
     */
    public function getRecord()
    {
        return $this->record;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set user
     *
     * @param \Assogest\Bundle\UserBundle\Entity\User $user
     * @return Comment
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

    /**
     * Set event
     *
     * @param \Assogest\Bundle\UserBundle\Entity\Event $event
     * @return Comment
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
}