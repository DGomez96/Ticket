<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tickets de Clientes</div>
                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif  

                        @foreach($users as $u)
                            <div id="accordion-{{$u->id}}">
                                <div class="card" id="card-{{$u->id}}">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#u-{{$u->id}}" aria-expanded="true" aria-controls="collapseOne">
                                                Cliente -> {{$u->name}}
                                            </button>
                                        </h5>
                                    </div>
                                
                                    <div id="u-{{$u->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion-{{$u->id}}">
                                        @foreach ($tickets as $ticket)
                                        <div id="tA-{{$u->id}}-{{$ticket->id}}">
                                                @if($ticket->user_id == $u->id)
                                                    <div class="card-body">
                                                        <div class="card" style="margin:-2% !important" >
                                                        <div class="card-header" style="background-color: {{$ticket->status == 'pending' ? 'yellow' : '#9ede7b'}}" id="headingOne">
                                                                <h5 class="mb-0" >
                                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#c{{$u->id}}-{{$ticket->id}}" aria-expanded="true" aria-controls="collapseOne">
                                                                        
                                                                        <span style="position: absolute;top:2%;left:2%">
                                                                            Fecha  -> {{$ticket->created_at}}<br>
                                                                        </span> 

                                                                        <span style="position: absolute;top:30%;right:2%">
                                                                            Propietario  -> {{$u->name}}<br>
                                                                        </span> 

                                                                        <span style="position: absolute;top:2%;right:2%">
                                                                            Estado  -> {{$ticket->status == 'pending' ? 'Pendiente' : 'Finalizado'}}<br>
                                                                        </span> 


                                                                    </button>
                                                                </h5>
                                                            </div>
            
                                                            <div id="c{{$u->id}}-{{$ticket->id}}" style="margin-bottom:-2.2%" class="collapse" aria-labelledby="headingOne" data-parent="#tA-{{$u->id}}-{{$ticket->id}}">
                                                                
                                                                <div class="card text-white bg-primary mb-3" style="max-width: 80rem;">
                                                                    <div class="card-header">
                                                                        <div class="info-h">
                                                                            <span style="float:left;font-size:0.8em;position:absolute;top:0px;left:2px">{{$u->email}}</span><br>
                                                                        <span style="float:left;font-size:0.8em;position:absolute;top:15px;left:2px">Estado -> <span style="font-weight:bold;{{$ticket->status == 'pending' ? 'color:yellow' : 'color:#9ede7b' }}">{{ $ticket->status == 'pending' ? 'Resolución en Proceso' : 'Finalizado'}}</span></span>    
                                                                                                                              
                                                                        <span style="float:right;font-size:0.8em;position: absolute;top:0%;right:1%"> Creado {{$ticket->created_at}} </span>               </div>

                                                                    </div>
                                                                    <div class="card-body">
                                                                        <p class="card-text text-white">{{$ticket->description}}</p>
                                                                        @include('layouts.partials.coments')

                                                                    </div>
                                                                    <div class="card-footer" style="padding:1px">
                                                                        <button type="button"  style="float:left" data="{{$ticket->id}}" class="btn btn-dark" id="commentButton">Comentar</button>                    

                                                                        <button type="button"  style="float:right" data="{{$ticket->id}}" class="btn btn-warning" id="statusButton">Cambiar Estado</button>                    
                                                                    </div>
                                                                </div>   
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach    
                </div>
            </div>
        </div>
    </div>