<?php

namespace App;

use App\Currency;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'balance',
        'card_termination',
        'currency_id',
    ];

    /**
     * One to many relationship
     */

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function users(){
        return $this->belongsToMany(User::class, 'account_user')->withPivot('role');
    }

    /**
     * One to many relationship, belongs to
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
