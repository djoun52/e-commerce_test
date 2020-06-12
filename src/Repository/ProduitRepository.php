<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    /**
     * Chercher la liste des produits
     */
    public function getAll()
    {
        $entityManager = $this->getEntityManager(); 
        $querry = $entityManager->createQuery(
                'SELECT p
                    FROM app\Entity\Produit p
                    ORDER BY p.designation DESC'
                );
        return $querry->execute();
    }


    /**
     * supprimer une produit
     */
    public function deleteOneById($id){
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            "DELETE 
                FROM app\Entity\Produit p
                WHERE p.id = $id"
        );
        return $query->execute();
    }
}
