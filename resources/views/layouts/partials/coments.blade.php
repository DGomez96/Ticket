
<div id="comentarios">
    <div class="card" style="background-color: transparent">
        <div class="card-header" style="padding:0px !important;">
          <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" style="color:white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Comentarios en este Ticket
            </button>
          </h2>
        </div>
    
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#comentarios">
          <div class="card-body">
            <div class="card-body msg_card_body">
                
                @foreach($coments as $coment)
                    @if($ticket->id == $coment->tick_id)
                        @if( $coment->user_id === 1)
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="{{asset('img/logo-only-monkey.png')}}" class="rounded-circle user_img_msg">
                                </div>
                                <div class="msg_cotainer">
                                    {{$coment->comment}}
                                    <span class="msg_time">{{$coment->created_at}}</span>
                                </div>
                            </div>
                            
                        @else
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    {{$coment->comment}}
                                    <span class="msg_time_send">{{$coment->created_at}}</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="{{asset('/img/client-img.png')}}" class="rounded-circle user_img_msg">
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach    
            </div>
          </div>
        </div>
    </div>
</div>
