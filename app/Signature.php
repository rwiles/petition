<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{


    /**
     * Get the petition that this signature is on.
     */
    public function petition()
    {
        return $this->belongsTo('App\Petition');
    }
}
