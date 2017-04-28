<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Mahasiswa;
use App\Http\Controllers\Controllers;
use Response;
use Validator;

class MahasiswaController extends Controller
{

    public function index()
    {
        //$mahasiswas = mahasiswa::all();
        $mahasiswas = mahasiswa::orderBy('idmahasiswa', 'desc')
        ->paginate(5); 
        return view('mahasiswas.index',compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswas.create');
    }

    public function store(Request $request)
    {

	    $this->validate($request, [
	         'nim' => 'required',
	         'nama'=> 'required',
	         'tgl_lahir'  => 'required',
	         'agama'  => 'required',
	         'telp' => 'required|digits_between:8,12',
	         'email'=> 'required',
	         'jurusan'=> 'required',
	         'prodi'=> 'required',
	    ]);

	        $mahasiswa = new mahasiswa;
	        $mahasiswa->nim   = $request->nim;
	        $mahasiswa->nama   = $request->nama;
	        $mahasiswa->tgl_lahir  = $request->tgl_lahir;
	        $mahasiswa->agama    = $request->agama;
	        $mahasiswa->telp    = $request->telp;
	        $mahasiswa->email   = $request->email;
	        $mahasiswa->jurusan = $request->jurusan;
	        $mahasiswa->prodi = $request->prodi;
	        $mahasiswa->save();

        return redirect()->route('mahasiswas.index')
                        ->with('success','Create mahasiswa sukses');
    }

    public function show($idmahasiswa)//DELETE
    {
        
        $mahasiswa = mahasiswa::where('idmahasiswa', '=',$idmahasiswa);
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')
        				->with('success','Hapus data mahasiswa sukses');  
    }

    public function edit($mahasiswa)
    {
        //$mahasiswa=mahasiswa::find($idmahasiswa);
        $mahasiswa=mahasiswa::where('idmahasiswa',$mahasiswa)->first();
        if(!$mahasiswa){
            abort(404);
        }
        return view('mahasiswas.edit',compact('mahasiswa'));
    }

    public function update(Request $request, $idmahasiswa)
    {
        $this->validate($request, [
	         'nim' => 'required',
	         'nama'=> 'required',
	         'tgl_lahir'  => 'required',
	         'agama'  => 'required',
	         'telp' => 'required|digits_between:8,12',
	         'email'=> 'required',
	         'jurusan'=> 'required',
	         'prodi'=> 'required',
	    ]);

        $mahasiswa = mahasiswa::where('idmahasiswa', '=',$idmahasiswa);

	    $paramsUpdate = [
		'nim'   => $request->nim,
		'nama'   => $request->nama,
		'tgl_lahir'  => $request->tgl_lahir,
		'agama'    => $request->agama,
		'telp'    => $request->telp,
		'email'   => $request->email,
		'jurusan' => $request->jurusan,
		'prodi' => $request->prodi,
	];
        $mahasiswa->update($paramsUpdate);

        return redirect()->route('mahasiswas.index')
        				->with('success','Edit data mahasiswa sukses');  
    }
}
    