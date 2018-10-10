<?php
    require_once (__DIR__ . '/../Tree.php');

    $transitions = [
        'todo' => [
            'doing',
            'on hold'
        ],
        'doing' => [
            'done',
            'failed',
            'on hold'
        ],
        'on hold' => [
            'doing'
        ]
    ];

    $tree = new Tree();
    
    $return = $tree->createTree($transitions);
    exit();