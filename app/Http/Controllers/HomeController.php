<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Medicine;
use App\User;
use App\TempPurchaseList;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;
use View;
use App\MemoHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use App\customValidatior;

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
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        return view('home');
//    }

    public function index()
    {
        return  redirect()->route('show.medicine');
    }

    public function addProducts(){
        return view('pages.addProduct');
    }

    public function userProfile($id){

        return view('pages.profile');
    }

    public function tempPurchaseList(){

        $user_id=Auth::user()->_id;

        $medicineData=Medicine::select('_id','medicine_name')->where('user_id',$user_id)->get();
        $tempPurchaseList=TempPurchaseList::get();

        return View::make('pages.purchase', compact('medicineData','tempPurchaseList'));
    }

    public function createProduct(Request $request){

        $data=$request->all();
        

        // $validation = Validator::make($data, $rules);

        // if ($validation->fails()) {
        //     return redirect()->back()
        //         ->withInput()
        //         ->withErrors($validation);
        // } else {
            if($data['submit']!=null && $data['submit']!=""){
                $product = new Medicine();
                $product->user_id = Auth::user()->_id;
                $product->medicine_name  = $data['medicine_name'];
                $product->generic_name = $data['generic_name'];
                $product->medicine_company =$data['medicine_company'];
                $product->price_rate =$data['price_rate'];
                $product->placed_on =$data['placed_on'];
                $product->status =$data['status'];
                $product->issue_date=date("Y-m-d");

                if($product->save()){
                    return redirect()->route('_addProduct')
                        ->with('success', 'Medicine added successfully');
                }else{
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Failed to add a product!');
                }
        }
        else{
            return redirect()->route('_addProduct');
        } 

    }

    public function updateProfile(Request $request){
        $data=$request->all();
        if($data['submit']!=null && $data['submit']!=""){

            if($data['new_pass']==null){
                $user =User::findOrFail(Auth::user()->_id);
                $user->name  = $data['name'];
                if($user->save()){
                    return redirect()->route('home')
                        ->with('success','Profile name updated successfully');

                }else{
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Failed to Edit information!');
                }
            }
            else if($data['new_pass']!=null){
                $user =User::findOrFail(Auth::user()->_id);
                $user->name  = $data['name'];
                $user->password =Hash::make($data['new_pass']);
                if($user->save()){
                    return redirect()->route('home')
                        ->with('success','Password updated successfully');

                }else{
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Failed to Edit information!');
                }

            }

        }
        else{
            return redirect()->route('home');
        }
    }

    public function createTempList(Request $request){
        $data=$request->all();
        if($data['submit']!=null && $data['submit']!=""){
            $medicine=Medicine::where('_id',$data['selected_medicine'])->first();
            $quantity=intval($data['quantity']);
            $price=floatval($medicine->price_rate)*$quantity;

            $temp=new TempPurchaseList();
            $temp->medicine_name=$medicine->medicine_name;
            $temp->quantity=$quantity;
            $temp->price=$price;
            if($temp->save()){
                return redirect()->route('purchase.list')
                    ->with('success','Medicine addded successfully to list');

            }else{
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to added!');
            }
        }
        else{
            return redirect()->route('purchase.list');
        }
    }

    public function deleteList(Request $request){
        $data=$request->all();
        if($data['submit']!=null && $data['submit']!=""){

            $temp=TempPurchaseList::findOrFail($data['_id_']);
            if($temp->delete()){
                return redirect()->route('purchase.list')
                    ->with('success','Deleted successfully');

            }else{
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to delete!');
            }
        }
        else{
            return redirect()->route('purchase.list');
        }
    }

    public function deleteListAll(Request $request){
        $data=$request->all();
        if($data['submit']!=null && $data['submit']!=""){

            if(TempPurchaseList::truncate()){
                return redirect()->route('purchase.list')
                    ->with('success','Cleaned successfully');

            }else{
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to clean!');
            }
        }
        else{
            return redirect()->route('purchase.list');
        }
    }

    public function createMemo(){

        $tempPurchaseList=TempPurchaseList::get();

        if(sizeof($tempPurchaseList)>0){
            $totalPrice=0.0;
            foreach ($tempPurchaseList as $item){
                $totalPrice=$totalPrice+ floatval($item->price);
            }

            return View::make('pages.memo', compact('tempPurchaseList','totalPrice'));
        }
        else{
            redirect()->route('purchase.list');
        }
    }

    public function saveMemos(Request $request){

        $data=$request->all();
        if($data['submit']!=null && $data['submit']!=""){
            date_default_timezone_set('Asia/Dhaka');
            $tempPurchaseList=TempPurchaseList::get();
            $k=0;
            $itemList="";
            foreach ($tempPurchaseList as $item){
                if($k!=0)
                {
                    $itemList .= ",";
                }
                $itemList .= $item->medicine_name." (".$item->quantity.") ";
                $k++;
            }

            $history=new MemoHistory();
            $history->user_id=Auth::user()->_id;
            $history->customer_name=$data['customer_name'];
            $history->phone_no=$data['phone_no'];
            $history->address=$data['address'];
            $history->total_price=$data['total_price'];
            $history->paid_amount=$data['paid_amount'];
            $history->item_list=$itemList;
            $history->date=date("l jS \of F Y h:i:s A");

            if($history->save() && TempPurchaseList::truncate()){
                return redirect()->route('home')
                    ->with('success','Memo recorded successfully');

            }else{
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to record!');
            }
        }
        else{
            return redirect()->route('purchase.list');
        }

    }

    public function showMemos(){

        $history=MemoHistory::orderBy('date', 'desc')->get();
        return view('pages.history',compact('history'));
    }

}
