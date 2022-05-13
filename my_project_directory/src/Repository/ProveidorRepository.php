<?php

namespace App\Repository;

use App\Entity\Proveidors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProveidorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Proveidors::class);
    }

    /**
    * @return Product[]
    */
    public function getAll(): array
    {
        $entityManager = $this->getEntityManager();
        $query=$entityManager->createQuery(
            'SELECT p FROM App\Entity\Proveidors p'
        );
        return $query->getResult();
    }

    /**
     * @return Product
     */
    public function getById(int $id)
    {
        $entityManager = $this->getEntityManager();
        $query=$entityManager->createQuery(
            'SELECT p FROM App\Entity\Proveidors p WHERE p.id = :id'
        )->setParameter('id', $id);
        return $query->getResult();
    }

    /**
     * @return Product
     */
    public function getByName(string $name)
    {
        $entityManager = $this->getEntityManager();
        $query=$entityManager->createQuery(
            'SELECT p FROM App\Entity\Proveidors p
            WHERE p.nom = :name ORDER BY p.id ASC'
        )->setParameter('name', $name);
        return $query->getResult()[0];
    }
}

?>