<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WithdrawLog extends Model
{
    protected $table = 'withdraw_logs';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function agent()
    {
        return $this->belongsTo('App\Agent','user_id','id');
    }

    public function method()
    {
        return $this->belongsTo('App\WithdrawMethod','method_id');
    }

    public function currency()
    {
        return $this->belongsTo('App\Currency','currency_id','id');
    }

    public function wallet()
    {
        return $this->belongsTo('App\Wallet','wallet_id');
    }

}
