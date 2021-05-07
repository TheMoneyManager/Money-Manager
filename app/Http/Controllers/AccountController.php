<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Currency;
use App\User;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $accounts = User::find($user_id)->accounts;

        return view('account.index', ['accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currencies = Currency::all();

        return view('account.create', ['currencies' => $currencies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr = $request->input();
        $account = new Account();
        $account->user_id = Auth::user()->id;
        $account->name = $arr['name'];
        $account->description = $arr['description'];
        $account->balance = $arr['balance'];
        $account->card_termination = $arr['card_termination'];
        $account->currency_id = $arr['currency_id'];
        $account->save();

        return redirect()->route('account.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        // $users = $account->users()->orderBy('user_id');
        // ddd($account);
        // return redirect()->route('user-account.index', ['account' => $account, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        $currencies = Currency::all();

        return view('account.edit', [
            'account' => $account,
            'currencies' => $currencies
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $arr = $request->input();
        $account->name = $arr['name'];
        $account->description = $arr['description'];
        $account->balance = $arr['balance'];
        $account->card_termination = $arr['card_termination'];
        $account->currency_id = $arr['currency_id'];
        $account->save();

        return redirect()->route('account.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('account.index');
    }
}
