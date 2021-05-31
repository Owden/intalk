@extends('app')

@section('title', "#$service->id $service->name")

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>#{{ $service->id }} {{ $service->name }}</h1>
    <table border="1">
        <tr>
            <td>Ár:</td><td>{{ $service->price }}</td>
        </tr>
    </table>
    <br>
    <a href="{{url("szolgaltatasok/$service->id/modositas")}}">Módosítás</a>
    <form method="POST" action="{{url("szolgaltatasok/$service->id/szolgaltatastorlese")}}">
        @method('DELETE')
        @csrf
        <input type="submit" value="Törlés">
    </form>
@endsection
