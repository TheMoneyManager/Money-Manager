<?php
namespace App\Library\Classes;


class User{
    /**
     * The name of the user
     *
     *
     * @var string
     */
    private $name;
    /**
     * The email of the user
     *
     * @var string
     */
    private $email;

    /**
     * The password of the user
     *
     * @string
     */
    private $password;

    /**
     * The role of the user
     *
     * @var string
     */
    private $role;

    function __construct($name, $email, $password, $role){
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    /**
    * Returns the name of the user
    *
    * @return string
    */

    public function getName(){
        return $this->name;
    }

    /**
    * Returns the email of the user
    *
    * @return string
    */

    public function getEmail(){
        return $this->email;
    }

    /**
    * Returns the password of the user
    *
    * @return string
    */
    public function getPassword(){
        return $this->password;
    }

    /**
    * Returns the role of the user
    *
    * @return string
    */
    public function getRole(){
        return $this->role;
    }
}
