<?php

    $node = new Node('start');
    if($node->hasChild() !== false )
        echo 'failure';
    $node->addChild(new Node('secoden'));

    if($node->hasChild() === false )
        echo 'failure';

        
