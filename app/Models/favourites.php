<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class favourites extends Model
{
    //
    use HasFactory;

    protected $table = 'favourites';  // matches your table name

    protected $fillable = [
        'user_id',
        'product_id',
        'status'
    ];
    public function product(){
        return $this->belongsTo(product::class,'product_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}

