<?php

namespace Assogest\Bundle\WebsiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DocumentType extends AbstractType {
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('name')
			->add('url')
			->add('description')
			->add('save','submit');
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'Assogest\Bundle\UserBundle\Entity\Document',
		));
	}
	
	public function getName()
	{
		return 'documentType';
	}
	
	
}