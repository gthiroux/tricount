<?php

namespace Models;

use Exception;
use PDO;

class Event extends Database
{
    private $idEvent;
    private $nameEvent;
    private $idAdmin;

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
    public function getById($value)
    {
        $sql = "SELECT * FROM `event`  WHERE `id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $value, \PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    public function info($value)
    {
        $sql = "SELECT * FROM `spent` INNER JOIN `event` ON `spent`.`id_event` = `event`.`id` WHERE `event`.`id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $value, \PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    public function getAllEvent()
    {
        $sql = "SELECT * FROM `event`";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
