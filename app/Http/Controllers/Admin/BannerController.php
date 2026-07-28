<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerCategory;
use App\Models\Banner;
use Toastr;
use Image;
use File;
class BannerController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:banner-list|banner-create|banner-edit|banner-delete', ['only' => ['index','store']]);
         $this->middleware('permission:banner-create', ['only' => ['create','store']]);
         $this->middleware('permission:banner-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:banner-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data = Banner::orderBy('id','DESC')->with('category')->get();
        return view('backEnd.banner.index',compact('data'));
    }
    public function create()
    {
        $categories = BannerCategory::orderBy('id','DESC')->select('id','name')->get();
        return view('backEnd.banner.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'link'        => 'required',
            'image'       => 'required|image',
        ], [
            'category_id.required' => 'Please select a banner placement category.',
            'link.required'        => 'Please enter destination URL link.',
            'image.required'       => 'Please upload a banner image.',
        ]);
        
        // image upload 
        $file = $request->file('image');
        $name = time().'_'.$file->getClientOriginalName();
        $uploadPath = 'public/uploads/banner/';
        $file->move($uploadPath, $name);
        $fileUrl = $uploadPath.$name;

        $input = $request->all();
        $input['category_id'] = $request->category_id ?? BannerCategory::first()?->id ?? 1;
        $input['status'] = $request->status ? 1 : 0;
        $input['image'] = $fileUrl;
        Banner::create($input);
        Toastr::success('Success', 'Banner created successfully');
        return redirect()->route('banners.index');
    }
    
    public function edit($id)
    {
        $edit_data = Banner::find($id);
        $categories = BannerCategory::select('id','name')->get();
        return view('backEnd.banner.edit',compact('edit_data','categories'));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'link'        => 'required',
        ], [
            'category_id.required' => 'Please select a banner placement category.',
            'link.required'        => 'Please enter destination URL link.',
        ]);
        $update_data = Banner::find($request->id);
        $input = $request->all();
        $image = $request->file('image');
        if($image){
            $file = $request->file('image');
            $name = time().'_'.$file->getClientOriginalName();
            $uploadPath = 'public/uploads/banner/';
            $file->move($uploadPath,$name);
            $fileUrl = $uploadPath.$name;
            $input['image'] = $fileUrl;
            File::delete($update_data->image);
        }else{
            $input['image'] = $update_data->image;
        }

        $input['category_id'] = $request->category_id ?? $update_data->category_id ?? BannerCategory::first()?->id ?? 1;
        $input['status'] = $request->status ? 1 : 0;
        $update_data->update($input);

        Toastr::success('Success','Banner updated successfully');
        return redirect()->route('banners.index');
    }
 
    public function inactive(Request $request)
    {
        $inactive = Banner::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('Success','Data inactive successfully');
        return redirect()->back();
    }
    public function active(Request $request)
    {
        $active = Banner::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('Success','Data active successfully');
        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        $delete_data = Banner::find($request->hidden_id);
        $delete_data->delete();
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    }
}
