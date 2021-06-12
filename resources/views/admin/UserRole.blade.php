@extends('master')

@section('title','users')

@section('content')

<div class="row">
          <div class="col-lg-12">
            <div class="card card-chart">
              <div class="card-header">
                 <h3>Table Users</h3>
                 <span class="float-left mr-0"><button type="button" id="btnAjouter" class="btn btn-info">Ajouter Role user</button></span>
             </div>
                <div class="card-body">
                <table class="table table-hover ">
                    <thead class="thead-dark">
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>User</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <form action="{{ url('Produit/addRole') }}" method="post">
                      @csrf
                    <input type="hidden" name="id" value="{{ $user->id  }}">
                    <tr>
                         <td>{{$user->getFullName()}}</td>
                          <td>{{$user->email}}</td>
                            <td>
                              <input type="checkbox" name="roleAdmin" id="role" onChange="this.form.submit()" {{ $user->hasRole('admin') ? 'checked':' ' }}>
                          </td>
                          <td>
                              <input type="checkbox" name="roleUser" id="role" onChange="this.form.submit()" {{ $user->hasRole('user') ? 'checked':' ' }}>
                          </td>
                          </tr>
                    </form>
                     @endforeach
                    </tbody>
                  </table>

              </div>
</div>
</div>
</div>

@endsection

 <!-- <span class="float-right mr-3">
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
                            </span> -->