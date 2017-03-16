<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Medicine;
use Session,View;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use App\customValidatior;

class ShowController extends Controller
{
    public function showMedicine(){
        $user_id=Auth::user()->_id;

       $medicineData=Medicine::where('user_id',$user_id)->get();

        return View::make('pages.medicineList', compact('medicineData'));
    }

    public function editMedicine($id){

    	$medicineEditData = Medicine::findOrFail($id);
        return View::make('pages.edit', compact('medicineEditData'));

    }

    public function deleteMedicine(Request $request){
        $id=$request->input('_id_');
        $medicine = Medicine ::findOrFail($id);

        if($medicine->delete()){
            return redirect()->route('show.medicine')
                ->with('error', 'Medicine deleted successfully');
        }else{
            return redirect()->route('show.medicine')
                ->with('error', 'failed to delete Medicine!');
        }

    }

    public function updateMedicine(Request $request){
    	$data=$request->all();

    	if($data['submit']!=null && $data['submit']!=""){
    			$id=$data['_id_'];
                $product =Medicine::findOrFail($id);
                $product->medicine_name  = $data['medicine_name'];
                $product->generic_name = $data['generic_name'];
                $product->medicine_company =$data['medicine_company'];
                $product->price_rate =$data['price_rate'];
                $product->placed_on =$data['placed_on'];
                $product->status =$data['status'];
                if($product->save()){
                    return redirect()->route('show.medicine');
                        
                }else{
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'failed to Edit information!');
                }
        }
        else{
            return redirect()->route('show.medicine');
        } 
    }

}