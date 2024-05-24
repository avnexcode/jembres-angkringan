<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class, "menu_id");
    }
}
