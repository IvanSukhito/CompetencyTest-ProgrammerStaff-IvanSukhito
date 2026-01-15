<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;


class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $search = request()->get('keyword');
        $getDataKota = $this->searchQuery($search);

        return view('pages.kota.index', compact('getDataKota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_kota' => 'required|unique:kota|string|max:255',
        ],[
            'nama_kota.required' => 'Kolom kota wajib di isi.',  
            'nama_kota.unique' => 'Kolom kota sudah ada sebelumnya.',                              
            'nama_kota.string' => 'Kolom kota harus berupa karakter.',
            'nama_kota.max' => 'Kolom kota maksimal 255 karakter.',        
        ]);     

        Kota::create($request->all());
        $message = new HtmlString("Kota <b>{$request->nama_kota}</b> berhasil dibuat.");
        return redirect()->route('kota.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kota $kota)
    {
        //
        $search = request()->get('keyword');
        $getDataKota = $this->searchQuery($search);

        $detailData = null;
        if ($kota) {
            $detailData = Kota::find($kota->id);
        }
        return view('pages.kota.index', compact('getDataKota','detailData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kota $kota)
    {
        //
        $search = request()->get('keyword');
        $getDataKota = $this->searchQuery($search);

        $editData = null;
        if ($kota) {
            $editData = Kota::find($kota->id);
        }
        return view('pages.kota.index', compact('getDataKota','editData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kota $kota)
    {
        //
        $request->validate([
            'nama_kota' => 'required|unique:kota|string|max:255',
        ],[
            'nama_kota.required' => 'Kolom kota wajib di isi.',  
            'nama_kota.unique' => 'Kolom kota sudah ada sebelumnya.',                              
            'nama_kota.string' => 'Kolom kota harus berupa karakter.',
            'nama_kota.max' => 'Kolom kota maksimal 255 karakter.',        
        ]);     

        Kota::where('id', $kota->id)->update([
            'nama_kota' => $request->nama_kota,
        ]);
        
        $message = new HtmlString("Kota <b>{$kota->nama_kota}</b> berhasil diubah menjadi <b>{$request->nama_kota}</b>.");
        return redirect()->route('kota.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kota $kota)
    {
        //
        $kota->delete();
        $message = new HtmlString("Kota <b>{$kota->nama_kota}</b> berhasil dihapus.");
        return redirect()->route('kota.index')->with('success', $message);
    }
    
    private function searchQuery($search)
    {
         
        if($search){
            $getDataKota = Kota::where('nama_kota','like',"%$search%")->paginate(10);   
        }else{
            $getDataKota = Kota::get();
        }

        return $getDataKota;
    }
}
