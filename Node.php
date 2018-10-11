<?php
require_once ('State.php');

    class Node {

    private $name;

    /**
     * Undocumented variable
     *
     * @var State
     */
    private $state;

    /**
     * holds the children
     *
     * @var array
     */
    private $children = [];

    /**
     * to avoid infinite loops in traversing algos
     *
     * @var bool;
     */
    private $visited = false;

    public function setVisited($visited){
        $this->visited = $visited;
    }
    public function isVisited(): bool{
        return $this->visited;
    }
    /**
     * Get the value of state
     */ 
     public function getState()
    {
            return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {
            $this->state = $state;

            return $this;
    }
    /**
     * Get the value of name
     */ 
     public function getName()
    {
            return $this->getState()->getName();
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
            $this->getState()->setName($name);

            return $this;
    }

    /**
     * Get the value of children
     */ 
    public function getChildren()
    {
            return $this->children;
    }

    /**
     * Create Node and give him a name
     *
     * @param [type] $name
     */
    public function __construct($name){
        $this->name = $name;
        $this->setState(new State($name));
        $this->getState()->findMessages();
    }

    /**
     * Todo check if node already exists?
    */ 
    public function addChild($child){

        if(! $child instanceof Node) {
            return null;
        }
        $this->children[] = $child;
        return $child;
    }

    public function hasChildren(){
        return (count($this->children) > 0);
    }

    /**
     * check if node has a specific child
     *
     * @param string $name
     * @return boolean
     */
    public function hasChild($name){
        foreach($this->children as $child)
        if($name === $child->getName())
            return true;
        return false;
    }

    /**
     * Undocumented function
     *
     * @param string $name
     * @return Node
     */
    public function findChild($name){
        if(!$this->hasChildren()){
            return null;
        }
        foreach($this->children as $child){
            if($child->getName() === $name){
                return $child;
            }
            if(null !== ($result = $child->findChild($name)))
                return $result;
        }
        return null;
    }

}
