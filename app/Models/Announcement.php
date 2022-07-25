<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'price',
        'body',
    ];
    
    public function toSearchableArray(){
        $array = [
            'id'=> $this->id,
            'title'=> $this->title,
            'body'=> $this->body,
            'category'=> $this->category,
            
        ];
        return $array;
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    // ritorna il numero degli annunci da revisionare
    public static function toBeRevisionedCount(){
        return Announcement::where('is_accepted', null)->count();
    }

    // relazione immagini
    public function images(){
        return $this->hasMany(Image::class);
    }

}
