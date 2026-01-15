<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $search = request()->get('keyword');
        $getDataJabatan = $this->searchQuery($search);

        return view('pages.jabatan.index', compact('getDataJabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return view('pages.jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $request->validate([
            'nama_jabatan' => 'required|unique:jabatan|string|max:255',
        ],[
            'nama_jabatan.required' => 'Kolom jabatan wajib di isi.',  
            'nama_jabatan.unique' => 'Kolom jabatan sudah ada sebelumnya.',                              
            'nama_jabatan.string' => 'Kolom jabatan harus berupa karakter.',
            'nama_jabatan.max' => 'Kolom jabatan maksimal 255 karakter.',        
        ]);     

        Jabatan::create($request->all());
        $message = new HtmlString("Jabatan <b>{$request->nama_jabatan}</b> berhasil dibuat.");
        return redirect()->route('jabatan.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        //
        // karena satu form index buat semua, jadi detail juga di index
        // maka dari itu saya kirim data index ($getDataJabatan) semua dan data detailnya juga
        $search = request()->get('keyword');
        $getDataJabatan = $this->searchQuery($search);
        // detail data untuk isset di view, supaya tau ada data detail yang di tampilkan
        $detailData = null;
        if ($jabatan) {
            $detailData = $jabatan;
        }
        return view('pages.jabatan.index', compact('getDataJabatan','detailData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        //
        $search = request()->get('keyword');
        $getDataJabatan = $this->searchQuery($search);

        $editData = null;
        if ($jabatan) {
            $editData = Jabatan::find($jabatan->id);
        }
        return view('pages.jabatan.index', compact('getDataJabatan','editData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        //
        $request->validate([
            'nama_jabatan' => 'required|unique:jabatan|string|max:255',
        ],[
            'nama_jabatan.required' => 'Kolom jabatan wajib di isi.',  
            'nama_jabatan.unique' => 'Kolom jabatan sudah ada sebelumnya.',                              
            'nama_jabatan.string' => 'Kolom jabatan harus berupa karakter.',
            'nama_jabatan.max' => 'Kolom jabatan maksimal 255 karakter.',        
        ]);     

        Jabatan::where('id', $jabatan->id)->update([
            'nama_jabatan' => $request->nama_jabatan,
        ]);
        
        $message = new HtmlString("Jabatan <b>{$jabatan->nama_jabatan}</b> berhasil diubah menjadi <b>{$request->nama_jabatan}</b>.");
        return redirect()->route('jabatan.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        //
        $jabatan->delete();
        $message = new HtmlString("Jabatan <b>{$jabatan->nama_jabatan}</b> berhasil dihapus.");
        return redirect()->route('jabatan.index')->with('success', $message);
    }

    private function searchQuery($search)
    {
         
        if($search){
            $getDataJabatan = Jabatan::where('nama_jabatan','like',"%$search%")->paginate(10);   
        }else{
            $getDataJabatan = Jabatan::get();
        }

        return $getDataJabatan;
    }
}
