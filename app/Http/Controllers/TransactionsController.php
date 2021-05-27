<?php

namespace App\Http\Controllers;

use App\Account;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
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

        $transactions = $user->transactions()->orderBy('created_at', 'desc')->get();

        $accounts = [];
        foreach ($transactions as $key) {
            // -> as it return std object
            $accounts[$key->id] = Account::find($key->id_CuentaOrigen);
        }

        return view('transaction.index', ['transactions' => $transactions, 'accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user_id = auth()->user()->id;
        $id_account_origin = $all['origin'];
        $id_account_destination = $all['destination'];
        $email_user_destination = $all["email_destination"];
        $amount = $all['amount'];

        $account_origin = Account::find($id_account_origin);
        $balance = $account_origin->balance - $amount;
        $account_origin->update(['balance' => $balance]);

        $account_destination = Account::find($id_account_destination);
        $newBalance = $account_destination->balance + $amount;
        $account_destination->update(['balance' => $newBalance]);

        $transaction = new Transaction();
        $transaction->user_id = $user_id;
        $transaction->id_CuentaOrigen = $id_account_origin;
        $transaction->id_CuentaDestino = $id_account_destination;
        $transaction->addresee = $email_user_destination;
        $transaction->amount = $amount;
        $transaction->save();

        return ['message' => 'transaccion exitosa'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = Account::find($id);

        return view('transaction.edit', ['account' => $account]);
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

    public function destination(Request $request){
        $all = $request->all();
        $email = $all['email_user'];
        $user = User::where('email', $email)->first();
        if($user != null){
            $accounts = User::find($user->id)->accounts;
            return response()->json($accounts);
        }
        return ['message' => 'usuario no encontrado'];
    }
}
