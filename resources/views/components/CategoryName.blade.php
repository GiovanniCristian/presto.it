@switch(Config::get('app.locale'))
    @case('it')
        {{$category->name}}
        @break
    @case('en')
        {{$category->en}}
        @break
    @case('es')
        {{$category->es}}
        @break
    @default
        
@endswitch