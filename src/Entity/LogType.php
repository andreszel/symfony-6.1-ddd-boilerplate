<?php

namespace App\Entity;

use App\Repository\LogTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogTypeRepository::class)]
class LogType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'logType', targetEntity: UserLog::class)]
    private Collection $userLogs;

    #[ORM\Column(nullable: false, options: ["default" => false])]
    private ?bool $isLogin = null;

    #[ORM\Column(nullable: false, options: ["default" => false])]
    private ?bool $isLogout = null;

    public function __construct()
    {
        $this->userLogs = new ArrayCollection();
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
     * @return Collection<int, UserLog>
     */
    public function getUserLogs(): Collection
    {
        return $this->userLogs;
    }

    public function addUserLog(UserLog $userLog): self
    {
        if (!$this->userLogs->contains($userLog)) {
            $this->userLogs->add($userLog);
            $userLog->setLogType($this);
        }

        return $this;
    }

    public function removeUserLog(UserLog $userLog): self
    {
        if ($this->userLogs->removeElement($userLog)) {
            // set the owning side to null (unless already changed)
            if ($userLog->getLogType() === $this) {
                $userLog->setLogType(null);
            }
        }

        return $this;
    }

    public function isIsLogin(): ?bool
    {
        return $this->isLogin;
    }

    public function setIsLogin(bool $isLogin): self
    {
        $this->isLogin = $isLogin;

        return $this;
    }

    public function isIsLogout(): ?bool
    {
        return $this->isLogout;
    }

    public function setIsLogout(bool $isLogout): self
    {
        $this->isLogout = $isLogout;

        return $this;
    }
}
