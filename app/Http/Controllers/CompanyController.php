<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use App\Exports\CompanyExport;
use Maatwebsite\Excel\Facades\Excel;
class CompanyController extends Controller
{
    public function index()
    {
        $company = DB::table('companies')->paginate(5);
        return view('company.index',compact('company'));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $company = DB::table('companies')->where('company_name','like',"%".$search."%")->paginate();
        return view('company.index',compact('company'));
    }

    public function export()
    {
        return Excel::download(new CompanyExport, 'companies.xlsx');
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'company_email' => 'required',
            'company_address' => 'required',
            'company_phone' => 'required'
        ],
        [
            'company_name.required' => 'Company Name required',
            'company_email.required' => 'Company Email required',
            'company_address.required' => 'Company Address required',
            'company_phone.required' => 'Company Phone required'
        ]
    );

       $company =  Company::create($request->all());

        if ($company) {
            Alert::success('Sukses Tambah', 'Sukses Tambah Data');
            return redirect()->route('company.index');
        }

        Alert::success('Gagal Tambah', 'Gagal Tambah Data');
        return redirect()->route('company.create'); 
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('company.show',compact('company'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('company.edit',compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required',
            'company_email' => 'required',
            'company_address' => 'required',
            'company_phone' => 'required'
        ]);
        $company = Company::find($id);
        $company->update($request->all());
        if ($company) {
            Alert::success('Sukses Edit', 'Sukses Edit Data');
            return redirect()->route('company.index');
        }

        Alert::success('Gagal Edit', 'Gagal Edit Data');
        return redirect()->route('company.create'); 
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        if ($company->delete()) {
            Alert::success('Hapus Sukses', 'Sukses Hapus Data');
            return redirect()->route('company.index');
        }

        Alert::success('Gagal Hapus', 'Gagal Hapus Data');
        return redirect()->route('company.index');
    }
}
