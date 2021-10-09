<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Formule extends Model
{
    //
    use Loggable;
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'ensilage','foin','paille','fourrage','aliment','trxSoja','cmv','maisbroye','coqueSoja','psb','bicarbonate', 'niveauensilage','niveauproduction','autre','date_creation','valeurms','client_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    
}


