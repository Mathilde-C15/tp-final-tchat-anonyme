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
        $stmt = $this->pdo->prepare("SELECT * FROM message WHERE id_room = :id_room ORDER BY date");
        $stmt->execute(['id_room' => $roomId]);

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $messages = [];

        foreach ($rows as $row) {
            $message = new Message(
                (int) $row['id'],
                $row['content'],
                $row['date'],
                $row['pinned'],
                (int) $row['id_room']
            );

            $messages[] = $message;
        }

        return $messages;
    }

    public function createMessage(string $content, int $roomId): void{
        $stmt = $this->pdo->prepare("INSERT INTO message (content, date, id_room) VALUES (:content, NOW(), :id_room)
        ");

        $stmt->execute([
            'content' => $content,
            'id_room' => $roomId
        ]);
    }

    public function pinMessage(int $messageId): void {
        $stmt = $this->pdo->prepare("UPDATE message SET pinned = 1 WHERE id = :id");
        $stmt->execute(['id' => $messageId]);
    }

    public function unpinMessage(int $messageId): void {
        $stmt = $this->pdo->prepare("UPDATE message SET pinned = 0 WHERE id = :id");
        $stmt->execute(['id' => $messageId]);
    }

    public function getPinnedMessages(): array {
        $stmt = $this->pdo->prepare("SELECT * FROM message WHERE pinned = 1 ORDER BY date DESC");
        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $messages = [];

        foreach ($rows as $row) {
            $message = new Message(
                (int) $row['id'],
                $row['content'],
                $row['date'],
                $row['pinned'],
                (int) $row['id_room']
            );

            $messages[] = $message;
        }

        return $messages;
    }

    public function getPinnedMessageByRoom(int $roomId): ?Message {
        $stmt = $this->pdo->prepare("SELECT * FROM message WHERE id_room = :id_room AND pinned = 1 ORDER BY date DESC LIMIT 1");
        
        $stmt->execute(['id_room' => $roomId]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Message(
            (int) $row['id'],
            $row['content'],
            $row['date'],
            $row['pinned'],
            (int) $row['id_room']
        );
    }

    public function unpinAllMessagesByRoom(int $roomId): void {
        $stmt = $this->pdo->prepare("UPDATE message SET pinned = 0 WHERE id_room = :id_room");
        $stmt->execute(['id_room' => $roomId]);
    }
}