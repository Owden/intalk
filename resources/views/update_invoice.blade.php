@extends('app')

@section('title', "Számla #{{ $invoice->id }}")

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>Számla #{{ $invoice->id }}</h1>
    <form method="POST" action="">
        @csrf
        <table border="1">
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
                <td colspan="2">
                    <select name="item_id">
                        @foreach($goods_and_services as $good_or_service)
                            <option value="{{ $good_or_service->id }}">{{ $good_or_service->name }} ({{ $good_or_service->price }} HUF)</option>
                        @endforeach
                    </select>
                </td>
                <td><input name="amount" type="number"></td>
                <td><input type="submit" @if(empty($goods_and_services->toArray())) disabled @endif value="Tétel hozzáadása"></td>
            </tr>
            <tr>
                <td colspan="3">Végösszeg:</td><td>{{ $totalAmount }}</td>
            </tr>
        </table>
    </form>
    <br>
    <a href="{{url("szamlak/$invoice->id")}}">Kilépés</a>
    <br>
@endsection
