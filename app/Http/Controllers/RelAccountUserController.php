<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\AccountUser;
use App\User;
use Illuminate\Support\Facades\Auth;

class RelAccountUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $accounts = $user->sharedAccounts()->orderBy('account_id')->get();

        return view('account-share.index', ['accounts' => $accounts]);
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
        $requestEmail = $all['email'];
        $account_id = $all['id_account'];
        $role = $all['role'];
        $user = User::where('email', $requestEmail)->first();

        if($user != null){
            $account = Account::find($account_id);
            $account->users()->attach($user, ['role' => $role]);
        }

        $response = [];
        $response['id'] = $user->id;
        $response['email'] = $requestEmail;
        $response['role'] = $role;

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Account::find($id);
        $users = $account->users()->orderBy('user_id')->get();

        return view('account-share.edit', ['account' => $account, 'users' => $users]);
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
    public function destroy(Request $request)
    {
        $all = $request->all();
        $user_id = $all['id'];
        $account_id = $all['account'];

        $account = Account::Find($account_id);
        if($account->user_id != $user_id){
            $account->users()->detach($user_id);
            return ['message' => 'borrado exitoso'];
        }else{
            return ['message' => 'borrado fallido'];
        }

    }
}
