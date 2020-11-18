<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Tus Tickets
                    <button type="button" style="float:right" class="btn btn-primary" data-toggle="modal" data-target="#crearTicket">Crear Ticket</button>                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                          <div class="list-group" id="list-tab" role="tablist">
                            @foreach ($tickets as $i => $ticket)
                                @if($i === 0)
                                    <a class="list-group-item list-group-item-action active"  id="list-home-list" data-toggle="list" href="#a{{$ticket->id}}" role="tab" aria-controls="{{$ticket->id}}">
                                        {{$i+1}} º.- Ticket [{{$ticket->created_at->toDateString()}}]
                                    </a>
                                @else
                                    <a class="list-group-item list-group-item-action "   id="list-home-list" data-toggle="list" href="#a{{$ticket->id}}" role="tab" aria-controls="{{$ticket->id}}">
                                        {{$i+1}} º.- Ticket [{{$ticket->created_at->toDateString()}}]
                                    </a>
                                @endif
                            @endforeach
                          </div>
                        </div>
                        <div class="col-8">
                          <div class="tab-content" id="nav-tabContent">
                            @foreach ($tickets as $i => $ticket)
                                @if($i == 0)
                                    <div class="tab-pane fade show active" aria-labelledby="{{$ticket->id}}" id="a{{$ticket->id}}" role="tabpanel">
                                        <div class="card text-white bg-primary mb-3" style="max-width: 40rem;">
                                            <div class="card-header">
                                                <div class="info-h">
                                                    <span style="float:left;font-size:0.8em;position:absolute;top:0px;left:2px">{{$user->email}}</span><br>
                                                <span style="float:left;font-size:0.8em;position:absolute;top:15px;left:2px">Estado -> <span style="{{$ticket->status == 'pending' ? 'color:yellow' : 'color:green' }}">{{ $ticket->status == 'pending' ? 'Resolución en Proceso' : 'Finalizado'}}</span></span>    
                                                </div>
                                                <span style="float:left;font-size:0.8em;position: absolute;top:7%;right:1%">
                                                Archivos  ->
                                                    @foreach($resources as $r)
                                                        @if($r->tick_id == $ticket->id)
                                                                <a href="{{$r->Path}}" download>Descarga aquí</a>,
                                                        @endif
                                                    @endforeach
                                                </span> 

                                                <span style="float:right;font-size:0.8em;position: absolute;top:0%;right:1%"> Creado {{$ticket->created_at}} </span>    
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text text-white">{{$ticket->description}}</p>
                                                @include('layouts.partials.coments')

                                            </div>
                                            <div class="card-footer" style="padding:1px">
                                                <button type="button"  style="float:left"  class="btn btn-dark" id="commentButton" data="{{$ticket->id}}">Comentar</button>                    
                                            </div>
                                        </div>   
                                    </div>      
                                @else
                                    <div class="tab-pane fade " aria-labelledby="{{$ticket->id}}" id="a{{$ticket->id}}" role="tabpanel">
                                        <div class="tab-pane fade show active" aria-labelledby="{{$ticket->id}}" id="a{{$ticket->id}}" role="tabpanel">
                                            <div class="card text-white bg-primary mb-3" style="max-width: 40rem;">
                                                <div class="card-header">
                                                    <div class="info-h">
                                                        <span style="float:left;font-size:0.8em;position:absolute;top:0px;left:2px">{{$user->email}}</span><br>
                                                    <span style="float:left;font-size:0.8em;position:absolute;top:15px;left:2px">Estado -> <span style="{{$ticket->status == 'pending' ? 'color:yellow' : 'color:green' }}">{{ $ticket->status == 'pending' ? 'Resolución en Proceso' : 'Finalizado'}}</span></span>    
                                                    </div>
                                             
                                                    <span style="float:right;font-size:0.8em;position: absolute;top:0%;right:1%"> Creado {{$ticket->created_at}} </span>    

                                                    <span style="float:left;font-size:0.8em;position: absolute;top:7%;right:1%">
                                                        Archivos  ->
                                                            @foreach($resources as $r)
                                                                @if($r->tick_id == $ticket->id)
                                                                        <a href="{{$r->Path}}" download>Descarga aquí</a>,
                                                                @endif
                                                            @endforeach
                                                    </span> 
                                                    
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text text-white">{{$ticket->description}}</p>
                                                    @include('layouts.partials.coments')

                                                </div>
                                                <div class="card-footer" style="padding:1px">
                                                <button class="btn btn-dark" id="commentButton" identificador="{{$ticket->id}}" style="float:right">Añadir Comentarios</button>
                                                </div>
                                            </div>   
                                        </div>   
                                    </div> 
                                @endif
                            @endforeach
                          </div>
                        </div>
                    </div>               
                </div>
            </div>
        </div>

        
    </div>
</div>