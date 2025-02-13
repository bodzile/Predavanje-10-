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
        @foreach ($weathers as $weather )
            <tr>
                <th scope="row">{{$weather->id}}</th>
                <td>{{$weather->city->name}}</td>
                <td>{{$weather->temperature}}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
@endsection