@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Usuarios de la Plataforma
                    <button class="btn btn-success" data-toggle="modal" data-target="#crearU" style="float: right;">Añadir Usuario</button>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($users as $user)
                        <li class="list-group-item list-group-item-info">
                            {{$user->name}}
                        </li>  
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.partials.modal-admin')
@endsection