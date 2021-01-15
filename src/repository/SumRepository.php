<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Sum.php';
class SumRepository extends Repository
{
    public function getSum(int $id_assigned_by): Sum
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM sum_account WHERE id_assigned_by = :id_assigned_by
        ');

        $id_assigned_by=1;
        $stmt->bindParam(':id_assigned_by', $id_assigned_by, PDO::PARAM_INT);
        $stmt->execute();

        $sum = $stmt->fetch(PDO::FETCH_ASSOC);

        return new Sum(
            $sum['sum']
        );
    }

    public function updateSum(Sum $sum): void
    {


        $stmt = $this->database->connect()->prepare('
        UPDATE sum_account SET "sum"= :sum_account WHERE id_assigned_by=:id_assigned_by
        ');
        $sum2=$this->getSum(1);
        $money=$this->minusMoney();
        $sum_account=$sum->getSum()+$sum2->getSum() ;
        $id_assigned_by=1;
        $stmt->bindParam(':sum_account', $sum_account,PDO::PARAM_INT);
        $stmt->bindParam(':id_assigned_by', $id_assigned_by, PDO::PARAM_INT);


        $stmt->execute();
    }

    public function minusMoney(){

        $stmt = $this->database->connect()->prepare('
            SELECT SUM(price_elements) as minus FROM price WHERE id_assigned_by=:id_assigned_by 
        ');
        $id_assigned_by=1;
        $stmt->bindParam(':id_assigned_by', $id_assigned_by, PDO::PARAM_INT);
        $stmt->execute();
        $minus=$stmt->fetch(PDO::FETCH_ASSOC);
        return $minus['minus'];
    }

}
