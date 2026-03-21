<?php

namespace Repositories;

use PDO;

class MessageRepository {
    private PDO $pdo;

    public function __construct(){
        $db = new DataBase();
        $this->pdo = $db->getConnection();
    }
}