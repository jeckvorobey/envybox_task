<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Feedback::all();
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
        $rules = [
            'uname' => 'required',
            'phone' => 'required',
            'msg' => 'required',
        ];

        $request->validate($rules);


        if ($request->save === 'db') {
            $feedback = Feedback::create([
                'uname' => $request->uname,
                'phone' => $request->phone,
                'msg' => $request->msg
            ]);

            if ($feedback) {
                return response()->json([
                    'status' => true,
                    'feedback' => $feedback
                ]);
            }
        }

        if ($request->save === 'file') {

            $feedback = Feedback::saveFile([
                'id' => Str::uuid(),
                'uname' => $request->uname,
                'phone' => $request->phone,
                'msg' => $request->msg,
                'date' => date('Y-m-d H:i:s'),
            ]);


            if ($feedback) {
                return response()->json([
                    'status' => true,
                    'feedback' => $feedback
                ]);
            }
        }
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
