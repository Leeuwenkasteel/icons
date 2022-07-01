<?php

namespace Leeuwenkasteel\Icons\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Leeuwenkasteel\Helpers\Sluggable;
use Carbon\Carbon;

class Icon extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table    = "icons";
    protected $fillable = ['icon', 'slug'];
    protected $dates    = ['deleted_at','created_at', 'updated_at'];

    private static $sluggableConfig= [
        "slug_column" => "slug",
        "slug_from_column" => "icon"
    ];

}
