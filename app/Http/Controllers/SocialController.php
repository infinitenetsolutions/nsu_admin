<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $social = DB::table('social')->where('teacher_id',$id)->get();
        $teacher=DB::table('faculty_tbl')->find($id);
        return view('social.index', ['data' => $social,'id'=>$id,'faculty'=>$teacher]);
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
        DB::table('social')->insert($request->except('_token'));
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
        $status =  DB::table('social')->find($id);
        if ($status->status == 1) {
            DB::table('social')->where('id', $id)->update(['status' => '0']);
        } else {
            DB::table('social')->where('id', $id)->update(['status' => '1']);
        }
        if ($status->status == 1) {
            return redirect()->back()->with('status', 'Status Deactivated successfully');
        } else {
            return redirect()->back()->with('status1', 'Status activated successfully');
        }    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data = DB::table('social')->find($id);
        return view('social.update', ["data" => $data]);
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

        $result = DB::table('social')
            ->where('id', $request->id)
            ->update($request->except(['_token', 'id']));
        return redirect()->back()->with('update', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('social')->delete($id);
        return redirect()->back()->with('delete', 'Data successfully delete');
    }}
