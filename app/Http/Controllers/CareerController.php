<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $career = DB::table('career_tbl')->get();
        return view('career.index', ['data' => $career, 'url' => $this->slider_url()]);
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
        $image_name = '';
        $id =   DB::table('career_tbl')->insertGetId($request->except('_token'));

        if ($request->file('image_name')) {
            $image = $request->file('image_name');
            $destinationPath = 'upload/career/';
            $image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
        }
        DB::table('career_tbl')
            ->where('id', $id)
            ->update(['image_name' => $image_name]);
        return redirect()->back()->with('store', 'Data successfully Added');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $status =  DB::table('career_tbl')->find($id);
        if ($status->is_deleted == 1) {
            DB::table('career_tbl')->where('id', $id)->update(['is_deleted' => '0']);
        } else {

            DB::table('career_tbl')->where('id', $id)->update(['is_deleted' => '1']);
        }
        if ($status->is_deleted == 1) {
            return redirect()->back()->with('status', 'Status Deactivated successfully');
        } else {
            return redirect()->back()->with('status1', 'Status activated successfully');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('career_tbl')->find($id);
        return view('career.update', ["data" => $data, 'url' => $this->slider_url()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        if ($request->file('image_name')) {
            $image_name = DB::table('career_tbl')->find($id);
            $image_name = $image_name->image_name;
            $image = $request->file('image_name');
            $destinationPath = 'upload/career/';
            echo  $image->move($destinationPath, $image_name);
        }
        $result = DB::table('career_tbl')
            ->where('id', $request->id)
            ->update($request->except(['_token', 'id', 'image_name']));
        return redirect('career')->with('update', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image_name = DB::table('career_tbl')->find($id);
        $image_name = $image_name->image_name;
        if (file_exists(public_path('upload/career/' . $image_name))) {
            unlink(public_path('upload/career/' . $image_name));
        }
        DB::table('career_tbl')->delete($id);
        return redirect()->back()->with('delete', 'Data successfully delete');
    }

    public function careerData()
    {
        $career = DB::table('career_applied')->get();
        return view('career.applied', ['data' => $career, 'url' => $this->slider_url()]);
    }

    public function career_destroy($id)
    {
       
        DB::table('career_applied')->delete($id);
        return redirect()->back()->with('delete', 'Data successfully delete');
    }
    public function career_status($id){

    
        $status =  DB::table('career_applied')->find($id);
        if ($status->status == 'padding') {
            DB::table('career_applied')->where('id', $id)->update(['status' => 'accept']);
        } else {

            DB::table('career_applied')->where('id', $id)->update(['status' => 'padding']);
        }
        if ($status->status == 'accept') {
            return redirect()->back()->with('status', 'Status Deactivated successfully');
        } else {
            return redirect()->back()->with('status1', 'Status activated successfully');
        }
    }
}
