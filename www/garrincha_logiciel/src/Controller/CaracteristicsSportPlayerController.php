<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\CaracteristicsSportPlayer;
use App\Form\CaracteristicsSportPlayerType;
/**
 * @Route("/caracteristics/sport/player")
 */
class CaracteristicsSportPlayerController extends AbstractController
{
    /**
     * @Route("/create", name="create_caracteristics_sport_player")
     */
    public function index(Request $request)
    {
    	$catacteristic = new CaracteristicsSportPlayer();

    	$create_caracteristics = $this->createForm(CaracteristicsSportPlayerType::class, $catacteristic);

    	$create_caracteristics = $create_caracteristics->handleRequest($request);
    	if($create_caracteristics->isSubmitted() && $create_caracteristics->isValid()){
    		$catacteristic = $create_caracteristics->getData();

    		$em = $this->getDoctrine()->getManager();

    		$em->persist($catacteristic);

    		$em->flush();

    		$this->redirectToRoute('create_caracteristics_sport_player');
    	}


        return $this->render('caracteristics_sport_player/create.html.twig', [
            'create_caracteristics' => $create_caracteristics->createView()
        ]);
    }
}
