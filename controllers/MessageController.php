<?php

namespace Controllers;

use Repositories\MessageRepository;
use Repositories\RoomRepository;    

class MessagesController{
    
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
}