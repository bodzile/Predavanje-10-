@extends("layout")

@section("pageContent")

    <h1>Prognoza</h1>
    <p>
        Grad: {{ $city->name }} <br>
        Temperatura: {{ $city->forecastToday->temperature }} <br>
        Svice u {{ $sunrise }} <br>
        Zalazi u {{ $sunset }}
    </p>
@endsection