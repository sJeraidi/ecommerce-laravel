@extends('layouts.app')

@section('title', 'Page Remerciement')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success text-white">{{ session()->get('message')  }}</div>
        @endif
        <p class="">
            Votre Commande a bien été prise en compte ! <a href="{{ route('product.index') }}">Go to Products</a>
        </p>
    </div>
@endsection


 