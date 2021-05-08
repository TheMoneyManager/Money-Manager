<?php
namespace App\Library\Classes;

class Account{
/**
     * The name of the account
     *
     *
     * @var string
     */
    private $name;
    /**
     * The description of the expense
     *
     * @var string
     */
    private $description;

    /**
     * The balance of the account
     *
     * @var float
     */
    private $balance;

    /**
     * The card_termination of the account
     *
     * @var int
     */
    private $card_termination;

    /**
     * The currency_id of the account
     *
     * @var int
     */
    private $currency_id;

    function __construct($name, $description, $balance, $card_termination, $currency_id){
        $this->name = $name;
        $this->description = $description;
        $this->balance = $balance;
        $this->card_termination = $card_termination;
        $this->currency_id = $currency_id;
    }

    /**
    * Returns the name of the account
    *
    * @return string
    */

    public function getName(){
        return $this->name;
    }

    /**
    * Returns the description of the account
    *
    * @return string
    */

    public function getDescription(){
        return $this->description;
    }

    /**
    * Returns the balance of the expense
    *
    * @return float
    */
    public function getBalance(){
        return $this->balance;
    }

    /**
    * Returns the account_id of the expense
    *
    * @return int
    */
    public function getCardTermination(){
        return $this->card_termination;
    }

    /**
    * Returns the account_id of the expense
    *
    * @return int
    */
    public function getCurrencyId(){
        return $this->currency_id;
    }
}
