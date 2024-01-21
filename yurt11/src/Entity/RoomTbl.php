<?php

namespace App\Entity;

use App\Repository\RoomTblRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomTblRepository::class)]
class RoomTbl
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    #[ORM\Column(length: 200)]
    public ?string $room_name = null;

    #[ORM\Column(length: 200)]
    public ?string $room_number = null;

    #[ORM\Column(length: 200)]
    public ?string $bed_capacity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoomName(): ?string
    {
        return $this->room_name;
    }

    public function setRoomName(string $room_name): static
    {
        $this->room_name = $room_name;

        return $this;
    }

    public function getRoomNumber(): ?string
    {
        return $this->room_number;
    }

    public function setRoomNumber(string $room_number): static
    {
        $this->room_number = $room_number;

        return $this;
    }

    public function getBedCapacity(): ?string
    {
        return $this->bed_capacity;
    }

    public function setBedCapacity(string $bed_capacity): static
    {
        $this->bed_capacity = $bed_capacity;

        return $this;
    }
}
