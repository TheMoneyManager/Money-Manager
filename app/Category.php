<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id',
    ];

    /**
     * One to many relationship, belongs to
     */

    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Many to many relationship
     */

    public function expenses() {
        return $this->belongsToMany(Expense::class);
    }
}
