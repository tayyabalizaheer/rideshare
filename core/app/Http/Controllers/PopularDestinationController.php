<?php

namespace App\Http\Controllers;


use App\GeneralSettings;
use Illuminate\Http\Request;
use App\PopularDestination;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use File;


class PopularDestinationController extends Controller
{
    public function updateGnl(Request $request)
    {
        $basic = GeneralSettings::first();
        $basic->popular_destination_h =  $request->popular_destination_h;
        $basic->popular_destination_p =  $request->popular_destination_p;
        $basic->save();
        return back()->with('success', 'Updated Successfully!');
    }
    public function index()
    {
        $data['page_title'] = "Popular Destination";
        $data['posts'] = PopularDestination::latest()->paginate(20);
        return view('admin.destination.index', $data);
    }

    public function create()
    {
        $data['page_title'] = 'Add Popular Destination';
        return view('admin.destination.add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:1000'
        ],
            [
                'name.required' => 'Name must not be empty',
            ]
        );

        $in = Input::except('_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'destination_'.time().'.jpg';
            $location = 'assets/images/tour/' . $filename;
            Image::make($image)->resize(380,340)->save($location);
            $in['image'] = $filename;
        }
        $res = PopularDestination::create($in);
        if ($res) {
            return back()->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating Plan');
        }

    }

    public function edit($id)
    {
        $data['page_title'] = 'Edit Popular Destination';
        $data['post'] = PopularDestination::find($id);
        return view('admin.destination.edit', $data);
    }
    public function updatePost(Request $request)
    {

        $data = PopularDestination::find($request->id);
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:1000'
        ],
            [
                'name.required' => 'Name must not be empty',
            ]
        );


        $in = Input::except('_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'destination_'.time().'.jpg';
            $location = 'assets/images/tour/' . $filename;
            Image::make($image)->resize(380,340)->save($location);
            $path = './assets/images/tour/';
            File::delete($path.$data->image);
            $in['image'] = $filename;
        }
        $res = $data->fill($in)->save();

        if ($res) {
            return back()->with('success', 'Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating Plan');
        }
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $data = PopularDestination::findOrFail($request->id);
        $path = './assets/images/tour/';
        File::delete($path.$data->image);
        $res =  $data->delete();

        if ($res) {
            return back()->with('success', 'Delete Successfully!');
        } else {
            return back()->with('alert', 'Problem With Deleting Post');
        }
    }
}
