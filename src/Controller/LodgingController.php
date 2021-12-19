<?php

namespace App\Controller;
use App\Entity\Lodging;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class LodgingController extends AbstractController
{
    /**
     * @Route("/logement", name="lodgings")
     */
    public function index(): Response
    {        return $this->render('lodging/index.html.twig', [
            'controller_name' => 'LodgingController',

        ]);
    }


 /**
     * @Route("/logement/{id}", name="lodging")
     */
    public function lodgingDetails($id): Response
    {       
        $em = $this->getDoctrine();

        $lodging = $em->getRepository(Lodging::class)->findOneById($id);
        
        
        return $this->render('lodging/details.html.twig', [
            'lodging' => $lodging

        ]);
    }

}
