<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ContactUsController extends Controller
{
   public function index(){
    $testimonial = DB::table('contactus_tbl')->orderBy('id','DESC')->get();
    return view('contactus.index', ['data' => $testimonial, 'url' => $this->slider_url()]);
   }

   public function destroy($id)
   {
       DB::table('contactus_tbl')->delete($id);
       return redirect()->back()->with('delete', 'Data successfully delete');
   }
}
