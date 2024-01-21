<?php

namespace App\Entity;

use App\Repository\CompanyTblRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompanyTblRepository::class)]
class CompanyTbl
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    #[ORM\Column(length: 200)]
    public ?string $company_name = null;

    #[ORM\Column(length: 200)]
    public ?string $company_phone = null;

    #[ORM\Column(length: 200)]
    public ?string $company_adress = null;

    #[ORM\Column(length: 200)]
    public ?string $company_logo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    public function setCompanyName(string $company_name): static
    {
        $this->company_name = $company_name;

        return $this;
    }

    public function getCompanyPhone(): ?string
    {
        return $this->company_phone;
    }

    public function setCompanyPhone(string $company_phone): static
    {
        $this->company_phone = $company_phone;

        return $this;
    }

    public function getCompanyAdress(): ?string
    {
        return $this->company_adress;
    }

    public function setCompanyAdress(string $company_adress): static
    {
        $this->company_adress = $company_adress;

        return $this;
    }

    public function getCompanyLogo(): ?string
    {
        return $this->company_logo;
    }

    public function setCompanyLogo(string $company_logo): static
    {
        $this->company_logo = $company_logo;

        return $this;
    }
}
