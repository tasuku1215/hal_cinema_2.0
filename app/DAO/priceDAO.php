<?php

namespace App\DAO;

use PDO;
use App\Entity\Price;

class PriceDAO
{

    private $db;


    public function __construct(PDO $db)
    {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->db = $db;
    }

    public function findByPK(int $price_id): ?Price
    {
        $sql = "SELECT * FROM prices WHERE price_id = :price_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":price_id", $price_id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $emp = null;
        if ($result && $row = $stmt->fetch()) {
            $price_id = $row['price_id'];
            $price_name = $row['price_name'];
            $amount = $row['price'];
            $startDay = $row['start_day'];
            $endDay = $row['end_day'];

            $price = new Price();
            $price->setId($price_id);
            $price->setName($price_name);
            $price->setPrice($amount);
            $price->setStartDay($startDay);
            $price->setEndDay($endDay);
        }
        return $price;
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM prices ORDER BY price_id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        $priceList = [];
        while ($row = $stmt->fetch()) {
            $price_id = $row['price_id'];
            $price_name = $row['price_name'];
            $amount = $row['price'];
            $startDay = $row['start_day'];
            $endDay = $row['end_day'];

            $price = new Price();
            $price->setId($price_id);
            $price->setName($price_name);
            $price->setPrice($amount);
            $price->setStartDay($startDay);
            $price->setEndDay($endDay);
            $priceList[$price_id] = $price;
        }
        return $priceList;
    }

    public function findByPriceName(string $price_name): ?Price
    {
        $sql = "SELECT * FROM prices WHERE price_name = :price_name";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":price_name", $price_name, PDO::PARAM_STR);
        $result = $stmt->execute();
        $price = null;
        if ($result && $row = $stmt->fetch()) {
            $price_id = $row['price_id'];
            $price_name = $row['price_name'];
            $amount = $row['price'];
            $startDay = $row['start_day'];
            $endDay = $row['end_day'];

            $price = new Price();
            $price->setId($price_id);
            $price->setName($price_name);
            $price->setPrice($amount);
            $price->setStartDay($startDay);
            $price->setEndDay($endDay);
        }
        return $price;
    }


    public function insert(Price $price): int
    {
        $sqlInsert = "INSERT INTO prices (price_name, price, start_day, end_day) VALUES (:price_name, :price, :start_day, :end_day)";
        $stmt = $this->db->prepare($sqlInsert);
        $stmt->bindValue(":price_name", $price->getName(), PDO::PARAM_STR);
        $stmt->bindValue(":price", $price->getPrice(), PDO::PARAM_INT);
        $stmt->bindValue(":start_day", $price->getStartDay(), PDO::PARAM_STR);
        $stmt->bindValue(":end_day", $price->getEndDay(), PDO::PARAM_STR);
        $result = $stmt->execute();
        if ($result) {
            $price_id = $this->db->lastInsertId();
        } else {
            $price_id = -1;
        }
        return $price_id;
    }

    public function update(Price $price): bool
    {
        $sqlUpdate = "UPDATE prices SET price_name = :price_name, price = :price, start_day = :start_day, end_day = :end_day WHERE price_id = :price_id";
        $stmt = $this->db->prepare($sqlUpdate);
        $stmt->bindValue(":price_id", $price->getId(), PDO::PARAM_INT);
        $stmt->bindValue(":price_name", $price->getName(), PDO::PARAM_STR);
        $stmt->bindValue(":price", $price->getPrice(), PDO::PARAM_INT);
        $stmt->bindValue(":start_day", $price->getStartDay(), PDO::PARAM_STR);
        $stmt->bindValue(":end_day", $price->getEndDay(), PDO::PARAM_STR);
        $result = $stmt->execute();
        return $result;
    }

    public function delete(int $price_id): bool
    {
        $sql = "DELETE FROM prices WHERE price_id = :price_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":price_id", $price_id, PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }
}
