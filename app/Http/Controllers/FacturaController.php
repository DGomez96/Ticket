<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use App\Models\User;

//facades
use Illuminate\Support\Facades\Hash;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->except(['_token']);
        $files = $data['files'];
        $destination = 'storage/invoices/';

        foreach($files as $file){
            $invoice = new Factura();
            $invoice->path = $destination.$file->getCLientOriginalName();
            $invoice->user_id =$data['user'];

            //Subo al server
            $file->move($destination,$file->getCLientOriginalName());

            $invoice->save();
        }

        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        //
    }
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeU(Request $request)
    {
        $usuario = $request->except(['_token']);

        if($usuario['password'] == $usuario['password_confirmation']){
            User::create([
                'name' => $usuario['name'],
                'email' => $usuario['email'],
                'password' => Hash::make($usuario['password']),
            ]);
            return redirect()->back();
        }else{
            return redirect()->back();
        }

    }

    public function changeSF(Request $request)
    {

        $data = $request->except(['_token']);
        $invoice = Factura::findOrFail($data['idTicket']);

        $invoice->status = $data['status'];
        
        $invoice->update();

        return redirect()->action('App\Http\Controllers\HomeController@invoicePage');
    }
}
