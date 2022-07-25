@if(session('message'))
    <div class="container mt-5">
        <div class="alert alert-success w-100 text-center fw-bold modalFont">
            {{session('message')}}
        </div>
    </div>
@endif