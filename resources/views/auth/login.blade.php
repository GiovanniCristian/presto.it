<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>{{__('ui.login')}}</title>

    <script src="https://kit.fontawesome.com/4ace0a1b76.js" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <x-validation_errors />

    <x-message_success />
    
    {{-- login --}}
    
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-lg-4 col-12 bg-navbar p-4 d-flex flex-column justify-content-between text-end">
                
                <div class="d-flex justify-content-start">
                    <a href="{{Route('homepage')}}"><i class="fa-solid fa-arrow-left text-icewhite fa-2x"></i></a>
                </div>
                
                <h2 class="display-2 text-icewhite">Presto.it</h2>
                
                <h2 class="text-icewhite">{{__('ui.heylogin')}}</h2>
                
            </div>
            
            <div class="col-lg-7 col-12 col-md-12 p-4 d-flex flex-column justify-content-center vh-100 ">
                
                <h1 class="display-3 ps-2">{{__('ui.login')}}</h1>
                
                {{-- email --}}
                <div class="w-50">
                    <form method="POST" action="{{route('login')}}">
                        
                        @csrf
                        
                        <div class="mb-3">
                            <label for="exampleInputEmail"  class="form-label ">{{__('ui.email')}}: </label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
                        </div>
                        
                        {{-- password --}}
                        <div class="mb-3">
                            <label for="exampleInputPassword" class="form-label ">{{__('ui.password')}}: </label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword">
                        </div>
                        
                        {{-- ricordami --}}
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label " for="exampleCheck1">{{__('ui.remeberMe')}}</label>
                        </div>
                        
                        <button type="submit" class="btn btn-custom-primary">{{__('ui.login')}}</button>
                    </form>
                </div>
                
                <p class="small fst-italic my-5">{{__('ui.createProfile')}} <br>
                    <a href="{{Route('register')}}" class="href">{{__('ui.createPresto')}}</p></a>
                
            </div>
        </div>
    </div>
            
</body>
</html>
    
  