<?php

namespace App\Entity;

use App\Repository\StudentTblRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentTblRepository::class)]
class StudentTbl
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    #[ORM\Column(length: 200)]
    public ?string $TC = null;

    #[ORM\Column(length: 200)]
    public ?string $student_name = null;

    #[ORM\Column(length: 200)]
    public ?string $student_surname = null;

    #[ORM\Column(length: 200)]
    public ?string $student_email = null;

    #[ORM\Column(length: 200)]
    public ?string $student_phone = null;

    #[ORM\Column(length: 200)]
    public ?string $student_gender = null;

    public function getId(): int
    {
        return $this->id;
    }
    public function getTC(): ?string
    {
        return $this->TC;
    }
    public function setTC(string $TC): static
    {
        $this->TC = $TC;

        return $this;
    }

    public function getStudentName(): ?string
    {
        return $this->student_name;
    }

    public function setStudentName(?string $student_name): static
    {
        $this->student_name = $student_name;

        return $this;
    }

    public function getStudentSurname(): ?string
    {
        return $this->student_surname;
    }

    public function setStudentSurname(string $student_surname): static
    {
        $this->student_surname = $student_surname;

        return $this;
    }

    public function getStudentEmail(): ?string
    {
        return $this->student_email;
    }

    public function setStudentEmail(string $student_email): static
    {
        $this->student_email = $student_email;

        return $this;
    }

    public function getStudentPhone(): ?string
    {
        return $this->student_phone;
    }

    public function setStudentPhone(string $student_phone): static
    {
        $this->student_phone = $student_phone;

        return $this;
    }

    public function getStudentGender(): ?string
    {
        return $this->student_gender;
    }

    public function setStudentGender(string $student_gender): static
    {
        $this->student_gender = $student_gender;

        return $this;
    }
}
