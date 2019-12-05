<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Exception\InvalidArgumentException;


use App\Entity\SportPlayer;
use App\Entity\ValuePhysicalTest;
 /**
  * @Route("garrincha/api")
  */
class GarrinchaAPIController extends AbstractController
{
	/**
	 * @Route("/listPlayer/web")
	 */
	public function listGarrinchaPlayerJson(Request $request)
	{
		$sportplayers = $this->getDoctrine()->getRepository(SportPlayer::class)->findSportPlayersToJson();
		$sportplayerjson = [];


		$sportplayersmedia = $this->getDoctrine()->getRepository(SportPlayer::class)->findSportPlayersToJson();

		foreach ($sportplayers as $sportplayer) {
			array_push($sportplayerjson, $sportplayer);
		}
		return $this->json($sportplayerjson);
	}


	/**
	 * @Route("/caracteristics/player/web/{id}")
	 */
	public function caracteristicsPlayer($id, Request $request)
	{
		if(!isset($id) OR empty($id)){
			throw new InvalidArgumentException("Error Processing Request", 1);
			
		}

		$sportplayerinformations = $this->getDoctrine()->getRepository(SportPlayer::class)->findSportPlayerInformationToJson($id);

		$sportplayerinformations = $this->getDoctrine()->getRepository(SportPlayer::class)->findSportPlayerInformationToJson($id);
		/*$date = new \DateTime($sportplayerinformations->birthday);
		$sportplayerinformations['birthday'] =  $sportplayerinformations[0]->birthday = format("d-m-Y");*/
		return $this->json($sportplayerinformations);
	}

	/**
     * @Route("/stats/sport/player/{id}", name="get-stats-json-sport-player-garrincha")
     */
    public function statsJson($id, Request $request)
    {
        		if(!isset($id) OR empty($id)){
			throw new InvalidArgumentException("Error Processing Request", 1);
			
		}

		$valuesInformations = $this->getDoctrine()->getRepository(ValuePhysicalTest::class)->findValueSportPlayerToJson($id);
		$value_int = [];
		foreach($valuesInformations as $value)
		{
			array_push($value_int,$value['value']);
		}
		$nameCategories = [];
		foreach($valuesInformations as $value)
		{
			array_push($nameCategories,$value['name']);
		}
		/*$date = new \DateTime($sportplayerinformations->birthday);
		$sportplayerinformations['birthday'] =  $sportplayerinformations[0]->birthday = format("d-m-Y");*/

		$global = array($value_int, $nameCategories);
        json_encode($global);
		return $this->json($global);
    }

	/**
	 * @Route("/listPlayer/test")
	 */
	public function testListPlayer()
	{
		return $this->render('garrincha_api/list_player_test.html.twig');
	}

	/**
	 * @Route("/profile/test/{id}")
	 */
	public function profilTest($id)
	{
		return $this->render('garrincha_api/profil_test.html.twig', ['id' => $id]);

	}
}
