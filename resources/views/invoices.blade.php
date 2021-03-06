@extends('app')

@section('title', "Számlalista")

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>Számlák</h1>
    <a href="{{url("szamlak/hozzaadas")}}">Új számla</a>
    @foreach($invoices as $invoice)
        <table border="1">
            <tr>
                <td colspan="4"><a href="{{url("szamlak/$invoice->id")}}">#{{ $invoice->id }}</a></td>
            </tr>
            <tr>
                <td>Név:</td><td colspan="3"> {{ $invoice->customer->name }} </td>
            </tr>
            <tr>
                <td>Vásárlás dátuma:</td><td colspan="3">{{ $invoice->date_of_purchase }}</td>
            </tr>
            <tr>
                <td>Termék név</td><td>Ár (HUF)</td><td>Mennyiség</td><td>Teljes ár (HUF)</td>
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
    @endforeach
@endsection
