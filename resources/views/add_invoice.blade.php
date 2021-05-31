@extends('app')

@section('title', "Számla hozzáadása")

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>Számla hozzáadása</h1>
    <a href="{{url("szamlak/")}}">Mégse</a>
    <br>
    <form method="POST" action="">
        @csrf
        <table border="1">
            <tr>
                <td>Vevő:</td>
                <td>
                    <select name="customer_id">
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->email_address }})</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>
        <br>

        <input type="submit" @if(empty($customers->toArray())) disabled @endif value="Számla hozzáadása">

    </form>
@endsection
