@extends('layouts.app')

@section('title','Order')

@section('content')
<section class="m-3">
    @if(count($orders) > 0)
        <div class="row">
            <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                                <th>Produit</th>
                                <th>Quantité</th>
                                <th>Total</th>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                        {{ $order->product }}
                                    </td>
                                    <td>
                                        {{ $order->qty }} 
                                    </td>
                                    <td>
                                        {{ $order->amount }} $
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    @else
        <p class="alert alert-info">Pas de commande !</p>
    @endif
</section>

@endsection

