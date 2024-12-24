@extends("layout")

@section("pageContent")
    <h2>Dodaj grad</h2>

    <form class="w-25" method="POST" action="{{route("city.add")}}">
        {{csrf_field()}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Grad</label>
        <input type="text" name="city" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Temperatura</label>
        <input type="text" name="temperature" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <button type="submit" class="mt-3 btn btn-primary">Dodaj</button>
    </form>
@endsection