@extends('layout')

   
@section('content')
 
  <h1>REALIZAR BUSQUEDA</h1>

<form class="form1" method="POST" action="{{url('formbusq/grafico')}}">

    {!!csrf_field()!!}
    <div class="formPreg">
        <label for="category">Elige una categoria</label>
        <select name="category">
            @foreach ($cates as $cate)
            <option value="{{ $cate->category_id }}">{{ $cate->name}}</option>
            @endforeach
        </select><br><br>
    </div>
    
    <button class="botonForm" type="submit">REALIZAR BUSQUEDA</button>
</form>


@endsection