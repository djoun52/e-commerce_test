<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Component\HttpFoundation\Response;
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

    /**
    * @Route("/{id}/remove", name="produit_remove", methods="GET")
    */
    public function remove(Produit $produit){
        $id = $produit->getId();
        $produit = $this->getDoctrine()
                ->getRepository(Produit::class)
                ->deleteOneById($id);
        return $this->redirectToRoute('produit_index');
    }   


     /**
     * @Route("/{id}", name="produit_show", methods="GET")
     */
    public function schow(Produit $produit): Response {
        return $this->render('film/show.html.twig',[
            'produit'=>$produit
            ]);
    }

    
}
