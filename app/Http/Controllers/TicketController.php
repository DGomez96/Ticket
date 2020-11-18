<?php

namespace App\Http\Controllers;

//MODELOS
use App\Models\Ticket;
use App\Models\Resource;
use App\Models\Comments;
use App\Notifications\CustomResetPassword;
use Illuminate\Http\Request;

//MAIL
use App\Mail\TicketEmail;
use Illuminate\Support\Facades\Mail;
use Auth;
class TicketController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        //Request
        $description = $request->only(['description']);

        $files = $request->only(['files']);
        //Cojo la ID del usuario autenticado
        $id = Auth::id();

        //Creando ticket
        $ticket = new Ticket();

        $ticket->description = $description['description'];
        $ticket->status = 'pending';
        $ticket->user_id = $id;
        $ticket->created_at= NOW();
        $ticket->updated_at=null;

        $ticket->save();
        

        $lastIdT= $ticket->id;

        if(!empty($files)){
            //Tratamiento de Archivos 
            $files = $files['files'];

            $destination = 'storage/ticket-document/';

            foreach ($files as $index => $file) {
                //creo la entrada en la bbdd
                $res = new Resource();
                $res->path = $destination.$file->getCLientOriginalName();
                $res->tick_id = $lastIdT;
                $res->user_id = $id;
                //Subo al server
                $file->move($destination,$file->getCLientOriginalName());

                $res->save();

            }
            //Resource from Ticket

            return redirect()->action('App\Http\Controllers\HomeController@index');
        }
    

        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'SenderUserName';
        $objDemo->receiver = 'ReceiverUserName';
 
        Mail::to('jokereported@gmail.com')->send(new TicketEmail($objDemo));        //Resource from Ticket

        return redirect()->action('App\Http\Controllers\HomeController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    /**
     * Comentarios Storage
     */
    public function commentS(Request $request){

        $idT = $request->all(['idTicket']);
        $idT = $idT['idTicket'];

        $comentario = $request->all(['comen']);
        $comentario = $comentario['comen'];
        $idU = Auth::id();
        $coment = new Comments();

        $coment->comment = $comentario;
        $coment->user_id = $idU;
        $coment->created_at=NOW();
        $coment->tick_id = $idT;

        $coment->save();

        return redirect()->action('App\Http\Controllers\HomeController@index');

    }

    /**
     * Camiar estado
     */
    public function changeS(Request $request){

        $data = $request->except(['_token']);
        $ticket = Ticket::findOrFail($data['idTicket']);

        $ticket->status = $data['status'];
        
        $ticket->update();

        return redirect()->action('App\Http\Controllers\HomeController@index');

    }

    /**
     * Send Email
     */

    
}
