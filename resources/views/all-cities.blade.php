@extends("layout")

@section("pageContent")
    <h2>Gradovi</h2>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">City</th>
        <th scope="col">Temperature</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($cities as $city )
                <th scope="row">{{$city->id}}</th>
                <td>{{$city->city}}</td>
                <td>{{$city->temperature}}</td>
                <td>
                    <button class="btn btn-primary">Edit</button> &nbsp;
                    <a href="{{route("city.deleteCity",["city" => $city->id])}}" class="btn btn-danger">Delete</a>
                </td>
            @endforeach
        </tr>
    </tbody>
    </table>
@endsection