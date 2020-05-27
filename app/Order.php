<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['order_no','total_amount','user_id','product_id','bank_transaction_id'];
    protected $guarded =[];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
}
