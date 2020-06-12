<?php

namespace App\Repository;

use App\Entity\Categorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Categorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categorie[]    findAll()
 * @method Categorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categorie::class);
    }

   
    /**
     * Chercher la liste des categorie
     */
    public function getAll()
    {
        $entityManager = $this->getEntityManager(); 
        $querry = $entityManager->createQuery(
                'SELECT c
                    FROM app\Entity\Categorie c
                    ORDER BY c.nom DESC'
                );
        return $querry->execute();
    }
}
