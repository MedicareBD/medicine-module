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
                    'can' => 'categories-create',
                    'order' => 131,
                ],
                [
                    'text' => 'Category List',
                    'route' => 'admin.categories.index',
                    'can' => 'categories-read',
                    'order' => 132,
                ],
                [
                    'text' => 'Add Unit',
                    'route' => 'admin.units.create',
                    'can' => 'units-create',
                    'order' => 131,
                ],
                [
                    'text' => 'Unit List',
                    'route' => 'admin.units.index',
                    'can' => 'units-read',
                    'order' => 132,
                ],
                [
                    'text' => 'Add Type',
                    'route' => 'admin.types.create',
                    'can' => 'types-create',
                    'order' => 131,
                ],
                [
                    'text' => 'Type List',
                    'route' => 'admin.types.index',
                    'can' => 'types-read',
                    'order' => 132,
                ],
                [
                    'text' => 'Add Leaf',
                    'route' => 'admin.leafs.create',
                    'can' => 'leafs-create',
                    'order' => 131,
                ],
                [
                    'text' => 'Leaf List',
                    'route' => 'admin.leafs.index',
                    'can' => 'leafs-read',
                    'order' => 132,
                ],
                [
                    'text' => 'Add Medicine',
                    'route' => 'admin.medicines.create',
                    'can' => 'medicines-create',
                    'order' => 130,
                ],
                [
                    'text' => 'Medicine List',
                    'route' => 'admin.medicines.index',
                    'can' => 'medicines-read',
                    'order' => 130,
                ],
            ],
        ],
    ],
];
