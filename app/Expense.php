<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount', 'description',
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

    /**
     * Many to many relationship
     */

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}
