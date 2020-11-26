<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ["name"];

    /**
     *  Relation to status
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongTo
     */
    public function applications(){
        return $this->hasMany('App\Models\Application');
    }

}
