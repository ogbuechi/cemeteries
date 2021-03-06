<?php

namespace App\Http\Controllers;

use App\Models\Cementery;
use App\Models\Memorial;
use Illuminate\Http\Request;

class PagesControler extends Controller
{
    public function memorials(Request $request){
        $memorial = Memorial::latest();
        $title = "Recent Memorials";
        if($request->get('name')){
            $name = $request->get('name');
            $title = "Memorials result according to ".$name;
            $memorial->where('first_name', 'like', '%'.$name.'%')
                ->orWhere('middle_name', 'like', '%'.$name.'%')
                ->orWhere('first_name', 'like', '%'.$name.'%');

        }
        if($request->get('last_name')){
            $name = $request->get('last_name');
            $title = "Memorials result according to ".$name;
            $memorial->where('last_name', 'like', '%'.$name.'%');
        }
        if($request->get('middle_name')){
            $name = $request->get('middle_name');
            $title = "Memorials result according to ".$name;
            $memorial->where('middle_name', 'like', '%'.$name.'%');
        }
        if($request->get('first_name')){
            $name = $request->get('first_name');
            $title = "Memorials result according to ".$name;
            $memorial->where('first_name', 'like', '%'.$name.'%');
        }

        if($request->get('birth_year')){
            $birth = $request->get('birth_year');
            $memorial->where('birth_year', $birth);
        }
        if($request->get('death_year')){
            $death = $request->get('death_year');
            $memorial->where('death_year', $death);
        }

        if($request->get('cemetery')) {
            $c_id = $request->get('cemetery');
            $cemetery = Cementery::findOrFail($c_id);
            $title = $cemetery->name . ' Memorials';
            $memorial->whereCemeteryId($c_id);
        }
        if($request->get('location')) {
            $location = $request->get('location');
           $cemeteries = Cementery::where('address', 'like', '%'.$location.'%')->pluck('id');
            $title = $location . ' Memorials';
            $memorial->whereIn('id', $cemeteries);
        }

        if($request->get('y_from') && $request->get('y_to')){
            $from = $request->get('y_from');
            $to = $request->get('y_to');
            $memorial->whereBetween('death_year', [$from, $to])->orWhereBetween('birth_year', [$from, $to]);
        }

        $memorials = $memorial->paginate(50);

        return view('pages.memorials', compact('memorials','title'));
    }

    public function viewCemetery($id, $username){
        $cemetery = Cementery::with('memorials')->withCount('likers')->findOrFail($id);
        views($cemetery)->record();
        return view('pages.cemetery.view.default', compact('cemetery'));
    }

    public function viewMemorial($id){
        $memorial = Memorial::with('user')->findOrFail($id);
        return view('pages.memorial_view', compact('memorial'));
    }

    public function cemeteries(){
        $cemeteries = Cementery::paginate(100);
        return view('pages.cemeteries',compact('cemeteries'));
    }

    public function cemeteriesList(Request $request){
        $cemetery = Cementery::latest();
        if($request->get('name') && $request->get('address')){
            $name = $request->get('name');
            $cemetery->where('name', 'like', '%'.$name.'%')->where('address', 'like', '%'.$request['address'].'%');
        }elseif($request->get('name')){
            $name = $request->get('name');
            $cemetery->where('name', 'like', '%'.$name.'%');
        }elseif($request->get('address')) {
            $address = $request->get('address');
            $cemetery->where('address', 'LIKE', '%' . $address . '%');
        }
        $cemeteries = $cemetery->paginate(50);
        return view('pages.cemeteries_listing', compact('cemeteries'));
    }

    public function help(){
        return 'learning';
    }

}
