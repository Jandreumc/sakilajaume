
  @extends('layout')

   
  @section('content')
   
    <h1>LISTADO DE FILMS</h1>
         
        {{--@php dd($films) @endphp--}}
    <table>
        <tbody>
        <tr class="tr1">
            <th class="t1">Título</th>
            <th class="t1">Año</th>
            <th class="t1">Precio</th>
        </tr>
        @foreach ($films as $film)
            <tr>
                <td class="t2">{{ $film->title }}</td>
                <td class="t2">{{ $film->release_year }}</td>
                <td class="t2">{{ $film->rental_rate }}</td>

                </td>
            </tr>
        </tbody>
        @endforeach
    </table>

    @endsection