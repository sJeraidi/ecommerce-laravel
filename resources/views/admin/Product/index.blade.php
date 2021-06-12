@extends('master')

@section('title','Products')

@section('content')

<div class="row">
          <div class="col-lg-12">
            <div class="card card-chart">
              <div class="card-header">
                 <h3 style="display:inline" class="">Table Produits</h3>
                 <a href="{{ route('Produit.create') }}" class="btn btn-primary float-right">Create Product</a>
              </div>
              <div class="card-body">
              <nav class="nav nav-tabs nav-stacked my-2">
                <a href="/Produit"  class="nav-link @if($tab=='list') active @endif">List</a>
                <a href="/Produit/archive" class="nav-link @if($tab=='archive') active @endif">Archive</a>
                <a href="/Produit/all" class="nav-link @if($tab=='all') active @endif">All</a>
              </nav>
              <div>
                      <p class="text-dark ml-2">{{ $products->count() }} Products(s)</p class="text-dark ml-2">
                  </div>
                      <table class="table table-hover">
                          <thead class="thead-dark">
                            <tr>
                              <th>Produit</th>
                              <th>Image</th>
                              <th>Prix</th>
                              <th>Quantité</th>
                            </tr>
                          </thead>
                        <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td>{{$product->product_name}}</td>
                              <td><img src="/storage/{{ $product->image }}" alt="{{$product->image}}" style="width:100px;height:100px"></td>
                              <td>{{$product->getPrice()}}</td>
                              <td>{{$product->quantity}}

                                @if($product->deleted_at)
                                <span class="float-right mr-3">
                                <form style="display:inline" action="{{ url('Produit/'.$product->product_id.'/restory') }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <span class="float-right mr-3">
                                      <button type="submit" class="btn btn-success">
                                          Restory
                                      </button>
                                      </span>
                                </form>
                                </span>
                                <span class="float-right mr-3">
                                <form class="inline" action="{{ url('/Produit/'.$product->product_id.'/forcedelete') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Force delete</button>
                                    </form>
                                  </span>
                                  @else
                              
                              <span class="float-right mr-3">
                                <a href="{{ route('Produit.show', $product->product_id) }}" class="text text-primary">
                                <i class="far fa-eye"></i>
                                </a>
                              </span>
                              <span class="float-right mr-3">
                                <a href="{{ route('Produit.edit', $product->product_id) }}" class="text text-success">
                                <i class="far fa-edit"></i>
                                </a>
                              </span>
                              <span class="float-right mr-3">
                              <form style="display:inline" action="{{ route('Produit.destroy',$product->product_id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                                <button type="submit" class="btn btn-light">
                                <i class="fas fa-trash-alt text-danger"></i>
                                </button>
                                </form>
                                </span>
                              @endif
                              </td>
                              </tr>
                              
                              
                              @Empty
                              <p class="alert alert-danger text-center">Not Product</p>
                        @endforelse
                        </tbody>
                    </table>
                  </div>
            </div>
      </div>
</div>

@endsection