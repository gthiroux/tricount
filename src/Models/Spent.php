<?php

namespace Models;

use Exception;
use PDO;

class Spent extends Database
{
    private $idSpent;
    private $name;
    private $picture;
    private $date;
    private $totalSpent;
    private $status;
    private $idEvent;
    private $nbrUser;

    /**getters & setters */
    public function getSpentName()
    {
        return $this->name;
    }

    public function setSpentName($value)
    {
        if (empty($value)) throw new Exception('Name of the spent is required');
        if (strlen($value) < 2 || strlen($value) > 255) throw new Exception('The name of the spent must be between 2 and 255 characters');

        $this->name = htmlspecialchars($value);
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($value)
    {

        $this->picture = $value;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($value)
    {
        $this->date = $value;
    }

    public function getTotalSpent()
    {
        return $this->totalSpent;
    }

    public function setTotalSpent($value)
    {
        if (empty($value) || $value == 0) throw new Exception('Spent is required');
        if (!preg_match('/^\d+([.,]\d+)?$/', $value)) throw new Exception('Invalid email address');

        $this->totalSpent = htmlspecialchars($value);
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $validStatuses = ["pending", "done"];
        if (!in_array($status, $validStatuses)) {
            throw new \Exception("Statut invalide");
        }
        $this->status = $status;
    }

    public function getNbrUser()
    {
        return $this->nbrUser;
    }

    public function setNbrUser($value)
    {
        if (empty($value)) throw new Exception('Number of user is required');

        $this->totalSpent = 2;
    }


    public function getById($nbrUser)
    {
        $sql = "SELECT `user`.`name` FROM `user` INNER JOIN `spent` ON `user`.`id` = `spent`.`id_auteur` WHERE `spent`.`id_auteur` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $nbrUser, \PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result ?: null;
    }
    /** Récupère l'id de l'evenement et filtre les depenses qui ont l'id_event */
    public function getByEventId($value)
    {
        $sql = "SELECT * FROM `spent` WHERE `id_event` = :id_event ORDER BY `date` DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id_event", $value, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    /**creation d'une nouvelle depense */
    public function createSpent($value)
    {
        $queryExecute = $this->db->prepare("INSERT INTO `spent` (`name_spent`,`spent`,`id_auteur`,`id_event`)

    		VALUES (:name,:spent,1,:id_event)");

        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryExecute->bindValue(':spent', $this->totalSpent, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_event', $value, PDO::PARAM_INT);

        return $queryExecute->execute();
    }


    // public function getAllSpent(): array
    // {
    //     $sql = "SELECT * FROM `spent` ORDER BY `date` DESC";
    //     $stmt = $this->db->query($sql);
    //     return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    // }
}
