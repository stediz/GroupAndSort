<?php
    class Node {

    private $name;
    private $child = [];

    /**
     * Get the value of name
     */ 
    public function getName()
    {
            return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
            $this->name = $name;

            return $this;
    }

    /**
     * Get the value of child
     */ 
    public function getChild()
    {
            return $this->child;
    }

    public function __construct($name){
        $this->name = $name;
    }

    public function addChild($child){
        $this->child[] = $child;
    }

    public function hasChild(){
        return (count($this->child) > 0);
    }

}
