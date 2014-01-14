<?php

namespace Assogest\Bundle\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AssogestUserBundle extends Bundle
{
	
	public function getParent()
	{
		return 'FOSUserBundle';
	}
	
	
}
