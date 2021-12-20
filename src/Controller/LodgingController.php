<?php

namespace App\Controller;
use App\Entity\Lodging;
use App\Repository\LodgingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class LodgingController extends AbstractController
{
    /**
     * @Route("/hebergement", name="lodgings")
     */
    public function index(LodgingRepository $lodgingRepository): Response
    { 

        $destination ="";
        $startdate ="";
        $enddate="";
        $travelersNb =1;
      

        
     
        if (isset($_POST) && !empty($_POST)){

            $destination =$_POST["destination"];
            $startdate =$_POST["startdate"];
            $enddate=$_POST["enddate"];
            $travelersNb =$_POST["travelersNb"];
           
         };











        return $this->render('lodging/index.html.twig', [
            
            "lodgings" => $lodgingRepository->findAll(),

            "destination" => $destination,
            "startdate" => $startdate,
            "enddate" => $enddate,
            "travelersNb" => $travelersNb,

        ]);
    
   
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
