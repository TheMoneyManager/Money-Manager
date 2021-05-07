<?php

namespace App;

use App\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency',
        'currency_name',
    ];

    public function accounts()
    {
        $this->hasMany(Account::class);
    }
}
