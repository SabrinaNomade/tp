<?php

namespace App\Repository;

use App\Entity\TacheList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TacheListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine, TacheList::class); 
    }

    public function save(TacheList $newTacheList, bool $isSave = true): TacheList
    {
        $this->getEntityManager()->persist($newTacheList);

        if ($isSave) {
            $this->getEntityManager()->flush();
        }

        return $newTacheList;
    }

    public function delete(TacheList $tacheList)
    {
        $this->getEntityManager()->remove($tacheList);
        $this->getEntityManager()->flush();
    }
}
