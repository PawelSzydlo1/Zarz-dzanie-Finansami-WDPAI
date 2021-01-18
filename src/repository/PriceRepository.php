<?php
session_start();
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
        $assignedById=$this->getIdUser();
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
            SELECT * FROM price  WHERE id_assigned_by=:id_assigned_by;
        ');
        $id_assigned_by=$this->getIdUser();
        $stmt->bindParam(':id_assigned_by', $id_assigned_by, PDO::PARAM_INT);
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
    public function getIdUser(){
        $stmt = $this->database->connect()->prepare('
            SELECT id as id_user FROM users WHERE email=:email
        ');
        $email=unserialize($_SESSION['user'])->getEmail();

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $id=$stmt->fetch(PDO::FETCH_ASSOC);
        return $id['id_user'];
    }

}