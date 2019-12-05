<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

use App\Form\CategoriesTestType;
use App\Entity\CategoriesTest;
/**
 * @Route("/categories")
 */
class CategoriesTestController extends AbstractController
{
    /**
     * @Route("/", name="categories")
     */
    public function index()
    {
        $categories = $this->getDoctrine()->getRepository(CategoriesTest::class)
            ->findAll();
        return $this->render('categories_test/index.html.twig', [
            'categories' => $categories
        ]);
    }


    /**
     *@Route("/create", name="create-categories") 
     */
    public function createCategories(Request $request)
    {
    	$newCategoriesTest = new CategoriesTest();

    	$createCategoriesTest = $this->createForm(CategoriesTestType::class, $newCategoriesTest);

    	$createCategoriesTest->handleRequest($request);
    	if($createCategoriesTest->isSubmitted() && $createCategoriesTest->isValid())
    	{
    		$newCategoriesTest = $createCategoriesTest->getData();
    		
    		$entityManager = $this->getDoctrine()->getManager();

    		$entityManager->persist($newCategoriesTest);
    		$entityManager->flush();

    		return $this->redirectToRoute('home');
    	}

    	return $this->render('categories_test/create.html.twig', [
    		'create_category_test' => $createCategoriesTest->createView()]);
    }

    /**
     * @Route("/stats/{id}", name="stats-categories")
     */
    public function stats($id, Request $request)
    {
        $categorie = $this->getDoctrine()
            ->getRepository(CategoriesTest::class)
            ->find($id);

        $values = $categorie->getValuesPhysicalTest();

        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        $value_int = [];
        //var_dump($values);
        foreach ($values as $value) {
            array_push($value_int, $value->getValue());
        }
        json_encode($value_int);
        return $this->render('categories_test/stats.html.twig', [
            'values' => $values, "id" => $id, "categorie_name" => $categorie->getName()]);
    }

    /**
     * @Route("/stats/test/{id}", name="get-stats-json")
     */
    public function statsJson($id, Request $request)
    {
        $categorie = $this->getDoctrine()
            ->getRepository(CategoriesTest::class)
            ->findBy($id);

        $values = $categorie->getValuesPhysicalTest();
        $value_int = [];
        //var_dump($values);
        foreach ($values as $value) {
            array_push($value_int,$value->getValue());
        }
        $name = [];
        foreach ($values as $value) {
            array_push($name, $value->getSportPlayer()->getName() . " " . $value->getSportPlayer()->getSurname());
        }
        $global = array($value_int, $name);
        json_encode($global);
        return $this->json($global);
    }

}
