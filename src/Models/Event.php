<?php

namespace Models;

use Exception;
use PDO;

class Event extends Database
{
    private $idEvent;
    private $nameEvent;
    private $email;
    private $idAdmin;

    /**getter & setter */
    public function getNameEvent()
    {
        return $this->nameEvent;
    }

    public function setNameEvent($value)
    {
        if (empty($value)) throw new Exception('Name of the spent is required');
        if (strlen($value) < 2 && strlen($value) > 255) throw new Exception('The name of the spent must be between 2 and 255 characters');

        $this->nameEvent = htmlspecialchars($value);
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($value){
        if(empty($value)) throw new Exception('Email is required');
        if(filter_var($value,FILTER_VALIDATE_EMAIL)) throw new Exception('Email is not valid');
    }

// $value = $post['emailUser']
    public function getId($value){
        $sql = "SELECT * FROM `user` WHERE `email` = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":email", $value, \PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    // public function info($value)
    // {
    //     $sql = "SELECT * FROM `spent` INNER JOIN `event` ON `spent`.`id_event` = `event`.`id` WHERE `event`.`id` = :id";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->bindValue(":id", $value, \PDO::PARAM_INT);
    //     $stmt->execute();
    //     $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    //     return $result ?: null;
    // }

    /**creation d'un nouveau evenement */
    public function createEvent($value)
    {
        $queryExecute = $this->db->prepare("INSERT INTO `event` (`name_event`,`id_admin`)

    		VALUES (:nameEvent,:id_admin)");

        $queryExecute->bindValue(':nameEvent', $this->nameEvent, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_admin', $value, PDO::PARAM_INT);

        return $queryExecute->execute();
    }

    /** Recuperation de les evenements */
    public function getAllEvent()
    {
        $sql = "SELECT * FROM `event`";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // supprimer une event
    public function delete(int $idSpent): bool
    {
        $sql = "DELETE FROM `event` WHERE `id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $idSpent, \PDO::PARAM_INT);
        return $stmt->execute();
    }

    // modifie une event
    public function update(int $idEvent): bool
    {
        $sql =
            "UPDATE `event` SET `name_event` = :name WHERE `id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $idEvent, \PDO::PARAM_INT);
        $stmt->bindValue(":title", $this->nameEvent, \PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getByEventId($value)
    {
        $sql = "SELECT * FROM `event` WHERE `id` = :id ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $value, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
