<?php

namespace App\Entity;

use App\Repository\OwnerDataRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OwnerDataRepository::class)]
class OwnerData
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $postCode = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    private ?string $nip = null;

    #[ORM\Column(length: 255)]
    private ?string $regon = null;

    #[ORM\Column(nullable: true)]
    private array $phone = [];

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\ManyToOne(inversedBy: 'ownerData')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Owner $owner = null;

    #[ORM\ManyToOne(inversedBy: 'ownerData')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DataType $dataType = null;

    #[ORM\ManyToOne(inversedBy: 'ownerData')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Province $province = null;

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

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    public function setPostCode(string $postCode): self
    {
        $this->postCode = $postCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getNip(): ?string
    {
        return $this->nip;
    }

    public function setNip(string $nip): self
    {
        $this->nip = $nip;

        return $this;
    }

    public function getRegon(): ?string
    {
        return $this->regon;
    }

    public function setRegon(string $regon): self
    {
        $this->regon = $regon;

        return $this;
    }

    public function getPhone(): array
    {
        return $this->phone;
    }

    public function setPhone(?array $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getOwner(): ?Owner
    {
        return $this->owner;
    }

    public function setOwner(?Owner $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getDataType(): ?DataType
    {
        return $this->dataType;
    }

    public function setDataType(?DataType $dataType): self
    {
        $this->dataType = $dataType;

        return $this;
    }

    public function getProvince(): ?Province
    {
        return $this->province;
    }

    public function setProvince(?Province $province): self
    {
        $this->province = $province;

        return $this;
    }
}
