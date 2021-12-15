<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function header()
    {
        return $this->belongsTo(Transaction::class);
    }
}
