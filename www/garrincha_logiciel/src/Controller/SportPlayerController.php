<?php

//src/Controller/SportPlayerController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


use App\Form\SportPlayerType;
use App\Entity\SportPlayer;

/**
 * @Route("/sport/player")
 */
class SportPlayerController extends AbstractController
{
	/**
	 * @Route("/create", name="create-sport-player")
	 */
	public function createSportPlayer(Request $request)
	{
		$newSportPlayer = new SportPlayer();
		$createSportPlayer = $this->createForm(SportPlayerType::class, $newSportPlayer);

		$createSportPlayer->handleRequest($request);
    	if ($createSportPlayer->isSubmitted() && $createSportPlayer->isValid()) {
        
	        $newSportPlayer = $createSportPlayer->getData();

	        $entityManager = $this->getDoctrine()->getManager();

	        $entityManager->persist($newSportPlayer);
	        $entityManager->flush();

	        return $this->redirectToRoute('create-sport-player');
    }


		return $this->render('SportPlayer/create.html.twig', [
			'create_sport_player' => $createSportPlayer->createView()]);
	}

	/**
	 * @Route("/list", name="list-sport-player")
	 */
	public function listPlayer(Request $request)
	{	
		
        $list_sport_player = $this->getDoctrine()->getRepository(SportPlayer::class)->findAll();

        return $this->render('SportPlayer/list.html.twig', [
        	'list_sport_player' => $list_sport_player]);
	}
	/**
	 * @Route("/profil/{id}", name="profil-sport-player")
	 */
	public function profilPlayer($id,Request $request)
	{	
		
        $sport_player = $this->getDoctrine()->getRepository(SportPlayer::class)->find($id);

        return $this->render('SportPlayer/profil.html.twig', [
        	'sport_player' => $sport_player]);
	}

	/**
	 * @Route("/listPlayer/garrincha/web")
	 */
	public function listGarrinchaPlayerJson(Request $request)
	{
		$sportplayers = $this->getDoctrine()->getRepository(SportPlayer::class)->findSportPlayerToJson();
		$sportplayerjson = [];


		$sportplayersmedia = $this->getDoctrine()->getRepository(SportPlayer::class)->findSportPlayerToJson();

		foreach ($sportplayers as $sportplayer) {
			array_push($sportplayerjson, $sportplayer);
		}
		return $this->json($sportplayerjson);
	}

	/**
	 * @Route("/modify/{id}", name="modify-sport-player")
	 */
	public function modifySportPlayer($id, Request $request)
	{
		$sportPlayer = $this->getDoctrine()->getRepository(SportPlayer::class)->find($id);

		$formProfil = $this->createForm(SportPlayerType::class, $sportPlayer);


		$formProfil->handleRequest($request);

    	if ($formProfil->isSubmitted() && $formProfil->isValid()) {
        
	        $sportPlayer = $formProfil->getData();

	        $entityManager = $this->getDoctrine()->getManager();

	        $entityManager->persist($sportPlayer);
	        $entityManager->flush();

	        return $this->redirectToRoute('create-sport-player');
    }

		return $this->render('SportPlayer/create.html.twig', [
			'create_sport_player' => $formProfil->createView()]);
	}
}