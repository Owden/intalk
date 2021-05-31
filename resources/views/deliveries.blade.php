@extends('app')

@section('title', "Bevételezések listája")

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>Bevételezések listája</h1>
    <a href="{{url("bevetelezesek/bevetelezes")}}">Bevételezés</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dátum</th>
                <th>Beszállító</th>
                <th>Termék</th>
                <th>Mennyiség</th>
                <th>Ár</th>
            </tr>
        </thead>
        <tbody>
        @foreach($deliveries as $delivery)
            <tr>
                <td>#{{ $delivery->id }}</td>
                <td>{{ $delivery->time_of_delivery }}</td>
                <td>{{ $delivery->supplier->company_name }}</td>
                <td>{{ $delivery->delivered_good_details->name }}</td>
                <td>{{ $delivery->amount }}</td>
                <td>{{ $delivery->price }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>
@endsection
