<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Form\MediaType;
use App\Entity\Media;
class MediaController extends AbstractController
{
    /**
     * @Route("/media", name="media")
     */
    public function index(Request $request)
    {
    	$media = new Media();

    	$mediaform = $this->createForm(MediaType::class, $media);

    	$mediaform->handleRequest($request);

    	if($mediaform->isSubmitted() && $mediaform->isValid()){
    		$media = $mediaform->getData();
    		$imageFilename = $mediaform['imageFilename']->getData();

    		if($imageFilename){

    			$originalFilename = pathinfo($imageFilename->getClientOriginalName(), PATHINFO_FILENAME);

                // this is needed to safely include the file name as part of the URL
                $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFilename->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $imageFilename->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    
                }

                $media->setImageFilename($newFilename);
            }else{
            	echo "Problème";
            }

            $em = $this->getDoctrine()->getManager();

            $em->persist($media);
            $em->flush();
    	}

        return $this->render('media/index.html.twig', [
            'controller_name' => 'MediaController','form' => $mediaform->createView()
        ]);
    }
}
