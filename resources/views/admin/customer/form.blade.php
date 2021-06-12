

 <div class="form-row">
            <div class="form-group col-md-6">
                <label  class="control-label" for="first_name">First Name</label><span class="text-danger">*</span>
                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name"  value="{{ old('first_name', $customer->first_name ?? null) }}"/>
                @error('first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label  class="control-label" for="last_name">Last Name</label><span class="text-danger">*</span>
                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name"  value="{{ old('last_name', $customer->last_name ?? null) }}"/>
                @error('last_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label  class="control-label" for="phone">phone</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone', $customer->phone ?? null) }}"/>
            </div>
            <div class="form-group col-md-6">
                <label  class="control-label" for="Adresse">Adresse</label>
                <input type="text" class="form-control" name="Adresse" id="Adresse" value="{{ old('Adresse', $customer->Adresse ?? null) }}"/>
            </div>
        </div>



    