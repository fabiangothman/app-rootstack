<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $table = "advertisements";
    //protected $fillable = ['name', 'description', 'category'];
    
    //Ignores this field for process(save, update)
    protected $guarded = [];

    
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        //return $this->getKeyName();
        return 'slug';
    }
}
