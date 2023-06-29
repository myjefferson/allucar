<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Http\Requests\VehicleRequest;

class VehicleController extends Controller
{
    public function index(){
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    public function show($id){

        if(!$vehicle = Vehicle::find($id))
            return redirect()->route('vehicle.index');

        return view('vehicles.show', compact('vehicle'));
    }

    public function create(){

    }

    public function store(VehicleRequest $request){
        Vehicle::create([
            'image' => $this->uploadImage($request),
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'preco' => $request->preco
        ])->save();

        return redirect()->route('vehicle.index');
    }

    public function update(VehicleRequest $request, $id){
        Vehicle::find($id)
        ->update(
            ['image' => $this->uploadImage($request)],
            $request->only(
                'marca',
                'modelo',
                'preco'
            )
        );
        return redirect()->route('vehicle.show', compact('id'));
    }

    public function delete($id){
        Vehicle::find($id)->delete();
        return redirect()->route('vehicle.index', compact('id'));
    }

    public function uploadImage($request){
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload'), $imageName);
            return $imageName;
        }
    }
}
