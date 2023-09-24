<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        // $validated = $request->validated();
        // $fileName = uniqid(). $request->file('logo')->getClientOriginalName();
        // $request->file('logo')->storeAs('public/company',$fileName);

        // Company::create($validated);

        // return redirect()->route('company.index')->with('success', 'Company Created Successfully');

        // Validate the request using the StoreCompanyRequest rules

        $validated = $request->validated();

        // Store the uploaded logo file
        $fileName = uniqid() . $request->file('logo')->getClientOriginalName();
        $request->file('logo')->storeAs('public/company', $fileName);

        // Create a new Company model instance and fill it with the validated data
        $company = new Company();
        $company->name = $validated['name'];
        $company->email = $validated['email'];
        $company->logo = $fileName;
        $company->website = $validated['website'];

        // Save the new company to the database
        $company->save();

        // Redirect to the company index page with a success message
        return redirect()->route('company.index')->with('success', 'Company Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        // Validate the request using the UpdateCompanyRequest rules
        $validated = $request->validated();

        // Check if a new logo file was uploaded
        if ($request->hasFile('logo')) {

            if($company->logo != null) {
                Storage::delete("public/comany/$company->logo");
            }
            // Generate a unique filename for the new logo
            $fileName = uniqid() . $request->file('logo')->getClientOriginalName();

            // Store the new logo file and update the company's logo field
            $request->file('logo')->storeAs('public/company', $fileName);
            $company->logo = $fileName;
        }

        // Update the company fields based on the validated data
        $company->name = $validated['name'];
        $company->email = $validated['email'];
        $company->website = $validated['website'];

        // Save the updated company to the database
        $company->save();

        // Redirect to the company index page with a success message
        return redirect()->route('company.index')->with('success', 'Company Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
