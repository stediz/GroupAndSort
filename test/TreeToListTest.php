<?php
    require_once (__DIR__ . '/../TreeToList.php');

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
    
    $tree->createTree($transitions);

    $treeToList = new TreeToList();
    $treeToList->createList($tree);
    exit();


