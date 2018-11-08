<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Redirect;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('employees.index')->with(array('employees'=>DB::table('employees')->get()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nimi' => 'required|filled|max:32',
            'isikukood' => 'required|digits:11',
            'sunnipaev' => 'required'
        ]);

        $name = $request->input('nimi');
        $id = $request->input('isikukood');
        $bd = $request->input('sunnipaev');

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            DB::table('employees')->insert(
                ['nimi' => $name, 'isikukood' => $id, 'sunnipaev' => $bd]
            );
    
            return redirect('/employees');
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
        return View('employees.show')->with(array('employee'=>DB::table('employees')->where('id', $id)->first()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return View('employees.edit')->with(array('employee'=>DB::table('employees')->where('id', $id)->first()));
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
        $validator = Validator::make($request->all(), [
            'nimi' => 'required|filled|max:32',
            'isikukood' => 'required|digits:11',
            'sunnipaev' => 'required'
        ]);

        $name = $request->input('nimi');
        $ik = $request->input('isikukood');
        $bd = $request->input('sunnipaev');

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            DB::table('employees')
                ->where('id', $id)
                ->update(
                    ['nimi' => $name, 'isikukood' => $ik, 'sunnipaev' => $bd]
                );

            return redirect('/employees');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('employees')->where('id', $id)->delete();
        return redirect('/employees');
    }
}
