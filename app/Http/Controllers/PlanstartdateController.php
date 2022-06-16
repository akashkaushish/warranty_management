<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Planstartdate;
use App\Models\Warrantyplan; 

class PlanstartdateController extends Controller
{
      
  function showsplan(){
	    $data= DB::table('plan_start_from')
	   ->join('warrantyplans','plan_start_from.warranty_plan_id',"=",'warrantyplans.id')
	   ->select('plan_start_from.*','warrantyplans.plan_name')
	   ->get();
	   $result = (array) json_decode($data);
	   
	  return view('planstartlist',['planlist'=>$result]);
	  
	}
	
	
  function deleteplan($id){	
		$plan= Planstartdate::find($id);
		$plan->delete();
		return redirect('list')->with('status', 'Plan has been deleted');
	}
	
	
  function editPlan($id){
	     $data= Planstartdate::find($id);
	     return view('editplan',['planinfo'=>$data]);
	}
	
  function addplan(Request $req){
	
		$plan= new Planstartdate;
		$plan->distributor_name=$req->distributor_name;
		$plan->warranty_plan_id=$req->warranty_plan_id;
		$plan->serial_number=$req->serial_number;
		$plan->country=$req->country ;
		$plan->sale_date=$req->sale_date;
		$plan->delivery_date=$req->delivery_date;
		$plan->box_id=$req->box_id;
		$plan->save();
		return redirect('list')->with('status', 'Plan has been updated successfully');
	
	}	
	
	
  function updatePlan(Request $req){
		
		/* $validatedData = $req->validate([
		'plan_name' => 'required',
		'days_warranty' => 'required',
		'country' => 'required',
		'warranty_start' => 'required',
		]);*/
		
		$plan= Planstartdate::find($req->id);
		$plan->distributor_name=$req->distributor_name;
		$plan->warranty_plan_id=$req->warranty_plan_id;
		$plan->serial_number=$req->serial_number;
		$plan->country=$req->country ;
		$plan->sale_date=$req->sale_date;
		$plan->delivery_date=$req->delivery_date;
		$plan->box_id=$req->box_id;
		$plan->country=$req->country;
		$plan->save();
		return redirect('list')->with('status', 'Plan has been updated successfully');
	
	}
	
	
   function search(Request $req){
   
		$search = $req->serial_number;
		
	
		
		// Search in the plan date data
		$posts = Planstartdate::query()->where('serial_number', '=', "{$search}")->get();
		$mydata=$posts->toArray();

		//	 
		if($posts->isNotEmpty()){
			//get he warranrt plan date
			//$data= Warrantyplan::find( $mydata[0]['warranty_plan_id'])->toArray();
			$data= Warrantyplan::find( $mydata[0]['warranty_plan_id']);
		
			
			$warrantydays=$data["days_warranty"];

			
			if($data['warranty_start']=='Delivery day'){	  
			  $expiredate= date('Y-m-d', strtotime($mydata[0]['delivery_date']. ' + '.$warrantydays.' days'));    
			}elseif($data['warranty_start']=='invoice emitting day'){
			
			  $expiredate= date('Y-m-d', strtotime($mydata[0]['sale_date']. ' + '.$warrantydays.' days'));   
			}
			

			
			if($expiredate > @date('Y-m-d')){
			   return back()->with('success','This serial number ('.$search.') is under warranty');
			}else{
			   return back()->with('error','The warranty of the serial number ('.$search.') is expired.');
			}
		}else{
		    return back()->with('error','This serial number ('.$search.') is not exists in your records');
		}
   }
	
}
