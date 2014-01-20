<?php

namespace Assogest\Bundle\UserBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use FOS\UserBundle\Command\CreateUserCommand as BaseCommand;


class CreateUserCommand extends BaseCommand
{
	/**
	 * @see Command
	 */
	protected function configure()
	{
		parent::configure();
		$this
		->setName('fos:user:create')
		->getDefinition()->addArguments(array(
				new InputArgument('firstname', InputArgument::REQUIRED, 'The firstname'),
				new InputArgument('lastname', InputArgument::REQUIRED, 'The lastname'),
				new InputArgument('address', InputArgument::REQUIRED, 'The address')
		))
		;
		$this->setHelp(<<<EOT
Création d'utilisateur
EOT
		);
	}

	/**
	 * @see Command
	 */
	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$username   = $input->getArgument('username');
		$email      = $input->getArgument('email');
		$password   = $input->getArgument('password');
		$firstname  = $input->getArgument('firstname');
		$lastname   = $input->getArgument('lastname');
		$address   = $input->getArgument('address');
		$inactive   = $input->getOption('inactive');
		$superadmin = $input->getOption('super-admin');

		/** @var \FOS\UserBundle\Model\UserManager $user_manager */
		$user_manager = $this->getContainer()->get('fos_user.user_manager');

		/** @var \Assogest\Bundle\UserBundle\User $user */
		$user = $user_manager->createUser();
		$user->setUsername($username);
		$user->setEmail($email);
		$user->setPlainPassword($password);
		$user->setEnabled((Boolean) !$inactive);
		$user->setSuperAdmin((Boolean) $superadmin);
		$user->setFirstName($firstname);
		$user->setLastName($lastname);
		$user->setAddress($address);

		$user_manager->updateUser($user);

		$output->writeln(sprintf('Created user <comment>%s</comment>', $username));
	}

	/**
	 * @see Command
	 */
	protected function interact(InputInterface $input, OutputInterface $output)
	{
		parent::interact($input, $output);
		if (!$input->getArgument('firstname')) {
			$firstname = $this->getHelper('dialog')->askAndValidate(
					$output,
					'Please choose a firstname:',
					function($firstname) {
						if (empty($firstname)) {
							throw new \Exception('Firstname can not be empty');
						}

						return $firstname;
					}
			);
			$input->setArgument('firstname', $firstname);
		}
		if (!$input->getArgument('lastname')) {
			$lastname = $this->getHelper('dialog')->askAndValidate(
					$output,
					'Please choose a lastname:',
					function($lastname) {
						if (empty($lastname)) {
							throw new \Exception('Lastname can not be empty');
						}

						return $lastname;
					}
			);
			$input->setArgument('lastname', $lastname);
		}
		if (!$input->getArgument('address')) {
			$address = $this->getHelper('dialog')->askAndValidate(
					$output,
					'Please choose an address:',
					function($address) {
						if (empty($address)) {
							throw new \Exception('address can not be empty');
						}

						return $address;
					}
			);
			$input->setArgument('address', $address);
		}
	}
}



