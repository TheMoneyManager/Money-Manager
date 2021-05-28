<?php

namespace App\Http\Controllers;

use App\User;
use App\Account;
use App\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
        $currency = Currency::where('currency', $arr['currency_id'])->first();
        $account->currency_id = $currency->id;
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

    // public function conversion(Request $request)
    // {
    //     $arr = $request->input();
    //     $source_currency = $arr['source_currency'];
    //     $destination_currency = $arr['destination_currency'];
    //     $amount = $arr['amount'];

    //     $url = 'https://currency-converter5.p.rapidapi.com/currency/convert';

    //     $response = Http::withHeaders([
    //         'x-rapidapi-key' => env('CURRENCY_API_KEY'),
    //         'x-rapidapi-host' => 'currency-converter5.p.rapidapi.com'
    //     ])->get($url, [
    //         'format' => 'json',
    //         'from' => $source_currency,
    //         'to' => $destination_currency,
    //         'amount' => $amount
    //     ])->json();

    //     return $response;

    // }

    public function conversion(Request $request)
    {
        $data = $request->input();
        $source_currency = $data['source_currency'];
        $destination_currency = $data['destination_currency'];
        $amount = $data['amount'];

        $url = 'http://data.fixer.io/api/latest';
        $symbols = $source_currency.','.$destination_currency;

        $response = Http::get($url, [
            'access_key' => env('CURRENCY_API_KEY'),
            'symbols' => $symbols
        ])->json();

        // Api sólo maneja euros
        // 1 - convertir moneda de origen a euros
        $amount /= $response['rates'][$source_currency];
        // 2 - convertir de euros a moneda de destino
        $amount *= $response['rates'][$destination_currency];

        return ['amount' => number_format($amount, 2)];
    }
}
