<?php
namespace App\Entity;

class Movie
{

    private $movie_id;
    private $movie_title;
    private $screen_time;
    private $directer;
    private $actor;
    private $aired;
    private $catchcopy;
    private $synopsis;
    private $img_path;
    private $url;


    public function getId(): ?int
    {
        return $this->movie_id;
    }
    public function setId(int $movie_id): void
    {
        $this->movie_id = $movie_id;
    }
    public function getTitle(): ?string
    {
        return $this->movie_title;
    }
    public function setTitle(string $movie_title): void
    {
        $this->movie_title = $movie_title;
    }
    public function getScreenTime(): ?int
    {
        return $this->screen_time;
    }
    public function setScreenTime(int $screen_time): void
    {
        $this->screen_time = $screen_time;
    }
    public function getDirecter(): ?string
    {
        return $this->directer;
    }
    public function setDirecter(?string $directer): void
    {
        $this->directer = $directer;
    }
    public function getActor(): ?string
    {
        return $this->actor;
    }
    public function setActor(?string $actor): void
    {
        $this->actor = $actor;
    }
    public function getAired(): ?string
    {
        return $this->aired;
    }
    public function setAired(?string $aired): void
    {
        $this->aired = $aired;
    }
    public function getCatchcopy(): ?string
    {
        return $this->catchcopy;
    }
    public function setCatchcopy(?string $catchcopy): void
    {
        $this->catchcopy = $catchcopy;
    }
    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }
    public function setSynopsis(?string $synopsis): void
    {
        $this->synopsis = $synopsis;
    }
    public function getImgPath(): ?string
    {
        return $this->img_path;
    }
    public function setImgPath(?string $img_path): void
    {
        $this->img_path = $img_path;
    }
    public function getUrl(): ?string
    {
        return $this->url;
    }
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }
}
