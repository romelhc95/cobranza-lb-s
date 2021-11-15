<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['document', 'document_number', 'first_name', 'second_name','last_name', 'second_last_name', 'phone', 'address'
        , 'sector_id', 'is_admin', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    // notice that here the attribute name is in snake_case
    protected $appends = ['full_name'];

    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = ['full_name'];

    /**
     * Get the sector that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    /**
     * Get the loan that owns the Loan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loan()
    {
        return $this->hasMany(Loan::class);
    }

    //public function loan()
    //{
    //    return $this->belongsTo(Loan::class);
    //}

    public function payment()
    {
        return $this->hasMany(Payment::class, 'user_id');
    }

    public function getUsername()
    {
        $firstLetter = substr($this->second_last_name, 0, 1);
        return "{$this->first_name} {$this->last_name} {$firstLetter}";
    }

    public function getDocumentNumberuserAttribute()
    {
        return $this->document." ".$this->document_number;
    }

    public function getFullNameAttribute()
    {
        return $this->first_name." ".$this->second_name." ".$this->last_name." ".$this->second_last_name;
    }
}
