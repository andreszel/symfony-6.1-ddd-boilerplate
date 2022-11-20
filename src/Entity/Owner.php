<?php

namespace App\Entity;

use App\Repository\OwnerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OwnerRepository::class)]
class Owner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'ownerId', targetEntity: OwnerData::class, orphanRemoval: true)]
    private Collection $ownerData;

    public function __construct()
    {
        $this->ownerData = new ArrayCollection();
    }

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
     * @return Collection<int, OwnerData>
     */
    public function getOwnerData(): Collection
    {
        return $this->ownerData;
    }

    public function addOwnerData(OwnerData $ownerData): self
    {
        if (!$this->ownerData->contains($ownerData)) {
            $this->ownerData->add($ownerData);
            $ownerData->setOwnerId($this);
        }

        return $this;
    }

    public function removeOwnerData(OwnerData $ownerData): self
    {
        if ($this->ownerData->removeElement($ownerData)) {
            // set the owning side to null (unless already changed)
            if ($ownerData->getOwnerId() === $this) {
                $ownerData->setOwnerId(null);
            }
        }

        return $this;
    }
}
