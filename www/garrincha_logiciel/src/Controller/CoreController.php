<?php

//src/Controller/CoreController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



/**
 * @Route("/")
 */
class CoreController extends AbstractController
{
	/**
	 * @Route("/", name="home")
	 */
	public function createUser(Request $request)
	{
		return $this->render('core/index.html.twig');
	}
	
}