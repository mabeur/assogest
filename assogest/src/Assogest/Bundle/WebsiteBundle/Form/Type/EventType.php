<?php

namespace Assogest\Bundle\WebsiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventType extends AbstractType {
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('name')
			->add('address')
			->add('dueDate')
			->add('description')
			->add('visitorPrice')
			->add('memberPrice')
			->add('save','submit');
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'Assogest\Bundle\UserBundle\Entity\Event',
		));
	}
	
	public function getName()
	{
		return 'event';
	}
	
	
}