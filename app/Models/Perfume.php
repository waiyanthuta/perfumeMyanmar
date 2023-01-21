<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfume extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function perfume_detail(){
        return $this->hasMany(PerfumeDetail::class);
    }
}
