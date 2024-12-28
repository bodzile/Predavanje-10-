@extends("layout")

@section("pageContent")
<h2>Gradovi</h2>
    <table class="table w-50">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">City</th>
        <th scope="col">Temperature</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($weather as $city )
            <tr>
                <th scope="row">{{$city->id}}</th>
                <td>{{$city->city}}</td>
                <td>{{$city->temperature}}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
@endsection