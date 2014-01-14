<?php

namespace Assogest\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Event
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
     * @var string
     *
     * @ORM\Column(name="address", type="text")
     */
    private $address;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dueDate", type="datetime")
     */
    private $dueDate;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="visitor_price", type="integer")
     */
    private $visitorPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="member_price", type="integer")
     */
    private $memberPrice;
    
    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="events")
     **/
    private $users;
    
    /**
     * @ORM\OneToMany(targetEntity="EventGuest", mappedBy="event")
     **/
    private $guests;

    /**
     * @ORM\OneToMany(targetEntity="Document", mappedBy="event")
     **/
    private $documents;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="event")
     **/
    private $comments;
    

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
     * @return Event
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
     * Set address
     *
     * @param string $address
     * @return Event
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set dueDate
     *
     * @param \DateTime $dueDate
     * @return Event
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    
        return $this;
    }

    /**
     * Get dueDate
     *
     * @return \DateTime 
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Event
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
     * Set visitorPrice
     *
     * @param integer $visitorPrice
     * @return Event
     */
    public function setVisitorPrice($visitorPrice)
    {
        $this->visitorPrice = $visitorPrice;
    
        return $this;
    }

    /**
     * Get visitorPrice
     *
     * @return integer 
     */
    public function getVisitorPrice()
    {
        return $this->visitorPrice;
    }

    /**
     * Set memberPrice
     *
     * @param integer $memberPrice
     * @return Event
     */
    public function setMemberPrice($memberPrice)
    {
        $this->memberPrice = $memberPrice;
    
        return $this;
    }

    /**
     * Get memberPrice
     *
     * @return integer 
     */
    public function getMemberPrice()
    {
        return $this->memberPrice;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add users
     *
     * @param \Assogest\Bundle\UserBundle\Entity\User $users
     * @return Event
     */
    public function addUser(\Assogest\Bundle\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \Assogest\Bundle\UserBundle\Entity\User $users
     */
    public function removeUser(\Assogest\Bundle\UserBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add guests
     *
     * @param \Assogest\Bundle\UserBundle\Entity\EventGuest $guests
     * @return Event
     */
    public function addGuest(\Assogest\Bundle\UserBundle\Entity\EventGuest $guests)
    {
        $this->guests[] = $guests;
    
        return $this;
    }

    /**
     * Remove guests
     *
     * @param \Assogest\Bundle\UserBundle\Entity\EventGuest $guests
     */
    public function removeGuest(\Assogest\Bundle\UserBundle\Entity\EventGuest $guests)
    {
        $this->guests->removeElement($guests);
    }

    /**
     * Get guests
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGuests()
    {
        return $this->guests;
    }

    /**
     * Add documents
     *
     * @param \Assogest\Bundle\UserBundle\Entity\Document $documents
     * @return Event
     */
    public function addDocument(\Assogest\Bundle\UserBundle\Entity\Document $documents)
    {
        $this->documents[] = $documents;
    
        return $this;
    }

    /**
     * Remove documents
     *
     * @param \Assogest\Bundle\UserBundle\Entity\Document $documents
     */
    public function removeDocument(\Assogest\Bundle\UserBundle\Entity\Document $documents)
    {
        $this->documents->removeElement($documents);
    }

    /**
     * Get documents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * Add comments
     *
     * @param \Assogest\Bundle\UserBundle\Entity\Comment $comments
     * @return Event
     */
    public function addComment(\Assogest\Bundle\UserBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;
    
        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Assogest\Bundle\UserBundle\Entity\Comment $comments
     */
    public function removeComment(\Assogest\Bundle\UserBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}