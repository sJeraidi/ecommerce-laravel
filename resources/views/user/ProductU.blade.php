@extends('layouts.app')

@section('title','Produits')

@section('content')

<!-- <div class="container-fluid px-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed">
        <div class="container-fluid d-flex"> <a class="navbar-brand" href="#">SiteBack</a>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation"> <a class="nav-link active text-dark" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Couches</a> </li>
                <li class="nav-item" role="presentation"> <a class="nav-link text-dark" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Chair</a> </li>
                <li class="nav-item" role="presentation"> <a class="nav-link text-dark" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Dining</a> </li>
            </ul>
        </div>
    </nav>
</div> -->

<div class="container-fluid  mb-5">
    <div class="products">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                @if(session()->has('success'))
                        <div class="alert alert-success text-white">{{ session()->get('success')  }}</div>
                @endif
                <div class="row g-3">
                    @forelse($products as $product)
                        <div class="col-md-4">
                            <div class="card"> <a  href="{{ url('/Produits/Details', $product->product_id) }}">
                                <img src="/storage/{{ $product->image }}" height="255" class="card-img-top"></a>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <span class="font-weight-bold">{{ $product->product_name }}</span>
                                        <span class="font-weight-bold">{{ $product->getPrice() }}</span>
                                    </div>
                                    <p class="card-text mb-1 mt-1">{{ $product->description }}</p>
                                    <div class="d-flex align-items-center flex-row">
                                        <img src="https://i.imgur.com/e9VnSng.png" width="20">
                                        <span class="guarantee">{{ $product->created_at }}</span>
                                    </div>
                                </div>
                                <div class="text-right buttons m-2">
                                    <a  href="{{ route('product.details', $product->product_id)  }}" class="btn btn-outline-dark">View </a>
                                    <form style="display:inline" action="{{ route('panier.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                        <button type="submit" class="btn btn-dark">Add to cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @Empty
                        <div class="alert alert-danger text-center my-auto">Not Product !!</div>

                    @endforelse
                </div>

                <div class="paginate">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
