<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Price.php';

class PriceRepository extends Repository
{

    public function getPrice(string $id): ?Price
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM price WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $price = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($price == false) {
            return null;
        }
        return new Price(
            $price['price_elements'],
            $price['category'],
            $price['data']
        );
    }

    public function addPrice(Price $price): void
    {
        $stmt=$this->database->connect()->prepare('
        INSERT INTO price (price_elements,category,data, id_assigned_by)
        VALUES(?,?,?,?)
        ');
        $assignedById=1;
        $stmt->execute([
            $price->getPrice(),
            $price->getCategory(),
            $price->getData(),
            $assignedById
        ]);
    }
    public function getPrices(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM price;
        ');
        $stmt->execute();
        $prices = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($prices as $price) {
            $result[] = new Price(
                $price['price_elements'],
                $price['category'],
                $price['data']
            );
        }

        return $result;
    }
}