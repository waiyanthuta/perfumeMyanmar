<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfumeDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function perfume(){
        return $this->belongsTo(Perfume::class);
    }
    public function perfume_size(){
        return $this->belongsTo(PerfumeSize::class);
    }
}
