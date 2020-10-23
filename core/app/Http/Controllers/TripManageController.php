<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\FleetRegistration;
use App\TripAssign;
use App\TripLocation;
use App\TripRoute;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\GeneralSettings;
use Intervention\Image\Facades\Image;
use File;
use DB;
class TripManageController extends Controller
{
    /*
     * Trip Location
     */
    public function __construct(){
        $this->Gset = GeneralSettings::first();
        $this->sitename = $this->Gset->sitename;
    }
    public function location() 
    {
        $data['page_title'] = "Location";
        $data['location'] = TripLocation::orderBy('name','asc')->paginate(20);
        return view('admin.trip.location.index', $data);
    }
    public function locationCreate()
    {
        $data['page_title'] = "Location";
        return view('admin.trip.location.create', $data);
    }
    public function locationStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'image' => 'nullable | mimes:jpeg,jpg | max:1000'
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'location_'.time().'.jpg';
            $location = 'assets/images/trip/' . $filename;
            Image::make($image)->resize(800,800)->save($location);
            $in['image'] = $filename;
        }
        $in['name'] =  $request->name;
        $in['description'] =  $request->description;
        $in['lat'] =  $request->latitude;
        $in['lan'] =  $request->longitude;
        $in['status'] =  $request->status == 'on' ? 1 : 0;
        $res = TripLocation::create($in);

        if ($res) {
            $notification = array('message' => 'Created Successfully!', 'alert-type' => 'success');
            return back()->with($notification);
        } else {
            $notification = array('message' => 'Something Error', 'alert-type' => 'error');
            return back()->with($notification);
        }
    }

    public function locationEdit($id)
    {
        $data['location'] =TripLocation::findOrFail($id);
        $data['page_title'] = "Edit Location";
        return view('admin.trip.location.edit', $data);
    }

    public function locationUpdate(Request $request, $id)
    {
        $data = TripLocation::findOrFail($id);

        $in['name'] =  $request->name;
        $in['description'] =  $request->description;
        $in['lat'] =  $request->latitude;
        $in['lan'] =  $request->longitude;
        $in['status'] =  $request->status == 'on' ? 1 : 0;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'location_'.time().'.jpg';
            $location = 'assets/images/trip/' . $filename;
            Image::make($image)->resize(800,800)->save($location);

            $path = './assets/images/trip/';
            File::delete($path.$data->image);
            $in['image'] = $filename;
        }

        $res = $data->fill($in)->save();

        if ($res) {
            $notification = array('message' => 'Updated Successfully!', 'alert-type' => 'success');
            return back()->with($notification);
        } else {
            $notification = array('message' => 'Something Error', 'alert-type' => 'error');
            return back()->with($notification);
        }
    }

    /*
     * Trip Route
     */

    public function route()
    {
        $data['page_title'] = "Route";
        $user_id = Auth::user()->id;
        $data['location'] = TripRoute::where('user_id',$user_id)->orderBy('created_at','desc')->paginate(20);
        return view('admin.trip.route.index', $data);
    }
    public function routeCreate()
    {
        $data['page_title'] = "Route";
        $data['Gset'] = $this->Gset;
        $data['tripLocation'] = TripLocation::where('status',1)->orderBy('name','asc')->get();
        return view('admin.trip.route.create', $data);
    }
    public function routeStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_point' => 'required',
            'end_point' => 'required',
            'approximate_time' => 'required',
            'distance' => 'required',
        ]);

        $start_point =  TripLocation::find($request->start_point);
        $end_point =  TripLocation::find($request->end_point);

        $in['name'] =  $request->name;
        $in['start_point'] =  $request->start_point;
        $in['start_point_name'] =  $start_point->name;

        $in['end_point'] =  $request->end_point;
        $in['end_point_name'] =  $end_point->name;

        $in['distance'] =  $request->distance;
        $in['price'] =  $request->price;
        $in['approximate_time'] =  $request->approximate_time;
        $in['stoppage'] =  $request->stoppage;
        $in['user_id'] =  Auth::user()->id;
        $in['status'] =  $request->status == 'on' ? 1 : 0;
        $res = TripRoute::create($in);

        if ($res) {
            $notification = array('message' => 'Created Successfully!', 'alert-type' => 'success');
            return back()->with($notification);
        } else {
            $notification = array('message' => 'Something Error', 'alert-type' => 'error');
            return back()->with($notification);
        }
    }

    public function routeEdit($id)
    {
        $data['page_title'] = "Edit Route";
        $route = TripRoute::findOrFail($id);
        $startroute = TripLocation::findOrFail($route->start_point);
        $endroute = TripLocation::findOrFail($route->end_point);
        $data['route'] = $route;
        $data['startroute'] = $startroute;
        $data['endroute'] = $endroute;
        $data['Gset'] = $this->Gset;
        $data['tripLocation'] = TripLocation::where('status',1)->orderBy('name','asc')->get();
        return view('admin.trip.route.edit', $data);
    }

    public function routeUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'start_point' => 'required',
            'end_point' => 'required',
            'approximate_time' => 'required',
            'distance' => 'required',
            'price' => 'required',

        ]);

        $data = TripRoute::findOrFail($id);

        $start_point =  TripLocation::find($request->start_point);
        $end_point =  TripLocation::find($request->end_point);


        $in['name'] =  $request->name;
        $in['start_point'] =  $request->start_point;
        $in['start_point_name'] =  $start_point->name;

        $in['end_point'] =  $request->end_point;

        $in['end_point_name'] =  $end_point->name;

        $in['distance'] =  $request->distance;
        $in['price'] =  $request->price;
        $in['approximate_time'] =  $request->approximate_time;
        $in['stoppage'] =  $request->stoppage;
        $in['status'] =  $request->status == 'on' ? 1 : 0;

        $res = $data->fill($in)->save();

        if ($res) {
            $notification = array('message' => 'Updated Successfully!', 'alert-type' => 'success');
            return back()->with($notification);
        } else {
            $notification = array('message' => 'Something Error', 'alert-type' => 'error');
            return back()->with($notification);
        }
    }

    /*
     * Trip route assign
     */
    public function tripAssign()
    {
        $data['page_title'] = "My Rides";
        $user_id = Auth::user()->id;
        $data['tripAssign'] = TripAssign::orderBy('start_date','desc')->where('status','!=','2')->where('user_id',$user_id)->paginate(20);
        return view('admin.trip.assign.index', $data);
    }
    public function tripAssignCreate()
    {
        $data['page_title'] = "Offer Ride";
        $user_id = Auth::user()->id;
        $data['fleet_registration'] = FleetRegistration::where('status',1)->where('user_id',$user_id)->get();
        $data['tripRoute'] = TripRoute::where('status',1)->where('user_id',$user_id)->orderBy('id','asc')->get();
        return view('admin.trip.assign.create', $data);
    }
    public function tripAssignStore(Request $request)
    {
        $request->validate([
            'fleet_registration_id' => 'required',
            'trip_route_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $user_id = Auth::user()->id;
        $in['id_no'] =  time();
        $in['fleet_registration_id'] =  $request->fleet_registration_id;
        $in['trip_route_id'] =  $request->trip_route_id;
        $in['start_date'] =  Carbon::parse($request->start_date);
        $in['end_date'] =  Carbon::parse($request->end_date);
        $in['user_id'] =  $user_id;
        $in['status'] =  $request->status == 'on' ? 1 : 0;
        $res = TripAssign::create($in);

        if ($res) {
            $notification = array('message' => 'Created Successfully!', 'alert-type' => 'success');
            return back()->with($notification);
        } else {
            $notification = array('message' => 'Something Error', 'alert-type' => 'error');
            return back()->with($notification);
        }
    }
    public function tripAssignClose($id){
        TripAssign::where('id',$id)->update(['status'=>2]);
        $notification = array('message'=>'Successfully Closed the Trip');
        return back()->with($notification);
    }
    public function tripAssignEdit($id)
    {
        $data['page_title'] = "Edit Ride";
        $data['tripAssign'] = TripAssign::findOrFail($id);
        $data['fleet_registration'] = FleetRegistration::where('status',1)->get();
        $data['tripRoute'] = TripRoute::where('status',1)->orderBy('id','asc')->get();
        return view('admin.trip.assign.edit', $data);
    }

    public function tripAssignUpdate(Request $request, $id)
    {
        $request->validate([
            'fleet_registration_id' => 'required',
            'trip_route_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);


        $data = TripAssign::findOrFail($id);
        $in['fleet_registration_id'] =  $request->fleet_registration_id;
        $in['trip_route_id'] =  $request->trip_route_id;
        $in['start_date'] =  Carbon::parse($request->start_date);
        $in['end_date'] =  Carbon::parse($request->end_date);

        $in['status'] =  $request->status == 'on' ? 1 : 0;

        $res = $data->fill($in)->save();

        if ($res) {
            $notification = array('message' => 'Updated Successfully!', 'alert-type' => 'success');
            return back()->with($notification);
        } else {
            $notification = array('message' => 'Something Error', 'alert-type' => 'error');
            return back()->with($notification);
        }
    }


    public function tripClose()
    {
        $data['page_title'] = "Ride Close";

        $data['tripAssign'] = TripAssign::orderBy('start_date','desc')->where('status','=','2')->where('user_id','=',Auth::user()->id)->paginate(20);
        
        return view('admin.trip.close.index', $data);
    }
    public function get_location($id)
    {
        $TripLocation = TripLocation::where('id',$id)->first();
        $data['latitude'] = $TripLocation->lat;
        $data['longitude'] = $TripLocation->lan;
        return response($data);
    }
    public function allbookings() 
    {
        $data['page_title'] = 'AllBookings';
        
        $user_id = Auth::user()->id;
        $allbookingdata = DB::table('ticket_bookings')
        ->join('trip_routes','ticket_bookings.trip_route_id','=','trip_routes.id')
        ->join('users','trip_routes.user_id','=','users.id')
        ->select('users.fname as driver_name','ticket_bookings.passenger_name','ticket_bookings.next_of_kin_name','ticket_bookings.next_of_kin_phone','trip_routes.start_point_name','trip_routes.end_point_name','ticket_bookings.phone','ticket_bookings.price','ticket_bookings.pnr','ticket_bookings.total_fare','ticket_bookings.booking_date','ticket_bookings.total_seat')
        ->where('ticket_bookings.user_id',$user_id)
        ->get();
        return view('admin.allbookings',$data,compact('allbookingdata'));
    }
    public function trip_bookings() 
    {
        $data['page_title'] = 'Trip Bookings';
        
        $user_id = Auth::user()->id;
        $allbookingdata = DB::table('ticket_bookings')
        ->join('trip_routes','ticket_bookings.trip_route_id','=','trip_routes.id')
        ->join('users','trip_routes.user_id','=','users.id')
        ->select('trip_routes.name as trip_name','users.fname as driver_name','ticket_bookings.passenger_name','ticket_bookings.next_of_kin_name','ticket_bookings.next_of_kin_phone','trip_routes.start_point_name','trip_routes.end_point_name','ticket_bookings.phone','ticket_bookings.price','ticket_bookings.pnr','ticket_bookings.total_fare','ticket_bookings.booking_date','ticket_bookings.total_seat')
        ->where('trip_routes.user_id',$user_id)
        ->get();
        return view('admin.trip.bookings',$data,compact('allbookingdata'));
    }

}
