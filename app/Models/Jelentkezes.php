<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jelentkezes extends Model
{
    protected $table = 'jelentkezesek';
    protected $fillable = ['tura_id', 'email', 'letszam'];

    public function tura(){
        return $this->belongsTo(Tura::class);
    }
}
