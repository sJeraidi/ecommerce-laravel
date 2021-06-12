
@extends('master')

@section('title','update Customer')

@section('content')

<div class="row">
    <div class="card">
        <div class="card-header">
                <h3>Create Client</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <form  method="post" action="{{ route('Client.update', $customer->id) }}">
                    @csrf
                    @method('PUT')

                    @include('admin.customer.form')

                    <div class="form-group ml-4 text-center">
                        <a href="{{ route('Client.index') }}" class="btn btn-dark text-white">Annuler</a>
                        <input type="submit" value="sauvegarder" class="btn btn-success" />
                    </div>
                </form>
            </div>
        </div>
    </div>  
</div>
@endsection

