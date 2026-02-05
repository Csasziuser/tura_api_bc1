<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tura extends Model
{
    protected $table = 'turak';
    protected $fillable = ['nev','tav','elerheto_hely'];

    public function jelentkezesek() {
        return $this->hasMany(Jelentkezes::class);
    }
}
