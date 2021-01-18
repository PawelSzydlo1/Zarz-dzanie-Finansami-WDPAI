<?php
session_start();
require_once 'Repository.php';
require_once __DIR__ . '/../models/Sum.php';
class SumRepository extends Repository
{
    public function getSum(int $id_assigned_by): Sum
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM sum_account WHERE id_assigned_by = :id_assigned_by
        ');

        $id_assigned_by=$this->getIdUser();
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
        $sum2=$this->getSum($this->getIdUser());
        $sum_account=$sum->getSum()+$sum2->getSum() ;
        $id_assigned_by=$this->getIdUser();
        $stmt->bindParam(':sum_account', $sum_account,PDO::PARAM_INT);
        $stmt->bindParam(':id_assigned_by', $id_assigned_by, PDO::PARAM_INT);
        $stmt->execute();
        $temp=$stmt->fetch(PDO::FETCH_ASSOC);
        if($temp==NULL){
            $stmt=$this->database->connect()->prepare('
        INSERT INTO sum_account ("sum", id_assigned_by)
        VALUES(?,?)
        ');
            $assignedById=$this->getIdUser();
            $stmt->execute([
                $sum->getSum(),
                $assignedById
            ]);
        }

    }

    public function minusMoney(){

        $stmt = $this->database->connect()->prepare('
            SELECT SUM(price_elements) as minus FROM price WHERE id_assigned_by=:id_assigned_by 
        ');
        $id_assigned_by=$this->getIdUser();
        $stmt->bindParam(':id_assigned_by', $id_assigned_by, PDO::PARAM_INT);
        $stmt->execute();
        $minus=$stmt->fetch(PDO::FETCH_ASSOC);
        return $minus['minus'];
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
