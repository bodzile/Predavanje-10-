@extends("layout");

@section("pageContent")

    <form class="containet mt-5 w-25" action="{{route("forecast.search")}}" method="get">
        
        @if(Illuminate\Support\Facades\Session::has("error"))
            <p class="text-danger">{{Illuminate\Support\Facades\Session::get("error")}}</p>
        @endif
        <div class="mb-3">
            <input class="form-control" type="text" name="city" placeholder="Unesite ime grada">
        </div>
        <button class="btn btn-primary">Pronadji</button>
    </form>

@endsection