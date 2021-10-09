<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class GalleryController extends Controller
{
     /**
     * Listing Of images gallery
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$images = Gallery::get();
    	return view('image-gallery',compact('images'));
    }


    /**
     * Upload image function
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('gallery-images'), $input['image']);


        $input['title'] = $request->title;
        Gallery::create($input);


    	return back()->with('success','Image Uploaded successfully.');
    }


    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */

    /*public function destroy($id)
    {
    	Gallery::find($id)->delete();
    	return back()->with('success','Image removed successfully.');	
    }*/

    public function destroy($id){ 
        $findImg = DB::table('galleries')->select('image')->where('id', $id )->first();

        $selectImg = $findImg->image;
        //$selectImg = $findImg[0]->image;

        $pubpath =  (public_path('gallery-images/'));

        $imgpath = $pubpath.$selectImg;
        //dd($imgpath);

        if($imgpath){
            if(file_exists($imgpath)){
                //dd('Found');
                unlink($imgpath);
                //return $imgpath;
            }
            else{
                dd('Not Found');
            }

            Gallery::find($id)->delete();
            
        }
        return back()->with('success','Image removed successfully.');
    }


}
