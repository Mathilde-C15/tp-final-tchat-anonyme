<?php

namespace Repository;

use Services\DataBase;
use Model\Room;
use PDO;

class RoomRepository{
    private PDO $pdo;

    public function __construct(){
        $db = new DataBase();
        $this->db = $db->getConnection();
    }
}