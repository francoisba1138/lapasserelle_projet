<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\UserType;
use App\Entity\User;
use App\Entity\Lodging;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\User\UserInterface;


class UserController extends AbstractController
{
    /**
     * @Route("/monprofil", name="user")
     * 
     * 
     */
    public function index(UserInterface $user, UserRepository $UserRepository): Response
    {

        $id = $user->getId(); 


       /* $user = $this->getDoctrine()
        ->getRepository(User::class)
        ->createQueryBuilder('u')
        ->select('u')       
        
        ->join('u.address', 'a')
        

        ->Where('u.id = :id')
        ->andWhere('a.user = u.id')
     

        ->setParameter('id', $id )

        ->getQuery()
        ->getSingleResult()
        ;

*/

        $lodgings = $this->getDoctrine()
        ->getRepository(lodging::class)
        ->createQueryBuilder('l')
        ->select('l')       
         
        

        ->Where('l.host = :id')
       
     

        ->setParameter('id', $id )

        ->getQuery()
        ->getResult()
        ;


               
        
    

        return $this->render('user/profile.html.twig',  [
          
            'user' => $user,
            'addresses' => $user->getAddress()->getValues(),
            'lodgings' => $lodgings
        
           
    ]
);
    }

 /**
     * @Route("/useredit", name="user_edit")
     * 
     */
    public function edit(Request $request): Response
    {
        $user = new User();
               
        $form = $this->createForm(UserType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            if(!$user->getId()){
                $entityManager->persist($user);
            }
            $entityManager->flush();
            return $this->redirect($this->generateUrl('user_edit', ['id' => $user->getId()]));
        }
    

        return $this->render('user/edit.html.twig',  [
            'form' => $form->createView(),
            'user' => $user
    ]
);
}





     /**
     * @Route("/user/{id}", name="user_profile")
     * 
     */
    public function profile($id, UserRepository $UserRepository): Response
    {
        
        //$em = $this->getDoctrine();
        //$user = $em->getRepository(User::class)->findOneById($id); 
        //$address = $user->getAddress();

        $user = $this->getDoctrine()
        ->getRepository(User::class)
        ->createQueryBuilder('u')
        ->select('u')       
        
        ->join('u.address', 'a')
        

        ->Where('u.id = :id')
        ->andWhere('a.user = u.id')
     

        ->setParameter('id', $id )

        ->getQuery()
        ->getSingleResult();



        $lodgings = $this->getDoctrine()
        ->getRepository(lodging::class)
        ->createQueryBuilder('l')
        ->select('l')       
         
        

        ->Where('l.host = :id')
       
     

        ->setParameter('id', $id )

        ->getQuery()
        ->getResult();


               
        
    

        return $this->render('user/profile.html.twig',  [
          
            'user' => $user,
            'addresses' => $user->getAddress()->getValues(),
            'lodgings' => $lodgings
        
           
    ]
);
    }



}
