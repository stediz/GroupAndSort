<?php

require_once ('Tree.php');
require_once ('State.php');


class TreeToList {

    /**
     * Undocumented variable
     *
     * @var Tree
     */
    private $tree;

    private $list = [];

    public function createList($tree){

        $root = $tree->getRoot();
        $this->recursive($root);
    }


    private function recursive($node){
        if($node->isVisited()){
            return;
        }
        $this->list[] = $node->getName();
        $children = $node->getChildren();
        $node->setVisited(true);
        foreach($node->getChildren() as $child){
            $this->recursive($child);
        }

    }

}