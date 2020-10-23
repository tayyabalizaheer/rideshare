<?php

namespace App\Http\Controllers;

use App\FleetRegistration;
use App\FleetType;
use App\TicketPrice;
use App\TripRoute;
use App\User;
use Illuminate\Http\Request;
use DB;
use Auth;
class FleetController extends Controller
{
    public function fleetType()
    {
        $data['page_title'] = "Vehical Type List";
        $data['fleet_type'] = FleetType::latest()->paginate(20);
        return view('admin.fleet.fleet_type', $data);
    }
    
    public function fleetTypeStore(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('assets/images'), $imageName);

        $data = new FleetType();
        $data->name = $request->name;
        $data->fleet_img = $imageName;
        $data->status = $request->status == "on" ? 1 : 0;

        $succ = $data->save();
        if ($succ) {
            $notification = array('message' => 'Created Successfully!', 'alert-type' => 'success');
        } else {
            $notification = array('message' => 'Something Wrong', 'alert-type' => 'error');
        }
        return back()->with($notification);
    }

    public function fleetTypeUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:20',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = FleetType::findOrFail($id);
        if(isset(request()->image)){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('assets/images'), $imageName);
            $data->fleet_img = $imageName;
        }
        $data->name = $request->name;
        $data->status = $request->status == "on" ? 1 : 0;
        $succ = $data->save();
        if ($succ) {
            $notification = array('message' => 'Updated Successfully!', 'alert-type' => 'success');
        } else {
            $notification = array('message' => 'Something Wrong', 'alert-type' => 'error');
        }
        return back()->with($notification);
    }


    public function fleetRegistration()
    {
        $data['page_title'] = "Vehical Registration";
        $data['fleet'] = FleetRegistration::latest()->paginate(30);
        return view('admin.fleetreg.index', $data);
    }

    public function create()
    {
        $data['page_title'] = "New Vehical Registration";
        $data['fleet_type'] = FleetType::whereStatus(1)->get();

       

        return view('admin.fleetreg.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fleet_type_id' => 'required|numeric',
            'owner' => 'required',
            'company' => 'required',
            'reg_no' => 'exists:users,user_registration_no',
        ]);
        $FleetType = FleetType::where('id',$request->fleet_type_id)->first();
        $user = User::where('user_registration_no',$request->reg_no)->first();
        $data = new FleetRegistration();
        $data->reg_name = $FleetType->name;
        $data->user_id = $user->id;
        $data->reg_no = $request->reg_no;
        $data->fleet_type_id = $request->fleet_type_id;
        $data->engine_no = $request->engine_no;
        $data->model_no = $request->model_no;
        $data->chasis_no = $request->chasis_no;

        $data->total_seat = $request->total_seat;

        $data->ac_available = ($request->ac_available == "on") ? 1 : 0;
        $data->status = ($request->status == "on") ? 1 : 0;

        $data->seat_numbers = $request->seat_numbers;
        $data->owner = $request->owner;
        $data->company = $request->company;

        $succ = $data->save();
        if ($succ) {
            $notification = array('message' => 'Created Successfully!', 'alert-type' => 'success');
        } else {
            $notification = array('message' => 'Something Wrong', 'alert-type' => 'error');
        }
        return back()->with($notification);
    }


    public function edit($id)
    {
        $fleet = FleetRegistration::findOrFail($id);
        $page_title = "Edit Vehical ";
        $fleet_type = FleetType::whereStatus(1)->get();
        return view('admin.fleetreg.edit', compact('page_title', 'fleet_type', 'fleet'));
    }

    public function update(Request $request, $id)
    {
        //return $request;

        $request->validate([
            'fleet_type_id' => 'required|numeric',
            'owner' => 'required',
            'company' => 'required',
            'reg_no' => 'exists:users,user_registration_no',
        ]);
            

        $data = FleetRegistration::findOrFail($id);
        
        
        $FleetType = FleetType::where('id',$request->fleet_type_id)->first();
        $user = User::where('user_registration_no',$request->reg_no)->first();
        $data->reg_name = $FleetType->name;
        $data->user_id = $user->id;
        $data->reg_no = $request->reg_no;
        $data->fleet_type_id = $request->fleet_type_id;
        $data->engine_no = $request->engine_no;
        $data->model_no = $request->model_no;
        $data->chasis_no = $request->chasis_no;

        $data->total_seat = $request->total_seat;

        $data->ac_available = ($request->ac_available == "on") ? 1 : 0;
        $data->status = ($request->status == "on") ? 1 : 0;

        $data->seat_numbers = $request->seat_numbers;
        $data->owner = $request->owner;
        $data->company = $request->company;

        if($request->vip_plan){
            
            $data['layout'] = 'vip';
            $data['total_seat'] = 6;
        }
        if($request->luxury_plan){

            $data['layout'] = 'luxury';
            $data['total_seat'] = 13;
        }

        $succ = $data->save();
        if ($succ) {
            $notification = array('message' => 'Updated Successfully!', 'alert-type' => 'success');
        } else {
            $notification = array('message' => 'Something Wrong', 'alert-type' => 'error');
        }
        return back()->with($notification);
    }


    public function ticketPrice()
    {
        $data['page_title'] = "Ticket Price";
        $data['fleet_type'] = FleetType::where('status', 1)->get();
        $data['trip_route'] = TripRoute::where('status', 1)->orderBy('name', 'asc')->get();
        $data['ticketPrice'] = TicketPrice::latest()->paginate(30);
        return view('admin.fleet.ticket-price', $data);
    }


    public function ticketPriceStore(Request $request)
    {
        $request->validate([
            'trip_route_id' => 'required',
            'fleet_type_id' => 'required',
            'price' => 'required|numeric|min:0',
        ]);

        $checkTicketPrice = TicketPrice::where('trip_route_id', $request->trip_route_id)->where('fleet_type_id', $request->fleet_type_id)->count();
        if ($checkTicketPrice != 0) {
            $notification = array('message' => 'Already exist!', 'alert-type' => 'error');
            return back()->with($notification);
        }

        $data = new TicketPrice();
        $data->trip_route_id = $request->trip_route_id;
        $data->fleet_type_id = $request->fleet_type_id;
        $data->price = $request->price;
        $succ = $data->save();
        if ($succ) {
            $notification = array('message' => 'Created Successfully!', 'alert-type' => 'success');
        } else {
            $notification = array('message' => 'Something Wrong', 'alert-type' => 'error');
        }
        return back()->with($notification);
    }

    public function ticketPriceUpdate(Request $request, $id)
    {
        $request->validate([
            'trip_route_id' => 'required',
            'fleet_type_id' => 'required',
            'price' => 'required|numeric|min:0',
        ]);

        $data['trip_route_id'] = $request->trip_route_id;
        $data['fleet_type_id'] = $request->fleet_type_id;
        $data['price'] = $request->price;
        TicketPrice::where('id', $id)->update($data);;
        $notification = array('message' => 'Updated Successfully!', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function ticketPriceDestroy($id)
    {
        $suc = TicketPrice::destroy($id);
        if ($suc) {
            $notification = array('message' => 'Deleted Successfully!', 'alert-type' => 'success');
        } else {
            $notification = array('message' => 'Something wrong!', 'alert-type' => 'error');
        }
        return back()->with($notification);

    }


}
