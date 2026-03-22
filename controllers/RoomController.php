<?php

namespace Controllers;

use Repositories\RoomRepository;
use Repositories\MessageRepository;

class RoomController{

    public function index(): void{
        $repository = new RoomRepository();
        $rooms = $repository->findRooms();

        $view = "views/room/room.phtml";

        require "views/layout.phtml";
    }

    public function create(): void {
        $repository = new RoomRepository();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');

            try {
                if ($name === '') {
                    throw new \Exception("Le nom du salon est obligatoire.");
                }

                $repository->createRoom($name);

                header('Location: index.php?page=room');
                exit;
            } catch (\Exception $e) {
                $error = $e->getMessage();
            }
        }

        $rooms = $repository->findRooms();
        $view = "views/room/createRoom.phtml";
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

        $view = __DIR__ . '/../views/message/message.phtml';

        require __DIR__ . '/../views/layout.phtml';
    }
}