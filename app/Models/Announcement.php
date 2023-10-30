<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'announcements_categories');
    }

    public function attachCategories(array $categoryNames)
    {
        $categories = Category::whereIn('name', $categoryNames)->get();
        $this->categories()->sync($categories);
    }
}
