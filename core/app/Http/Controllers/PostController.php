<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use File;

class PostController extends Controller
{
    public function category()
    {
        $data['page_title'] = 'Blog Category';
        $data['events'] = Category::latest()->get();
        return view('admin.post.post-category', $data);
    }
    public function UpdateCategory(Request $request)
    {
        $macCount = Category::where('name', $request->name)->where('id', '!=', $request->id)->count();
        if ($macCount > 0) {
            $notification = array('message' => 'This one Already Exist', 'alert-type' => 'error');
            return back()->with($notification);
        }
        if ($request->id == 0) {
            $data['name'] = $request->name;
            $data['status'] = $request->status;
            $res = Category::create($data);
            if ($res) {
                $notification = array('message' => 'Saved Successfully!', 'alert-type' => 'success');
                return back()->with($notification);
            } else {
                $notification = array('message' => 'Problem With Adding New Category!', 'alert-type' => 'error');
                return back()->with($notification);
            }
        } else {
            $mac = Category::findOrFail($request->id);
            $mac['name'] = $request->name;
            $mac['status'] = $request->status;
            $res = $mac->save();

            if ($res) {
                $notification = array('message' => 'Updated Successfully!', 'alert-type' => 'success');
                return back()->with($notification);
            } else {
                $notification = array('message' => 'Problem With Updating Category!', 'alert-type' => 'error');
                return back()->with($notification);
            }
        }
    }

    public function index()
    {
        $data['page_title'] = "All Blogs";
        $data['posts'] = Post::latest()->paginate(12);
        return view('admin.post.index', $data);
    }

    public function create()
    {
        $data['page_title'] = 'Add Blog';
        $data['category'] = Category::whereStatus(1)->get();
        return view('admin.post.add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'cat_id' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png | max:1000'
        ],
            [
                'title.required' => 'Post Title Must not be empty',
                'cat_id.required' => 'Category Must be selected',
            ]
        );

        $in = Input::except('_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'post_'.time().'.jpg';
            $location = 'assets/images/post/' . $filename;
            Image::make($image)->resize(700,350)->save($location);
            $in['image'] = $filename;
        }

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'post_thumb'.time().'.jpg';
            $location = 'assets/images/post/' . $filename;
            Image::make($image)->resize(350,213)->save($location);
            $in['thumb'] = $filename;
        }


        $in['status'] =  $request->status == 'on' ? '1' : '0';
        $res = Post::create($in);
        if ($res) {
            $notification = array('message' => 'Updated Successfully!', 'alert-type' => 'success');
            return back()->with($notification);
        } else {
            $notification = array('message' => 'Problem With Updating Post', 'alert-type' => 'error');
            return back()->with($notification);
        }

    }

    public function edit($id)
    {
        $data['page_title'] = 'Edit Blog';
        $data['post'] = Post::findOrFail($id);
        $data['category'] = Category::whereStatus(1)->get();
        return view('admin.post.edit', $data);
    }
    public function updatePost(Request $request)
    {

        $data = Post::find($request->id);
        $request->validate([
            'title' => 'required',
            'cat_id' => 'required',
            'details' => 'required',
            'image' => 'nullable | mimes:jpeg,jpg,png | max:1000'
        ],
            [
                'title.required' => 'Post Title Must not be empty',
                'cat_id.required' => 'Category Must be selected',
                'details.required' => 'Post Details  must not be empty',
            ]
        );


        $in = Input::except('_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'post_'.time().'.jpg';
            $location = 'assets/images/post/' . $filename;
            Image::make($image)->resize(700,350)->save($location);
            $path = './assets/images/post/';
            File::delete($path.$data->image);
            $in['image'] = $filename;
        }


        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'post_thumb'.time().'.jpg';
            $location = 'assets/images/post/' . $filename;
            Image::make($image)->resize(350,213)->save($location);

            $path = './assets/images/post/';
            File::delete($path.$data->thumb);
            $in['thumb'] = $filename;
        }
        $in['status'] =  $request->status == 'on' ? '1' : '0';
        $res = $data->fill($in)->save();

        if ($res) {
            $notification = array('message' => 'Updated Successfully!', 'alert-type' => 'success');
            return back()->with($notification);
        } else {
            $notification = array('message' => 'Problem With Updating Post!', 'alert-type' => 'error');
            return back()->with($notification);
        }
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $data = Post::findOrFail($request->id);
        $path = './assets/images/post/';
        File::delete($path.$data->image);
        $res =  $data->delete();

        if ($res) {
            $notification = array('message' => 'Post Delete Successfully!', 'alert-type' => 'success');
            return back()->with($notification);
        } else {
            $notification = array('message' => 'Problem With Deleting Post!', 'alert-type' => 'error');
            return back()->with($notification);
        }
    }
}
