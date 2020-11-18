<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Comments;
use App\Models\Factura;
use App\Models\Resource;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();
        $rolU = Auth::user()->rol_id;
        $id = Auth::id();

        if($rolU != 1){

            $comentarios =  Comments::where(function ($query) {
                $id = Auth::id();
                $query->where('user_id', '=', $id)
                      ->orWhere('user_id', '=', 1)
                      ->orderBy('created_at', 'ASC');;
            })->get();
            
            $tickets = Ticket::where('user_id',$id)->orderBy('created_at', 'desc')->get();
            $resource = Resource::where('user_id',$id)->get()->reverse();
            return view('home')
                ->with([
                    'user' => $user,
                    'tickets' => $tickets,
                    'coments' => $comentarios,
                    'resources' => $resource
                    ]);
        }else{
            $coments = Comments::all();
            $tickets = Ticket::all();
            $users = User::where('id','!=',$id)->get();
            return view('home')
                ->with([
                    'user' => $user,
                    'tickets' => $tickets,
                    'users' => $users,
                    'coments' => $coments
                ]);
        }

    }

    public function userPage(){
        $users = User::all();

        return view('users')
            ->with('users',$users);
    }


    public function invoicePage(){
        $id = Auth::id();

        if( $id == 1){
            $users = User::where('id','!=',1)->get();
            $invoices = Factura::all()->toArray();
            $invoices_names = [];
            foreach($invoices as $invoice){
                $name = explode('/',$invoice['path'])[2];
                $date = explode('_',$name)[1];
                $id_I = explode('_',$name)[0];
                $price = explode('-',explode('_',$name)[2])[0].'.'.explode('-',explode('_',$name)[2])[1];
                
                $client_name = User::where('id',$invoice['user_id'])->get()[0]['name'];
    
                $newInvoice = new \stdClass();
                $newInvoice->id = $id_I;
                $newInvoice->name = $name;
                $newInvoice->date = $date;
                $newInvoice->price = $price;
                $newInvoice->name_client =  $client_name ;
                $newInvoice->path = $invoice['path'];
                $newInvoice->status = $invoice['status'];
                
                array_push($invoices_names,$newInvoice);
    
            }
            
            return view('invoices')
                ->with([
                    'users' => $users,
                    'invoices' => $invoices_names
                ]);
        }else{
            $invoices = Factura::where('user_id',$id)->get()->toArray();
            $invoices_names = [];
            foreach($invoices as $invoice){
                $name = explode('/',$invoice['path'])[2];
                $date = explode('_',$name)[1];
                $id_I = explode('_',$name)[0];
                $price = explode('-',explode('_',$name)[2])[0].'.'.explode('-',explode('_',$name)[2])[1];
                
                $client_name = User::where('id',$invoice['user_id'])->get()[0]['name'];

                $newInvoice = new \stdClass();
                $newInvoice->id = $id_I;
                $newInvoice->name = $name;
                $newInvoice->date = $date;
                $newInvoice->price = $price;
                $newInvoice->name_client =  $client_name ;
                $newInvoice->path = $invoice['path'];
                $newInvoice->status = $invoice['status'];

                array_push($invoices_names,$newInvoice);
    
            }
            
            return view('invoices')
                ->with([
                    'invoices' => $invoices_names
                ]);
        }
       
    }
}
