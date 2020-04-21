<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Facture;
class ProfilController extends AbstractController
{
    /**
     * @Route("/profil/{id}", name="profil")
     */
    public function index()
    {
        $user = $this->getUser();
        $facture = $this->getDoctrine()->getRepository(Facture::Class)->findFactureByClient($user);

        return $this->render('user/profil.html.twig', [
            'controller_name' => 'ProfilController',
            'facture' => $facture,
            'user' => $user
        ]);
    }
}
