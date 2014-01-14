<?php

namespace Assogest\Bundle\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="lastname", type="string", length=255)
	 */
	private $lastname;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="firstname", type="string", length=255)
	 */
	private $firstname;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="address", type="text")
	 */
	private $address;
	
	/**
	 * @ORM\ManyToMany(targetEntity="Event", inversedBy="users")
	 * @ORM\JoinTable(name="users_event")
	 **/
	private $events;
	
	/**
	 * @ORM\OneToMany(targetEntity="EventGuest", mappedBy="user")
	 **/
	private $guests;

	/**
	 * @ORM\OneToMany(targetEntity="Document", mappedBy="user")
	 **/
	private $documents;

	/**
	 * @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
	 **/
	private $comments;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="avatar", type="string", length=255, nullable=true)
	 */
	private $avatar;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="phone", type="string", length=255, nullable=true)
	 */
	private $phone;
	
	public function __construct()
	{
		parent::__construct();
		// your own logic
	}
	
	public function getPresentation(){
		return $this->firstname.' '.$this->lastname;
	}
	
	

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
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
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
     * Add events
     *
     * @param \Assogest\Bundle\UserBundle\Entity\Event $events
     * @return User
     */
    public function addEvent(\Assogest\Bundle\UserBundle\Entity\Event $events)
    {
        $this->events[] = $events;
    
        return $this;
    }

    /**
     * Remove events
     *
     * @param \Assogest\Bundle\UserBundle\Entity\Event $events
     */
    public function removeEvent(\Assogest\Bundle\UserBundle\Entity\Event $events)
    {
        $this->events->removeElement($events);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Add guests
     *
     * @param \Assogest\Bundle\UserBundle\Entity\EventGuest $guests
     * @return User
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
     * @return User
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
     * Set avatar
     *
     * @param string $avatar
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    
        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Add comments
     *
     * @param \Assogest\Bundle\UserBundle\Entity\Comment $comments
     * @return User
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