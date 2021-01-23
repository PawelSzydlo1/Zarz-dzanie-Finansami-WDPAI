<?php
session_start();
require_once 'Repository.php';

class GraphRepository extends Repository
{
    public function getDate(){

        $stmt = $this->database->connect()->prepare('
            SELECT price_elements FROM price WHERE id_assigned_by =:id_assigned_by
        ');

        $id_assigned_by=$this->getIdUser();
        $stmt->bindParam(':id_assigned_by', $id_assigned_by, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);


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