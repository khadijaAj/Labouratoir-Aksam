<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    
    protected $guarded = [];
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value_surseche', 'value_surbrute','nutriment_id','crapport_id','mprapport_id','pfrapport_id'
    ];

    public function crapport()
    {
        return $this->belongsTo(Crapport::class);
    }

    public function pfrapport()
    {
        return $this->belongsTo(Pfrapport::class);
    }

    public function enrapport()
    {
        return $this->belongsTo(Enrapport::class);
    }
    
}
