<?php

namespace App\Repository;

use App\Entity\Applier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Applier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Applier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Applier[]    findAll()
 * @method Applier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Applier::class);
    }

    public function numberApplierByAge($minAge, $maxAge)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT COUNT(a.lastname)
            FROM App\Entity\Applier a
            WHERE a.age BETWEEN :minAge AND :maxAge' // OR a.age BETWEEN 18 AND 20 OR a.age BETWEEN 21 AND 23 OR a.age BETWEEN 24 AND 26 OR a.age BETWEEN 27 AND 29
        )->setParameter('minAge', $minAge)->setParameter('maxAge', $maxAge);
        // returns an array of Product objects
        return $query->getResult();
    }

    public function numberApplierByProfession($profession)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT COUNT(a.lastname)
            FROM App\Entity\Applier a
            WHERE a.profession = :profession' // OR a.age BETWEEN 18 AND 20 OR a.age BETWEEN 21 AND 23 OR a.age BETWEEN 24 AND 26 OR a.age BETWEEN 27 AND 29
        )->setParameter('profession', $profession);
        // returns an array of Product objects
        return $query->getResult();
    }
    // /**
    //  * @return Applier[] Returns an array of Applier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Applier
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

}
