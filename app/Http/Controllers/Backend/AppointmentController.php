<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::paginate(10);
        return view('backend.appointment.index', compact('appointments')) ;
    }

    public function json()
    {
        $list = Appointment::with('patients', 'service')->where('status','1')->get();
        $jsonObj['data'] = $list;
        foreach($list as $key => $row){
            $jsonObj['data'][$key]->full_name = $row->patients->full_name;
            $jsonObj['data'][$key]->age       = $row->patients->age;
            $jsonObj['data'][$key]->services = $row->service->name;
            $jsonObj['data'][$key]->status_word =  Appointment::STATUS[$row->status];
        }
        echo json_encode($jsonObj);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
