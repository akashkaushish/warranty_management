<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warrantyplan;

class WarrantyplanController extends Controller
{

  function show(){
	
	  //$users = DB::table('warrantyplans')->simplePaginate(1);
	  $data=Warrantyplan::paginate(5);
	  return view('warrantyplan',['planlist'=>$data]);
	  
	}
	
	
  function editWarranty($id){
	     $data= Warrantyplan::find($id);
	     return view('editwarrantyplan',['planinfo'=>$data]);
	}
	
	
  function updateWarranty(Request $req){
	
	 	 $validatedData = $req->validate([
						  'plan_name' => 'required',
						  'days_warranty' => 'required',
						  'country' => 'required',
						  'warranty_start' => 'required',
                         ]);
 
	
		$warranty= Warrantyplan::find($req->id);
		$warranty->plan_name=$req->plan_name;
		$warranty->days_warranty=$req->days_warranty;
		$warranty->country=$req->country;
		$warranty->warranty_start=$req->warranty_start;
		$warranty->save();
		return redirect('warrantylist')->with('status', 'Warrant plan has been updated successfully');
	
	}
	
  function delete($id){	
		$warranty= Warrantyplan::find($id);
		$warranty->delete();
		return redirect('warrantylist')->with('status', 'Warrant plan has been deleted');
	}
	
	
  function addwarranty(Request $req){	
	
	     $validatedData = $req->validate([
          'plan_name' => 'required',
          'days_warranty' => 'required',
          'country' => 'required',
          'warranty_start' => 'required',
        ]);
 
		$warranty= new Warrantyplan;
		$warranty->plan_name=$req->plan_name;
		$warranty->days_warranty=$req->days_warranty;
		$warranty->country=$req->country;
		$warranty->warranty_start=$req->warranty_start;
		$warranty->save();
		return redirect('warrantylist')->with('status', 'Warrant plan has been saved successfully');
	}	
}
