@extends('layouts.app')

@section('title','Product Details')

@section('extra-script')

<style>
.guarantee{
  /* font-weight: bold; */
  text-align: center;
  margin:0 0.2rem;
  padding:3px 10px;
  background-color:lightgray;
  border:gray 1px groove;
  border-radius:5px;
  color: burlywood;
}
</style>

@endsection

@section('content')

<!--Section: Block Content-->
<section class="m-5">
  <div class="row">
    <div class="col-md-6 mb-4 mb-md-0">
      <div id="mdb-lightbox-ui"></div>
      <div class="mdb-lightbox">
        <div class="row product-gallery mx-1">
          <div class="col-12 mb-0">
            <figure class="view overlay rounded z-depth-1 main-img">
                <img src="/storage/{{ $product->image }}" class="img-fluid z-depth-1" style="width:90%;height:300px">
              </a>
            </figure>
          </div>
        </div>

      </div>

    </div>
    <div class="col-md-6">
      <div class="badge badge-pill badge-info text-white">
        {{ $stock }}
      </div>
      <h5>{{ $product->product_name  }}</h5>
      <h2 class="text text-success">{{ $product->getPrice() }}</h2>
      <p class="pt-1">{{ $product->description }}.</p>
      <p class=""><span class="guarantee">Category</span><span class="guarantee">Brand</span></p>
      <div class="table-responsive">
        <table class="table table-sm table-borderless mb-0">
          <tbody>
            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Model</strong></th>
              <td>Shirt 5407X</td>
            </tr>
            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Color</strong></th>
              <td>Black</td>
            </tr>
            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Delivery</strong></th>
              <td>USA, Europe</td>
            </tr>
          </tbody>
        </table>
      </div>
      <hr>
      <div class="table-responsive mb-2">
        @if($stock === "Disponible")
        <form style="display:inline" action="{{ route('panier.add') }}" method="POST">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->product_id }}">
          <table class="table table-sm table-borderless">
            <tbody>
              <tr>
                <td class="pb-0">Select size</td>
              </tr>
              <tr>
                <td class="pl-0">
                  <div class="def-number-input number-input safari_only mb-0">
                    <input  value="1" min="1" max="{{ $product->quantity }}" name="quantity"  type="number">
                    @if($errors->any())
                      <ul>
                          @foreach($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                          @endforeach
                      </ul>
                    @endif
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                    <a href="/Produits" class="btn btn-primary btn-md mr-1 mb-2">go back product</a>
                    <button type="submit" class="btn btn-warning btn-md mr-1 mb-2">
                    <i class="fas fa-shopping-cart pr-2"></i>Add to cart</button>
                </td>
              </tr>
            </tbody>
          </table>
        </form>
        @endif
      </div>
      
      
    </div>
  </div>

</section>
<!--Section: Block Content-->

@endsection

