<x-layout>
    {{-- annunci da revisonare --}}
    @if($announcement_to_check)
    <div class="container-fluid">
        <div class="row justify-content-between">
            {{-- colonna dx --}}
            <div class="col-4 bg-navbar d-flex flex-column justify-content-between text-end">
                <div class="d-flex justify-content-start">
                    <a href="{{route('announcements.index')}}" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class=" pt-3 fa-solid fa-arrow-left fa-2x text-icewhite"></i></a>
                </div>
                <h4 class="display-5 text-icewhite">
                    {{__('ui.adToReview')}}
                </h4>
                <p></p>
            </div>
            {{-- colonna revisore --}}
            <div class="col-8 pt-4">
                <div class="col-6">
                    <x-message_success />
                </div>
                <div class="row">
                    <div class="d-flex justify-content-between">
                        {{-- immagini --}}
                        <div class="col-12 col-md-4 pt-2 d-flex align-items-center">
                            <div id="detailCarousel" data-interval="1000" class="carousel slide" data-bs-ride="carousel">
                                @if($announcement_to_check->images)
                                <div class="carousel-inner">
                                    @foreach($announcement_to_check->images as $image)
                                        <div class="carousel-item @if($loop->first)active @endif">
                                            <img src="{{$image->getUrl(350, 200)}}" class="d-block card-img-top-check" alt="">
                                        </div>
                                    @endforeach
                                </div>
                                @else
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://picsum.photos/350/200" class="d-block card-img-top-check m-2" alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://picsum.photos/350/200" class="d-block card-img-top-check m-2" alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://picsum.photos/350/200" class="d-block card-img-top-check m-2" alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://picsum.photos/350/200" class="d-block card-img-top-check m-2" alt="">
                                    </div>
                                </div>
                                @endif
            
                                <button class="carousel-control-prev" type="button" data-bs-target="#detailCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">{{__('ui.previous')}}</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#detailCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">{{__('ui.next')}}</span>
                                </button>
                            </div>
                        </div>
        
                        {{-- semaforo --}}
                        <div class="col-12 col-md-2">
                            <div class="card-body">
                                <h5 class="tc-accent">Tags</h5>
                                @if ($image->labels)
                                    @foreach ($image->labels as $label)
                                        <p class="d-inline">{{$label}},</p>
                                    @endforeach
                                @endif
                            </div>
                        </div>
        
                        <div class="col-12 col-md-2">
                            <div class="card-body">
                                <h5 class="tc-accent">{{__('ui.imageReview')}}</h5>
                                <p>{{__('ui.adults')}}: <span class="{{$image->adult}}"></span></p>
                                <p>{{__('ui.comedy')}}: <span class="{{$image->spoof}}"></span></p>
                                <p>{{__('ui.medicine')}}: <span class="{{$image->medical}}"></span></p>
                                <p>{{__('ui.violence')}}: <span class="{{$image->violence}}"></span></p>
                                <p>{{__('ui.sexualContent')}}: <span class="{{$image->racy}}"></span></p>
                            </div>
                        </div>
        
                        {{-- descrizione --}}
                        <div class="col-12 col-md-4 d-flex flex-column justify-content-between">
                            <div class="pt-4 ">
                                <h5 class="card-title pt-2">{{$announcement_to_check->title}}</h5>
                                <p class="category-card text-darkgreen pt-2">{{$announcement_to_check->category['name']}}</p>
                                <h6 class="price pt-2 border-bottom">€ {{$announcement_to_check->price}}</h6>
                                <h5>{{__('ui.description')}}</h5>
                                <p>{{$announcement_to_check->body}}</p>
                            </div>
                            <div class="d-flex justify-content-between pb-5">
                                <form action="{{route('revisor.reject_announcement', ['announcement' => $announcement_to_check])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger">{{__('ui.decline')}}</button>
                                </form>
                                <form action="{{route('revisor.accept_announcement', ['announcement' => $announcement_to_check])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success me-5">{{__('ui.accept')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- linea di spazio --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 bg-navbar">
                <p style="height: 40px"></p>
            </div>
        </div>
    </div>

    {{--Annunci rifiutati--}}
    @if($announcement_to_decline)
    <div class="container-fluid">
        <div class="row justify-content-between">
            {{-- colonna revisore --}}
            <div class="col-8 pt-4">
                <div class="col-6">
                    <x-message_success />
                </div>
                <div class="row">
                    <div class="d-flex justify-content-between">
                        {{-- immagini --}}
                        <div class="col-12 col-md-4 pt-2 d-flex align-items-center">
                            <div id="detailCarouselRif" data-interval="1000" class="carousel slide" data-bs-ride="carousel">
                                @if($announcement_to_decline->images)
                                <div class="carousel-inner">
                                    @foreach($announcement_to_decline->images as $image)
                                        <div class="carousel-item @if($loop->first)active @endif">
                                            <img src="{{$image->getUrl(350, 200)}}" class="d-block card-img-top-check m-2" alt="">
                                        </div>
                                    @endforeach
                                </div>
                                @else
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://picsum.photos/350/200" class="d-block card-img-top-check m-2" alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://picsum.photos/350/200" class="d-block card-img-top-check m-2" alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://picsum.photos/350/200" class="d-block card-img-top-check m-2" alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://picsum.photos/350/200" class="d-block card-img-top-check m-2" alt="">
                                    </div>
                                </div>
                                @endif
            
                                <button class="carousel-control-prev" type="button" data-bs-target="#detailCarouselRif" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#detailCarouselRif" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
        
                        {{-- semaforo --}}
                        <div class="col-12 col-md-2">
                            <div class="card-body">
                                <h5 class="tc-accent">Tags</h5>
                                @if ($image->labels)
                                    @foreach ($image->labels as $label)
                                        <p class="d-inline">{{$label}},</p>
                                    @endforeach
                                @endif
                            </div>
                        </div>
        
                        <div class="col-12 col-md-2">
                            <div class="card-body">
                                <h5 class="tc-accent">{{__('ui.imageReview')}}</h5>
                                <p>{{__('ui.adults')}}: <span class="{{$image->adult}}"></span></p>
                                <p>{{__('ui.comedy')}}: <span class="{{$image->spoof}}"></span></p>
                                <p>{{__('ui.medicine')}}: <span class="{{$image->medical}}"></span></p>
                                <p>{{__('ui.violence')}}: <span class="{{$image->violence}}"></span></p>
                                <p>{{__('ui.sexualContent')}}: <span class="{{$image->racy}}"></span></p>
                            </div>
                        </div>
        
                        {{-- descrizione --}}
                        <div class="col-12 col-md-4 d-flex flex-column justify-content-between">
                            <div class="pt-4 ">
                                <h5 class="card-title pt-2">{{$announcement_to_decline->title}}</h5>
                                <p class="category-card text-darkgreen pt-2">{{$announcement_to_decline->category['name']}}</p>
                                <h6 class="price pt-2 border-bottom">€ {{$announcement_to_decline->price}}</h6>
                                <h5>{{__('ui.description')}}</h5>
                                <p>{{$announcement_to_decline->body}}</p>
                            </div>
                            <div class="d-flex justify-content-between pb-5">
                                <form action="{{route('revisor.accept_announcement', ['announcement' => $announcement_to_decline])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-warning
                                    ">{{__('ui.acceptAgain')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- colonna sx --}}
            <div class="col-4 bg-navbar d-flex flex-column justify-content-center text-center">
                <h4 class="display-5 text-icewhite">
                    {{__('ui.doYouWantToAcceptTheLastRejectedAd')}}
                </h4>
                <p></p>
            </div>
        </div>
    </div>
    @endif
    {{-- @if($announcement_to_decline)
    <div class="container-fluid d-flex">
        <div class="row justify-content-between">
            <div id="detailCarousel" data-interval="1000" class="carousel slide h-100" data-bs-ride="carousel">
                @if($announcement_to_decline->images)
                <div class="carousel-inner">
                    @foreach($announcement_to_decline->images as $image)
                        <div class="carousel-item @if($loop->first)active @endif">
                            <img src="{{Storage::url($image->path)}}" class="card-img-top-check m-2" alt="">
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
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#detailCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
                <div class="col-12 col-md-6 d-flex flex-column justify-content-between">
                    <div class="pt-4 ">
                        <h5 class="card-title pt-2">{{$announcement_to_decline->title}}</h5>
                        <p class="category-card text-darkgreen pt-2">{{$announcement_to_decline->category['name']}}</p>
                        <h6 class="price pt-2 border-bottom">€ {{$announcement_to_decline->price}}</h6>
                        <h5>{{__('ui.description')}}</h5>
                        <p>{{$announcement_to_decline->body}}</p>
                    </div>
                    <div class="d-flex justify-content-between pb-5">
                        <form action="{{route('revisor.accept_announcement', ['announcement' => $announcement_to_decline])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning
                            ">{{__('ui.acceptAgain')}}</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-4 col-md-4 bg-navbar d-flex flex-column justify-content-center text-start">
                <h4 class="display-5 text-icewhite">
                    {{__('ui.doYouWantToAcceptTheLastRejectedAd')}}
                </h4>
            </div>
        </div>
    </div>
    @endif --}}

    {{-- non ci sono annunci da revsionare --}}
    @if(!$announcement_to_check && !$announcement_to_decline)
    <div class="container d-flex justify-content-center align-items-center h-50">
        <div class="p-5 bg-navbar rounded-custom">
            <h3 class="text-white">
                {{__('ui.noAdsToReview')}}
            </h3>
        </div>
    </div>
    @endif
    
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('ui.areYouSureToGoBack')}}</h5>
                <button type="button" class="btn-close text-icewhite" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-custom-primary-2" data-bs-dismiss="modal">{{__('ui.comeOnReviewAgain')}}</button>
                <a href="{{route('announcements.index')}}"><button type="button" class="btn btn-secondary text-icewhite">{{__('ui.enoughForToday')}}</button></a>
            </div>
        </div>
    </div>
</div>

</x-layout>