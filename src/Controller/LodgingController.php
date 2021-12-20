<?php

namespace App\Controller;
use App\Entity\Lodging;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class LodgingController extends AbstractController
{
    /**
     * @Route("/hebergement", name="lodgings")
     */
    public function index(): Response
    { 
        
     
        if (isset($_POST) && !empty($_POST)){
          

                 
     
        
        
        return $this->render('lodging/index.html.twig', [
            
            "destination" => $_POST["destination"],
            "startdate" => $_POST["startdate"],
            "enddate" => $_POST["enddate"],
            "travelersnb" => $_POST["travelersnb"],

          
           

        ]);
    
    };
    }


 /**
     * @Route("/hebergement/{id}", name="lodging")
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
