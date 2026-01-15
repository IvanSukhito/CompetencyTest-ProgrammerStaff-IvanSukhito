<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Jabatan;
use App\Models\Kota;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\HtmlString;
use Carbon\Carbon;


class KaryawanController extends Controller
{
    //
    public function index()
    {
        $search = request()->get('keyword');
        if($search){
            $getDataKaryawan = Karyawan::where('nama_karyawan','like',"%$search%")->paginate(10);   
        }else{
            $getDataKaryawan = Karyawan::get();
        }
        return view('pages.karyawan.index', compact('getDataKaryawan'));
    }

    public function dataTable(Request $request)
    {
        $query = Karyawan::select('karyawan.*')->with(['jabatan', 'kota']);
        
        return DataTables::of($query)
        ->editColumn('tanggal_lahir', function($row) {
            return Carbon::parse($row->tanggal_lahir)->translatedFormat('d F Y');
        })->addColumn('aksi', function ($karyawan) {
            return view('pages.karyawan.aksi', compact('karyawan'))->render();
        })->rawColumns(['aksi'])->make(true);
    }
    public function create()
    {
        //
        $getDataJabatan = Jabatan::all();
        $getDataKota = Kota::all();
        return view('pages.karyawan.create', compact('getDataJabatan','getDataKota'));
    }
    public function store(Request $request){

        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'jabatan' => 'required',
            'kota' => 'required',
            'tanggal_lahir' => 'required|date'
        ],[
            'nama_karyawan.required' => 'Kolom nama karyawan wajib di isi.',  
            'nama_karyawan.string' => 'Kolom nama karyawan harus berupa karakter.',
            'nama_karyawan.max' => 'Kolom nama karyawan maksimal 255 karakter.',   
            'jabatan.required' => 'Kolom jabatan wajib di isi.',
            'kota.required' => 'Kolom kota wajib di isi.',
            'tanggal_lahir.required' => 'Kolom tanggal lahir wajib di isi.',
            'tanggal_lahir.date' => 'Kolom tanggal lahir harus berupa tanggal.',     
        ]);     

        $data = $request->all();
        $data['jabatan_id'] = ($request->jabatan == 0) ? null : $request->jabatan;
        $data['kota_id'] = ($request->kota == 0) ? null : $request->kota;

        Karyawan::create($data);

        $message = new HtmlString("Karyawan <b>{$request->nama_karyawan}</b> berhasil dibuat.");
        return redirect()->route('karyawan.index')->with('success', $message);
    }

    Public function show (Karyawan $karyawan)
    {
        //
        $karyawan->load(['jabatan', 'kota']);
        $karyawan->tanggal_lahir = Carbon::parse($karyawan->tanggal_lahir)->translatedFormat('d F Y');

        $getDataKaryawan = $karyawan;
        
        return view('pages.karyawan.details', compact('getDataKaryawan'));
    }
    public function edit(Karyawan $karyawan)
    {
        //
        $getDataJabatan = Jabatan::all();
        $getDataKota = Kota::all();
        $editData = null;
        if ($karyawan) {
            $editData = $karyawan->load(['jabatan', 'kota']);
        }
        return view('pages.karyawan.edit', compact('getDataJabatan','getDataKota', 'editData'));
    }
    public function destroy(Karyawan $karyawan)
    {
        //
        $karyawan->delete();
        $message = new HtmlString("Karyawan <b>{$karyawan->nama_karyawan}</b> berhasil dihapus.");
        return redirect()->route('karyawan.index')->with('success', $message);
    }
    public function update(Request $request, Karyawan $karyawan)
    {
        //
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'jabatan' => 'required',
            'kota' => 'required',
            'tanggal_lahir' => 'required|date'
        ],[
            'nama_karyawan.required' => 'Kolom nama karyawan wajib di isi.',  
            'nama_karyawan.string' => 'Kolom nama karyawan harus berupa karakter.',
            'nama_karyawan.max' => 'Kolom nama karyawan maksimal 255 karakter.',   
            'jabatan.required' => 'Kolom jabatan wajib di isi.',
            'kota.required' => 'Kolom kota wajib di isi.',
            'tanggal_lahir.required' => 'Kolom tanggal lahir wajib di isi.',
            'tanggal_lahir.date' => 'Kolom tanggal lahir harus berupa tanggal.',     
        ]);     

        // dd($request->all());
        $data = $request->all();
        $data['jabatan_id'] = ($request->jabatan == 0) ? null : $request->jabatan;
        $data['kota_id'] = ($request->kota == 0) ? null : $request->kota;

        $karyawan->update($data);

        $message = new HtmlString("Karyawan <b>{$request->nama_karyawan}</b> berhasil diubah.");
        return redirect()->route('karyawan.index')->with('success', $message);
    }
}
