<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Dialog extends Model
{
    protected $table = 'dialogs';
    public function fromu()
    {
        return $this->belongsTo('App\User','from_id');
    }
    public function tou()
    {
        return $this->belongsTo('App\User','to_id');
    }
}
