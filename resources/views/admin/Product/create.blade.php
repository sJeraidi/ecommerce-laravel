


@extends('master')

@section('title','create Product')

@section('content')


<!-- enctype="multipart/form-data" -->
<div class="row">
<div class="card">
<div class="card-header">
        <h3>Create Product</h3>
</div>
<div class="card-body">
<div class="container">
    <form enctype="multipart/form-data"  method="post" action="{{ route('Produit.store') }}">
       @csrf
       
       @include('admin.Product.form')

        <div class="form-group ml-4 text-center">
            <a href="{{ route('Produit.index') }}" class="btn btn-dark text-white">Annuler</a>
            <input type="submit" value="sauvegarder" class="btn btn-success" />
        </div>
    </form>
</div>
</div>
</div>
</div>
@endsection


<!-- <script type="text/javascript">
        $(document).ready(function () {

            // $("#image").on("change", function () {
            //     var intputPhoto = $(this).val().split("\\").pop();
            //     $(this).next(".custom-file-label").html(intputPhoto);
            // });
            $('#test').on("click", function () {
                   console.log(test);
            });
       });
</script> -->

