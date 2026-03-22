<?php

namespace Repositories;

use Services\DataBase;
use Models\Message;
use PDO;

class MessageRepository {
    private PDO $pdo;

    public function __construct(){
        $db = new DataBase();
        $this->pdo = $db->getConnection();
    }

    public function getMessagesByRoom(int $roomId): array {
        $stmt = $this->pdo->prepare("SELECT * FROM message WHERE id_room = :id_room ORDER BY date DESC");
        $stmt->execute(['id_room' => $roomId]);

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $messages = [];

        foreach ($rows as $row) {
            $message = new Message();
            $message->setId($row['id']);
            $message->setContent($row['content']);
            $message->setDate($row['date']);
            $message->setRoomId($row['id_room']);

            $messages[] = $message;
        }

        return $messages;
    }   
}