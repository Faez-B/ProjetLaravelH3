<?php

namespace App\Models;

use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chapter extends Model
{
    use HasFactory;

    protected $table = "chapters";

    protected $fillable = [
        "titre",
        "content",
        "formation",
    ];

    public $timestamps = false;

    public function getFormation()
    {
        return $this->belongsTo(Formation::class, "id", "formation");
    }
}
