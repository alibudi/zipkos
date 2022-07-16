<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employe;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\EmployeExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employe = DB::table('employes')
                ->join('companies','employes.company','=','companies.company_id')
                ->select('employes.*','companies.company_name')
                ->paginate(5);
        return view('employe.index', compact('employe'));   
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $employe = DB::table('employes')->where('fullname','like',"%".$search."%")->paginate();
        return view('employe.index',compact('employe'));
    }

    public function export()
    {
        return Excel::download(new EmployeExport, 'employes.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::all();
        return view('employe.create',compact('company'));
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
            'fullname' => 'required',
            'department' =>'required',
            'email' => 'required',
            'phone' => 'required'
        ],
        [
            'fullname.required' => 'Fullname is required',
            'company.required' => 'Company is required',
            'department.required' => 'Department is required',
            'phone.required' => 'Phone is required'
        ]);

        $employe = Employe::create($request->all());
       if($employe)
        {
            Alert::success('Sukses Tambah', 'Sukses Tambah Data');
            return redirect()->route('employe.index');
        }
        Alert::success('Gagal Tambah', 'Gagal Tambah Data');
        return redirect()->route('employe.create');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::all();
        $employe = Employe::findOrFail($id);
        return view('employe.show',compact('employe','company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::all();
        $employe = Employe::findOrFail($id);
        return view('employe.edit',compact('employe','company'));
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
        $request->validate([
            'fullname' => 'required',
            'department' => 'required',
            'company' => 'required',
            'phone' => 'required'
        ],
        [
            'fullname.required' => 'Fullname is required',
            'company.required' => 'Company is required',
            'department.required' => 'Department is required',
            'phone.required' => 'Phone is required'
        ]
    );

        $employe = Employe::find($id);
        $employe->update($request->all());
        if($employe)
        {
            Alert::success('Sukses Edit', 'Sukses Edit Data');
            return redirect()->route('employe.index');
        }
        Alert::success('Gagal Edit', 'Gagal Edit Data');
        return redirect()->route('employe.create');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employe = Employe::findOrFail($id);
        if($employe->delete())
        {
            Alert::success('Sukses Hapus', 'Sukses Delete Data');
            return redirect()->route('employe.index');
        }
        Alert::success('Gagal Hapus', 'Gagal Delete Data');
        return redirect()->route('employe.index');
    }
}
