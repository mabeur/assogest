<?php

namespace Assogest\Bundle\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Assogest\Bundle\UserBundle\Entity\Event;
use Assogest\Bundle\UserBundle\Entity\EventGuest;
use Assogest\Bundle\WebsiteBundle\Form\Type\EventGuestType;
use Assogest\Bundle\UserBundle\Entity\Comment;
use Assogest\Bundle\WebsiteBundle\Form\Type\CommentType;

class PublicController extends Controller
{
    /**
     * @Route("/", name="assogest_website_home")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/presentation", name="assogest_website_presentation")
     * @Template()
     */
    public function presentationAction(){

    	return array();
    }
    
    /**
     * @Route("/events", name="assogest_website_events")
     * @Template()
     */
    public function eventsAction(){

    	$em = $this -> getDoctrine()->getManager();
    	
    	$now = new \DateTime();
    	
    	$dql = 'SELECT e FROM AssogestUserBundle:Event e WHERE e.dueDate > :now';
    	$futurEventsList = $em -> createQuery($dql) ->setParameter('now',$now)-> execute();

    	$dql = 'SELECT e FROM AssogestUserBundle:Event e WHERE e.dueDate < :now';
    	$pastEventsList = $em -> createQuery($dql) ->setParameter('now',$now)-> execute();
    	 
    	
    	return array(
    			'futurEventsList'=>$futurEventsList,
    			'pastEventsList'=>$pastEventsList,
    	);
    }
    
 	/**
     * @Route("/event/detail/{id}", name="assogest_website_event_detail")
 	 * @ParamConverter("post", class="AssogestUserBundle:Event")
     * @Template()
     */
    public function eventDetailAction(Event $event){

    	
    	return array(
    			'event'=>$event,
    	);
    } 
    

    /**
     * @Route("/event/detail/{id}/subscribe", name="assogest_website_event_subscribe")
     * @ParamConverter("post", class="AssogestUserBundle:Event")
     * @Template()
     */
    public function eventSubscribeAction(Event $event){
    	
    	$user = $this -> getUser();
    	$user -> addEvent($event);
    	$this -> getDoctrine() -> getManager()->persist($user);
    	$this -> getDoctrine() -> getManager()->flush($user);
    	 

    	return $this->redirect($this->generateUrl('assogest_website_event_detail', array('id'=>$event->getId())));
    	
    }

    /**
     * @Route("/event/detail/{id}/unsubscribe", name="assogest_website_event_unsubscribe")
     * @ParamConverter("post", class="AssogestUserBundle:Event")
     * @Template()
     */
    public function eventUnsubscribeAction(Event $event){
    	 
    	$user = $this -> getUser();
    	$user -> removeEvent($event);
    	$this -> getDoctrine() -> getManager()->persist($user);
    	$this -> getDoctrine() -> getManager()->flush($user);
    
    
    	return $this->redirect($this->generateUrl('assogest_website_event_detail', array('id'=>$event->getId())));
    	 
    }

    

    /**
     * @Route("/event/detail/{id}/invite", name="assogest_website_event_invite")
     * @ParamConverter("post", class="AssogestUserBundle:Event")
     * @Template()
     */
    public function eventInviteAction(Event $event)
    {
    	 
    	$eventGuest = new EventGuest();
    
    	$form = $this->createForm(new EventGuestType(), $eventGuest);
    
    	$form->handleRequest($this -> getRequest());
    
    	if ($form->isValid()) {
    		
    		$eventGuest -> setUser($this ->getUser());
    		$eventGuest -> setEvent($event);
    		
    		$em = $this -> getDoctrine() -> getManager();
    		$em -> persist($eventGuest);
    		$em -> flush();
    
    		return $this->redirect($this->generateUrl('assogest_website_event_detail', array('id'=>$event->getId())));
    	}
    	 
    	 
    	return array('form'=>$form->createView());
    }
    
    /**
     * @Route("/event/detail/uninvite/{id}", name="assogest_website_event_uninvite")
     * @ParamConverter("post", class="AssogestUserBundle:EventGuest")
     * @Template()
     */
    public function eventUninviteAction(EventGuest $eventGuest)
    {

    		$event = $eventGuest -> getEvent();
    	
    		$em = $this -> getDoctrine() -> getManager();
    		$em -> remove($eventGuest);
    		$em -> flush();
    
    		return $this->redirect($this->generateUrl('assogest_website_event_detail', array('id'=>$event->getId())));
    
    }

    /**
     * @Route("/members", name="assogest_website_members")
     * @Template()
     */
    public function membersAction(){
    
    	$membersList = $this -> getDoctrine() -> getRepository('AssogestUserBundle:User') -> findBy(array(), array() );
    	
    	return array('membersList'=>$membersList);
    }

    /**
     * @Route("/documents", name="assogest_website_documents")
     * @Template()
     */
    public function documentsAction(){

    	$documentsList = $this -> getDoctrine() -> getRepository('AssogestUserBundle:Document') -> findBy(array(), array() );
    	
    	return array('documentsList'=>$documentsList);
    }
    
    /**
     * @Route("/event/comment/{event_id}",  name="assogest_event_comment")
     * @Template()
     */
    public function eventCommentAction($event_id)
    {
    	$event = null;
    	if( $event_id != null ){
    		$event = $this -> getDoctrine() -> getRepository('AssogestUserBundle:Event')->find($event_id);
    	}
    
    	$comment = new Comment();
    	$form = $this->createForm(new CommentType(), $comment);
    
    	$form->handleRequest($this -> getRequest());
    
    	if ($form->isValid()) {
    		$comment -> setEvent($event);
    		$comment -> setUser($this->getUser());
    		$em = $this -> getDoctrine() -> getManager();
    		$em -> persist($comment);
    		$em -> flush();
    
    		if( $event_id != null ){
    			return $this->redirect($this->generateUrl('assogest_website_event_detail', array('id'=>$event_id)));
    		}
    
    		return $this->redirect($this->generateUrl('assogest_website_events'));
    	}
    
    
    	return array('form'=>$form->createView());
    }
}
