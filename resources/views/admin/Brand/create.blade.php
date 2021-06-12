


@extends('master')

@section('title','create Brand')

@section('content')


<!-- enctype="multipart/form-data" -->
<div class="row">
    <div class="card">
        <div class="card-header">
                <h3>Create Brand</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <form   method="post" action="{{ route('Brand.store') }}">
                    @include('admin.Brand.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection