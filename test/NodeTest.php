<?php
    require_once (__DIR__ . '/../Node.php');
    $node = new Node('start');

    if($node->hasChildren() !== false )
        echo 'failure';
    $node->addChild(new Node('second'));
    if($node->hasChildren() === false )
        echo 'failure';
    $node->addChild(new Node('third'));
    if($node->hasChildren() === false )
        echo 'failure';

    $node->addChild(new Node('five'));
    if($node->hasChildren() === false )
        echo 'failure';
        
    if(null !== ($found1 = $node->findChild('six'))){
        echo 'failure hasChild six';
    }

    if(null === ($found1 = $node->findChild('five'))){
        echo 'failure hasChild five';
    }

    if(null === ($found1 = $node->findChild('second'))){
        echo 'failure hasChild second';
    }
    $found1->addChild(new Node('second first'));
    
    if(null === ($found2 = $node->findChild('second first'))){
        echo 'failure hasChild second';
    }

    $found2->addChild(new Node('second first first'));
    
    if(null === ($found3 = $node->findChild('second first first'))){
        echo 'failure hasChild second first first';
    }
    $found1->addChild($found3);

    $found3->addChild(new Node('four'));
    if(null === ($found3 = $node->findChild('four'))){
        echo 'failure hasChild four';
    }
    exit();
    

    



