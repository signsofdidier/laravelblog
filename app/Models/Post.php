<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, softDeletes, Sortable; //dit zijn treads
    public $sortable = ['title', 'content', 'created_at', 'updated_at'];

    protected $fillable = [
        'author_id',
        'photo_id',
        'title',
        'content',
        'slug',
        'is_published'
    ];

    /* Relaties */

    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }
    public function photo(){
        return $this->belongsTo(Photo::class);
    }
    public function categories(){ //meerdere categorieën dus categories
        return $this->morphToMany(Category::class, 'categoryable');
    }

    /* Filters (scopes) */

    public function scopeFilter($query, $searchterm){
        if(!empty($searchterm)){
            $query->where(function($q) use($searchterm){
                $q->where('title', 'LIKE', "%{$searchterm}%")
                    ->orWhere('content', 'LIKE', "%{$searchterm}%");
            });
        }
        return $query;
    }
    //scope:: alleen gepubliceerde posts
    public function scopePublished($query){
        return $query->where('is_published', 1);
    }

    //scope: filter op posts op basis van categorieën (polymorfe relatie)
    // Dit gaat na of een post in ALLE geselecteerde categorieën zit.

    //$gefilterdePosts = Post::inCategories([1,2,3])->get();
    public function scopeInCategories($query, $categoryIds){
        if(!empty($categoryIds)){
            foreach($categoryIds as $categoryId){
                $query->whereHas('categories', function($q) use($categoryId){
                    $q->where('category_id', $categoryId);
                });
            }
        }
        return $query;
    }

    //
}
