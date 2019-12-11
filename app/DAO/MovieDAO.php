<?php

namespace App\DAO;

use PDO;
use App\Entity\Movie;

class MovieDAO
{

    private $db;


    public function __construct(PDO $db)
    {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->db = $db;
    }

    public function findByPK(int $movie_id): ?Movie
    {
        $sql = "SELECT * FROM movies WHERE movie_id = :movie_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":movie_id", $movie_id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $movie = null;
        if ($result && $row = $stmt->fetch()) {
            $movie_id = $row['movie_id'];
            $movie_title = $row['movie_title'];
            $screen_time = $row['screen_time'];
            $directer = $row['directer'];
            $actor = $row['actor'];
            $aired = $row['aired'];
            $catchcopy = $row['catchcopy'];
            $synopsis = $row['synopsis'];
            $img_path = $row['img_path'];
            $url = $row['url'];

            $movie = new Movie();
            $movie->setId($movie_id);
            $movie->setTitle($movie_title);
            $movie->setScreenTime($screen_time);
            $movie->setDirecter($directer);
            $movie->setActor($actor);
            $movie->setAired($aired);
            $movie->setCatchcopy($catchcopy);
            $movie->setSynopsis($synopsis);
            $movie->setImgPath($img_path);
            $movie->setUrl($url);
        }
        return $movie;
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM movies ORDER BY movie_id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        $movieList = [];
        while ($row = $stmt->fetch()) {
            $movie_id = $row['movie_id'];
            $movie_title = $row['movie_title'];
            $screen_time = $row['screen_time'];
            $directer = $row['directer'];
            $actor = $row['actor'];
            $aired = $row['aired'];
            $catchcopy = $row['catchcopy'];
            $synopsis = $row['synopsis'];
            $img_path = $row['img_path'];
            $url = $row['url'];

            $movie = new Movie();
            $movie->setId($movie_id);
            $movie->setTitle($movie_title);
            $movie->setScreenTime($screen_time);
            $movie->setDirecter($directer);
            $movie->setActor($actor);
            $movie->setAired($aired);
            $movie->setCatchcopy($catchcopy);
            $movie->setSynopsis($synopsis);
            $movie->setImgPath($img_path);
            $movie->setUrl($url);
            $movieList[$movie_id] = $movie;
        }
        return $movieList;
    }

    public function findByMovieTitle(string $movie_title): ?Movie
    {
        $sql = "SELECT * FROM movies WHERE movie_title = :movie_title";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":movie_title", $movie_title, PDO::PARAM_STR);
        $result = $stmt->execute();
        $movie = null;
        if ($result && $row = $stmt->fetch()) {
            $movie_id = $row['movie_id'];
            $movie_title = $row['movie_title'];
            $screen_time = $row['screen_time'];
            $directer = $row['directer'];
            $actor = $row['actor'];
            $aired = $row['aired'];
            $catchcopy = $row['catchcopy'];
            $synopsis = $row['synopsis'];
            $img_path = $row['img_path'];
            $url = $row['url'];

            $movie = new Movie();
            $movie->setId($movie_id);
            $movie->setTitle($movie_title);
            $movie->setScreenTime($screen_time);
            $movie->setDirecter($directer);
            $movie->setActor($actor);
            $movie->setAired($aired);
            $movie->setCatchcopy($catchcopy);
            $movie->setSynopsis($synopsis);
            $movie->setImgPath($img_path);
            $movie->setUrl($url);
        }
        return $movie;
    }


    public function insert(Movie $movie): int
    {
        $sqlInsert = "INSERT INTO movies (movie_title, screen_time, directer, actor, aired, catchcopy, synopsis, img_path, url, created_at) VALUES (:movie_title, :screen_time, :directer, :actor, :aired, :catchcopy, :synopsis, :img_path, :url, now())";
        $stmt = $this->db->prepare($sqlInsert);
        $stmt->bindValue(":movie_title", $movie->getTitle(), PDO::PARAM_STR);
        $stmt->bindValue(":screen_time", $movie->getScreenTime(), PDO::PARAM_INT);
        $stmt->bindValue(":directer", $movie->getDirecter(), PDO::PARAM_STR);
        $stmt->bindValue(":actor", $movie->getActor(), PDO::PARAM_STR);
        $stmt->bindValue(":aired", $movie->getAired(), PDO::PARAM_STR);
        $stmt->bindValue(":catchcopy", $movie->getCatchcopy(), PDO::PARAM_STR);
        $stmt->bindValue(":synopsis", $movie->getSynopsis(), PDO::PARAM_STR);
        $stmt->bindValue(":img_path", $movie->getImgPath(), PDO::PARAM_STR);
        $stmt->bindValue(":url", $movie->getUrl(), PDO::PARAM_STR);
        $result = $stmt->execute();
        if ($result) {
            $movie_id = $this->db->lastInsertId();
        } else {
            $movie_id = -1;
        }
        return $movie_id;
    }

    public function update(Movie $movie): bool
    {
        $sqlUpdate = "UPDATE movies SET movie_title=:movie_title, screen_time=:screen_time, directer=:directer, actor=:actor, aired=:aired, catchcopy=:catchcopy, synopsis=:synopsis, img_path=:img_path, url=:url, updated_at=now() WHERE movie_id = :movie_id";
        $stmt = $this->db->prepare($sqlUpdate);
        $stmt->bindValue(":movie_id", $movie->getId(), PDO::PARAM_INT);
        $stmt->bindValue(":movie_title", $movie->getTitle(), PDO::PARAM_STR);
        $stmt->bindValue(":screen_time", $movie->getScreenTime(), PDO::PARAM_INT);
        $stmt->bindValue(":directer", $movie->getDirecter(), PDO::PARAM_STR);
        $stmt->bindValue(":actor", $movie->getActor(), PDO::PARAM_STR);
        $stmt->bindValue(":aired", $movie->getAired(), PDO::PARAM_STR);
        $stmt->bindValue(":catchcopy", $movie->getCatchcopy(), PDO::PARAM_STR);
        $stmt->bindValue(":synopsis", $movie->getSynopsis(), PDO::PARAM_STR);
        $stmt->bindValue(":img_path", $movie->getImgPath(), PDO::PARAM_STR);
        $stmt->bindValue(":url", $movie->getUrl(), PDO::PARAM_STR);
        $result = $stmt->execute();
        return $result;
    }

    public function delete(int $movie_id): bool
    {
        $sql = "DELETE FROM movies WHERE movie_id = :movie_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":movie_id", $movie_id, PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }
}
