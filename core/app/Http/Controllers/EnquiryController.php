<?php

namespace App\Http\Controllers;

use App\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = "Enquiries List";
        $data['enquiries'] = Enquiry::latest()->paginate(20);
        return view('admin.enquiry.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

         $data = Enquiry::findOrFail($id);
         $data->read = 1;
         $data->save();

         $page_title = 'Enquiry Details';
        return view('admin.enquiry.show', compact('data', 'page_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required',
        ]);

        $data = Enquiry::findOrFail($id);
        $data->reply = $request->reply;
        $data->status = 1;
        $data->save();

        if($request->sbtn == 1){
            $username = explode("@", $data->email);
            send_email($data->email, $username[0], 'Enquiry Reply', $data->reply);
        }
        $notification = array('message' => 'Reply successfully', 'alert-type' => 'success');
        return back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Enquiry::where('id',$id)->forceDelete();
        $notification = array('message' => 'Delete Successfully!!', 'alert-type' => 'success');
        return back()->with($notification);
    }
}
