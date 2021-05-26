<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class Dashboard_saController extends Controller
{

    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        return view('dashboard_sa.index', []);
    }
}
