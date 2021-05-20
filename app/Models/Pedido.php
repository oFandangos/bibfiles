<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\File;

class Pedido extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function file(){
        return $this->belongsTo(File::class);
    }
}
