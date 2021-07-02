<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function showData()
    {
        $data = Customer::orderBy('id','DESC')->get();
        return response()->json($data);
    }
    public function storeData(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        $data = Customer::insert([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);
        
        return response()->json($data);
    }
    public function editData($id)
    {
        $edit_data = Customer::find($id);
        return response()->json($edit_data);
    }
   public function updateData(Request $request,$id)
   {
    $request->validate([
        'name' => 'required',
        'address' => 'required',
        'phone' => 'required',
    ]);
    $data = Customer::find($id)->update([
        'name' => $request->name,
        'address' => $request->address,
        'phone' => $request->phone,
    ]);
    return response()->json($data);
   }

   public function delete($id)
   {
       $delete_customer = Customer::find($id);
       $delete_customer->delete();
       
       return response()->json($delete_customer);
   }
}
