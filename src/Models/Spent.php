<?php

namespace Models;

use Exception;
use PDO;

class Spent extends Database
{
    private $idSpent;
    // name_spent
    private $name;
    private $picture;
    private $date;
    // spent
    private $totalSpent;
    private $idEvent;
    private $nbrUser;


    public function getSpentName()
    {
        return $this->name;
    }

    public function setSpentName($value)
    {
        if (empty($value)) throw new Exception('Name of the spent is required');
        if (strlen($value) < 2 && strlen($value) > 255) throw new Exception('The name of the spent must be between 2 and 255 characters');

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
        if (empty($value)) throw new Exception('Spent is required');
        if (!preg_match('/^\d+([.,]\d+)?$/', $value)) throw new Exception('Invalid email address');

        $this->totalSpent = htmlspecialchars($value);
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

    public function createSpent()
    {
        $queryExecute = $this->db->prepare("INSERT INTO `spent` (`name_spent`,`spent`,`id_auteur`,`id_event`)
        
			VALUES (:name,:spent,1,1)");

        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryExecute->bindValue(':spent', $this->totalSpent, PDO::PARAM_STR);
        // $queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR);

        return $queryExecute->execute();
    }
    public function getAllSpent(): array
    {
        $sql = "SELECT * FROM `spent` ORDER BY `date` DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
