@extends('master')

@section('title','Customers')

@section('content')

<div class="row">
<div class="col-lg-12">
<div class="card card-chart">
          <div class="card-header">
          <div>
                <div>
                <h3>Table Clients</h3>
                    <a href="{{ route('Client.create') }}" class="btn btn-primary">Ajouter un Nouveau</a>
                  </div>
                <div class="card-body">
                
                @if(session()->has('status'))

                    <div class="alert alert-success text-white my-2">{{ session()->get('status')  }}</div>

                @endif
               <table class="table table-hover">
                    <thead class="thead-dark">
                      <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adress</th>
                        <th>Téléphone</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($customers as $customer)
                    <tr>
                         <td>{{ $customer->first_name }}</td>
                          <td>{{ $customer->last_name }}</td>
                          <td>{{ $customer->Adresse }}</td>
                          <td>{{ $customer->phone }}
                          <span class="float-right mr-3">
                            <a href="#" style="color:blue">
                            <i class="far fa-eye"></i>
                            </a>
                          </span>
                          <span class="float-right mr-3">
                            <a href="{{ route('Client.edit', $customer->id) }}" style="color:green">
                            <i class="far fa-edit"></i>
                            </a>
                          </span>
                            <span class="float-right mr-3">
                              <form style="display:inline" onsubmit="return confirm('Voulez-vous vraiment supprimer ce client')" action="{{ route('Client.destroy',$customer->id) }}" method="POST">
                              @csrf
                              @method('DELETE')

                                <button type="submit" class="btn btn-default">
                                <i class="fas fa-trash-alt text-danger"></i>
                                </button>
                                </form>
                            </span>
                          </td>
                          </tr>
                     @endforeach
                      
                    </tbody>
                  </table>
              </div>
             
</div>
</div>
</div>


@endsection