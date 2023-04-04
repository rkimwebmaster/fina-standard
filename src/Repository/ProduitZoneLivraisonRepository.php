<?php

namespace App\Repository;

use App\Entity\ProduitZoneLivraison;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProduitZoneLivraison>
 *
 * @method ProduitZoneLivraison|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProduitZoneLivraison|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProduitZoneLivraison[]    findAll()
 * @method ProduitZoneLivraison[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitZoneLivraisonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProduitZoneLivraison::class);
    }

    public function save(ProduitZoneLivraison $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ProduitZoneLivraison $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ProduitZoneLivraison[] Returns an array of ProduitZoneLivraison objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ProduitZoneLivraison
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
