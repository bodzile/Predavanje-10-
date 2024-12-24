@extends("layout");

@section("pageContent")
    <h2>Gradovi</h2>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">City</th>
        <th scope="col">Temperature</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($cities as $city )
                <th scope="row">{{$city->id}}</th>
                <td>{{$city->city}}</td>
                <td>{{$city->temperature}}</td>
            @endforeach
        </tr>
    </tbody>
    </table>
@endsection