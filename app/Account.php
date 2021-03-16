<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'balance',
    ];

    /**
     * One to many relationship
     */

    public function expenses() {
        return $this->hasMany(Expense::class);
    }

    /**
     * One to many relationship, belongs to
     */

     public function user() {
         return $this->belongsTo(User::class);
     }
}