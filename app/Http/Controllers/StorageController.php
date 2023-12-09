<?php

namespace App\Http\Controllers;

use App\Models\medicine;
use App\Models\pharmase;
use App\Models\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Collection\Set;

use function PHPSTORM_META\map;
$x=0;
class StorageController extends Controller
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
    public function storeOrder(Request $request)
    {


            try {
                $token = $request->header('Authorization');
                $pharm = pharmase::all('*')->where('token','=',$token)->first();
                 $key =random_int(0,+100000000000);
                DB::table('orders')->insert(
                [

                    'pharm_order'=>$pharm->id,
                    'med1'=>request('med1'),
                    'med2'=>request('med2'),
                    'med3'=>request('med3'),
                    'med4'=>request('med4') ,
                    'med5'=>request('med5') ,
                    'med6'=>request('med6') ,
                    'med7'=>request('med7') ,
                    'med8'=>request('med8') ,
                    'med9'=>request('med9') ,
                    'med10'=>request('med10'),

                    'order_number'=>$key,
                ]

            );

            $the_order = DB::table('orders')->where('order_number','=',$key)->first();
            DB::table('orders_amount')->insert(
                [
                    'order_id'=> $the_order->id ,
                    'amount_1'=>request('amount_1'),
                    'amount_2'=>request('amount_2'),
                    'amount_3'=>request('amount_3'),
                    'amount_4'=>request('amount_4'),
                    'amount_5'=>request('amount_5'),
                    'amount_6'=>request('amount_6'),
                    'amount_7'=>request('amount_7'),
                    'amount_8'=>request('amount_8'),
                    'amount_9'=>request('amount_9'),
                    'amount_10'=>request('amount_10'),
                ]
            );
            $amount = DB::table('orders_amount')->where('order_id','=',$the_order->id )->first();
            //   $yourOrders = DB::table('orders')->where('pharm_order','=',$pharm->id);
               return response()->json(['your order'=>$the_order,'amounts'=>$amount ,'name'=>$pharm->name ,'number'=>$key],200);
               }catch (\Exception $e) {
                   return response()->json(['Errore'=> $e->getMessage(),'message'=>'you are not autherised'],403);

               }


    }

    /**
     * Display the specified resource.
     */
    public function show(Storage $storage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Storage $storage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Storage $storage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Storage $storage)
    {
        //
    }

     public function change_payed(Request $request,$id)
    {
    //    $params= $request->query->all();
    //    $params["status"];
       try {
        $payded=false;

         $ord =DB::table('orders')->get()->where('id','=',$id);

        if($ord['0']->payeded==0 ){
            $ord =DB::table('orders')->where('id','=',$id)->update(['payeded'=>'1']);
            $payded=true;
    }
        else{
            $ord =DB::table('orders')->where('id','=',$id)->update(['payeded'=>'0']);
    }
        $ords = DB::table('orders')->get();
            $ammount=DB::table('orders_amount')->get();

            return response()->json(['orders'=>$ords,'ammount'=>$ammount ,'pay'=>$payded ],200);
       } catch (\Throwable $th) {

        return response()->json(['ERRORE'=>$th->getMessage(),'message'=>"the id isnt found OR the orders table is empty" ],404);
       }
    }

    public function change_status(Request $request,$id)
    {
       $params= $request->query->all();
       try {
        $params["status1"];
         $ord =DB::table('orders')->get()->where('id','=',$id);

         DB::table('orders')->where('id','=',$id)->update(['status'=>$params["status1"]]);


        $ords=DB::table('orders')->get();
        $ammount=DB::table('orders_amount')->get();
        $meds=medicine::all();






        if ($params["status1"]=="sended") {

foreach ($meds as $med) {

if ($med->commercial_name==$ord['0']->med1) {

    $ordammount=DB::table('orders_amount')->find($ord['0']->id);
     $med->available_amount -=$ordammount->amount_1;
     $med->save();
}
elseif ($med->commercial_name==$ord['0']->med2) {
    $ordammount=DB::table('orders_amount')->find($ord['0']->id);
     $med->available_amount -=$ordammount->amount_2;
     $med->save();
}
elseif ($med->commercial_name==$ord['0']->med3) {
    $ordammount=DB::table('orders_amount')->find($ord['0']->id);
    $med->available_amount -=$ordammount->amount_3;
    $med->save();
}
elseif ($med->commercial_name==$ord['0']->med4) {
    $ordammount=DB::table('orders_amount')->find($ord['0']->id);
     $med->available_amount -=$ordammount->amount_4;
     $med->save();
}
elseif ($med->commercial_name==$ord['0']->med5) {
    $ordammount=DB::table('orders_amount')->find($ord['0']->id);
    $med->available_amount -=$ordammount->amount_5;
    $med->save();
}
elseif ($med->commercial_name==$ord['0']->med6) {
    $ordammount=DB::table('orders_amount')->find($ord['0']->id);
     $med->available_amount -=$ordammount->amount_6;
     $med->save();
}
elseif ($med->commercial_name==$ord['0']->med7) {
    $ordammount=DB::table('orders_amount')->find($ord['0']->id);
     $med->available_amount -=$ordammount->amount_7;
     $med->save();
}
elseif ($med->commercial_name==$ord['0']->med8) {
    $ordammount=DB::table('orders_amount')->find($ord['0']->id);
     $med->available_amount -=$ordammount->amount_8;
     $med->save();
}
elseif ($med->commercial_name==$ord['0']->med9) {
    $ordammount=DB::table('orders_amount')->find($ord['0']->id);
     $med->available_amount -=$ordammount->amount_9;
     $med->save();
}
elseif ($med->commercial_name==$ord['0']->med10) {
    $ordammount=DB::table('orders_amount')->find($ord['0']->id);
     $med->available_amount -=$ordammount->amount_10;
     $med->save();
}
}



        }
        return response()->json(['orders'=>$ords , 'ammount'=>$ammount ],200);

       } catch (\Throwable $th) {

        return response()->json(['ERRORE'=>$th->getMessage(),'message'=>"the id isnt found OR the orders table is empty"  ],404);
       }
    }

    public function home (){
    $meds=medicine::all();

    $arrOftypes=[];
    $arrOfmeds= [];
    $i=0;
    foreach ($meds as $key ) {
       $arrOftypes[$i]=$key->type;
       $i++;
    }
    $i=0;
    $arr = array_unique($arrOftypes);
     foreach ( $arr as $key ) {
        $types[$i]=$key;
     $i++;
     }


    $i=0;

    for ($i=0; $i <sizeof($types) ; $i++) {
        $arrOfmeds[$i]=medicine::all()->where('type','=',$types[$i]);
    }

    // $arrOfNames[$key->type]=[$key];
        return response()->json(['types'=>$types, 'medicines'=>$arrOfmeds],200);

    }

    public function show_your_orders(Request $request){
        try {

            $token = $request->header('Authorization');
            $pharm = pharmase::all('*')->where('token','=',$token)->first();
            $order=DB::table('orders')->where('pharm_order','=',$pharm->id)->get();
            $arr=[];
            $a=1;
            foreach ($order as $key ) {
                $ammount=DB::table('orders_amount')->where('order_id','=',$key->id)->get();
                array_push($arr,['order'.$a.''=>$key,'ammount order'.$a.''=>$ammount]);
            $a++;
            }


            return response()->json([$arr],404);
            // return view('show', compact($meds));
                } catch (\Exception $ex) {
                    return response()->json(['Errore'=> $ex->getMessage(),'message'=>'you are not logged in '],403);
                }
            }

}
