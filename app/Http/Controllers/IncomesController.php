<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Income;
use App\User;
use App\Account;
use Illuminate\Support\Facades\Auth;

class IncomesController extends Controller
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
        $incomes = $user->incomes()->orderBy('created_at', 'desc')->get();

        return view('incomes.index', ['incomes' => $incomes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user_id = Auth::user()->id;
        $accounts = User::find($user_id)->accounts;
        $shared_accounts = User::find($user_id)->sharedAccounts()->where('role', 'admin')->get();

        return view('incomes.create', ['accounts' => $accounts, 'shared_accounts' => $shared_accounts]);
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
        $income = Income::create($all);

        $account_id = $all['account_id'];
        $account = Account::find($account_id);
        $balance = $account->balance + $income->amount;
        $account->update(['balance' => $balance]);
        return redirect()->route('incomes.index');
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
