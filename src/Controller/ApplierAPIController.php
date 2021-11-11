<?php

namespace App\Controller;

use App\Entity\Applier;
use App\Repository\ApplierRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/applier')]
#[IsGranted("ROLE_ADMIN")]
class ApplierAPIController extends AbstractController
{
    #[Route('/api/age', name: 'applier_api_age', methods: ['GET'])]
    public function applierAgeApi(): Response
    {
        $agesInterval = [
            [15, 17],
            [18, 20],
            [21, 23],
            [24, 26],
            [27, 29],
        ];
        $countAges_A = [];

        foreach ($agesInterval as $interval) {
            $countAges = $this->getDoctrine()
                ->getRepository(Applier::class)
                ->numberApplierByAge($interval[0], $interval[1]);

        $countAges_A[] = $countAges[0][1];
        }
        return $this->json($countAges_A);
    }

    #[Route('/api/proportion', name: 'applier_api_proportion', methods: ['GET'])]
    public function applierProfessionApi(): Response
    {
        $professionInterval = [1, 2, 3];
        $countProfession_A = [];

        foreach ($professionInterval as $interval) {
            $countProfession = $this->getDoctrine()
                ->getRepository(Applier::class)
                ->numberApplierByProfession($interval);

        $countProfession_A[] = $countProfession[0][1];
        }
        return $this->json($countProfession_A);
    }
}
