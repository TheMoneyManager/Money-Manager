<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount', 'description', 'user_id', 'account_id',
    ];

    /**
     * One to many relationship, belongs to
     */

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function account() {
        return $this->belongsTo(Account::class);
    }
}
