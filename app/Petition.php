<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Petition extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'summary', 'body'
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public static function boot()
    {
        Petition::creating(function ($petition) {
            $petition->user_id = Auth::user()->id;
        });
    }


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
