<?php

namespace App\Http\Controllers;

use App\GeneralSettings;
use Illuminate\Http\Request;
use App\PopularTour;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use File;


class PopularTourController extends Controller
{
    public function updateGnl(Request $request)
    {
        $basic = GeneralSettings::first();
        $basic->popular_tour_h =  $request->popular_tour_h;
        $basic->popular_tour_p =  $request->popular_tour_p;
        $basic->save();
        return back()->with('success', 'Updated Successfully!');
    }
    public function index()
    {
        $data['page_title'] = "Popular Tour";
        $data['posts'] = PopularTour::latest()->paginate(20);
        return view('admin.tour.index', $data);
    }

    public function create()
    {
        $data['page_title'] = 'Add Tour';
        return view('admin.tour.add', $data);
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
            $filename = 'tour_'.time().'.jpg';
            $location = 'assets/images/tour/' . $filename;
            Image::make($image)->resize(350,195)->save($location);
            $in['image'] = $filename;
        }
        $res = PopularTour::create($in);
        if ($res) {
            return back()->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating Plan');
        }

    }

    public function edit($id)
    {
        $data['page_title'] = 'Edit Tour';
        $data['post'] = PopularTour::find($id);
        return view('admin.tour.edit', $data);
    }
    public function updatePost(Request $request)
    {

        $data = PopularTour::find($request->id);
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
            $filename = 'tour_'.time().'.jpg';
            $location = 'assets/images/tour/' . $filename;
            Image::make($image)->resize(350,195)->save($location);
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
        $data = PopularTour::findOrFail($request->id);
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
