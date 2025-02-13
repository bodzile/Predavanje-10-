@extends("layout")

@section("pageContent")

    @if (Illuminate\Support\Facades\Session::has("error"))
        <p class="text-danger">{{Illuminate\Support\Facades\Session::get("error")}}</p>
    @endif
    <div class="d-flex gap-2s flex-wrap">
        
        @foreach ($cities as $city )
            <p>
                @if (in_array($city->id,$userFavourites))
                    <a class="btn btn-primary" href="{{route("city.favourite",["city" => $city->id])}}">
                        <i class="fa-solid fa-x"></i>
                    </a>
                @else
                    <a class="btn btn-primary" href="{{route("city.favourite",["city" => $city->id])}}">
                        <i class=" fa-regular fa-heart"></i>
                    </a>
                @endif
                <a class="btn btn-primary me-4" href="{{route("forecast.permalink",["city" => $city->name])}}">
                @php $weather_icon=App\Http\ForecastHelper::getWeatherIconTag($city->forecastToday->weather_type)  @endphp
                {!! $weather_icon !!} {{$city->id }} {{$city->name}}
                </a> 
            </p>
            <br>
        @endforeach
    </div>

@endsection