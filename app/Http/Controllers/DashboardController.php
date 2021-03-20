<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        //$expenses = Expense::orderBy('updated_at', 'desc')->paginate(2);
        $user_id = Auth::user()->id;
        $expenses = Expense::join('users', 'users.id', "=", "expenses.user_id")
                    ->join('accounts', 'accounts.id', "=", "expenses.account_id")
                    ->join('category_expense', 'category_expense.expense_id', '=', "expenses.id")
                    ->join('categories', 'categories.id', '=', 'category_expense.category_id')
                    ->where('users.id', $user_id)
                    ->get([
                            'expenses.created_at as date',
                            'expenses.account_id as account',
                            'categories.name as category',
                            'expenses.amount as amount',
                            'expenses.description as description',
                         ]);
        //dd($expenses);
        return view('dashboard.index', ['expenses' => $expenses]);
    }
}
