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

    // retourne toutes les rooms
    public function findRooms(){
        $stmt = $this->pdo->query("SELECT * FROM room ORDER BY name DESC");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $rooms = [];

        foreach ($rows as $row) {
            $room = new Post();
            $room->setId($row['id']);
            $room->setName($row['name']);
            
            $room[] = $room;
        }

        return $room;
    }

    // retourne une seule room
    public function findOneRoomById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM room WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null; // room non trouvé
        }

        $room = new Room();
        $room->setId($row['id']);
        $room->setName($row['name']);

        return $room;
    }

}