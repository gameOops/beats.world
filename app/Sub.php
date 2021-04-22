<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Sub extends  model
{
    protected $table = 'subs';
    public function subfrom()
    {
        return $this->belongsTo('App\User','subfrom_id');
    }
    public function subto()
    {
        return $this->belongsTo('App\User','subto_id');
    }
}
