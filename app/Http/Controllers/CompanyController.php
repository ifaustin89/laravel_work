<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::orderBy('id','asc')->paginate(5);
        return view('Employee.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        
        Company::create($request->post());

        return redirect()->route('employee.index')->with('success','Company has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(company $company)
    {
        return view('Employee.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('Employee.edit', compact('company'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
    ]);

    $company = Company::findOrFail($id);
    $company->name = $request->input('name');
    $company->email = $request->input('email');
    $company->address = $request->input('address');
    $company->save();

    return redirect()->route('employee.index')->with('success', 'Company has been updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $company = Company::findOrFail($id);
    $company->delete();

    return redirect()->route('employee.index')->with('success', 'Company has been deleted successfully');
}

}
