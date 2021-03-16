<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;

class DashboardController extends Controller
{

    public function index()
    {
        $expenses = Expense::orderBy('updated_at', 'desc')->paginate(2);
        //dd($expenses);
        return view('dashboard.index', ['expenses' => $expenses]);
        //return view('dashboard.index', compact('expenses');
    }
}
