<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Level;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employees'] = Employee::get();
        return view('empmanagement.index', $data);

        // $data = Employee::all();
        // return view('empmanagement.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['levels'] = Level::get()->pluck('name', 'id');
        return view('empmanagement.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'id_number' => 'required|integer',
            'name' => 'required|max:255',
            'gender' => 'required|string',
            'division' => 'required|string',
            'level_id' => 'required',
            'role' => 'required|string',
        ]);

        try {

            Employee::create([
                'id_number' => $request->id_number,
                'name' => $request->name,
                'gender' => $request->gender,
                'division' => $request->division,
                'level_id' => $request->level_id,
                'role' => $request->role
            ]);
    
            return redirect(route('empmanagement.index'))
                ->withSuccess("Data berhasil ditambahkan");
                
        } catch(\Exception $e) {
            return redirect()->back()->withError('Data gagal ditambahkan');
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
        $data['employee'] = Employee::find($id);
        $data['levels'] = Level::get()->pluck('name', 'id');
        return view('empmanagement.edit', $data);
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
        $validated = $request->validate([
            'id_number' => 'required|integer',
            'name' => 'required|max:255',
            'gender' => 'required|string',
            'division' => 'required|string',
            'level_id' => 'required',
            'role' => 'required|string',
        ]);

        try {

            $emp = Employee::find($id);
            $emp->update([
                'id_number' => $request->id_number,
                'name' => $request->name,
                'gender' => $request->gender,
                'division' => $request->division,
                'level_id' => $request->level_id,
                'role' => $request->role
            ]);
    
            return redirect(route('empmanagement.index'))
                ->withSuccess("Data berhasil diubah");
                
        } catch(\Exception $e) {
            return redirect()->back()->withError('Data gagal diubah');
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
        try {
            $emp = Employee::find($id);
            $emp->delete();
            return redirect(route('empmanagement.index'))
                ->withSuccess("Data berhasil dihapus");

        } catch (\Exception $e) {
            return 'failed';
        }
    }
}
