<?php

const AVAILABLE_ROUTES = [
    '/' => [
        'controller' => 'RoomController',
        'method' => 'index'
    ],
    'room' => [
        'controller' => 'RoomController',
        'method' => 'index'
    ],
    'about' => [
        'controller' => 'AboutController',
        'method' => 'about'
    ],
    'add_room' => [
        'controller' => 'RoomController',
        'method' => 'create'
    ],
    'pin_message' => [
        'controller' => 'MessageController',
        'method' => 'pinMessage'
    ],
    'add_message' => [
        'controller' => 'MessageController',
        'method' => 'create'
    ],
    'message' => [
        'controller' => 'RoomController',
        'method' => 'showMessages',
    ]

];