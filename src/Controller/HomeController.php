<?php

namespace App\Controller;
use App\Repository\LodginRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
           
        ]);
    }

   /**
     * @Route("/api/auteurs/search/{query}", methods={"GET"})
     */
    public function search($query, LodgingRepository $lodgingRepository)
    {
        $lodgins = $laodginsRepository->findLodgings($query);
        return new JsonResponse($lodgings);
    }
}
