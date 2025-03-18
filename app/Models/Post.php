<?php

namespace App\Models;

use App\Traits\RecordUserActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, softDeletes, Sortable, RecordUserActivity; //dit zijn traits

    protected $fillable = [
        'author_id',
        'photo_id',
        'title',
        'content',
        'slug',
        'is_published',
        'created_by',
        'deleted_by',
    ];

    /*protected $guarded=['id'];*/ //gebruik alles van fillable behalve id (ipv fillable)

    public $sortable = ['title', 'content', 'created_at', 'updated_at'];

    /* Relaties */

    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }

    public function creator(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor(){
        return $this->belongsTo(User::class, 'updated_by');
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
        return $query->where('is_published', true)
            ->with([
                'author:id,name',
                'photo:id,path',
                'categories:id,name'
            ]); //Dit laad enkel de id in de naam en het pad ipv alle veldjes, eager loading verzorgen
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
