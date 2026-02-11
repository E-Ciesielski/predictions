<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'games')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Club $homeTeam = null;

    #[ORM\ManyToOne(inversedBy: 'games')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Club $awayTeam = null;

    #[ORM\Column(nullable: true)]
    private ?int $homeScore = null;

    #[ORM\Column(nullable: true)]
    private ?int $awayScore = null;

    #[ORM\ManyToOne(inversedBy: 'games')]
    private ?Stadium $stadium = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $startDateTime = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    #[Assert\GreaterThan(0)]
    #[Assert\LessThanOrEqual(38)]
    private ?int $gameWeek = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHomeTeam(): ?Club
    {
        return $this->homeTeam;
    }

    public function setHomeTeam(?Club $homeTeam): static
    {
        $this->homeTeam = $homeTeam;

        return $this;
    }

    public function getAwayTeam(): ?Club
    {
        return $this->awayTeam;
    }

    public function setAwayTeam(?Club $awayTeam): static
    {
        $this->awayTeam = $awayTeam;

        return $this;
    }

    public function getHomeScore(): ?int
    {
        return $this->homeScore;
    }

    public function setHomeScore(?int $homeScore): static
    {
        $this->homeScore = $homeScore;

        return $this;
    }

    public function getAwayScore(): ?int
    {
        return $this->awayScore;
    }

    public function setAwayScore(?int $awayScore): static
    {
        $this->awayScore = $awayScore;

        return $this;
    }

    public function getStadium(): ?Stadium
    {
        return $this->stadium;
    }

    public function setStadium(?Stadium $stadium): static
    {
        $this->stadium = $stadium;

        return $this;
    }

    public function getStartDateTime(): ?\DateTime
    {
        return $this->startDateTime;
    }

    public function setStartDateTime(\DateTime $startDateTime): static
    {
        $this->startDateTime = $startDateTime;

        return $this;
    }

    public function getGameWeek(): ?int
    {
        return $this->gameWeek;
    }

    public function setGameWeek(int $gameWeek): static
    {
        $this->gameWeek = $gameWeek;

        return $this;
    }
}
