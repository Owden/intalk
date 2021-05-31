@extends('app')

@section('title', "#$service->id $service->name")

@section('sidebar')
    @parent
@endsection

@section('content')

    <form method="POST" action="">
        @csrf
        <h1>#{{ $service->id }}</h1>
        <input name="name" type="text" value="{{ $service->name }}">
        <table border="1">
            <tr>
                <td>Ár:</td><td><input name="price" type="number" min="0" value="{{ $service->price }}"></td>
            </tr>
        </table>
        <br>

        <input type="submit" value="Módosítás">

    </form>
@endsection
