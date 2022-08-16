<?php

return [
    'name' => 'Medicine',
    'menus' => [
        [
            'text' => 'Medicine',
            'icon' => 'fas fa-pills',
            'can' => 'medicines-read',
            'order' => 12,
            'submenu' => [
                [
                    'text' => 'Add Medicine',
                    'route' => 'admin.medicines.create',
                    'can' => 'medicines-create',
                    'order' => 130
                ],
                [
                    'text' => 'Medicine List',
                    'route' => 'admin.medicines.index',
                    'can' => 'medicines-read',
                    'order' => 130
                ],
            ]
        ]
    ]
];
