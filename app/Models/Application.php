<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ["name", "image", "description", "finish_date", "status_id"];

    /**
     *  Relation to status
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongTo
     */
    public function status(){
        return $this->belongsTo('App\Models\Status');
    }

    public function getImageUrlAttribute(){
        return asset("/storage/images/".$this->image);
    }

    public function getImageStorageUrlAttribute(){
        return storage_path("/app/public/images/".$this->image);
    }
}
