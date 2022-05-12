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

    public function insert(Proveidors $proveidor)
    {
        $entityManager = $this->getEntityManager();
        $query=$entityManager->createQuery(
            'INSERT INTO proveidors (:proveidor.nom, :proveidor.mail, :proveidor.telf, :proveidor.tipus, :proveidor.actiu, :proveidor.creacio, :proveidor.actualitzacio)'
        )->setParameter('proveidor', $proveidor);
    }
}

?>