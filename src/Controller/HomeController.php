<?php

namespace App\Controller;

use App\Entity\Applier;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    #[IsGranted("ROLE_ADMIN")]
    public function index(): Response
    {
        $equipiers = $this->getDoctrine()
             ->getRepository(Applier::class)
             ->findAll();

        $hero = $this->getDoctrine()
        ->getRepository(Applier::class)
        ->findByProfession(1);

        $warrior = $this->getDoctrine()
        ->getRepository(Applier::class)
        ->findByProfession(2);

        $navigator = $this->getDoctrine()
        ->getRepository(Applier::class)
        ->findByProfession(3);

        return $this->render('home/index.html.twig', [
            'equipiers' => count($equipiers),
            'heros' => count($hero),
            'warriors' => count($warrior),
            'navigators' => count($navigator),
        ]);
    }
}
