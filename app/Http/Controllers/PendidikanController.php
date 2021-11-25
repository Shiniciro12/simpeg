<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Identitas;
use App\Models\Pendidikan;
use App\Models\Verifikasi;
use File;

class PendidikanController extends Controller
{
    public function index()
    {
        return view('pendidikan.index', [
            'page' => 'Data Pendidikan',
            "rows" => Pendidikan::select('pendidikan.*', 'identitas.nama as nama_peg')->join('identitas', 'identitas.identitas_id', '=', 'pendidikan.identitas_id')->latest()->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    public function addForm()
    {
        return view('pendidikan.add-form', [
            'rowsIdentitas' => Identitas::latest()->get(),
            'page' => 'Tambah Pendidikan',
        ]);
    }

    public function add(Request $request)
    {
        $data = Identitas::where('nip', $request->input('nip'))->first();

        $rules = [
            'identitas_id' => 'required',
            'tingkat_pendidikan' => 'required',
            'jurusan' => 'required',
            'nama_lembaga_pendidikan' => 'required',
            'tempat' => 'required',
            'nama_kepsek_rektor' => 'required',
            'no_sttb' => 'required|unique:pendidikan',
            'tgl_sttb' => 'required|date|before:' . today(),
            'sttb' => 'file|mimes:pdf|max:500',
        ];

        $input = [
            'identitas_id' => $request->input('identitas_id'),
            'tingkat_pendidikan' => $request->input('tingkat_pendidikan'),
            'jurusan' => $request->input('jurusan'),
            'nama_lembaga_pendidikan' => $request->input('nama_lembaga_pendidikan'),
            'tempat' => $request->input('tempat'),
            'nama_kepsek_rektor' => $request->input('nama_kepsek_rektor'),
            'no_sttb' => $request->input('no_sttb'),
            'tgl_sttb' => $request->input('tgl_sttb'),
            'sttb' => $request->file('sttb'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'date' => '*Kolom :attribute tidak valid.',
            'file' => '*File :attribute wajib dipilih.',
            'max' => '*Kolom :attribute maksimal :max karakter.',
            'before' => '*Kolom :attribute tidak valid.',
            'mimes' => '*Format file :attribute tidak didukung.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/pendidikan/add')->withErrors($validator)->withInput();
        }

        $temp = $request->file('sttb')->getPathName();
        $file = $data['identitas_id'] . "-sttb-" . time() . '.pdf';
        $folder = "unggah/sttb/" . $file;
        move_uploaded_file($temp, $folder);
        $name = "/unggah/sttb/" . $file;

        $data = [
            'identitas_id' => $data['identitas_id'],
            'tingkat_pendidikan' => $request->input('tingkat_pendidikan'),
            'jurusan' => $request->input('jurusan'),
            'nama_lembaga_pendidikan' => $request->input('nama_lembaga_pendidikan'),
            'tempat' => $request->input('tempat'),
            'nama_kepsek_rektor' => $request->input('nama_kepsek_rektor'),
            'no_sttb' => $request->input('no_sttb'),
            'tgl_sttb' => $request->input('tgl_sttb'),
            'sttb' => $name . ".pdf",
        ];

        Pendidikan::create($data);

        return redirect('/pendidikan')->with('success', 'Data berhasil ditambahkan');
    }

    public function updateForm($ubah)
    {
        $ambil_data = Pendidikan::where('pendidikan_id', $ubah)->first();
        $nip = Identitas::where('identitas_id', $ambil_data['identitas_id'])->first();
        return view('pendidikan.update-form', [
            'rowsIdentitas' => Identitas::latest()->get(),
            'rowsPendidikan' => $ambil_data,
            'page' => 'Ubah Pendidikan',
            'nip' => $nip
        ]);
    }

    public function update(Request $request)
    {
        $id_identitas = Identitas::where('nip', $request->input('nip'))->first();
        $pendidikan = Pendidikan::find($request->input('pendidikan_id'));

        $no_sttb = $pendidikan['no_sttb'] != $request->input('no_sttb') ? '|unique:pendidikan' : '';

        $rules = [
            'identitas_id' => 'required',
            'tingkat_pendidikan' => 'required',
            'jurusan' => 'required',
            'nama_lembaga_pendidikan' => 'required',
            'tempat' => 'required',
            'nama_kepsek_rektor' => 'required',
            'no_sttb' => 'required' . $no_sttb,
            'tgl_sttb' => 'required|date|before:' . today(),
            // 'sttb' => 'file|mimes:pdf|max:500',
        ];

        $input = [
            'identitas_id' => $request->input('identitas_id'),
            'tingkat_pendidikan' => $request->input('tingkat_pendidikan'),
            'jurusan' => $request->input('jurusan'),
            'nama_lembaga_pendidikan' => $request->input('nama_lembaga_pendidikan'),
            'tempat' => $request->input('tempat'),
            'nama_kepsek_rektor' => $request->input('nama_kepsek_rektor'),
            'no_sttb' => $request->input('no_sttb'),
            'tgl_sttb' => $request->input('tgl_sttb'),
            // 'sttb' => $request->file('sttb'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'date' => '*Kolom :attribute tidak valid.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'before' => '*Kolom :attribute tidak valid.',
            'file' => '*File :attribute wajib dipilih.',
            'max' => '*Kolom :attribute maksimal :max karakter.',
            'mimes' => '*Format file :attribute tidak didukung.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/pendidikan/update/' . $request->input('pendidikan_id'))->withErrors($validator)->withInput();
        }

        $data = [
            'identitas_id' => $id_identitas['identitas_id'],
            'tingkat_pendidikan' => $request->input('tingkat_pendidikan'),
            'jurusan' => $request->input('jurusan'),
            'nama_lembaga_pendidikan' => $request->input('nama_lembaga_pendidikan'),
            'tempat' => $request->input('tempat'),
            'nama_kepsek_rektor' => $request->input('nama_kepsek_rektor'),
            'no_sttb' => $request->input('no_sttb'),
            'tgl_sttb' => $request->input('tgl_sttb'),
            'sttb' => 'default',
        ];

        Pendidikan::where('pendidikan_id', $request->input('pendidikan_id'))->update($data);

        return redirect('/pendidikan')->with('success', 'Data berhasil diubah');
    }

    public function delete(Request $request)
    {
        $pendidikan = Pendidikan::where('pendidikan_id', $request->input('pendidikan_id'))->first();
        File::delete(public_path('unggah/sttb/' . $pendidikan['sttb']));
        Pendidikan::destroy($request->input('pendidikan_id'));
        return redirect('/pendidikan')->with('success', 'Data berhasil dihapus');
    }

    //umumView
    public function UmumView()
    {
        return view('klien.form-umum.riwayat-pendidikan.index', [
            'page' => 'Data Pendidikan',
            "rows" => Pendidikan::select(['pendidikan.tingkat_pendidikan', 'pendidikan.jurusan', 'pendidikan.nama_lembaga_pendidikan', 'pendidikan.tempat', 'pendidikan.nama_kepsek_rektor', 'pendidikan.no_sttb', 'pendidikan.tgl_sttb', 'pendidikan.sttb', 'pendidikan.transkrip', 'pendidikan.created_at', 'verifikasi.status'])->join('identitas', 'identitas.identitas_id', '=', 'pendidikan.identitas_id')->join('verifikasi', 'verifikasi.docx_id', '=', 'pendidikan.pendidikan_id')->latest()->where('pendidikan.identitas_id', '=', auth()->user()->identitas_id)->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    //Umum Add
    public function UAddForm()
    {
        return view('klien.form-umum.riwayat-pendidikan.add', [
            'page' => 'Tambah Pendidikan',
        ]);
    }

    //Umum Store
    public function UStore(Request $request)
    {
        $data = Identitas::where('identitas_id', auth()->user()->identitas_id)->first();

        $rules = [
            'identitas_id' => 'required',
            'tingkat_pendidikan' => 'required',
            'nama_lembaga_pendidikan' => 'required',
            'tempat' => 'required',
            'nama_kepsek_rektor' => 'required',
            'no_sttb' => 'required|unique:pendidikan',
            'tgl_sttb' => 'required|date|before:' . today(),
            'sttb' => 'file|mimes:pdf|max:500',
            'transkrip' => 'file|mimes:pdf|max:500',
        ];

        $input = [
            'identitas_id' => auth()->user()->identitas_id,
            'tingkat_pendidikan' => $request->input('tingkat_pendidikan'),
            'nama_lembaga_pendidikan' => $request->input('nama_lembaga_pendidikan'),
            'tempat' => $request->input('tempat'),
            'nama_kepsek_rektor' => $request->input('nama_kepsek_rektor'),
            'no_sttb' => $request->input('no_sttb'),
            'tgl_sttb' => $request->input('tgl_sttb'),
            'sttb' => $request->file('sttb'),
            'transkrip' => $request->file('transkrip'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'date' => '*Kolom :attribute tidak valid.',
            'file' => '*File :attribute wajib dipilih.',
            'max' => '*Kolom :attribute maksimal :max karakter.',
            'before' => '*Kolom :attribute tidak valid.',
            'mimes' => '*Format file :attribute tidak didukung.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/klien/dataumum/riwayat-pendidikan/add')->withErrors($validator)->withInput();
        }

        $tempIjazah = $request->file('sttb')->getPathName();
        $fileIjazah = $data['identitas_id'] . "-sttb-"  . time() . ".pdf";

        $folderIjazah = "unggah/sttb/" . $fileIjazah;
        move_uploaded_file($tempIjazah, $folderIjazah);
        $ijazahName = "/unggah/sttb/" . $fileIjazah;

        $tempTranskrip = $request->file('transkrip')->getPathName();
        $fileTranskrip = $data['identitas_id'] . "-transkrip-"  . time() . ".pdf";

        $folderTranskrip = "unggah/transkrip/" . $fileTranskrip;
        move_uploaded_file($tempTranskrip, $folderTranskrip);
        $transkripName = "/unggah/transkrip/" . $fileTranskrip;

        $data = [
            'identitas_id' => $data['identitas_id'],
            'tingkat_pendidikan' => $request->input('tingkat_pendidikan'),
            'jurusan' => $request->input('jurusan'),
            'nama_lembaga_pendidikan' => $request->input('nama_lembaga_pendidikan'),
            'tempat' => $request->input('tempat'),
            'nama_kepsek_rektor' => $request->input('nama_kepsek_rektor'),
            'no_sttb' => $request->input('no_sttb'),
            'tgl_sttb' => $request->input('tgl_sttb'),
            'sttb' => $ijazahName,
            'transkrip' => $transkripName,
        ];

        $resultCreatePendidikan = Pendidikan::create($data)->getAttributes();

        $dataVerifikasi = [
            'docx_id' => $resultCreatePendidikan['pendidikan_id'],
            'identitas_id' => auth()->user()->identitas_id,
            'status' => '4',
            'unit_verif_at' => '',
            'bkkpd_verif_at' => '',
            'unit_verif_by' => '',
            'bkkpd_verif_by' => '',
            'jenis_data' => 'pendidikan/umum',
        ];

        Verifikasi::create($dataVerifikasi);

        return redirect('/klien/dataumum/riwayat-pendidikan')->with('success', 'Data berhasil ditambahkan');
    }
}
