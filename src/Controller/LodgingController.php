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
        $post=false;


        if (isset($_POST) && !empty($_POST)){

            $destination =$_POST["destination"];
            $startdate =$_POST["startdate"];
            $enddate=$_POST["enddate"];
            $travelersNb =$_POST["travelersNb"];
            $post = true;

            $lodgings = $this->getDoctrine()->getRepository(Lodging::class)->createQueryBuilder('l')
            ->select('l')
            ->join('l.address', 'a')
            ->Where('l.title LIKE :destination OR a.city LIKE :city OR l.description LIKE :description')
            
            ->setParameter('destination', '%'.$destination.'%')
            ->setParameter('city', '%'.$destination.'%')
            ->setParameter('description', '%'.$destination.'%')
           
            ->getQuery()
            ->getResult()
            ;

            
        

           /* $auteurListFilter = $em->getRepository(Article::class)->createQueryBuilder('a')
            ->andWhere('a.date = :date')
            ->setParameter('date', '2018-01-03')
            ->orderBy('a.id', 'ASC') //non obligatoire
            ->setMaxResults(10) //non obligatoire
            ->getQuery()
            ->getResult(); */

         
            

           
         }else{
            $lodgings = $lodgingRepository->findAll();
         };



        return $this->render('lodging/index.html.twig', [
            
            "lodgings" => $lodgings,
            "post" => $post,
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

        // localisation   
        
        
        return $this->render('lodging/details.html.twig', [
            'lodging' => $lodging

        ]);
    }


   


}
