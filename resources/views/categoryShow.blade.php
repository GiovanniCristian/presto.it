<x-layout>
    <div class="container p5 bg-icewhite">
        <div class="row">
            <div class="col-12 header-detail text-start p-5">
                <h1 class="display-4">{{$category->name}}</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                @forelse($category->announcements as $announcement)
                <div class="col-12 col-lg-3 col-md-4 my-3">
                    <div class="card-announcement">
                        <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(350, 200) : 'https://picsum.photos/350/200'}}" alt="{{$announcement->title}}">
                        {{-- <img src="https://picsum.photos/250/200" class="img-custom img-fluid" alt="{{$announcement->title}}"> --}}
                        <h5 class="card-title pt-2 ps-3">{{$announcement->title}}</h5>
                        <p class="category-card text-darkgreen ps-3"><x-CategoryName :category="$category" /></p>
                        <p class="px-3 desc">{{$announcement->body}}</p>
                        <div class="p-3 pb-0 price-tag d-flex justify-content-between align-items-baseline w-100">
                            <p class="fw-bold">{{__('ui.price')}}</p><h5 class="price ps-3">€ {{$announcement->price}}</h5>
                        </div>
                        <div class="line-divider"></div>
                        <div class="px-3 d-flex align-items-baseline justify-content-end w-100">
                            <a href="{{route('announcements.detail',compact('announcement'))}}" class="btn-custom-primary px-4 py-2 mb-2 rounded-3 fw-bold">{{__('ui.details')}}</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="container-fluid my-5">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="card-announcement">
                                <img src="https://picsum.photos/300/200" class="img-custom img-fluid" alt="TEST">          
                                    <a href="{{Route('announcements.create')}}" class="py-5 my-2 mx-auto"><i class="fa-solid fa-circle-plus fa-4x"></i></a>
                                    <h5 class="card-title pt-2 ps-3">{{__('ui.becomeFirstAd')}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                @forelse($category->announcements as $announcement)
                <div class="col-12 col-md-4 text-center">
                    <div class="card-body">
                        <img src="https://picsum.photos/300" alt="{{$announcement->title}}">
                        <h4 class="card-title">{{$announcement->title}}</h4>
                        <h5>{{$announcement->price}}</h5>
                        <h6>{{$announcement->category['name']}}</h6>
                        <p class="card-text">{{$announcement->body}}</p>
                        <a href="{{route('announcements.detail', compact('announcement'))}}" class="btn btn-primary">{{__('ui.details')}}</a>
                        <p>Pubblicato il:{{$announcement->created_at->format('d/m/Y')}}</p>
                    </div>
                </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="h1">Non sono presenti annunci in questa categoria</p>
                        <p class="h2">
                            <a href="">Clicca qui</a> per crearne uno nuovo!
                        </p>
                    </div>
                @endforelse
                </div>
            </div>
        </div>
    </div>
 --}}



</x-layout>