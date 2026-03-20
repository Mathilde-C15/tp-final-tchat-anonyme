<?php

namespace Controller;

use Repositories\RoomRepository;

class RoomController{
    public function room(){
        $repository = new RoomRepository();

        
        $view = "views/room/room.phtml";

        require "views/layout.phtml";
    }
}