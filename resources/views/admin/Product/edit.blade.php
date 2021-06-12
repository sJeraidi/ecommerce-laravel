


@extends('master')

@section('title','update Product ')

@section('content')


<!-- enctype="multipart/form-data" -->
<div class="row">
    <div class="card">
        <div class="card-header">
                <h3>Update Product</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <form   method="post" action="{{ route('Produit.update', $product->product_id) }}">
                @csrf
                @method('PUT')

                @include('admin.Product.form')

                    <div class="form-group ml-4 text-center">
                        <a asp-action="Index" class="btn btn-dark text-white" data-dismiss="modal">Annuler</a>
                        <input type="submit" value="sauvegarder" class="btn btn-warinig" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection




