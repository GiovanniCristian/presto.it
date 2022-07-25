<?php

namespace App\Http\Livewire;

use App\Jobs\GoogleVisionLableImage;
use File;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CreazioneAnnuncio extends Component
{

    use WithFileUploads;

    public $title;
    public $price;
    public $body;
    public $category;
    public $temporary_images;
    public $images = [];
    public $announcement;    

    protected $rules = [
        'title'=>'required|min:3|max:24', //da aggiungere min:3 
        'price'=>'required|numeric',
        'body'=>'required|min:10',
        'category'=>'required',
        'images.*'=>'required|image|max:1024',
        'temporary_images.*'=>'required|image|max:1024',
        'images'=>'required',
    ];

    protected $messages =[
        'title.required' => "Titolo obbligatorio",
        'title.min' => "Non puoi inserire meno di 3 caratteri",
        'title.max' => "Non puoi inserire più di 24 caratteri",
        'price.required'=>"Devi inserire il prezzo",
        'price.numeric'=>"Il prezzo deve essere un numero",
        'body.required' => "Descrizione obbligatoria",
        'body.min' => "Non puoi inserire meno di 10 caratteri",
        'images.*.image'=>'I file inseriti devono essere delle immagini',
        'images.*.max'=>"Il peso massimo dell'immagine è 1 mb",
        'temporary_images.*.image'=>'I file inseriti devono essere delle immagini',
        'temporary_images.*.max'=>"Il peso massimo dell'immagine è 1 mb",
        'category.required' => "Categoria obbligatoria",
        'images.required'=>"L'immagine è obbligatoria"
    ];

    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*'=>'image|max:1024',
        ])){
            foreach($this->temporary_images as $image){
                $this->images[]=$image;
            }
        }
    }
    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

    public function store(){
        $this->validate();

        $this->announcement=Category::find($this->category)->announcements()->create($this->validate());
        $this->announcement->user()->associate(Auth::user());
        $this->announcement->save();
        if(count($this->images)){
            foreach($this->images as $image){
                // $this->announcement->images()->create(['path'=>$image->store('images','public')]); //
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName,'public')]);

                RemoveFaces::withChain([

                    new ResizeImage($newImage->path , 350 , 200),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLableImage($newImage->id)
                    
                ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        $category = Category::find($this->category);

        // $announcement = $category->announcements()->create([

        //     'title'=>$this->title,
        //     'price'=>$this->price,
        //     'body'=>$this->body,
        // ]);

        // Auth::user()->announcements()->save($announcement);

        session()->flash('message', 'Annuncio inserito! Dopo la revisione sarà pubblicato.');
        $this->cleanForm();

    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function cleanForm(){
        $this->title = '';
        $this->price = '';
        $this->body = '';
        $this->images=[];
        $this->temporary_images=[];
        $this->category = '';
    }

    public function render()
    {
        return view('livewire.creazione-annuncio');
    }
}
