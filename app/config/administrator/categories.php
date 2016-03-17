<?php

return [
    'title' => 'Категорії',
    'single' => 'category',
    'model' => 'Category',
    'columns' => [
        'id',
        'title' => [
            'title' => 'Назва категорії'
        ],
        'slug' => [
            'title' => 'Унікальне посилання'
        ]
    ],
    'edit_fields' => [
        'title',
        'slug',
        'parent_id'
    ]
];