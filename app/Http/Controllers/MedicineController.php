<?php

namespace App\Http\Controllers;

use App\Models\medicine;
use App\Models\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $token = $request->header('Authorization');
            $store = Storage::all('*')->where('token','=',$token)->first();
            Medicine::create([
                'the_store'=>$store->id,
                'scientific_name'=>request('scientific_name'),
                'commercial_name'=>request('commercial_name'),
                'type'=>request('type'),
                'company'=>request('company') ,
                 'available_amount'=>request('available_amount') ,
                   'ex_date'=>request('ex_date'),
                   'price'=>request('price')
            ]);
           $name =$_POST["scientific_name"];
           return response()->json(['med_name'=>$name,'store'=>$store->name ],200);
           }catch (\Exception $e) {
               return response()->json(['Errore'=> $e->getMessage(),'message'=>'there is no token'],400);

           }
    }

    /**
     * Display the specified resource.
     */
    public function show(medicine $medicine)
    {
        try {
            if(!($_POST["name"]==null)){
            $name =$_POST["name"];
            $table=medicine::all('*')->where("scientific_name",$name);

            return response()->json(["table"=>$table]);
            }
            else{
                return response()->json(["error"=>'there is no value']);

            }
        }
            catch (\Exception $e) {
                return response()->json(["message"=>$e->getMessage()]);
            }
    }

    public function show_type(medicine $medicine){
        try{
            if(!($_POST["type"]==null)){
                $type =$_POST["type"];
                $table=medicine::all('*')->where("type",$type);

                return response()->json(["table"=>$table]);
                }
                else{
                    return response()->json(["error"=>'there is no value']);

                }


            }
            catch (\Exception $e) {
                return response()->json(["ERRORE"=>$e->getMessage(),'message'=>"you dont enter type OR there is no medicine by this type"]);
            }}




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {

        try{
        $name =medicine::find($id)->scientific_name;
        medicine::find($id)->delete();
         return response()->json(['message'=> "delete $name Sucsessfully"],200);
        }
        catch (\Exception $e) {
            return response()->json(["ERRORE"=>$e->getMessage(),'message'=>"you dont enter type OR there is no medicine by this type"]);
        }
        }

    public function show_all()
    {
        try {
    $meds = Medicine::all();
    return response()->json(['medicenes'=> $meds],200);
    // return view('show', compact($meds));
        } catch (\Exception $e) {
        return response()->json(['message'=> "there are no medicines"],404);
        }

    }

    public function show_all_orders(){
    try {

        $order=DB::table('orders')->get();
        $ammount=DB::table('orders_amount')->get();

        return response()->json(['order'=>$order,'ammount'=>$ammount ],404);
        // return view('show', compact($meds));
            } catch (\Exception $ex) {
                return response()->json(['message'=> $ex->getMessage()],404);
            }
        }







}
