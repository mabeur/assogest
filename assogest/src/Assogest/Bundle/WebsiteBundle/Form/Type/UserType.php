<?php

namespace Assogest\Bundle\WebsiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType {
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('firstname')
			->add('lastname')
			->add('username')
			->add('email')
			->add('address')
			->add('plainpassword')
			->add('avatar')
			->add('phone')
			->add('save','submit');
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'Assogest\Bundle\UserBundle\Entity\User',
		));
	}
	
	public function getName()
	{
		return 'user';
	}
	
	
}