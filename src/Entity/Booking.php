<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BookingRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'bookings')]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $user;

    #[Assert\GreaterThan('today', message: "La data arrivé doit être supérieur à celle d'aujourd'hui")]
    #[ORM\Column(type: 'date', nullable: true)]
    private ?DateTime $checkIn = null;

    #[Assert\GreaterThan(propertyPath: 'checkIn', message: 'La date de checkOut dois être après la data checkIn')]
    #[ORM\Column(type: 'date', nullable: true)]
    private ?DateTime $checkOut = null;

    #[ORM\ManyToOne(targetEntity: Room::class, inversedBy: 'bookings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Room $room;

    #[ORM\ManyToOne(targetEntity: Hotel::class, inversedBy: 'bookings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Hotel $hotel;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCheckIn(): ?DateTime
    {
        return $this->checkIn;
    }

    public function setCheckIn(?DateTime $checkIn): self
    {
        $this->checkIn = $checkIn;

        return $this;
    }

    public function getCheckOut(): ?DateTime
    {
        return $this->checkOut;
    }

    public function setCheckOut(?DateTime $checkOut): self
    {
        $this->checkOut = $checkOut;

        return $this;
    }

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setRoom(Room $room): self
    {
        $this->room = $room;

        return $this;
    }

    public function getHotel(): ?Hotel
    {
        return $this->hotel;
    }

    public function setHotel(Hotel $hotel): self
    {
        $this->hotel = $hotel;

        return $this;
    }
}
