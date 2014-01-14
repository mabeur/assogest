<?php

namespace Assogest\Bundle\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Assogest\Bundle\UserBundle\Entity\Event;
use Assogest\Bundle\WebsiteBundle\Form\Type\EventType;
use Assogest\Bundle\UserBundle\Entity\User;
use Assogest\Bundle\WebsiteBundle\Form\Type\UserType;
use Assogest\Bundle\WebsiteBundle\Form\Type\DocumentType;
use Assogest\Bundle\UserBundle\Entity\Document;
use Doctrine\Tests\Common\Annotations\Fixtures\Annotation\Secure;

/**
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/event/create/{id}", defaults={"id"=null}, name="admin_event_create")
     * @Template()
     */
    public function eventCreateAction($id)
    {
    	
    	if( $id != null ){
    		$event = $this -> getDoctrine() -> getRepository('AssogestUserBundle:Event')->find($id);
    	} else {
	   	 	$event = new Event();
    	}

	    $form = $this->createForm(new EventType(), $event);
	
	    $form->handleRequest($this -> getRequest());
	
	    if ($form->isValid()) {
	        $em = $this -> getDoctrine() -> getManager();
	        $em -> persist($event);
	        $em -> flush();

	        return $this->redirect($this->generateUrl('assogest_website_event_detail', array('id'=>$event->getId())));
	    }
    	
    	
    	return array('form'=>$form->createView());
    }

    /**
     * @Route("/member/create/{id}", defaults={"id"=null}, name="admin_member_create")
     * @Template()
     */
    public function memberCreateAction($id)
    {
    	
    	if( $id != null ){
    		$user = $this -> getDoctrine() -> getRepository('AssogestUserBundle:User')->find($id);
    	} else {
	   	 	$user = new User();
    	}

	    $form = $this->createForm(new UserType(), $user);
	
	    $form->handleRequest($this -> getRequest());
	
	    if ($form->isValid()) {
	    	
	        $user -> setEnabled(true);
	        
	    	$userManager = $this->container->get('fos_user.user_manager');
	    	$userManager->updateUser($user, true);

	        return $this->redirect($this->generateUrl('assogest_website_members'));
	    }
    	
    	
    	return array('form'=>$form->createView());
    }
    
    /**
     * @Route("/document/create/{event_id}", defaults={"event_id"=null}, name="admin_document_create")
     * @Template()
     */
    public function documentCreateAction($event_id)
    {
    	$event = null;
    	if( $event_id != null ){
    		$event = $this -> getDoctrine() -> getRepository('AssogestUserBundle:Event')->find($event_id);
    	}
    
    	$document = new Document();
    	$form = $this->createForm(new DocumentType(), $document);
    
    	$form->handleRequest($this -> getRequest());
    
    	if ($form->isValid()) {
    		$document -> setEvent($event);
    		$document -> setUser($this->getUser());
    		$em = $this -> getDoctrine() -> getManager();
    		$em -> persist($document);
    		$em -> flush();
    
    		if( $event_id != null ){
    		return $this->redirect($this->generateUrl('assogest_website_event_detail', array('id'=>$event_id)));
    		}
    		
    		return $this->redirect($this->generateUrl('assogest_website_documents'));
    	}
    	 
    	 
    	return array('form'=>$form->createView());
    }
    
    
}
