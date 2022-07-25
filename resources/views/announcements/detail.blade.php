<x-layout>

    {{-- <div class="container p5 mb-4">
        <div class="row">
            <div class="header-detail col-lg-6 col-md-6 col-12 text-start p-4">
                <p class="title-header">{{$announcement->title}}</p>
            </div>
        </div>
    </div> --}}
    
    <div class="container my-5 h-50">
        <div class="row justify-content-center">
            <div class="col-12 col-md-7 col-lg-5 d-flex align-items-center">
                <div id="detailCarousel" data-interval="1000" class="carousel slide" data-bs-ride="carousel">
                    @if($announcement->images)
                    <div class="carousel-inner">
                        @foreach($announcement->images as $image)
                            <div class="carousel-item @if($loop->first)active @endif">
                                <img src="{{$image->getUrl(350, 200)}}" class="d-block card-img-top-check" alt="{{$announcement->title}}">
                            </div>
                        @endforeach
                    </div>
                    @else
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/350/200" class="card-img-top-check m-2" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/350/200" class="card-img-top-check m-2" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/350/200" class="card-img-top-check m-2" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/350/200" class="card-img-top-check m-2" alt="">
                        </div>
                    </div>
                    @endif

                    <button class="carousel-control-prev" type="button" data-bs-target="#detailCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{__('ui.previous')}}</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#detailCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{__('ui.nnext')}}</span>
                    </button>
                </div>
            </div>

            <div class="col-12 col-md-5 col-lg-4 ps-5">
                <div class="body-card">
                    <h2 class="card-title mb-2">{{$announcement->title}}</h2>
                    <p class="category-card text-darkgreen mb-4">{{$announcement->category['name']}}</p>
                    <h3>€{{$announcement->price}}</h3>
                    <p class="card-text desc my-4">{{$announcement->body}}</p>
                    <p class="desc">{{__('ui.postedOn')}}: {{$announcement->created_at->format('d/m/Y')}}</p>
                    <a href="{{route('announcements.index')}}" class="btn btn-custom-primary">{{__('ui.returnToAds')}}</a>
                </div>
            </div>
        </div>
    </div>
    
</x-layout>