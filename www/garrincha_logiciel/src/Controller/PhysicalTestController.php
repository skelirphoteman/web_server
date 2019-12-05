<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



use App\Entity\PhysicalTest;
use App\Form\PhysicalTestType;

/**
 * @Route("/physical/test")
 */
class PhysicalTestController extends AbstractController
{
    /**
     * @Route("/", name="physical_test")
     */
    public function index()
    {
        return $this->render('physical_test/index.html.twig', [
            'controller_name' => 'PhysicalTestController'
        ]);
    }

    /**
     * @Route("/create")
     */
    public function createPhysicalTest(Request $request)
    {
    	$newPhysicalTest = new PhysicalTest();
    	$createPhysicalTest = $this->createForm(PhysicalTestType::class, $newPhysicalTest);

    	$createPhysicalTest->handleRequest($request);
    	if($createPhysicalTest->isSubmitted() && $createPhysicalTest->isValid())
    	{
    		$newPhysicalTest = $createPhysicalTest->getData();

    		$entityManager = $this->getDoctrine()->getManager();

    		$entityManager->persist($newPhysicalTest);
    		$entityManager->flush();

	        return $this->redirectToRoute('home');
    	}


    	return $this->render('physical_test/create.html.twig', [
    		'create_physical_test' => $createPhysicalTest->createView()]);
    }
}
