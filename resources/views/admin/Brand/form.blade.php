
@csrf
<div class="form-row">
    <div class="form-group col-md-6">
        <label  class="control-label" for="brand_name">Name</label><span class="text-danger">*</span>
        <input type="text" class="form-control @error('brand_name') is-invalid @enderror" id="brand_name" name="brand_name"  value="{{ old('brand_name', $brand->brand_name ?? null) }}"/>
        @error('brand_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label  class="control-label" for="brand_description">Description</label><span class="text-danger">*</span>
        <input type="text" class="form-control" name="brand_description" id="brand_description" value="{{ old('brand_description', $brand->brand_description ?? null) }}"/>
        @error('brand_description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label  class="control-label" for="url">Url</label>
        <input type="text" class="form-control" name="url" id="url" value="{{ old('url', $brand->url ?? null) }}"/>
        @error('url')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group ml-4 text-center">
    <a href="{{ Route('Brand.index') }}" class="btn btn-dark text-white" data-dismiss="modal">Annuler</a>
    <input type="submit" value="sauvegarder" class="btn btn-success" />
</div>