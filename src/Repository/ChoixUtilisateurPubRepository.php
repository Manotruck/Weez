<?php

namespace App\Repository;

use App\Entity\ChoixUtilisateurPub;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ChoixUtilisateurPub>
 *
 * @method ChoixUtilisateurPub|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChoixUtilisateurPub|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChoixUtilisateurPub[]    findAll()
 * @method ChoixUtilisateurPub[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChoixUtilisateurPubRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChoixUtilisateurPub::class);
    }

    public function save(ChoixUtilisateurPub $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ChoixUtilisateurPub $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ChoixUtilisateurPub[] Returns an array of ChoixUtilisateurPub objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ChoixUtilisateurPub
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
