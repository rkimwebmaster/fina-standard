<?php

namespace App\Controller;

use App\Entity\ZoneLivraison;
use App\Form\ZoneLivraisonType;
use App\Repository\ZoneLivraisonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/zone/livraison')]
class ZoneLivraisonController extends AbstractController
{
    #[Route('/', name: 'app_zone_livraison_index', methods: ['GET'])]
    public function index(ZoneLivraisonRepository $zoneLivraisonRepository): Response
    {
        return $this->render('zone_livraison/index.html.twig', [
            'zone_livraisons' => $zoneLivraisonRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_zone_livraison_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ZoneLivraisonRepository $zoneLivraisonRepository): Response
    {
        $zoneLivraison = new ZoneLivraison();
        $form = $this->createForm(ZoneLivraisonType::class, $zoneLivraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $zoneLivraisonRepository->save($zoneLivraison, true);

            return $this->redirectToRoute('app_zone_livraison_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('zone_livraison/new.html.twig', [
            'zone_livraison' => $zoneLivraison,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_zone_livraison_show', methods: ['GET'])]
    public function show(ZoneLivraison $zoneLivraison): Response
    {
        return $this->render('zone_livraison/show.html.twig', [
            'zone_livraison' => $zoneLivraison,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_zone_livraison_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ZoneLivraison $zoneLivraison, ZoneLivraisonRepository $zoneLivraisonRepository): Response
    {
        $form = $this->createForm(ZoneLivraisonType::class, $zoneLivraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $zoneLivraisonRepository->save($zoneLivraison, true);

            return $this->redirectToRoute('app_zone_livraison_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('zone_livraison/edit.html.twig', [
            'zone_livraison' => $zoneLivraison,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_zone_livraison_delete', methods: ['POST'])]
    public function delete(Request $request, ZoneLivraison $zoneLivraison, ZoneLivraisonRepository $zoneLivraisonRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$zoneLivraison->getId(), $request->request->get('_token'))) {
            $zoneLivraisonRepository->remove($zoneLivraison, true);
        }

        return $this->redirectToRoute('app_zone_livraison_index', [], Response::HTTP_SEE_OTHER);
    }
}
