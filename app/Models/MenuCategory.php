<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    //
    protected $fillable = ['name','type_id','shop_id','description','is_selected'];


}