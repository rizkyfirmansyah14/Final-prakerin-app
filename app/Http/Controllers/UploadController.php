<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Laporan;

class UploadController extends Controller
{
    public function upload(){
		$kelas = \App\Kelas::all();
		$jurusans = \App\Jurusan::all();
		
        return view('laporan.create', ['kelases' => $kelas, 'jurusans' => $jurusans]);
	}

	public function laporan(){
		$lapor = DB::table('laporans')->get();
		return view('laporan/index', compact('lapor'));
	}

	public function proses_upload(Request $request){
		$this->validate($request, [
			'nama' 	  => 'required',
			'jurusan' => 'required',
			'kelas'   => 'required',
			'file'    => 'required',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');

		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'uploads';
 
                // upload file
		$file->move($tujuan_upload,$nama_file);

		Laporan::create([
			'file' => $nama_file,
			'nama' => $request->nama,
			'kelas' => $request->kelas,
			'jurusan' => $request->jurusan,
			
		]);

		return redirect('/upload')->with(['success' => 'Laporan berhasil di kirim']);
	}
}
