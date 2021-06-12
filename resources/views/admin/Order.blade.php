@extends('master')

@section('title','Payment')

@section('content')

<div class="row">
          <div class="col-lg-12">
            <div class="card card-chart">
              <div class="card-header">
                 <h3>Table Commandes</h3>
                 <span class="float-left mr-0"><button type="button" id="btnAjouter" class="btn btn-info">Ajouter un Nouveau</button></span>
             </div>
                <div class="card-body">
                <table class="table table-hover ">
                    <thead class="thead-dark">
                      <tr>
                        <th>Total Commande</th>
                        <th>Statut Commande</th>
                        <th>Date Commande</th>
                
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
                         <td>{{$order->order_total}}</td>
                          <td>{{$order->order_status}}</td>
                          <td>{{$order->order_date}}
                          
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
                     @endforeach
                    </tbody>
                  </table>

              </div>
</div>
</div>
</div>

@endsection