<?php

namespace App\Entity;
use App\Entity\TacheList;
use App\Repository\ShoppingListRepository;
use App\Repository\TacheListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShoppingListRepository::class)]

class ShoppingList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]

    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $prenom  = null;

    #[ORM\Column]
    private ?int $date = null;
    
    #[ORM\OneToMany(
      targetEntity: TacheList::class,
      mappedBy: "shoppingList",
      cascade: ['persist', 'remove']
  )]
private $tacheList;

function __construct()
{
   $this->tacheList = new ArrayCollection();
   
}

    public function getId(): ?int {
        return $this->id;
      }
    
      public function getNom(): ?string {
        return $this->nom;
      }
      public function setNom(string $nom): self {
        $this->nom = $nom;
    
        return $this;
      }


      

    
    
    }