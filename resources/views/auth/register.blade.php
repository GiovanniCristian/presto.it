<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>{{__('ui.register')}}</title>

    <script src="https://kit.fontawesome.com/4ace0a1b76.js" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
        {{-- error --}}

    <x-validation_errors />
    <x-message_success />

    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-4 col-12 bg-navbar p-4 d-flex flex-column justify-content-between text-end">

                <div class="d-flex justify-content-start">
                    <a href="{{Route('homepage')}}"><i class="fa-solid fa-arrow-left text-icewhite fa-2x"></i></a>
                </div>

                <h2 class="display-4 text-icewhite">{{__('ui.createPresto')}}</h2>

                <p></p>
            </div>
    
            <div class="col-lg-7 col-xs-12 p-3 ms-5 d-flex flex-column justify-content-center vh-100 col-register">
    
                <h1 class="display-3 p-2 h1-custom">{{__('ui.ctaRegister')}}</h1>
    
                <div class="w-50">
                    <form method="POST" action="/register">
                        
                        @csrf
                        
                        {{-- nome --}}
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label ">{{__('ui.name')}}: </label>
                            <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
                        </div>
                        
                        {{-- email --}}
                        <div class="mb-3">
                            <label for="exampleInputEmail" class="form-label ">{{__('ui.email')}}: </label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
                        </div>
                        
                        {{-- password --}}
                        <div class="mb-3">
                            <label for="exampleInputPassword" class="form-label ">{{__('ui.password')}}: </label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword">
                        </div>
                        
                        {{-- password confirm --}}
                        <div class="mb-3">
                            <label for="exampleInputPasswordConfirmation" class="form-label ">{{__('ui.confirmPassword')}}: </label>
                            <input type="password" name="password_confirmation" class="form-control" id="exampleInputPasswordConfirmation">
                        </div>
                        
                        <button type="submit" class="btn btn-custom-primary">{{__('ui.register')}}</button>
                    </form>  

                    <p class="small fst-italic pt-3">{{__('ui.alreadyRegistered')}} <a href="{{Route('login')}}" class="">{{__('ui.login')}}</p></a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>