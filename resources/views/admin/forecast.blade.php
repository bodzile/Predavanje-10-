@extends("layout")

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
                    @if ($city->id==old("city_id"))
                        <option value="{{$city->id}}" selected>{{$city->name}}</option>
                    @else
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endif 
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
    @foreach ($cities as $city )
        <h2 class="mt-4">{{$city->name}}</h2>
        <ul class="list-group list-group-flush w-25 ">
            @foreach ($city->forecasts as $forecast )
                @if ($forecast->weather_type=="sunny")
                    <li class="list-group-item ">{{$forecast->temperature}} C, {{$forecast->date}}, weather: {{$forecast->weather_type}}</li>
                @else
                    <li class="list-group-item ">{{$forecast->temperature}} C, {{$forecast->date}}, weather: {{$forecast->weather_type}} ({{$forecast->probability}}%)</li>
                @endif
            @endforeach
        </ul>
    @endforeach
@endsection