<?php

require_once ('Node.php');

class Tree
{
    /**
     * Undocumented variable
     *
     * @var Node
     */

     private $root;

     /**
      * Get the value of root
      */ 
      public function getRoot()
      {
               return $this->root;
      }

      /**
       * Set the value of root
       *
       * @return  Node
       */ 
      public function setRoot($root)
      {
               $this->root = $root;

               return $root;
      }

      /**
      * Undocumented function
      *
      * @param [type] $parent
      * @param [type] $nodes
      * @return void
      */
    function createNodes($parent = null, $names){
        if(!is_array($names)){  
            return false;
        }
        // first levels of array
        foreach($names as $name => $namesSecondLevel){
            $parent = $this->getRoot();
            $found = $this->findNode($name);
            if($found !== null) {
                if($parent->hasChild($name))
                    $node = $found;
                else
                    $node = $this->addNode($parent,$found);
            }
            else {
                $node = $this->createNode($parent,$name);
            }
            if($parent === null){
                $this->setRoot($node);
            }
            $parent = $node;
            // second level of arrays
            foreach($namesSecondLevel as $nameSecondLevel){ 
                $found = $this->findNode($nameSecondLevel);
                if($found !== null) {
                    $node = $this->addNode($parent,$found);
                }
                else {
                    $node = $this->createNode($parent,$nameSecondLevel);
                }
            }        
        }
        return true;
    }

    function createNode($parent, $name){
        
        $node = new Node($name);
        // is it the new root?
        if(null === $parent){
            return $node;
        }
        return $parent->addChild($node);
    }

    function addNode($parent, $node){
        return $parent->addChild($node);
    }

    /**
     * Undocumented function
     *
     * @param String $name
     * @return void
     */
    public function findNode($name){
        
        $return = null;
        if(empty($this->getRoot()))
            return $return;
        $return = $this->getRoot()->findChild($name);

        return $return;
    }
}
