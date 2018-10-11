<?php
require_once ('Config.php');

class State  {
    private $name;
    private $messages = [];

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

    private function getMessages(){
        return $this->messages;
    }
    public function addMessage($message){
        $this->messages[] = $message;
    }

    public function resetMessages(){
        unset($this->messages);
    }
    /**
     * Undocumented function
     *
     * @param string $name
     */
    public function __construct($name){
        $this->name = $name;
        return $this;
    }

    public function findMessages(){
        $this->resetMessages();
        while( ($text = array_search($this->name, Config::$states)) !== false){
            unset(Config::$states[$text]);
            $this->addMessage($text);
        }
    }

    public function print(){
        $this->printLn('+', $this->getName());
        foreach($this->getMessages() as $message){
            $this->printLn('-', $message);
        }
    }

    public function printLn($level, $value){
        echo $level . '  ' . $value . "\n";
    }
}