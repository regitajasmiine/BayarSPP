<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Exports\PembayaranExport;
use Maatwebsite\Excel\Facades\Excel;

/* struktur pembuatan function */
/* public function FunctionName()
{
    code
} */

class AdminController extends Controller
{


    public function viewHomeAdmin()
    {
       
        if (!Session::get('login')) {
       
            return redirect('/');
        }else{
         
            if (Session::get('level') == 'admin') {
                $data['title'] = 'Pembayaran SPP | Admin';
    	       return view('admin.home',$data);

            } else if(Session::get('level') == 'petugas') {
                $data['title'] = 'Pembayaran SPP | Petugas';
                return redirect('petugas/home',$data);
            
            } else{
               
                return redirect('/');
            }
        }

    }


    /* =========================================================== */
    /* =======================PETUGAS============================ */
    /* =========================================================== */

    public function viewCrudPetugas()
    {
        
    	$petugas = 'petugas';
    	$data['petugas'] = \App\Petugas::where('level',$petugas)->get();
        $data['title'] = 'Manage Data Petugas | Admin';
    	return view('admin.crudpetugas',$data);
    }

    public function viewTambahPetugas()
    {
        $data['title'] = 'Tambah Data Petugas | Admin';
    	return view('admin.editTambahPetugas',$data);
    }

    public function tambahPetugasPost(Request $request)
    {
    	$this->validate($request,[
            'nama_petugas' => 'required',
    		'username' => 'required',
    		'password' => 'required|min:8',
    		'level' => 'required',
    	]);

    	$data = new \App\Petugas;
        $data->nama_petugas = $request->nama_petugas;
    	$data->username = $request->username;
    	$data->password = bcrypt($request->password);
    	$data->level = $request->level;
    	$status = $data->save();
    	if ($status) {
    		return redirect('admin/crud/petugas');
    	} else {
    		return redirect('admin/tambah/petugas');
    	}

    }

        public function viewEditPetugas($id_petugas)
    {
 
    	$data['petugas'] = \App\Petugas::find($id_petugas);
        $data['title'] = 'Edit Data Petugas | Admin';
 
    	return view('admin.editTambahPetugas',$data);
    }


    public function editPetugasPost(Request $request, $id_petugas)
    {
    	$this->validate($request,[
            'nama_petugas' => 'required',
    		'username' => 'required',
    		'level' => 'required',
    	]);

    	$data = \App\Petugas::find($id_petugas);
        $data->nama_petugas = $request->nama_petugas;
    	$data->username = $request->username;
    	$data->level = $request->level;
    	$status = $data->update();

    	if ($status) {

    		return redirect('admin/crud/petugas');
    	} else {
    		return redirect('admin/edit/petugas');
    	}
    }

    public function viewForgotPetugas($id_petugas)
    {

    	$data['petugas'] = \App\Petugas::find($id_petugas);

        $data['title'] = 'Forget Password Petugas | Admin';
    	return view('admin.forgotPetugas',$data);
    }

	public function forgotPetugasPost(Request $request, $id_petugas)
    {

    	$this->validate($request,[
    		'password' => 'required',
    		'cpassword' => 'same:password',
    	]);

    	$data = \App\Petugas::find($id_petugas);
    	$data->password = bcrypt($request->password);

    	$status = $data->update();

    	if ($status) {

    		return redirect('admin/crud/petugas');
    	} else {

    		return redirect('admin/edit/petugas');
    	}
    }


    public function deletePetugasPost($id_petugas)
     {
     	$data = \App\Petugas::find($id_petugas);
    	$status = $data->delete();
    	if ($status) {
    		return redirect('admin/crud/petugas');
    	} else {
    		return redirect('admin/crud/petugas');
    	}
     }


    /* =========================================================== */
    /* =======================SPP============================ */
    /* =========================================================== */

    public function viewCrudSpp()
    {
        $data['spp'] = \App\Spp::get();
        $data['title'] = 'Manage Data SPP | Admin';
        return view('admin.crudSpp',$data);
    }

    public function viewTambahSpp()
    {
        $data['title'] = 'Tambah Data SPP | Admin';
        return view('admin.editTambahSpp',$data);
    }

    public function tambahSppPost(Request $request)
    {
        $this->validate($request,[
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        $data = new \App\Spp;
        $data->tahun = $request->tahun;
        $data->nominal = $request->nominal;

        $status = $data->save();

        if ($status) {
            return redirect('admin/crud/spp');
        } else {
            return redirect('admin/tambah/spp');
        }

    }

    public function viewEditSpp($id_spp)
    {
        $data['spp'] = \App\Spp::find($id_spp);
        $data['title'] = 'Edit Data SPP | Admin';
        return view('admin.editTambahSpp',$data);
    }

    public function editSppPost(Request $request, $id_spp)
    {
        $this->validate($request,[
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        $data = \App\Spp::find($id_spp);
        $data->tahun = $request->tahun;
        $data->nominal = $request->nominal;

        $status = $data->update();

        if ($status) {
            return redirect('admin/crud/spp');
        } else {
            return redirect('admin/edit/spp');
        }
    }

    public function deleteSppPost($id_spp)
     {
        $data = \App\Spp::find($id_spp);

        $status = $data->delete();

        if ($status) {
            return redirect('admin/crud/spp');
        } else {
            return redirect('admin/crud/spp');
        }
     }



     /* =========================================================== */
    /* =======================KELAS============================ */
    /* =========================================================== */

    public function viewCrudKelas()
    {
        $data['kelas'] = \App\Kelas::get();
        $data['title'] = 'Manage Data Kelas | Admin';
        return view('admin.crudKelas',$data);
    }

    public function viewTambahKelas()
    {
        $data['title'] = 'Tambah Data Kelas | Admin';
        return view('admin.editTambahKelas',$data);
    }

    public function tambahKelasPost(Request $request)
    {
        $this->validate($request,[
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        $data = new \App\Kelas;
        $data->nama_kelas = $request->nama_kelas;
        $data->kompetensi_keahlian = $request->kompetensi_keahlian;

        $status = $data->save();

        if ($status) {
            return redirect('admin/crud/kelas');
        } else {
            return redirect('admin/tambah/spp');
        }

    }

    public function viewEditKelas($id_kelas)
    {
        $data['kelas'] = \App\Kelas::find($id_kelas);
        $data['title'] = 'Edit Data Kelas | Admin';
        return view('admin.editTambahKelas',$data);
    }

    public function editKelasPost(Request $request, $id_kelas)
    {
        $this->validate($request,[
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        $data = \App\Kelas::find($id_kelas);
        $data->nama_kelas = $request->nama_kelas;
        $data->kompetensi_keahlian = $request->kompetensi_keahlian;

        $status = $data->update();

        if ($status) {
            return redirect('admin/crud/kelas');
        } else {
            return redirect('admin/edit/kelas');
        }
    }

    public function deleteKelasPost($id_kelas)
     {
        $data = \App\Kelas::find($id_kelas);

        $status = $data->delete();

        if ($status) {
            return redirect('admin/crud/kelas');
        } else {
            return redirect('admin/crud/kelas');
        }
     }


     /* =========================================================== */
    /* =======================SISWA============================ */
    /* =========================================================== */

    public function viewCrudSiswa()
    {
        $data['siswa'] = \App\Siswa::get();
        $data['title'] = 'Manage Data Siswa | Admin';
        return view('admin.crudSiswa',$data);
    }

    public function viewTambahSiswa()
    {
        $data['kelas'] = \App\Kelas::get();
        $data['spp'] = \App\Spp::get();
        $data['title'] = 'Tambah Data Siswa | Admin';
        return view('admin.editTambahSiswa',$data);
    }

    public function tambahSiswaPost(Request $request)
    {
        $this->validate($request,[
            'nisn' => 'required|min:10',
            'nis' => 'required|min:10',
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required',
        ]);

        $data = new \App\Siswa;
        $data->nisn = $request->nisn;
        $data->nis = $request->nis;
        $data->nama = $request->nama;
        $data->id_kelas = $request->id_kelas;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->id_spp = $request->id_spp;

        $status = $data->save();

        if ($status) {
            return redirect('admin/crud/siswa');
        } else {
            return redirect('admin/tambah/siswa');
        }

    }

    public function viewEditSiswa($nisn)
    {
        $data['siswa'] = \App\Siswa::find($nisn);
        $data['kelas'] = \App\Kelas::get();
        $data['spp'] = \App\Spp::get();
        $data['title'] = 'Edit Data Siswa | Admin';
        return view('admin.editTambahSiswa',$data);
    }

    public function editSiswaPost(Request $request, $nisn)
    {
        $this->validate($request,[
            'nisn' => 'required|min:10',
            'nis' => 'required|min:10',
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required',
        ]);

        $data = \App\Siswa::find($nisn);
        $data->nisn = $request->nisn;
        $data->nis = $request->nis;
        $data->nama = $request->nama;
        $data->id_kelas = $request->id_kelas;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->id_spp = $request->id_spp;

        $status = $data->update();

        if ($status) {
            return redirect('admin/crud/siswa');
        } else {
            return redirect('admin/edit/siswa');
        }
    }

    public function deleteSiswaPost($nisn)
     {
        $data = \App\Siswa::find($nisn);

        $status = $data->delete();

        if ($status) {
            return redirect('admin/crud/siswa');
        } else {
            return redirect('admin/crud/siswa');
        }
     }


     /* =========================================================== */
    /* =======================PEMBAYARAN============================ */
    /* =========================================================== */

    public function viewCrudPembayaran()
    {
        $data['pembayaran'] = \App\Pembayaran::get();
        $data['title'] = 'Manage Data Pembayaran | Admin';
        return view('admin.crudPembayaran',$data);
    }


    public function viewTambahPembayaran()
    {
        $data['siswa'] = \App\Siswa::get();
        $data['spp'] = \App\Spp::get();
        $data['title'] = 'Tambah Data Pembayaran | Admin';
        return view('admin.editTambahPembayaran',$data);
    }

    public function tambahPembayaranPost(Request $request)
    {
        $this->validate($request,[
            'nisn' => 'required',
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => 'required',
            'id_spp' => 'required',
            'jumlah_bayar' => 'required',
        ]);

        $data = new \App\Pembayaran;
        $data->id_petugas = Session::get('id_petugas');
        $data->nisn = $request->nisn;
        $date = date("Y-m-d");
        $data->tgl_bayar = $date;
        $data->bulan_dibayar = $request->bulan_dibayar;
        $data->tahun_dibayar = $request->tahun_dibayar;
        $data->id_spp = $request->id_spp;
        $data->jumlah_bayar = $request->jumlah_bayar;

        $status = $data->save();

        if ($status) {
            return redirect('admin/crud/pembayaran');
        } else {
            return redirect('admin/tambah/pembayaran');
        }

    }

    public function viewEditPembayaran($id_pembayaran)
    {
        $data['pembayaran'] = \App\Pembayaran::find($id_pembayaran);
        $data['siswa'] = \App\Siswa::get();
        $data['spp'] = \App\Spp::get();
        $data['title'] = 'Edit Data Pembayaran | Admin';
        return view('admin.editTambahPembayaran',$data);
    }

    public function editPembayaranPost(Request $request, $id_pembayaran)
    {
        $this->validate($request,[
           'nisn' => 'required',
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => 'required',
            'id_spp' => 'required',
            'jumlah_bayar' => 'required',
        ]);

        $data = \App\Pembayaran::find($id_pembayaran);
        $data->nisn = $request->nisn;
        $data->bulan_dibayar = $request->bulan_dibayar;
        $data->tahun_dibayar = $request->tahun_dibayar;
        $data->id_spp = $request->id_spp;
        $data->jumlah_bayar = $request->jumlah_bayar;

        $status = $data->update();

        if ($status) {
            return redirect('admin/crud/pembayaran');
        } else {
            return redirect('admin/edit/pembayaran');
        }
    }

    public function deletePembayaranPost($id_pembayaran)
     {
        $data = \App\Pembayaran::find($id_pembayaran);

        $status = $data->delete();

        if ($status) {
            return redirect('admin/crud/pembayaran');
        } else {
            return redirect('admin/crud/pembayaran');
        }
     }

     public function exportPembayaran() {
       return Excel::download(new PembayaranExport, "Data Pembayaran.xlsx");
     }





}
