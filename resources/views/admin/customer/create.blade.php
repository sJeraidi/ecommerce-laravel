
@extends('master')

@section('title','create Customer')

@section('content')


<!-- enctype="multipart/form-data" -->
<div class="row">
<div class="card">
<div class="card-header">
        <h3>Create Client</h3>
</div>
<div class="card-body">
<div class="container">
    <form enctype="multipart/form-data"  method="post" action="{{ route('Client.store') }}">
       @csrf
       
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

