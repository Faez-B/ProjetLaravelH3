<?php

namespace App\Models;

use App\Models\Type;
use App\Models\User;
use App\Models\Chapter;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;

    protected $table = "formations";

    public $timestamps = false;

    protected $fillable = [
        "name",
        "description",
        "image",
        "prix",
        "user",
    ];

    public function chapters()
    {
        return $this->hasMany(Chapter::class, "formation", "id");
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, "id", "user");
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, "formations_categories", "formation", "category");
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, "formations_types", "formation", "type");
    }
}
