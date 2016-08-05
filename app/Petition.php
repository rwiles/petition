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
        'title', 'summary', 'body', 'private',
        'thankyou_title', 'thankyou_body', 'thankyou_email_subject', 'thankyou_email_body'
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

    /**
     * Provide default title for thankyou page.
     */
    public function getThankyouTitleAttribute() {
        if (isset($this->attributes['thankyou_title'])) {
            return $this->attributes['thankyou_title'];
        }
        return "Thank You";
    }

    /**
     * Provide default body for thankyou page.
     */
    public function getThankyouBodyAttribute() {
        if (isset($this->attributes['thankyou_body'])) {
            return $this->attributes['thankyou_body'];
        }
        return "<p>Thank you for signing this petition!</p>";
    }

    /**
     * Provide default subject for confimation email.
     */
    public function getThankyouEmailSubjectAttribute() {
        if (isset($this->attributes['thankyou_email_subject'])) {
            return $this->attributes['thankyou_email_subject'];
        }
        return "Thank You";
    }

    /**
     * Provide default body for confirmation email.
     */
    public function getThankyouEmailBodyAttribute() {
        if (isset($this->attributes['thankyou_email_body'])) {
            return $this->attributes['thankyou_email_body'];
        }
        return "Thank you for signing this petition!";
    }
}
