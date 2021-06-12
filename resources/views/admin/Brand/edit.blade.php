
@extends('master')

@section('title','update Brand')

@section('content')

<div class="row">
    <div class="card">
        <div class="card-header">
            <h3>Update Brand</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <form   method="post" action="{{ route('Brand.update', $brand->brand_id) }}">
                @method('PUT')
                      @include('admin.Brand.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection