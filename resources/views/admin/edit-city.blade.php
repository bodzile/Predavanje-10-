@extends("layout")

@section("pageContent")
    <h2>Izmeni grad</h2>
    <form class="w-25" method="POST" action="{{route("city.saveUpdate",["cityObject" => $cityObject->id])}}">
        {{csrf_field()}}
    <div class="mb-3">
       <select name="city_id" id="" class="form-select">
            @foreach($cities as $city)
                @if ($city->id==$cityObject->id)
                    <option value="{{$city->id}}" selected>{{$city->name}}</option>
                @else
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endif
            @endforeach
       </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Temperatura</label>
        <input type="text" name="temperature" class="form-control" id="exampleInputEmail1" value="{{$cityObject->temperature}}" aria-describedby="emailHelp">
    </div>
    @if ($errors->any())
        <p class="text-danger">{{$errors->first()}}</p>
    @endif
    <button type="submit" class="mt-3 btn btn-primary">Izmeni</button>
    </form>
@endsection