<x-layout>

    {{-- <div class="container p-5">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                @auth
                <div class="d-flex align-items-baseline">
                    <p class="">Nuovo annuncio?</p>
                    <a href="{{Route('announcements.create')}}" class="btn btn-custom-primary text-uppercase ms-3">Inserisci</a>
                </div>
                @else
                <p class="">Vuoi inserire anche tu un annuncio?</p>
                <a href="{{route('login')}}" class="btn btn-custom-primary text-uppercase">Login</a>
                <a href="{{route('register')}}" class="btn btn-custom-primary text-uppercase ms-3">Registrati</a>
                @endauth
            </div>
        </div>
    </div> --}}

    <div class="container py-2">
        <div class="row">
            <div class="header-detail col-12 text-start p-4">
                <p class="display-5">{{__('ui.allAnnouncements')}}</p>
            </div>
        </div>
    </div>

    <div class="container p-5">
        <div class="row">
            @forelse($announcements as $announcement)
                {{-- <div class="col-12 col-md-3 text-start my-3">
                    <div class="card-announcement p-3 shadow mb-2">
                        <img src="https://picsum.photos/300" class="img-fluid" alt="{{$announcement->title}}">
                        <h5 class="card-title pt-2">{{$announcement->title}}</h5>
                        <p class="category-card text-darkgreen">{{$announcement->category['name']}}</p>
                        <div class="line-divider"></div>
                        <div class="d-flex align-items-baseline justify-content-between">
                            <h6 class="price">€ {{$announcement->price}}</h6>
                            <a href="{{route('announcements.detail', compact('announcement'))}}" class="btn btn-custom-primary">Dettagli</a>
                        </div>
                    </div>
                </div> --}}
                <div class="col-12 col-lg-3 col-md-6 my-3">
                    <div class="card-announcement">
                        <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(350, 200) : 'https://picsum.photos/350/200'}}" class="img-custom img-fluid" alt="">
                        {{-- <img src="https://picsum.photos/250/200" class="img-custom img-fluid" alt="{{$announcement->title}}"> --}}
                        <h5 class="card-title pt-2 ps-3">{{$announcement->title}}</h5>
                        <p class="category-card text-darkgreen ps-3">{{$announcement->category['name']}}</p>
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
                <div class="col-12">
                    <div class="alert alert-warning py-3 shadow">
                        <div class="card-announcement">
                            <a href="{{Route('announcements.create')}}"><i class="fa-solid fa-circle-plus fa-4x"></i></a>
                        </div>
                    </div>
                </div>
            @endforelse
            {{--{{$announcements->links()}} --}}
        </div>
    </div>

</x-layout>