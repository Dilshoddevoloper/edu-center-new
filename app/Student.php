<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table =  "students";
    

    public $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'first_name', 'last_name', 'date_birth' , 'TIN' , 'email', 'address', 'tell_number', 'center_id',
        'region_id', 'city_id', 'science_id', "payment_summ"
    ];

    public function region() {
       return $this->belongsTo('App\Regions'); 
    }

    public function city() {
        return $this->belongsTo('App\Cities'); 
     }
}
