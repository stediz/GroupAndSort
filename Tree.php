<?php

require_once ('Node.php');

class Tree
{
    /**
     * The root of the tree
     *
     * @var Node
     */
     private $root;

     /**
      * The parent node
      *
      * @var Node
      */
     private $parent;

     /**
      * Get the value of parent
      */ 
      public function getParent()
      {
        return $this->parent;
      }

      /**
       * Set the value of root
       *
       * @return  Node
       */ 
      public function setParent($parent)
      {
        $this->parent = $parent;

        return $parent;
      }

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
      * @param [type] $nodes
      * @return void
      */
    function createTree($names){
        if(!is_array($names)){  
            return false;
        }
        // first levels of array
        foreach($names as $name => $namesSecondLevel){
            $this->setParent($this->getRoot());
            $node = $this->insert($name);

            if($this->getParent() === null){
                $this->setRoot($node);
            }


            $this->setParent($node);
            // second level of array
            foreach($namesSecondLevel as $nameSecondLevel){ 
                $node = $this->insert($nameSecondLevel);
            }        
        }
        return true;
    }

    /**
     * Inserts the Name into the tree
     *
     * @param [type] $name
     * @return void
     */
    private function insert($name){
        $found = $this->findNode($name);
        if($found !== null) {
            if($this->getParent()->hasChild($name))
                $node = $found;
            else
                $node = $this->addNode($this->getParent(), $found);
        }
        else {
            $node = $this->createNode($this->getParent(), $name);
        }
    return $node;
    }

    private function createNode($parent, $name){
        
        $node = new Node($name);
        // is it the new root?
        if(null === $parent){
            return $node;
        }
        return $parent->addChild($node);
    }

    private function addNode($parent, $node){
        return $parent->addChild($node);
    }

    /**
     * Undocumented function
     *
     * @param String $name
     * @return void
     */
    private function findNode($name){
        
        $return = null;
        if(empty($this->getRoot()))
            return $return;
        $return = $this->getRoot()->findChild($name);

        return $return;
    }

}
