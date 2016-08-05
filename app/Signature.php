<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone'
    ];

    /**
     * Get the petition that this signature is on.
     */
    public function petition()
    {
        return $this->belongsTo('App\Petition');
    }
}
