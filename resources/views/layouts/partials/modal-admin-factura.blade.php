<div class="modal fade" id="crearF" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #343a40">
          <h5 class="modal-title" id="exampleModalLabel" style="color:white">Subir Factura!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <style>
            .label-inline {
                /* Other styling... */
                text-align: right !important;
                clear: both !important;
                float:left !important;
                margin-right:15px !important;
            }
        </style>
        <form method="POST" action="{{ route('storeI') }}" enctype="multipart/form-data">
            @csrf
            <div class="custom-file">
                <input type="file" name="files[]" class="custom-file-input" id="inputGroupFile01"
                aria-describedby="inputGroupFileAddon01" multiple>
                <label class="custom-file-label" required for="inputGroupFile01">Subir Archivo</label>
            </div>
            <div style="margin-top:1%">

            </div>
            <div class="form-group">
                <label class="label-inline">Cliente</label>
                <select class="form-control" required name="user"  style="width: 80%">
                    @foreach ($users as $user)
                      <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" style="width: 100%;margin-bottom:-5%" type="submit" value="Subir Factura">
            </div>
        </form>
      </div>
    </div>
</div>

<!--Cambiar Estado --> 
<div class="modal fade" id="cambiarInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #343a40">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white">Cambiar Estado de la Factura!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" method="POST"  action="{{url('changeSF')}}" >
          
          <div class="modal-body">
              @csrf    
              <input type="text" hidden name="idTicket"  id="idTicket" value="">
              <div class="form-group">
                  <label>Selecciona Estado</label>
                  <select required class="form-control" name="status">
                    <option value="pending">Pendiente</option>
                    <option value="paid">Pagado</option>
                  </select>
              </div>

          </div>
          <div class="modal-footer">
              <input type="submit"  class="btn btn-primary" value="Cambiar"/>
          </div>
      </form>
    </div>
  </div>
</div>