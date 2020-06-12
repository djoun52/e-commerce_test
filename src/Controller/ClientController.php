<?php

namespace App\Controller;

use App\Entity\Client;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/client")
*/
class ClientController extends AbstractController
{
    /**
     * @Route("/", name="client")
     */
    public function index()
    {
        $client=$this->getDoctrine()
        ->getRepository(Client::class)
        ->getAll();
    return $this->render('client/index.html.twig', [
        'clients' => $client,
    ]);
    }

    /**
    * @Route("/{id}/remove", name="client_remove", methods="GET")
    */
    public function remove(Client $client){
        $id = $client->getId();
        $client = $this->getDoctrine()
                ->getRepository(Client::class)
                ->deleteOneById($id);
        return $this->redirectToRoute('client_index');
    }   


     /**
     * @Route("/{id}", name="client_show", methods="GET")
     */
    public function schow(Client $client): Response {
        return $this->render('client/show.html.twig',[
            'client'=>$client
            ]);
    }
}
