<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Expense;
use App\User;
use App\Account;
use Illuminate\Support\Facades\Auth;
use App\Events\NewExpenseNotification;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $expenses = $user->expenses()->orderBy('created_at', 'desc')->get();

        return view('expenses.index', ['expenses' => $expenses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user_id = Auth::user()->id;
        $categories = User::find($user_id)->categories;
        $accounts = User::find($user_id)->accounts;
        return view('expenses.create', ['accounts' => $accounts, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $all = $request->all();
        $categories = $all['categories'];
        $expense = Expense::create($all);
        foreach($categories as $category_id){
            $category = Category::find($category_id);
            $expense->categories()->attach($category);
        }
        $account_id = $all['account_id'];
        $account = Account::find($account_id);
        $users = $account->users()->orderBy('user_id')->get();

        event(new NewExpenseNotification($expense, $account, $users));

        return redirect()->route('expenses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
