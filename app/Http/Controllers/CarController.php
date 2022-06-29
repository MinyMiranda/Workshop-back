<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {

        $cars = Car::get(['id','name','brand']);
        return response()->json($cars);
    }

    public function get($id)
    {
        $car = Car::findOrFail($id);
        return response()->json($car);
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required|string|min:3',
            'brand'=>'required|string',
            'color' => 'required|string',
            'km' => 'required|integer',
            'details' => 'nullable|string',
            'image' => 'required|url'
        ]);

        $cars = Car::create([
            'name'=>$request->input('name'),
            'brand'=> $request->input('brand'),
            'color'=> $request->input('color'),
            'km' => $request->input('km'),
            'details' => $request->input('details'),
            'image' => $request->input('image')
        ]);

        return response()->json($cars);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'name'=>'sometimes|required|string|min:3',
            'brand'=>'sometimes|required|string',
            'color' => 'sometimes|required|string',
            'km' => 'sometimes|required|integer',
            'details' => 'nullable|string',
            'image' => 'sometimes|required|url'
        ]);

        $car = Car::findOrFail($id);
        
        $car->update($request->only('name', 'brand', 'color', 'details', 'image'));

        return response()->json($car);
    }

    public function destroy($id){
        $car = Car::findOrFail($id);
        return response()->json($car->delete());
    }

}
