@extends('layout')

   
    @section('content')
        <nav class="menu">
            <ul>
                <li><a href="{{url('/')}}">INICIO</a></li>
                <li><a href="{{url('/formbusq')}}">BUSCADOR</a></li>
                <li><a href="{{url('/films')}}">PELICULAS</a></li>
                <li><a href="{{url('/grafico')}}">VENTAS 2005 MESES</a></li>
                <li><a href="{{url('/formbusq/grafico1')}}">VENTAS 2005 CATEGORIAS</a></li>
            </ul>
        </nav>

@endsection
