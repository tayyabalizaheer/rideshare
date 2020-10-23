<?php

namespace App\Http\Controllers;

use App\GeneralSettings;
use App\Faq;
use App\Menu;
use App\Slider;
use App\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use File;
use Image;
class WebSettingController extends Controller
{

    public function manageLogo()
    {
        $data['page_title'] = "Manage Logo & Favicon";
        return view('webControl.logo', $data);
    }
    public function updateLogo(Request $request)
    {
        $this->validate($request, [
            'logo' => 'mimes:png',
            'favicon' => 'mimes:png',
            'freeloader' => 'mimes:gif'
        ]);
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = 'logo.png';
            $location = 'assets/images/logo/' . $filename;
            Image::make($image)->save($location);
        }
        if ($request->hasFile('favicon')) {
            $image = $request->file('favicon');
            $filename = 'favicon.png';
            $location = 'assets/images/logo/' . $filename;
            Image::make($image)->save($location);
        }
        $notification = array('message' => 'Update Successfully', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function getContact()
    {
        $data['basic'] = GeneralSettings::first();
        $data['page_title'] = "Contact Settings";
        return view('webControl.contact-setting',$data);
    }

    public function putContactSetting(Request $request)
    {
        $basic = GeneralSettings::first();
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        $in = Input::except('_method','_token');
        $basic->fill($in)->save();

        $notification =  array('message' => 'Contact  Updated Successfully', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function manageFooter()
    {
        $data['page_title'] = "Manage  Text";
        return view('webControl.footer', $data);
    }
    public function updateFooter(Request $request)
    {
        $basic = GeneralSettings::first();
        $in = Input::except('_method','_token');
        $basic->fill($in)->save();
        $notification = array('message' => 'Updated Successfully.', 'alert-type' => 'success');
        return back()->with($notification);
    }

    



    public function mangeBreadcrumb()
    {
        $data['page_title'] = "Manage Breadcrumb";
        return view('webControl.breadcrumb',$data);
    }
    public function updateBreadcrumb(Request $request)
    {
        $this->validate($request,[
            'breadcrumb' => 'image|mimes:jpg,jpeg',
            'contactForm' => 'image|mimes:jpg,jpeg',
            'tour_bg' => 'image|mimes:jpg,jpeg',
            'loginForm' => 'image|mimes:jpg,jpeg',
        ]);


        if($request->hasFile('breadcrumb')){
            $image = $request->file('breadcrumb');
            $filename = 'breadcrumb.jpg';
            $location = 'assets/images/logo/' . $filename;
            Image::make($image)->save($location);
        }

        if($request->hasFile('tour_bg')){
            $image = $request->file('tour_bg');
            $filename = 'tour_bg.jpg';
            $location = 'assets/images/logo/' . $filename;
            Image::make($image)->save($location);
        }


        if($request->hasFile('contactForm')){
            $image = $request->file('contactForm');
            $filename = 'contactForm.jpg';
            $location = 'assets/images/logo/' . $filename;
            Image::make($image)->save($location);
        }
        if($request->hasFile('loginForm')){
            $image = $request->file('loginForm');
            $filename = 'loginForm.jpg';
            $location = 'assets/images/logo/' . $filename;
            Image::make($image)->save($location);
        }



        $notification = array('message' => 'Breadcrumb Updated Successfully.', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function manageScript()
    {
        $data['page_title'] = " Comment Script";
        return view('webControl.fb-comment',$data);
    }
    public function updateScript(Request $request)
    {
        $basic = GeneralSettings::first();
        $this->validate($request,[
            'fb_comment' => 'required'
        ]);
        $basic->fb_comment = $request->fb_comment;
        $basic->save();
        $notification = array('message' => 'Script Updated Successfully.', 'alert-type' => 'success');
        return back()->with($notification);
    }
    public function manageAbout()
    {
        $data['page_title'] = "Manage About";
        return view('webControl.about',$data);
    }
    public function updateAbout(Request $request)
    {
        $basic = GeneralSettings::first();
        $this->validate($request,[
            'about' => 'required',
            'image' => 'mimes:jpg,jpeg,png| max:1000',
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'about-video-image.jpg';
            $location = 'assets/images/' . $filename;
            Image::make($image)->resize(555,390)->save($location);
        }
        $basic->about = $request->about;
        $basic->save();
        $notification = array('message' => 'About Page Updated Successfully.', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function managePrivacy()
    {
        $data['page_title'] = "Manage Privacy & Policy";
        return view('webControl.privacy',$data);
    }
    public function updatePrivacy(Request $request)
    {
        $basic = GeneralSettings::first();
        $this->validate($request,[
            'privacy' => 'required'
        ]);
        $basic->privacy = $request->privacy;
        $basic->save();
        $notification = array('message' => 'Privacy & Policy Updated Successfully.', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function manageTerms()
    {
        $data['page_title'] = "Manage Terms & Conditions";
        return view('webControl.terms',$data);
    }
    public function updateTerms(Request $request)
    {
        $basic = GeneralSettings::first();
        $this->validate($request,[
            'terms' => 'required'
        ]);
        $basic->terms = $request->terms;
        $basic->save();
        $notification = array('message' => 'Terms & Conditions Updated Successfully.', 'alert-type' => 'success');
        return back()->with($notification);
    }



    public function createFaqs()
    {
        $data['page_title'] = "Create New Faq";
        return view('webControl.faqs-create',$data);
    }

    public function storeFaqs(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $in = Input::except('_method','_token');
        Faq::create($in);
        $notification = array('message' => 'FAQS Created Successfully.', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function allFaqs()
    {
        $data['page_title'] = "All Question";
        $data['faqs'] = Faq::orderBy('id','desc')->paginate(10);
        return view('webControl.faqs-all',$data);
    }

    public function editFaqs($id)
    {
        $data['page_title'] = "Edit Faqs";
        $data['faqs'] = Faq::findOrFail($id);
        return view('webControl.faqs-edit',$data);
    }

    public function updateFaqs(Request $request, $id)
    {
        $faqs = Faq::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $in = Input::except('_method','_token');
        $faqs->fill($in)->save();

        $notification = array('message' => 'FAQS Updated Successfully.', 'alert-type' => 'success');
        return back()->with($notification);

    }

    public function deleteFaqs(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        Faq::destroy($request->id);
        $notification = array('message' => 'FAQS Deleted Successfully.', 'alert-type' => 'success');
        return back()->with($notification);
    }


    public function manageSlider()
    {
        $data['page_title'] = "Manage Slider";
        $data['slider'] = Slider::all();
        return view('webControl.slider', $data);
    }
    public function storeSlider(Request $request)
    {
        $this->validate($request,[
//            'image' => 'required'
        ]);
        $in = Input::except('_method','_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'slider_'.time().'.jpg';
            $location = 'assets/images/slider/' . $filename;
            Image::make($image)->resize(2100,1410)->save($location);
            $in['image'] = $filename;
        }
        Slider::create($in);
        $notification = array('message' => 'Slider Created Successfully.', 'alert-type' => 'success');
        return back()->with($notification);
    }
    public function deleteSlider(Request $request)
    {
        $this->validate($request,[
            'id' => 'required'
        ]);
        $slider = Slider::findOrFail($request->id);
        File::delete('assets/images/slider/'.$slider->image);
        $slider->delete();

        $notification = array('message' => 'Slider Deleted Successfully.', 'alert-type' => 'success');
        return back()->with($notification);
    }




}
