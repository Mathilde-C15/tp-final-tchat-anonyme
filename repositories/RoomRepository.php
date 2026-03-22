<?php

namespace Repositories;

use Services\DataBase;
use Models\Room;
use PDO;

class RoomRepository{
    private PDO $pdo;

    public function __construct(){
        $db = new DataBase();
        $this->pdo = $db->getConnection();
    }

    // Créer une room
    public function createRoom(string $name){
        $stmt = $this->pdo->prepare("INSERT INTO `room` (name) VALUES (:name)");
        $stmt->execute(['name' => $name]);

        $room = new Room();
        $room->setId((int) $this->pdo->lastInsertId());
        $room->setName($name);

        return $room;
    }

    // retourne toutes les rooms
    public function findRooms(){
        $stmt = $this->pdo->query("SELECT * FROM room ORDER BY name");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $rooms = [];

        foreach ($rows as $row) {
            $room = new Room();
            $room->setId($row['id']);
            $room->setName($row['name']);
            
            $rooms[] = $room;
        }

        return $rooms;
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