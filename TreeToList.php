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

    /**
     * Undocumented variable
     *
     * @var array
     */
    private $list = [];

    /**
     * Undocumented function
     *
     * @return array
     */
    public function getList() : array {
        return $this->list;
    }

    public function createList($tree){

        $root = $tree->getRoot();
        $this->recursive($root);
    }


    private function recursive($node){
        if($node->isVisited()){
            return;
        }
        $this->list[] = $node->getState();
        $children = $node->getChildren();
        $node->setVisited(true);
        foreach($node->getChildren() as $child){
            $this->recursive($child);
        }

    }
    public function print(){
        foreach($this->getList() as $element){
            $element->print();
        }
    }

}