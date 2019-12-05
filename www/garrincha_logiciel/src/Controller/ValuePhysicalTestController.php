<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


use App\Entity\ValuePhysicalTest;
use App\Form\ValuePhysicalTestType;	
/**
 * @Route("/physical/test/value")
 */
class ValuePhysicalTestController extends AbstractController
{
    /**
     * @Route("/value/physical/test", name="value_physical_test")
     */
    public function index()
    {
        return $this->render('value_physical_test/index.html.twig', [
            'controller_name' => 'ValuePhysicalTestController',
        ]);
    }

    /**
     * @Route("/create", name="create-value-physical-test")
     */
    public function createValue(Request $request)
    {
    	$newValue = new ValuePhysicalTest();

    	$createValue = $this->createForm(ValuePhysicalTestType::class, $newValue);

    	$createValue->handleRequest($request);

    	if($createValue->isSubmitted() && $createValue->isValid())
    	{
    		$newValue = $createValue->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($newValue);
            $entityManager->flush();

            return $this->redirectToRoute('create-value-physical-test');
    	}

    	return $this->render('value_physical_test/create.html.twig', [
    		'create_value' => $createValue->createView()]);

    }

    /**
     * @Route("/remove/{id}", name="delete-value-physical-test")
     */
    public function removeValue($id, Request $request)
    {
        $value = $this->getDoctrine()
            ->getRepository(ValuePhysicalTest::class)
            ->find($id);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($value);
        $entityManager->flush();

        return $this->redirectToRoute('home');
    }
}
