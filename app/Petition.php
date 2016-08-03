<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{


    /**
     * Get the user that created the petition.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the signatures on the petition.
     */
    public function signatures()
    {
        return $this->hasMany('App\Signature');
    }
}
