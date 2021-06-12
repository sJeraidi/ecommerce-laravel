


@extends('master')

@section('title','show Product ')

@section('content')


<!-- enctype="multipart/form-data" -->
<div class="row">
<div class="card">
<div class="card-header">
        <h3 style="display:inline">Show Product</h3>
        <a class="float-right mr-5 mt-3" href="{{ url('/Produit') }}"><i class="fas fa-times text-danger"></i></a>
</div>
<div class="card-body">
<div class="ml-2">
            <div class="form-group text-center">
                <label class="text-danger"> N°Product :</label><br />
                <label>{{ $product->product_id}}</label>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 text-center">
                    <label class="text-danger">Name</label><br />
                    <label>{{ $product->product_name}}</label>
                </div>
                <div class="form-group col-md-4 text-center">
                    <label class="text-danger">Image </label><br />
                    <label><img src="\storage\{{$product->image}}" style="width:70px;height:70px"/></label>
                </div>
                <div class="form-group col-md-4 text-center">
                    <label class="text-danger">Price</label><br />
                    <label>{{ $product->product_price }}</label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 text-center">
                    <label class="text-danger">Quantite</label><br />
                    <label>{{ $product->quantity }}</label>
                </div>
                <div class="form-group col-md-4 text-center">
                    <label class="text-danger">Description</label><br />
                    <label>{{ $product->description }}</label>
                </div>
                <div class="form-group col-md-4 text-center">
                    <label class="text-danger">Url</label><br />
                    <label> {{ $product->url }}</label>
                </div>
            </div>

        </div>
</div>
</div>
</div>
@endsection




