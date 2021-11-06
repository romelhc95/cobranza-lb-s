<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{

    protected $fillable = [
        'loan', 'monetary_interest', 'amount', 'user_id'
    ];
    /**
     * Get all of the user for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //public function user()
    //{
    //    return $this->hasMany(User::class);
    //}
}
