<?php

namespace App\Http\Controllers;


use App\Holidays;
use File;
use Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HolidaysController extends Controller
{

    public function AddHoliday()
    {
        $holidays = Holidays::all();
        return view('shop.pages.add-holiday');
    }

    public function storeHoliday(Request $request)
    {

        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'img' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ]);
        $path = $request->file('img')->store('public/images');
        $filename = str_replace('public/', "", $path);

        $holiday = Holidays::create([
            'title' => request('title'), //name
            'description' => request('description'),
            'img' => $filename,
        ]);

        return redirect('/control-holiday');
    }

    public function ControlHoliday()
    {
        $holidays = Holidays::all();
        return view('shop.pages.control-holiday', compact('holidays')); //psl
    }

    public function warningHoliday(Holidays $holiday)
    {
        return view('shop.pages.warning-holiday', compact('holiday'));
    }

    public function deleteHoliday(Holidays $holiday)
    {

      $holiday->delete();
      return redirect('control-holiday');
    }

    public function editHoliday(Holidays $holiday){
        $holidays = Holidays::all();

        return view ('shop.pages.edit-holiday', compact('holiday'));
    }

    public function edit_Holiday(Request $request, Holidays $holiday){

        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'img' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ]);

        Holidays::where('id', $holiday->id)->update
        (['title' => request('title'),
            'description' => request('description'),
            'img' => request('img')
        ]);
        if ($request->hasFile('img'))
        {
            File::delete('storage/'.$holiday->img);
            $path=$request->file('img')->store('/public/');
            $filename=str_replace('public/',"",$path);
            Holidays::where('id',$holiday->id)->update([
                'img'=>$filename
            ]);
        }
        return redirect('/control-holiday');
    }



}
