<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumniCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumni = DB::table('alumni')->orderBy('id', 'DESC')->get();
        return view('alumni.index', ['data' => $alumni, 'url' => $this->slider_url()]);
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
        $testimonial_image = '';
        $id =   DB::table('alumni')->insertGetId($request->except('_token'));

        if ($request->file('testimonial_image')) {
            $image = $request->file('testimonial_image');
            $destinationPath = 'upload/alumni/';
            $testimonial_image = date('YmdHis') . "_admin_." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $testimonial_image);
        }
        DB::table('alumni')
            ->where('id', $id)
            ->update(['testimonial_image' => $testimonial_image]);
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
        $status =  DB::table('alumni')->find($id);
        if ($status->is_deleted == 1) {
            DB::table('alumni')->where('id', $id)->update(['is_deleted' => '0']);
        } else {
            DB::table('alumni')->where('id', $id)->update(['is_deleted' => '1']);
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
        $data = DB::table('alumni')->find($id);
        return view('alumni.update', ["data" => $data, 'url' => $this->slider_url()]);
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
        if ($request->file('testimonial_image')) {
            $testimonial_image = DB::table('alumni')->find($id);
            $testimonial_image = $testimonial_image->testimonial_image;
            $image = $request->file('testimonial_image');
            $destinationPath = 'upload/alumni/';
            $image->move($destinationPath, $testimonial_image);
        }
        $result = DB::table('alumni')
            ->where('id', $request->id)
            ->update($request->except(['_token', 'id', 'testimonial_image']));
        return redirect('alumni')->with('update', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *alumni
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial_image = DB::table('alumni')->find($id);
        $testimonial_image = $testimonial_image->testimonial_image;
        if (file_exists(public_path('upload/alumni/' . $testimonial_image))) {
            unlink(public_path('upload/alumni/' . $testimonial_image));
        }
        DB::table('alumni')->delete($id);
        return redirect()->back()->with('delete', 'Data successfully delete');
    }

    function alumni_api($id)
    {
        $data = file_get_contents("https://nsucms.in/nsucms/api.php?id=" . $id);
        return $data;
    }
}
