<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Toastr;
use Image;
use File;
use DB;
class GeneralSettingController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:setting-list|setting-create|setting-edit|setting-delete', ['only' => ['index','store']]);
        $this->middleware('permission:setting-create', ['only' => ['create','store']]);
        $this->middleware('permission:setting-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:setting-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        // ✅ Single record pattern: redirect directly to edit/create without listing/loop
        $setting = GeneralSetting::orderBy('id', 'desc')->first();

        if ($setting) {
            return redirect()->route('settings.edit', $setting->id);
        }

        return redirect()->route('settings.create');
    }
    public function create()
    {
        return view('backEnd.settings.create');
    }
    private function uploadImageSafely($file, $folder = 'public/uploads/settings/')
    {
        if (!$file) return null;

        $name = time() . '-' . rand(1000, 9999) . '-' . strtolower(preg_replace('/\s+/', '-', $file->getClientOriginalName()));

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        if (extension_loaded('gd')) {
            try {
                $nameWebp = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name);
                $imageUrl = $folder . $nameWebp;
                $img = Image::make($file->getRealPath());
                $img->encode('webp', 90);
                $img->save($imageUrl);
                return $imageUrl;
            } catch (\Exception $e) {
                // Fallback to normal move
            }
        }

        $file->move($folder, $name);
        return $folder . $name;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'fraud_api_key' => 'required',
            'copyright_color' => 'required',
            'primary_color' => 'required',
            'secodery_color' => 'required',
            'footer_color' => 'required',
            'facebook_page_username' => 'required',
            'white_logo' => 'required',
            'og_baner' => 'required',
            'favicon' => 'required',
            'status' => 'required',
        ]);

        $input = $request->all();
        $input['white_logo'] = $this->uploadImageSafely($request->file('white_logo'));
        $input['dark_logo']  = $this->uploadImageSafely($request->file('dark_logo'));
        $input['favicon']    = $this->uploadImageSafely($request->file('favicon'));
        $input['og_baner']   = $this->uploadImageSafely($request->file('og_baner'));

        $input['vendor_enabled'] = $request->has('vendor_enabled') ? 1 : 0;
        $input['reseller_enabled'] = $request->has('reseller_enabled') ? 1 : 0;

        GeneralSetting::create($input);
        Toastr::success('Success', 'Data insert successfully');
        return redirect()->route('settings.index');
    }

    public function edit($id)
    {
        $edit_data = GeneralSetting::find($id);
        return view('backEnd.settings.edit', compact('edit_data'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $update_data = GeneralSetting::find($request->id);
        $input = $request->all();

        if ($request->hasFile('white_logo')) {
            $input['white_logo'] = $this->uploadImageSafely($request->file('white_logo'));
        } else {
            $input['white_logo'] = $update_data->white_logo;
        }

        if ($request->hasFile('dark_logo')) {
            $input['dark_logo'] = $this->uploadImageSafely($request->file('dark_logo'));
        } else {
            $input['dark_logo'] = $update_data->dark_logo;
        }

        if ($request->hasFile('og_baner')) {
            $input['og_baner'] = $this->uploadImageSafely($request->file('og_baner'));
        } else {
            $input['og_baner'] = $update_data->og_baner;
        }

        if ($request->hasFile('favicon')) {
            $input['favicon'] = $this->uploadImageSafely($request->file('favicon'));
        } else {
            $input['favicon'] = $update_data->favicon;
        }

        $input['status'] = 1;
        $input['vendor_enabled'] = $request->has('vendor_enabled') ? 1 : 0;
        $input['reseller_enabled'] = $request->has('reseller_enabled') ? 1 : 0;

        // Filter input array so only valid database columns are passed
        $validColumns = \Illuminate\Support\Facades\Schema::getColumnListing('general_settings');
        $filteredInput = array_intersect_key($input, array_flip($validColumns));

        $update_data->update($filteredInput);

        Cache::forget('general_setting');
        Cache::forget('frontend_homepage_v1');
        Cache::forget('side_categories');
        Cache::forget('menu_categories');
        Cache::forget('brands_list');
        Cache::forget('pages_top');
        Cache::forget('pages_right');
        Cache::forget('common_menu');

        Toastr::success('Settings updated successfully!', 'Success');
        return redirect()->route('settings.edit', $update_data->id);
    }
 
    public function inactive(Request $request)
    {
        $inactive = GeneralSetting::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('Success','Data inactive successfully');
        return redirect()->back();
    }
    public function active(Request $request)
    {
        $active = GeneralSetting::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('Success','Data active successfully');
        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        $delete_data = GeneralSetting::find($request->hidden_id);
        File::delete($delete_data->image);
        $delete_data->delete();
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    }
}
