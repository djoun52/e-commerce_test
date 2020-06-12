<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/categorie")
*/
class CategorieController extends AbstractController
{
    /**
     * @Route("/", name="categorie")
     */
    public function index()
    {
        $categorie=$this->getDoctrine()
        ->getRepository(Categorie::class)
        ->getAll();
    return $this->render('categorie/index.html.twig', [
        'categories' => $categorie,
    ]);
    }
}
