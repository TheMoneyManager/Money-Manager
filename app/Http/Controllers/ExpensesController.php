<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Expense;
use App\User;
use Illuminate\Support\Facades\Auth;

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
        $expenses = Expense::join('users', 'users.id', "=", "expenses.user_id")
                    ->join('accounts', 'accounts.id', "=", "expenses.account_id")
                    ->join('category_expense', 'category_expense.expense_id', '=', "expenses.id")
                    ->join('categories', 'categories.id', '=', 'category_expense.category_id')
                    ->where('users.id', $user_id)
                    ->get([
                            'expenses.created_at as date',
                            'expenses.account_id as account',
                            'categories.name as categorie',
                            'expenses.amount as amount',
                            'expenses.description as description',
                         ]);
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
