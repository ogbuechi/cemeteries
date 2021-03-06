<?php

namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Cementery;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class CementeriesController extends Controller
{

    public function index()
    {
        $cemeteries = Cementery::whereUserId(auth()->id())->get();

        return view('user.cemeteries.list', compact('cemeteries'));
    }

    public function create()
    {
        return view('user.cemeteries.create');
    }


    public function storePhoto(Request $request){
        $photo = new Image();
        $photo->user_id = auth()->id(); $photo->cemetery_id = $request['cemetery_id'];
        $photo->name = $request['name']; $photo->path = $request['image'];
        $photo->type = $request['type'];
        $photo->save();
        return redirect()->back()
            ->with('success_message', 'Cemetery Photo was successfully added.');
    }


    public function search(Request $request)
    {
        if($request->get('name')){
            $cemeteries = Cementery::where('name', 'like', '%'.$request->get('name').'%')->get();
            if($cemeteries){
                $data['status'] = 1;
                $data['data'] = $cemeteries;
            }else{
                $data['status'] = 0;
                $data['msg'] = 'No result found';
            }
        }else{
            $data['status'] = 0;
            $data['msg'] = 'pls type sth';
        }
        return response()->json($data);
    }

    public function store(Request $request)
    {

            $data = $this->getData($request);

            Cementery::create($data);

            return redirect()->route('cemeteries.index')
                ->with('success_message', 'Cementery was successfully added.');

    }

    public function show($id)
    {
        $cementery = Cementery::with('user')->findOrFail($id);

        views($cementery)->record();

        return view('cementeries.show', compact('cementery'));
    }

    public function edit($id)
    {
        $cemetery = Cementery::findOrFail($id);
        return view('user.cemeteries.edit', compact('cemetery'));
    }


    public function update($id, Request $request)
    {

            $data = $this->getData($request);

            $cemetery = Cementery::findOrFail($id);
            $cemetery->update($data);

            return redirect()->route('cemeteries.index')
                ->with('success_message', 'Cemetery was successfully updated.');

    }


    public function destroy($id)
    {
        try {
            $cementery = Cementery::findOrFail($id);
            $cementery->delete();

            return redirect()->back()->with('success_message', 'Cemetery was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }


    protected function getData(Request $request)
    {
        $rules = [
                'user_id' => 'nullable',
            'name' => 'string|min:1|max:255|nullable',
            'username' => 'string|min:1|max:255|unique:cementeries',
            'city' => 'string|min:1|nullable',
            'state' => 'string|min:1|nullable',
            'country' => 'string|nullable',
            'address' => 'string|min:1|nullable',
            'longitude' => 'string|min:1|nullable',
            'latitude' => 'string|min:1|nullable',
            'status' => 'string|min:1|nullable',
            'approved' => 'string|min:1|nullable',
            'municipalities' => 'string|min:1|nullable',
            'website' => 'string|min:1|nullable',
            'image' => 'string|nullable',
            'logo' => 'string|nullable',
            'description' => 'string|nullable',
        ];


        $rules = [
            'name' => 'required',
            'city' => 'string|min:1|nullable',
            'state' => 'string|min:1|nullable',
            'country' => 'string|nullable',
            'address' => 'string|min:1|nullable',
            'longitude' => 'string|min:1|nullable',
            'latitude' => 'string|min:1|nullable',
            'municipalities' => 'string|min:1|nullable',
            'website' => 'string|min:1|nullable',
        ];

        $data = $request->validate($rules);
        $data['user_id'] = auth()->id();
        return $data;
    }

}
