<div>

<div class="container-fluid">
  <div class="row justify-content-between">
    {{-- col dx --}}
    <div class="col-lg-3 col-md-12 col-12 bg-navbar d-flex flex-column justify-content-between text-end">
      <div class="d-flex justify-content-start">
        <a href="{{Route('homepage')}}"><i class="fa-solid fa-arrow-left text-icewhite fa-2x my-2"></i></a>
      </div>
      <h2 class="display-4 text-icewhite pe-5">{{__('ui.createYourAd')}}</h2>
      <p></p>
    </div>
    {{-- col form --}}
    <div class="col-lg-4 col-12 col-md-12 p-3 mx-3 mt-2 mb-4 justify-content-center">
      <div>
        <form class="w-75 align-items-center" wire:submit.prevent="store">
          @csrf
          <div class="mb-3">
            <label for="title" class="form-label">{{__('ui.adTitle')}}</label>
            <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" id="title">
            @error('title')
            <span class="fst-italic small text-danger">{{$message}}</span>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="price" class="form-label">{{__('ui.price')}} (€)</label>
            <input type="text" wire:model="price" class="form-control @error('title') is-invalid @enderror" id="price">
            @error('price')
            <span class="fst-italic small text-danger">{{$message}}</span>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="body" class="form-label">{{__('ui.productDescription')}}</label>
            <textarea wire:model="body" id="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror"></textarea>
            @error('body')
            <span class="fst-italic small text-danger">{{$message}}</span>
            @enderror
          </div>
          
          <div class="mb-3">
            <input wire:model="temporary_images" type="file" name="images" multiple class="form-control @error('images') is-invalid @enderror" placeholder="Img"/>
            @error('images')
            <span class="fst-italic small text-danger">{{$message}}</span>
            @enderror
          </div>
          {{-- @if(!empty($images))
            <div class="row">
              <div class="col-12">
                <p>Anteprima immagine:</p>
                <div class="row border border-4 border-info rounded py-4">
                  @foreach($images as $key=>$image)
                  <div class="col my-3">
                    <div class="img-preview mx-auto rounded" style="background-image: url({{$image->temporaryUrl()}}); height:300px; width: 300px; background-repeat: no-repeat; background-position: center;"></div>
                    <button type="button" class="btn btn-danger d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">Cancella</button>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
            @endif --}}
            
            <div class="mb-3">
              <label for="category" class="form-label">{{__('ui.category')}}</label>
              <select wire:model.defer="category" id="category" class="form-control">
                <option value="" >{{__('ui.selectCategory')}}</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}"><x-CategoryName :category="$category" /></option>
                @endforeach
              </select>
            </div>
            
            <button type="submit" class="btn btn-custom-primary">{{__('ui.create')}}</button>
          </form>
        </div>
      </div>
      {{-- col anteprima img --}}
      <div class="col-lg-4 col-md-12 col-12 p-3 mx-3 d-flex flex-column justify-content-center">
        <x-message_success />
        @if(!empty($images))
        <p>{{__('ui.imagePreview')}}:</p>
        <div class="row row-cols-2 py-4">
          @foreach($images as $key=>$image)
          <div class="col py-3">
            <div class="m-1" style="background-image: url({{$image->temporaryUrl()}}); width:150; height: 200px; background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
            {{-- <button type="button" class="btn btn-danger d-block text-center m-1" wire:click="removeImage({{$key}})">Cancella</button> --}}
            <i class="fa-solid fa-xmark text-danger fa-2x" type="button" wire:click="removeImage({{$key}})"></i>
          </div>
          @endforeach
        </div>
        @endif
      </div>
    </div>
  </div>
  
</div>
