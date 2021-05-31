@extends('app')

@section('title', "Számla #{{ $invoice->id }}")

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>Számla #{{ $invoice->id }}</h1>

    <table border="1">
        <tr>
            <td>Név:</td><td colspan="3"> {{ $invoice->customer->name }} </td>
        </tr>
        <tr>
            <td>Vásárlás dátuma:</td><td colspan="3">{{ $invoice->date_of_purchase }}</td>
        </tr>
        <tr>
            <td>Termék név</td><td>Ár</td><td>Mennyiség</td><td>Teljes ár</td>
        </tr>
        @php
            $totalAmount = 0;
        @endphp
        @foreach($invoice->invoice_item as $item)
            <tr>
                <td>{{ $item->item->name }}</td><td>{{ $item->price }}</td><td>{{ $item->amount }}</td><td>{{ $item->price * $item->amount }}</td>
            </tr>
            @php
                $totalAmount = ($item->price * $item->amount) + $totalAmount;
            @endphp
        @endforeach
        <tr>
            <td colspan="3">Végösszeg:</td><td>{{ $totalAmount }}</td>
        </tr>
    </table>
    <br>
    <a href="{{url("szamlak/$invoice->id/tetelhozzaadasa")}}">Tétel hozzáadása</a>
@endsection
