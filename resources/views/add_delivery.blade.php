@extends('app')

@section('title', "Bevételezés")

@section('sidebar')
    @parent
@endsection

@section('content')
    @if(empty($suppliers->toArray()))
        <div class="alert alert-danger">
            Nincs rendelkezésre álló beszállító!
        </div>
    @else

        @if(empty($goods->toArray()))
            <div class="alert alert-danger">
                Nincs beszállítható termék!
            </div>
        @else
            <h1>Bevételezés</h1>
            <a href="{{url("bevetelezesek/")}}">Mégse</a>
            <br>
            <form method="POST" action="">
                @csrf
                <table border="1">
                    <thead>
                        <tr>
                            <th>Beszállító</th>
                            <th>Termék</th>
                            <th>Mennyiség</th>
                            <th>Ár</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="supplier_id">
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->company_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="delivered_good">
                                    @foreach($goods as $good)
                                        <option value="{{ $good->id }}">{{ $good->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input name="amount" type="number"></td>
                            <td><input name="price" type="number"></td>
                        </tr>
                    </tbody>
                </table>
                <br>

                <input type="submit" value="Készlethez adás">

            </form>
        @endif
    @endif
@endsection
