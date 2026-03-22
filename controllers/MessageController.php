<?php

namespace Controllers;

use Repositories\MessageRepository;
use Repositories\RoomRepository;    

class MessageController{
    
    public function showByRoom(): void{
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            echo "Room invalide";
            return;
        }

        $roomId = (int) $_GET['id'];

        $roomRepository = new RoomRepository();
        $rooms = $roomRepository->findRooms();

        $repository = new MessageRepository();
        $messages = $repository->getMessagesByRoom($roomId);

        $view = "views/message/message.phtml";
        require "views/layout.phtml";
    }

    public function showMessages(): void
    {
        $roomRepository = new RoomRepository();
        $messageRepository = new MessageRepository();

        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            echo "Room invalide";
            return;
        }

        $id = (int) $_GET['id'];

        $room = $roomRepository->findOneRoomById($id);

        if (!$room) {
            echo "Salon introuvable";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $content = trim($_POST['content'] ?? '');

            if ($content !== '') {
                $messageRepository->createMessage($content, $id);
                header('Location: index.php?page=message&id=' . $id);
                exit;
            }
        }

        $rooms = $roomRepository->findRooms();
        $messages = $messageRepository->getMessagesByRoom($id);
        $pinnedMessage = $messageRepository->getPinnedMessageByRoom($id);

        $view = __DIR__ . '/../views/message/message.phtml';
        require __DIR__ . '/../views/layout.phtml';
    }

    public function pinMessage(): void
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            echo "Message introuvable";
            return;
        }

        if (!isset($_GET['room_id']) || !is_numeric($_GET['room_id'])) {
            echo "Room invalide";
            return;
        }

        $messageId = (int) $_GET['id'];
        $roomId = (int) $_GET['room_id'];

        $messageRepository = new MessageRepository();

        $messageRepository->unpinAllMessagesByRoom($roomId);
        $messageRepository->pinMessage($messageId);

        header("Location: index.php?page=message&id=" . $roomId);
        exit;
    }

    public function unpinMessage(): void
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            echo "Message introuvable";
            return;
        }

        if (!isset($_GET['room_id']) || !is_numeric($_GET['room_id'])) {
            echo "Room invalide";
            return;
        }

        $messageId = (int) $_GET['id'];
        $roomId = (int) $_GET['room_id'];

        $messageRepository = new MessageRepository();
        $messageRepository->unpinMessage($messageId);

        header("Location: index.php?page=message&id=" . $roomId);
        exit;
    }
}