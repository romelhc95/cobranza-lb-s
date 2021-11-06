<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment', 'new_payment', 'loan_status', 'payment_status', 'loan_id', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
