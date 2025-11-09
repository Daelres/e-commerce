<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static inRandomOrder()
 */
class Brand extends Model
{
    use HasFactory;
    protected $table = 'brand';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['name'];
}
