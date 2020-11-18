@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Facturas
                    @if(Auth::id() ==1 )
                      <button class="btn btn-success" data-toggle="modal" data-target="#crearF" style="float: right;">Subir Factura</button>
                    @endif
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Factura</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Precio</th>
                            @if(Auth::id() == 1)
                              <th scope="col">Cliente</th>
                            @endif
                            <th scope="col">
                                Estado Factura
                            </th>
                            <th scope="col"> Descargar </th>
                            @if(Auth::id() == 1)
                              <th scope="col">Acciones</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($invoices as $invoice)
                            <tr>
                              <td>{{$invoice->id}}</td>
                              <td>{{$invoice->date}}</td>
                              <td>{{$invoice->price}} €</td>
                              @if(Auth::id() == 1)
                                <td>{{$invoice->name_client}}</td> 
                              @endif               
                              <td>
                                {{ $invoice->status == 'pending' ? 'Pendiente de Pago' : 'Pagada'}}
                              </td>
                              <td><a href="{{asset($invoice->path)}}" download="{{$invoice->name}}">Descarga!</a></td>
                              @if(Auth::id() == 1)
                                <td>
            
                                  <button type="button"  style="float:right" data="{{$invoice->id}}" class="btn btn-warning" id="statusButtonF">
                                    Cambiar Estado
                                  </button>                    

                                </td> 
                              @endif       
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@if(Auth::id() == 1)
  @include('layouts.partials.modal-admin-factura')
@endif
@endsection