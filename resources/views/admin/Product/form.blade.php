

 <div class="form-row">
            <div class="form-group col-md-4">
                <label  class="control-label" for="product_name">Name</label><span class="text-danger">*</span>
                <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name"  value="{{ old('product_name',$product->product_name ?? null) }}"/>
                @error('product_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label >Image</label><span class="text-danger">*</span>
                <input type="file"  multiple accept=".jpg, .png" class="custom-file-input @error('image') is-invalid @enderror mt-2" name="image" id="image" value="{{ old('image',$product->image ?? null) }}" />
                <label class="custom-file-label mt-4" for="image">Choose File .</label>
                @error('image')
                <div class="alert alert-danger mt-4">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label  class="control-label" for="product_price">Prix</label><span class="text-danger">*</span>
                <input type="text" class="form-control" name="product_price" id="product_price" value="{{ old('product_price',$product->product_price ?? null) }}"/>
                @error('product_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label  class="control-label" for="width">Width</label>
                <input type="text" class="form-control" name="width" id="width" value="{{ old('width',$product->width ?? null) }}"/>
            </div>
            <div class="form-group col-md-4">
                <label  class="control-label" for="height">Height</label>
                <input type="text" class="form-control" name="height" id="height" value="{{ old('height',$product->height ?? null) }}"/>
            </div>
            <div class="form-group col-md-4">
                <label  class="control-label" for="description">Description</label><span class="text-danger">*</span>
                <input type="text" class="form-control" name="description" id="description" value="{{ old('description',$product->description ?? null) }}"/>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="control-label" for="quantity">QuantityPr</label><span class="text-danger">*</span>
                <input class="form-control" name="quantity" id="quantity" value="{{ old('quantity',$product->quantity ?? null) }}"/>
                @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
         
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label  class="control-label" for="url">Url
                <input  class="form-control" name="url" id="url" value="{{ old('url',$product->url ?? null) }}"/>
                @error('url')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- <div class="form-group col-md-6">
                <label class="control-label" for="statusPr">Status</label><span class="text-danger">*</span>
                <input class="form-control" id="statusPr" name="statusPr"/>
            </div> -->
        </div>



    