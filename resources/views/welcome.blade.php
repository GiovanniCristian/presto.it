<x-layout>

  


    <section id="header" class="container-fluid w-100 d-flex justify-content-center align-items-center">
        <div class="row w-75">
            <div class="col-12 col-md-5">
                <div class="title-header">
                    <h1 class="display-5 text-icewhite title-head">{{__('ui.welcomeHeader')}}</h1>
                </div>
            </div>
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-end">
                <div class="button-header">
                    <a href="{{Route('announcements.create')}}" class="btn btn-header text-uppercase ms-3">{{__('ui.announcement')}}</a>
                </div>
            </div>
        </div>
    </section>
    <x-message_success_index />
    {{-- ultimi annunci --}}

    <div class="container p-5">
        <div class="row pb-4">
            <!-- <h6>Gli ultimi annunci:</h6> -->
            <h6>{{__('ui.latestAds')}}:</h6>
        </div>
        <div class="row">
            @foreach($announcements as $announcement)
                <div class="col-12 col-lg-3 col-md-6 my-3">
                    <div class="card-announcement">
                        <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(350, 200) : 'https://picsum.photos/350/200'}}" class="img-custom img-fluid" alt="">
                        <h5 class="card-title pt-2 ps-3">{{$announcement->title}}</h5>
                        <p class="category-card text-darkgreen ps-3">{{$announcement->category['name']}}</p>
                        <p class="px-3 desc">{{$announcement->body}}</p>
                        <div class="p-3 pb-0 price-tag d-flex justify-content-between align-items-baseline w-100">
                            <p class="fw-bold">{{__('ui.price')}}: </p><h5 class="price ps-3">€ {{$announcement->price}}</h5>
                        </div>
                        <div class="line-divider"></div>
                        <div class="px-3 d-flex align-items-baseline justify-content-end w-100">
                            {{-- <p class="text-darkgreen">{{__('ui.contact')}}</p> --}}
                            <a href="{{route('announcements.detail',compact('announcement'))}}" class="btn-custom-primary px-4 py-2 mb-2 rounded-3 fw-bold">{{__('ui.details')}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- bottone carica altri --}}

    <div class="container my-2">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="{{Route('announcements.index')}}" class="btn btn-custom-second px-4 fw-bold">{{__('ui.loadMore')}}</a>
            </div>
        </div>
    </div>

    {{-- top categorie --}}

    <div class="container p-5" id="top-categories">
        <div class="row pb-4">
            <h6>{{__('ui.topCategories')}}:</h6>
        </div>
        <div class="row">
            @foreach($categories as $category)
                @if($category['id']<= 4)
                    <div class="col-12 col-lg-3 col-md-6 my-3">
                        <a href="{{route('categoryShow', compact('category'))}}">
                            <div class="card-announcement-top card-categories-index text-center row bg-icewhite">
                                @if($category['id']== 1)
                                <p><i class="fa-solid fa-futbol fa-3x text-darkgreen icon-custom"></i></p>
                                @elseif($category['id']== 2)
                                <p><i class="fa-solid  fa-book-bookmark fa-3x text-darkgreen icon-custom"></i></p>
                                @elseif($category['id']== 3)
                                <p><i class="fa-solid fa-music fa-3x text-darkgreen icon-custom"></i></p>
                                @elseif($category['id']== 4)
                                <p><i class="fa-solid fa-leaf fa-3x text-darkgreen icon-custom"></i></p>
                                @endif
                                <h3 class="card-title pt-2 ps-3 icon-custom"><x-CategoryName :category="$category" /></h3>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    
</x-layout>