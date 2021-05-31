@extends('app')

@section('title', "Beszállítók listája")

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>Beszállítók</h1>
    <a href="{{url("beszallitok/hozzaadas")}}">Hozzáadás</a>
    @foreach($suppliers as $supplier)
        <table border="1">
            <tr>
                <td colspan="2"><a href="{{url("beszallitok/$supplier->id")}}">#{{ $supplier->id }}</a> {{ $supplier->company_name }}</td>
            </tr>
            <tr>
                <td colspan="2">{{ $supplier->contact }}</td>
            </tr>
            <tr>
                <td>Cím:</td><td>{{ $supplier->address }}</td>
            </tr>
            <tr>
                <td>E-mail:</td><td>{{ $supplier->email_address }}</td>
            </tr>
            <tr>
                <td>Telefon szám:</td><td>{{ $supplier->phone_number }}</td>
            </tr>
        </table>
        <br>
    @endforeach
@endsection
