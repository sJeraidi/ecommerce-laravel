


@extends('master')

@section('title','create Product')

@section('content')


<!-- enctype="multipart/form-data" -->
<div class="row">
<div class="card">
<div class="card-header">
        <h3>Create Category</h3>
</div>
<div class="card-body">
<div class="container">
    <form   method="post" action="{{ route('Categorie.store') }}">
       @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label  class="control-label" for="category_name">Name</label><span class="text-danger">*</span>
                <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name"  value="{{ old('category_name') }}"/>
                @error('category_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label  class="control-label" for="category_description">Description</label><span class="text-danger">*</span>
                <input type="text" class="form-control" name="category_description" id="category_description" value="{{ old('category_description') }}"/>
                @error('category_description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label  class="control-label" for="url">Url</label>
                <input type="text" class="form-control" name="url" id="url" value="{{ old('url') }}"/>
                @error('url')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- <div class="form-group col-md-4">
                <label  class="control-label" for="height">Height</label>
                <input type="text" class="form-control" name="height" id="height" value="{{ old('height') }}"/>
            </div> -->
        </div>

        <div class="form-group ml-4 text-center">
            <a asp-action="Index" class="btn btn-dark text-white" data-dismiss="modal">Annuler</a>
            <input type="submit" value="sauvegarder" class="btn btn-success" />
        </div>
    </form>
     
</div>
</div>
</div>
</div>
@endsection