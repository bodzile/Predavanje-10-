@extends("admin.layout")

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
        @foreach ($cities as $city )
            <tr>
                <th scope="row">{{$city->id}}</th>
                <td>{{$city->city->name}}</td>
                <td>{{$city->temperature}}</td>
                <td>
                    <a href="{{route("city.editCity",["cityObject" => $city->id])}}" class="btn btn-primary">Edit</a> &nbsp;
                    <a href="{{route("city.deleteCity",["city" => $city->id])}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
@endsection