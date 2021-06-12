@extends('master')

@section('title','Brands')

@section('content')

<div class="row">
      <div class="col-lg-12">
          <div class="card card-chart">
              <div class="card-header">
                 <h3 style="display:inline" class="">Table Brands</h3>
                 <a href="{{ route('Brand.create') }}" class="btn btn-primary float-right">Create Brand</a>
              </div>
              <div class="card-body">
                <nav class="nav nav-tabs nav-stacked my-2">
                  <a href="/Brand"  class="nav-link @if($tab=='list') active @endif">List</a>
                  <a href="/Brand/archive" class="nav-link @if($tab=='archive') active @endif">Archive</a>
                  <a href="/Brand/all" class="nav-link @if($tab=='all') active @endif">All</a>
                </nav>
                @if(session()->has('status'))
                  <p class="alert alert-success text-white">{{ session()->get('status')  }}</p>
                @endif
                <table class="table table-hover ">
                    <thead class="thead-dark">
                      <tr>
                        <th>Nom Marques</th>
                        <th>Description marque</th>
                        <th>status</th>
                        <th>url</th>
                      </tr>
                    </thead>
                  <tbody>
                  @forelse($brands as $brand)
                  <tr>
                        <td>{{$brand->brand_name}}</td>
                        <td>{{$brand->brand_description}}</td>
                        <td>{{$brand->status}}</td>
                        <td>{{$brand->url}}

                          @if($brand->deleted_at)
                              <span class="float-right mr-3">
                                <form style="display:inline" action="{{ url('Brand/'.$brand->brand_id.'/restory') }}" method="POST">
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
                                <form class="inline" action="{{ url('/Brand/'.$brand->brand_id.'/forcedelete') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer la marque ?')" type="submit">Force delete</button>
                                </form>
                              </span>

                              @else

                              <span class="float-right mr-3">
                                <a href="{{ route('Brand.edit',$brand->brand_id) }}" class="text text-success">
                                  <i class="far fa-edit"></i>
                                </a>
                              </span>

                              <span class="float-right mr-3">
                                <form style="display:inline" action="{{ route('Brand.destroy',$brand->brand_id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                    <button type="submit" class="btn btn-light" onclick="return confirm('voulez vous vraiment supprimer la marque ?');">
                                      <i class="fas fa-trash-alt text-danger"></i>
                                    </button>
                                </form>
                              </span>

                            @endif
                        </td>
                        </tr>
                        @Empty
                        <tr>
                            <td colspan="4">
                                <p class="alert alert-danger text-center">Not Brand !</p>
                            </td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
          </div>
      </div>
</div>

@endsection