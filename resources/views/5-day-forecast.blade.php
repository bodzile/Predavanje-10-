@extends("layout");

@section("pageContent")
    <h1>{{$forecasts[0]->city->name}}</h1>
    <table class="table w-75">
    <thead>
        <tr>
            @for ($i=0;$i<count($forecasts);$i++)
                <th scope="col">Dan {{$i+1}}</th>
            @endfor
        </tr>
    </thead>
    <tbody>
    
    @foreach ($forecasts as $forecast )
        <td>Datum: {{$forecast->date}}, temperatura: {{$forecast->temperature}}</td>
    @endforeach
        
    </tbody>
@endsection