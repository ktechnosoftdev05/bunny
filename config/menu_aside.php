<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'public/media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'admin/dashboard',
            'new-tab' => false,
        ],

        [
            'title' => 'Admins',
            'icon' => 'public/media/svg/icons/General/User.svg',
            'page' => 'admin/list',
            'bullet' => 'line',
            'root' => true,
        ],
        [
            'title' => 'Users',
            'icon' => 'public/media/svg/icons/Communication/Group.svg',
            'bullet' => 'dot',
            'root' => true,
        ],

        [
            'title' => 'Chart',
            'desc' => '',
            'icon' => 'public/media/svg/icons/Shopping/Chart-bar2.svg',
            'bullet' => 'dot',
            'root' => true,
        ],
        [
            'title' => 'Videos',
            'desc' => '',
            'icon' => 'public/media/svg/icons/Devices/Video-camera.svg',
            'bullet' => 'dot',
            'root' => true,
        ],
        [
            'title' => 'Categories',
            'icon' => 'public/media/svg/icons/General/Settings-1.svg',
            'bullet' => 'dot',
            'root' => true,
        ],
        [
            'title' => 'Effects',
            'root' => true,
            'icon' => 'public/media/svg/icons/Home/Library.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ],

        [
            'title' => 'Audios',
            'icon' => 'public/media/svg/icons/Files/Media-folder.svg',
            'root' => true,
            'bullet' => 'dot',
        ],
        [
            'title' => 'Reports',
            'desc' => '',
            'icon' => 'public/media/svg/icons/Communication/Adress-book2.svg',
            'bullet' => 'dot',
            'root' => true,
        ],
        [
            'title' => 'Chat Reports',
            'desc' => '',
            'icon' => 'public/media/svg/icons/Communication/Chat1.svg',
            'bullet' => 'dot',
            'root' => true,
        ],

    ]

];
