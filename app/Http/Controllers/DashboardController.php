<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{

    public function index()
    {
        //$expenses = Expense::orderBy('updated_at', 'desc')->paginate(2);
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $expenses = $user->expenses()->orderBy('created_at', 'desc')->limit(7)->get();
        $accounts = $user->accounts()->orderBy('name')->get();
        //$expenses_count =  $user->expenses()->orderBy('created_at', 'desc')->get();

        $expenses_aux = $user->expenses()->get();
        $expenses_amount = array();
        foreach($expenses_aux as $expense) {
            $created = $expense->created_at->format('d-m-Y');

            if(!array_key_exists($created, $expenses_amount)) {
                $expenses_amount[$created] = 0;
            }
            $expenses_amount[$created] += $expense['amount'];
        }


        $expenses_count = $user->expenses()
                   ->select('id')
                   ->whereDate('created_at', '>', Carbon::now()->subDays(30))->get();

        return view('dashboard.index', ['expenses_amount' => $expenses_amount, 'expenses' => $expenses, 'accounts' => $accounts, 'expenses_count' => count($expenses_count)]);
    }
}
