<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CompanyFormRequest;
use App\Mail\SendEmailCreateCompany;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies =  Company::orderBy('created_at', 'desc')->paginate(10);

        return response()->view('company.index', ['companies' => $companies]);
    }

    public function create()
    {
        return view('company.form');
    }

    public function store(CompanyFormRequest $request) : RedirectResponse
    {
        $validated = $request->validated();

        // TODO:: Refactor
        if ($request->hasFile('logo')) {
            $filePath = Storage::disk('public')->put('images/companies/logo', request()->file('logo'));
            $validated['logo'] = $filePath;
        }

        $company = Company::create($validated);

        Mail::to('testreceiver@gmail.com’')->send(new SendEmailCreateCompany());

        if($company) {
            session()->flash('notif.success', 'Company created successfully!');

            return redirect()->route('companies.index', [$company]);
        }

        return abort(500);
    }

    public function show(Company $company)
    {
        return view('company.show', ['company' => $company]);
    }

    public function edit(Company $company)
    {
        return view('company.form', ['company' => $company]);
    }

    public function update(CompanyFormRequest $request, Company $company)
    {
        $validated = $request->validated();

        // TODO:: Refactor
        if ($request->hasFile('logo')) {
            Storage::disk('public')->delete($company->logo);
        }

        // TODO:: Refactor
        $filePath = Storage::disk('public')->put('images/companies/logo', request()->file('logo'));
        $validated['logo'] = $filePath;

        $update = $company->update($validated);

        if ($update) {
            session()->flash('notif.success', 'Company updated successfully!');
            return redirect()->route('companies.index');
        }

        return abort(500);
    }

    public function destroy(Company $company)
    {
        $company->delete();

        Storage::disk('public')->delete($company->logo);

        return redirect()->route('companies.index');
    }
}
