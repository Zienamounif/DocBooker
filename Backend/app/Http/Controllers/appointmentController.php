<?php

namespace App\Http\Controllers;

use App\Models\appointments;
use App\Models\patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class appointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index($doctorId)
    {
        //
        $appointments = appointments::all()->where('doctor_id',$doctorId);


        return response()->json(['appointment'=>$appointments]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $patient = patient::find(1);


        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(["message"=>$validator->getMessageBag()]);
        }
        appointments::create([
            'doctor_id'=>request('doctor_id'),
            'date'=>Date::now(),
            'patient_id'=>$patient->id,

        ]);
        return response()->json(["message"=>'appointment has been created sucessfully']);



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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id )
    {
        //
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(["message"=>$validator->getMessageBag()]);
        }

        $inputs = request();
        $appointment = appointments::find($id);
        //dd($appointment);
        $appointment->status = $inputs['status'];
        $appointment->date = $inputs['date'];


        $appointment->save();

        return response()->json(['message','Appointment has been updated']);



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
        $appointment =appointments::find($id);

        if(is_null($appointment))
             return response()->json([['message','appointment not found']]);
             
        $appointment->delete();

        return response()->json(['message','appointment has been deleted sucessfully']);
    }
}
