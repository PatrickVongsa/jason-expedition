<?php

namespace App\Controller;

use App\Entity\Applier;
use App\Form\ApplierType;
use App\Repository\ApplierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/applier')]
class ApplierController extends AbstractController
{
    #[Route('/', name: 'applier_index', methods: ['GET'])]
    public function index(ApplierRepository $applierRepository): Response
    {
        return $this->render('applier/index.html.twig', [
            'appliers' => $applierRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'applier_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $applier = new Applier();
        $form = $this->createForm(ApplierType::class, $applier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($applier);
            $entityManager->flush();

            return $this->redirectToRoute('applier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('applier/new.html.twig', [
            'applier' => $applier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'applier_show', methods: ['GET'])]
    public function show(Applier $applier): Response
    {
        return $this->render('applier/show.html.twig', [
            'applier' => $applier,
        ]);
    }

    #[Route('/{id}/edit', name: 'applier_edit', methods: ['GET','POST'])]
    public function edit(Request $request, Applier $applier): Response
    {
        $form = $this->createForm(ApplierType::class, $applier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('applier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('applier/edit.html.twig', [
            'applier' => $applier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'applier_delete', methods: ['POST'])]
    public function delete(Request $request, Applier $applier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$applier->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($applier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('applier_index', [], Response::HTTP_SEE_OTHER);
    }
}
