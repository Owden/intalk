@extends('app')

@section('title', "Szolgáltatások listája")

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>Szolgáltatások</h1>
    <a href="{{url("szolgaltatasok/hozzaadas")}}">Hozzáadás</a>
    @foreach($services as $service)
        <table border="1">
            <tr>
                <td colspan="2"><a href="{{url("szolgaltatasok/$service->id")}}">#{{ $service->id }}</a> {{ $service->name }}</td>
            </tr>
            <tr>
                <td>Ár:</td><td>{{ $service->price }}</td>
            </tr>
        </table>
        <br>
    @endforeach
@endsection
