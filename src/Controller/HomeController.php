<?php

namespace App\Controller;
use App\Repository\LodgingRepository;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

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
     * @Route("/api/lodgings/search/{query}", methods={"GET"})
     */
    public function search($query, LodgingRepository $lodgingRepository)
    {
        $lodgings = $lodgingRepository->findLodgings($query);
        return new JsonResponse($lodgings);
    }
}
