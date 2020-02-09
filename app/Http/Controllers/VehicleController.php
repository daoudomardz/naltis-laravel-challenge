<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\Car;
use App\Truck;
use Illuminate\Support\Facades\Session;

class VehicleController extends Controller
{
    

    protected $_vehicle;
    private $vehicleTypes = [
        'Vehicle' => Vehicle::class,
        'Car' => Car::class,
        'Truck' => Truck::class
    ];

    public function __construct(Vehicle $vehicle)
    {
        $this->_vehicle = $vehicle;
    }
    /**
     * Load all vehicles
     */
    public function index()
    {
       $allVehicles = $this->_vehicle->all();
       //return to vehicles view
    }

    /**
     * Store all kinds of vehicles
     */
    public function store(Request $req)
    {
        $req->validate([
            'make'=>'required|max:255',
            'model'=>'required|max:255',
            'type'=>'required|in:Vehicle,Car,Truck',
            'year'=>'required|digits:4|integer',
        ]);
        $_vehClass = $this->vehicleTypes[$req->type];
        $v = new $_vehClass;
        $v->make = $req->make;
        $v->model = $req->model;
        $v->year = $req->year;
        $v->save();
        // dd($v);
        Session::flash('flash_message', 'Vehicle successfully saved!');
        Session::flash('flash_type', 'alert-success');
        return redirect('/');
    }
    public function create(){
        return view('create');
    }
    // public function show($id){
        
    //     return view('create');
    // }
    public function edit($id){
        $v = Vehicle::findOrFail($id);
        return view('edit')->with('vehicle',$v);
    }
    /**
     * Update all kinds of vehicles
     */
    public function update($id, Request $req)
    {
        
        $v = Vehicle::findOrFail($id);
        $req->validate([
            'make'=>'required|max:255',
            'model'=>'required|max:255',
            // 'type'=>'required|in:Vehicle,Car,Truck',
            'year'=>'required|digits:4|integer',
        ]);
        $input = $req->all();
        $v->fill($input)->save();
        Session::flash('flash_message', 'Vehicle successfully updated!');
        Session::flash('flash_type', 'alert-success');
        return redirect()->back();
    }

    /**
     * Remove a vehicle
     */
    public function destroy($id)
    {
        $v = Vehicle::findOrFail($id);
        $v->delete();
        Session::flash('flash_message', 'Vehicle successfully deleted!');
        Session::flash('flash_type', 'alert-success');
        return redirect()->back();
    }
}
