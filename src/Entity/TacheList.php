<?php



namespace App\Entity;

use App\Repository\TacheListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TacheListRepository::class)]

class TacheList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'int')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'tacheList', targetEntity: TacheList::class, cascade: ['persist', 'remove'])]
    private Collection $taches;

    public function __construct()
    {
        $this->taches = new ArrayCollection();
    }

    // Getter et Setter pour id
    public function getId(): ?int
    {
        return $this->id;
    }

    
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    
    /**
     * @return Collection<int, Tache>
     */
    public function getTaches(): Collection
    {
        return $this->taches;
    }

    public function addTache(TacheList $tache): self
    {
        if (!$this->taches->contains($tache)) {
            $this->taches[] = $tache;
            $tache->setTacheList($this);
        }

        return $this;
    }

    public function removeTache(TacheList $tache): self
    {
        if ($this->taches->removeElement($tache)) {
    
            if ($tache->getTacheList() === $this) {
                $tache->setTacheList(null);
            }
        }

        return $this;
    }
}
