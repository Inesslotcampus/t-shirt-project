<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChoiceTshirt extends Model
{
    use HasFactory;
    protected $fillable = [ "title", "urlimg", "type"];
}
