@php
    use App\Http\ForecastHelper;
    use App\Http\CityHelper;
@endphp

@extends("admin.layout")

@section("pageContent")
    <h2 class="mt-5">Dodaj prognozu</h2>
    @if ($errors->any())
            <p class="text-danger">{{$errors->first()}}</p>
        @endif
    <form action="{{route("forecast.addForecast")}}" method="post" class="mt-3 d-flex gap-3 align-items-center">
        {{csrf_field()}}
        <div class="mb-3">
            <label class="form-label" for="">Temperatura</label>
            <input name="temperature" type="text" class="form-control" value="{{old("temperature")}}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Grad</label>
            <select name="city_id" id="" class="form-select" >
                @foreach ($cities as $city )
                    @php $selected=CityHelper::getSelectedIfCityIsOld($city->id,old("city_id")); @endphp
                    <option value="{{$city->id}}" {{$selected}}>{{$city->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Vreme</label>
            <select name="weather_type" id="" class="form-select">
                <option value="sunny">sunny</option>
                <option value="rainy">rainy</option>
                <option value="snowy">snowy</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Verovatnoca</label>
            <input name="probability" class="form-control" type="number" min="0" max="100">
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Datum</label>
            <input name="date" class="form-control" type="dateTime-local">
        </div>
        <button type="submit" class="btn btn-primary">Dodaj</button>
    </form>
    <div class="d-flex flex-wrap gap-3">
        @foreach ($cities as $city )
            <ul class="list-group  mb-3">
            <h2 class="mt-4">{{$city->name}}</h2>
                @foreach ($city->forecasts as $forecast )
                    @php
                        $probability=ForecastHelper::getProbabilityText($forecast->weather_type,$forecast->probability);
                        $color=ForecastHelper::getColorByTemperature($forecast->temperature);
                        $weather_icon=ForecastHelper::getWeatherIconTag($forecast->weather_type);
                    @endphp
                    <li class="list-group-item ">{{$forecast->date}}, <span style="color:{{$color}}; font-weight: bold;">{{$forecast->temperature}}</span> C, weather: {!! $weather_icon !!} {{$probability}}</li>
                @endforeach
            </ul>
        @endforeach
    </div>
@endsection