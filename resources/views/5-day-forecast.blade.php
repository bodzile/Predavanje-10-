@extends("layout");

@section("pageContent")
    <h1>{{$city}}</h1>
    <table class="table">
    <thead>
        <tr>
        </tr>
    </thead>
    <tbody>
        @for ($i=0;$i<count($allCities);$i++)
            <th scope="col">Dan {{$i+1}}</th>
        @endfor
        <tr>
            @foreach ($allCities as $temperature)
                <td>{{$temperature}}</td>
            @endforeach
        </tr>
        
    </tbody>
@endsection