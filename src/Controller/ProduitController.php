<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/produit")
*/
class ProduitController extends AbstractController
{
    /**
     * @Route("/", name="produit")
     */
    public function index()
    {
        $produit=$this->getDoctrine()
        ->getRepository(Produit::class)
        ->getAll();
    return $this->render('produit/index.html.twig', [
        'produits' => $produit,
    ]);
    }


    
}
