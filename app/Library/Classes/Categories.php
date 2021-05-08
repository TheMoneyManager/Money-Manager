<?php
namespace App\Library\Classes;

class Categories{
    /**
     * The user_id of the category
     *
     *
     * @var int
     */
    private $user_id;
    /**
     * The name of the category
     *
     * @var string
     */
    private $name;

    function __construct($user_id, $name){
        $this->user_id = $user_id;
        $this->name = $name;
    }

    /**
    * Returns the user id of the category
    *
    * @return int
    */

    public function getUserId(){
        return $this->user_id;
    }

    /**
    * Returns the name of the category
    *
    * @return string
    */

    public function getName(){
        return $this->name;
    }
}
