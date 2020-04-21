<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Facture;
use App\Entity\Image;
use App\Form\FactureType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        $user = $this->getUser();
        return $this->render('default/index.html.twig', ['user' => $user]);
    }

    /**
     * @Route("/prestations", name="prestations")
     */
    public function prestations()
    {
        $user = $this->getUser();
        return $this->render('default/prestations.html.twig', ['user' => $user]);
    }

    /**
     * @Route("/galerie", name="galerie")
     */
    public function galerie(Request $request)
    {
        $dinatoire = $this->getDoctrine()->getRepository(Image::class)->findImage(2);
        $entree = $this->getDoctrine()->getRepository(Image::class)->findImage(3);
        $plat = $this->getDoctrine()->getRepository(Image::class)->findImage(4);
        $dessert = $this->getDoctrine()->getRepository(Image::class)->findImage(5);
        $user = $this->getUser();
        return $this->render('default/galerie.html.twig', ['user' => $user, 'dinatoire' => $dinatoire, 'entree' => $entree, 'plat' => $plat, 'dessert' => $dessert]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        $user = $this->getUser();
        return $this->render('default/contact.html.twig', ['user' => $user]);
    }

}
