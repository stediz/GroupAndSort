<?php
    class Node {

    private $name;
    /**
     * holds the children
     *
     * @var array
     */
    private $children = [];

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
