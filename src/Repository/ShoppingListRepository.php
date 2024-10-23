<?php
namespace App\Repository;

use App\Entity\ShoppingList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class shoppingListepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine,ShoppingList::class);
    }

    

public function save (ShoppingList $newShoppingList, bool $isSave = true): ShoppingList
{


    $this->getEntityManager()->persist($newShoppingList);

    if($isSave){
   $this->getEntityManager()->flush();
    }
    return $newShoppingList;
}

 public function delete(ShoppingList $ShoppingList)
{
    $this->getEntityManager()->remove($ShoppingList);
    $this->getEntityManager()->flush();
}

}

