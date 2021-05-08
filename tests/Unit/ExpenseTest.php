<?php

namespace Tests\Unit;
namespace App\Library\Classes\Expense;

use App\Library\Classes\Expense;
use PHPUnit\Framework\TestCase;

class ExpenseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_expense()
    {
        $expense = new Expense(7.908, "Expense Example", 1, 2);
        $this->assertTrue($expense->getAmount() == 7.908 && $expense->getDescription() == "Expense Example" &&
        $expense->getUserId() == 1 && $expense->getAccountId() == 2);
    }
}
