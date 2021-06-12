@extends('master')

@section('title','Category')

@section('content')

<div class="row">
          <div class="col-lg-12">
            <div class="card card-chart">
              <div class="card-header">
                 <h3 style="display:inline" class="">Table Category</h3>
                 <a href="{{ route('Categorie.create') }}" class="btn btn-primary float-right">Create Category</a>
             </div>
                <div class="card-body">
                <nav class="nav nav-tabs nav-stacked my-2">
                    <a href=""  class="nav-link ">List</a>
                    <a href="" class="nav-link ">Archive</a>
                    <a href="" class="nav-link ">All</a>
                </nav>
                <table class="table table-hover ">
                    <thead class="thead-dark">
                      <tr>
                        <th>Categorie</th>
                        <th>description</th>
                        <th>status</th>
                        <th>url</th>
                
                      </tr>
                    </thead>
                    <tbody>
                    @forelse($categorys as $category)
                    <tr>
                         <td>{{$category->category_name}}</td>
                          <td>{{$category->category_description}}</td>
                          <td>{{$category->status}}</td>
                          <td>{{$category->url}}
                           <span class="float-right mr-3">
                            <a href="#" style="color:blue">
                            <i class="far fa-eye"></i>
                            </a>
                          </span>
                          <span class="float-right mr-3">
                            <a href="#" style="color:green">
                            <i class="far fa-edit"></i>
                            </a>
                          </span>
                          <span class="float-right mr-3">
                            <a href="#" style="color:red">
                            <i class="fas fa-trash-alt"></i>
                            </a>
                            </span>
                          </td>
                        </tr>
                          
                          @Empty
                          <p class="alert alert-danger text-center">Not Category</p>
                     @endforelse
                    </tbody>
                  </table>

              </div>
</div>
</div>
</div>

@endsection