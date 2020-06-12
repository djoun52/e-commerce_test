<?php

namespace App\Repository;

use App\Entity\Client;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Client|null find($id, $lockMode = null, $lockVersion = null)
 * @method Client|null findOneBy(array $criteria, array $orderBy = null)
 * @method Client[]    findAll()
 * @method Client[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Client::class);
    }


    /**
     * Chercher la liste des client
     */
    public function getAll()
    {
        $entityManager = $this->getEntityManager(); 
        $querry = $entityManager->createQuery(
                'SELECT c
                    FROM app\Entity\Client c
                    ORDER BY c.date_creation DESC'
                );
        return $querry->execute();
    }

     /**
     * supprimer une client
     */
    public function deleteOneById($id){
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            "DELETE 
                FROM app\Entity\Client c
                WHERE c.id = $id"
        );
        return $query->execute();
    }
}
