<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    
    <div class="mt-5 container">
        @yield("pageContent")
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


<form action="{{ route("cart.add") }}" method="post">
  {{ $i=0 }}
  @foreach($combinedItems as $item)
    
      <input name="group[{{$i}}][name]" type="text" value="{{ $item["name"] }}" readonly>
      <input name="group[{{$i}}][amount]" type="number" value="{{ $item["amount"] }}">
      <input name="group[{{$i}}][price]" type="text" value="{{ $item["price"] }}" readonly>
      <input name="group[{{$i}}][total]" type="text" value="{{ $item["total"] }}" readonly>
    {{ $i++ }}
  @endforeach
  <button type="submit">Order</button>
</form>