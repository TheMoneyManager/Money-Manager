<?php
namespace App\Library\Classes;

class Expense{
    /**
     * The amount of the expense
     *
     *
     * @var float
     */
    private $amount;
    /**
     * The description of the expense
     *
     * @var string
     */
    private $description;

    /**
     * The user_id of the expense
     *
     * @var int
     */
    private $user_id;

    /**
     * The account_id of the expense
     *
     * @var int
     */
    private $account_id;

    function __construct($amount, $description, $user_id, $account_id){
        $this->amount = $amount;
        $this->description = $description;
        $this->user_id = $user_id;
        $this->account_id = $account_id;
    }

     /**
    * Returns the amount of the expense
    *
    * @return float
    */

    public function getAmount(){
        return $this->amount;
    }

    /**
    * Returns the description of the expense
    *
    * @return string
    */

    public function getDescription(){
        return $this->description;
    }

    /**
    * Returns the user_id of the expense
    *
    * @return string
    */
    public function getUserId(){
        return $this->user_id;
    }

    /**
    * Returns the account_id of the expense
    *
    * @return string
    */
    public function getAccountId(){
        return $this->account_id;
    }
}
