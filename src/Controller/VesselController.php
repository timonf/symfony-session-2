<?php

namespace App\Controller;

use App\Entity\Vessel;
use App\Form\VesselType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class VesselController extends AbstractController
{
    /**
     * @Route("/vessels/create")
     */
    public function create(Request $request)
    {
        $form = $this->createForm(VesselType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Vessel $vessel */
            $vessel = $form->getData();
            $this->addFlash('success', sprintf('Vessel name %s was created!', $vessel->getName()));
            return $this->redirect('/vessels/create');
        } elseif ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('danger', sprintf('Some errors occured'));
        }

        return $this->render('vessel/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
