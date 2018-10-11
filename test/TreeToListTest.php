<?php
    require_once (__DIR__ . '/../TreeToList.php');

    $tree = new Tree();
    
    $tree->createTree(Config::$transitions);

    $treeToList = new TreeToList();
    $treeToList->createList($tree);
    $treeToList->print();
    exit();


