<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static inRandomOrder()
 * @method static where(string $string, $id)
 */
class Brand extends Model
{
    use HasFactory;
    protected $table = 'brand';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['name'];
}
