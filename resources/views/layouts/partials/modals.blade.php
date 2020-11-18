<!-- Modales -->

<!--Cambiar Estado --> 
<div class="modal fade" id="cambiar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #343a40">
          <h5 class="modal-title" id="exampleModalLabel" style="color:white">Cambiar Estado del Ticket!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" method="POST"  action="{{action('App\Http\Controllers\TicketController@changeS')}}" >
            
            <div class="modal-body">
                @csrf    
                <input type="text" hidden name="idTicket"  id="idTicket" value="">
                <div class="form-group">
                    <label>Selecciona Estado</label>
                    <select required class="form-control" name="status">
                      <option value="pending">Pendiente</option>
                      <option value="finalized">Finalizado</option>
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

<!--Comentar --> 
<div class="modal fade" id="comentarTicket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header" style="background-color: #343a40">
      <h5 class="modal-title" id="exampleModalLabel" style="color:white">Comentando en el Ticket!</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form role="form" method="POST"  action="{{action('App\Http\Controllers\TicketController@commentS')}}" >
        
        <div class="modal-body">
            @csrf
            <input type="text" hidden name="idTicket"  id="idTicketComentario" value="">

            <div class="form-group">
                <label for="descript">Comentario</label>
                <input type="text" required class="form-control" name="comen"/>
            </div>

        </div>
        <div class="modal-footer">
            <input type="submit"  class="btn btn-primary" value="Comentar"/>
        </div>
    </form>
  </div>
</div>
</div>
<!--Crear Tickets-->
<div class="modal fade" id="crearTicket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Crea tu Ticket!</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form role="form" method="POST"  action="{{action('App\Http\Controllers\TicketController@store')}}" enctype="multipart/form-data">
        <div class="modal-body">
            @csrf
            <div class="form-group">
                <label for="descript">Descripcion</label>
                <textarea class="form-control" required name="description" id="descript" rows="3"></textarea>
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Envianos tus Imagenes o Documentos</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="files[]" class="custom-file-input" id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01" multiple>
                    <label class="custom-file-label" for="inputGroupFile01">Subir Archivo</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Crear"/>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </form>
  </div>
</div>
</div>