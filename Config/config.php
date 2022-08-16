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
                    'text' => 'Add Category',
                    'route' => 'admin.categories.create',
                    'can' => 'category-create',
                    'order' => 131
                ],
                [
                    'text' => 'Category List',
                    'route' => 'admin.categories.index',
                    'can' => 'category-read',
                    'order' => 132
                ],
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
