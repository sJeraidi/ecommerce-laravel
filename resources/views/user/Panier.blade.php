@extends('layouts.app')

@section('title','Panier')

@section('extra-script')
<style>
/* #loader {
  margin: 40px;
}
.loader {
  margin: auto;
  border: 16px solid #e3e3e3;
  border-radius: 50%;
  border-top: 16px solid #1565c0;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
} */
</style>
@endsection

@section('content')
<div class="container">

  <h2 class="panel panel-info">
      <i class="fas fa-shopping-cart fa-lg"></i>
      Shopping Cart
  </h2>

  @if(session()->has('success'))
    <div class="alert alert-success text-white">{{ session()->get('success')  }}</div>
  @endif

  @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
          <li class="text-danger">{{ $error }}</li>
        @endforeach
    </ul>
  @endif

  @if(Cart::getContent()->count())
    <table class="table table-hover ">
        <thead class="thead-dark">
          <tr>
              <th>Image</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Quantité</th>
          </tr>
        </thead>
          <tbody>
          @forelse(Cart::getContent() as $product)
          <tr>
                <td>Image</td>
                <td class="text-canter">{{ $product->name }}</td>
                <td ><span id="price">{{ $product->price }}</span></td>

                <td>
                    <form style="display: inline-block;" action="{{ route('panier.update', $product->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="col m2 s12">
                        <input name="quantity" type="number" style="height: 2rem" min="1" value="{{ $product->quantity }}">
                      </div>
                    </form>
                    <form style="display:inline-block" action="{{ route('panier.destroy', $product->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                        <div class="col m1 s12">
                          <i class="fas fa-trash deleteItem text-danger" style="cursor: pointer">
                          </i>
                        </div>
                    </form>        
                  </td>
                </tr>

                @Empty
                <tr>
                    <td colspan='4'>
                        <p class="alert alert-danger text-center">Not Cart</p>
                    </td>
                </tr>
            @endforelse
          </tbody>
    </table>
    <div>
      <div>
          <h1>Détails de la commande</h1>
      </div>
      <div>
        <table class="table">
            <tr>
                <td>Sous-total</td>
                <td>{{ getPrice(Cart::getSubTotal()) }}</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td>{{ getPrice(10) }}</td>
            </tr>
            <tr class="alert alert-success text-white">
                <td>Total</td>
                <td><b>{{ getPrice(Cart::getTotal() + 10) }}</b></td>
            </tr>
        </table>
      </div>
      <a href="{{ route('paiement.index') }}" class="btn btn-primary">Passer à la caisse</a>
  </div>
  @else
    <p class="alert alert-info">Votre panier est vide.</p>
  @endif
<!--   
  <div id="loader" class="hide">
    <div class="loader"></div>
  </div>    -->
</div>
@endsection

@section('extra-js')
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const quantities = document.querySelectorAll('input[name="quantity"]');
      quantities.forEach( input => {
        input.addEventListener('input', e => {
          if(e.target.value < 1) {
            e.target.value = 1;
          } else {
            e.target.parentNode.parentNode.submit();
            document.querySelector('#wrapper').classList.add('hide');
            document.querySelector('#action').classList.add('hide');
            document.querySelector('#loader').classList.remove('hide');
          }
        });
      }); 
      const deletes = document.querySelectorAll('.deleteItem');
      deletes.forEach( icon => {
        icon.addEventListener('click', e => {
          e.target.parentNode.parentNode.submit();
          document.querySelector('#wrapper').classList.add('hide');
          document.querySelector('#loader').classList.remove('hide');
        });
      }); 
    });
    
  </script>
@endsection


