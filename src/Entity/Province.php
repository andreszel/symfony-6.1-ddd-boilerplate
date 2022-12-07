<?php

namespace App\Entity;

use App\Repository\ProvinceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProvinceRepository::class)]
class Province
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\ManyToOne(inversedBy: 'provinces')]
    private ?Country $country = null;

    #[ORM\OneToMany(mappedBy: 'province', targetEntity: OwnerData::class)]
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

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
            $ownerData->setProvince($this);
        }

        return $this;
    }

    public function removeOwnerData(OwnerData $ownerData): self
    {
        if ($this->ownerData->removeElement($ownerData)) {
            // set the owning side to null (unless already changed)
            if ($ownerData->getProvince() === $this) {
                $ownerData->setProvince(null);
            }
        }

        return $this;
    }
}
