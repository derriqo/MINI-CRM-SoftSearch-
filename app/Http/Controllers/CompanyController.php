<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name'=>'required'

        ]);

        $company = new Company([
            'company_name' =>$request->get('company_name'),
            'email'=>$request->get('email'),
            'logo'=>$request->get('logo'),
            'website'=>$request->get('website'),
        ]);
        $company->save();
        return redirect('/companies')->with('success', 'Company saved!');
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

    public function formedit(Request $request, $company_id)
    {
        $company = Company::find($company_id);
        return view('companies.edit', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request, Company $id)
    {
        Company::where('id', $id)->update([
            'company_name' => $request->input('company_name')
        ]);

        return redirect('/companies')->with('success', 'Company updated!');

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
        $request->validate()([
            'company_name'=>'required'

        ]);


        $company = Company::find($id);
        $company->first_name =  $request->get('first_name');
        $company->email = $request->get('email');
        $company->logo = $request->get('logo');
        $company->website = $request->get('website');
        $company->update();

        return redirect('/companies')->with('success', 'Company updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($company_id){
        DB::table('companies')->where('id', $company_id)->delete();

        // return redirect('/companies')->with('success', 'Company deleted!');
        return redirect()->route("companies.index");
    }
}
