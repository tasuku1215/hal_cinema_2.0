<?php
namespace App\Entity;

class Price
{

    private $price_id;

    private $price_name;

    private $price;

    private $startDay;

    private $endDay;



    public function getId(): ?int
    {
        return $this->price_id;
    }
    public function setId(int $price_id): void
    {
        $this->price_id = $price_id;
    }
    public function getName(): ?string
    {
        return $this->price_name;
    }
    public function setName(string $price_name): void
    {
        $this->price_name = $price_name;
    }
    public function getPrice(): ?int
    {
        return $this->price;
    }
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }
    public function getStartDay(): ?string
    {
        return $this->startDay;
    }
    public function setStartDay(?string $startDay): void
    {
        $this->startDay = $startDay;
    }
    public function getEndDay(): ?string
    {
        return $this->endDay;
    }
    public function setEndDay(?string $endDay): void
    {
        $this->endDay = $endDay;
    }
}
