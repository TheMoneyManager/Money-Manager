<?php

namespace Tests\Unit;
namespace App\Library\Classes\Account;

use App\Library\Classes\Account;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_account()
    {
        $account = new Account("Nomina", "Cuenta Mensual", 67.980, 4565, 1);
        $this->assertTrue($account->getName() == "Nomina" && $account->getDescription() == "Cuenta Mensual" &&
        $account->getBalance() == 67.980 && $account->getCardTermination() == 4565 && $account->getCurrencyId() == 1);
    }
}
