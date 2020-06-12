<?php

namespace App\Repository;

use App\Entity\DetailCommande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DetailCommande|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetailCommande|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetailCommande[]    findAll()
 * @method DetailCommande[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetailCommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DetailCommande::class);
    }

    // /**
    //  * Chercher la liste des 
    //  */
    // public function getAll()
    // {
    //     $entityManager = $this->getEntityManager(); 
    //     $querry = $entityManager->createQuery(
    //             'SELECT dc
    //                 FROM app\Entity\DetailCommande dc
    //                 ORDER BY dc.id DESC'
    //             );
    //     return $querry->execute();
    // }
}
