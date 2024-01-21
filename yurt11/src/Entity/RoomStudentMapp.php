<?php

namespace App\Entity;

use App\Repository\RoomStudentMappRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomStudentMappRepository::class)]
class RoomStudentMapp
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    #[ORM\Column]
    public ?int $StudentID = null;

    #[ORM\Column]
    public ?int $RoomID = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getStudentID(): ?int
    {
        return $this->StudentID;
    }

    public function setStudentID(int $StudentID): static
    {
        $this->StudentID = $StudentID;

        return $this;
    }

    public function getRoomID(): ?int
    {
        return $this->RoomID;
    }

    public function setRoomID(int $RoomID): static
    {
        $this->RoomID = $RoomID;

        return $this;
    }
}
