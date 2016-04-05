<?php
return [
    'title' => 'Товари',
    'single' => 'ware',
    'model' => 'Ware',
    'columns' => [
        'id',
        'title',
        'article',
        'thumbnail' => array(
            'title' => 'Головне зображення',
            'type' => 'image',
            'location' => public_path() . '/uploads/products/originals/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
                array(65, 57, 'crop', public_path() . '/uploads/products/thumbs/small/', 100),
                array(220, 138, 'landscape', public_path() . '/uploads/products/thumbs/medium/', 100),
                array(383, 276, 'fit', public_path() . '/uploads/products/thumbs/full/', 100)
            )
        )
    ],
    'filters' => [
        'id',
        'title',
        'article',
        'category'
    ],
    'edit_fields' => [
        'title',
        'article',
        'slug' => [
            'title' => 'Посилання',
        ],
        'thumbnail' => [
            'title' => 'Головне зображення',
            'type' => 'image',
            'location' => public_path() . '/uploads/originals/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
                array(65, 57, 'crop', public_path() . '/uploads/thumbs/small/', 100),
                array(220, 138, 'landscape', public_path() . '/uploads/thumbs/medium/', 100),
                array(383, 276, 'fit', public_path() . '/uploads/thumbs/full/', 100)
            )
        ],
        'price' => [
            'type' => 'number',
            'title' => 'Ціна',
            'symbol' => '₴',
            'decimal' => '2'
        ],
        'discount' => [
            'type' => 'number',
            'title' => 'Знижка',
            'symbol' => '₴',
            'decimal' => '2'
        ],
        'description' => [
            'type' => 'wysiwyg',
            'title' => 'Опис',
        ],
        'category' => [
            'type' => 'relationship',
            'title' => 'Категорія',
            'name_field' => 'title'
        ]
    ],
    'action_permissions' => [
        
    ]
];