<?php

namespace App\Http\Controllers;

//use Clockwork\Request\Request;
use App\Models\Diklat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Dokumen;
use App\Models\JenisLayanan;
use App\Models\Pendidikan;
use App\Models\RiwayatJabatan;
use App\Models\RiwayatPangkat;
use App\Models\Keluarga;
use App\Models\TandaJasa;
use App\Models\Identitas;

class KlienController extends Controller
{
    public function dashboard()
    {
        // dd(RiwayatPangkat::where('identitas_id', auth()->user()->identitas_id)->join('pangkat', 'pangkat.pangkat_id', '=', 'riwayat_pangkat.pangkat_id')->get());
        return view('klien.dashboard', [
            'page' => 'Klien | Dashboard',
            'layanan_khusus' => Dokumen::where('identitas_id', auth()->user()->identitas_id)->join('jenis_layanan', 'jenis_layanan.jenis_layanan_id', '=', 'dokumen.jenis_layanan_id')->get(),
            'pangkat' => RiwayatPangkat::where('identitas_id', auth()->user()->identitas_id)->join('pangkat', 'pangkat.pangkat_id', '=', 'riwayat_pangkat.pangkat_id')->get(),
            'jabatan' => RiwayatJabatan::where('identitas_id', auth()->user()->identitas_id)->join('jabatan', 'jabatan.jabatan_id', '=', 'riwayat_jabatan.jabatan_id')->get(),
            'pendidikan' => Pendidikan::where('identitas_id', auth()->user()->identitas_id)->get(),
        ]);
    }

    public function dataUmum()
    {
        return view('klien.data-umum', [
            'page' => 'Klien | Data Umum',
            'riwayatPangkat' => RiwayatPangkat::where('identitas_id', auth()->user()->identitas_id)->count(),
            'riwayatPendidikan' => Pendidikan::where('identitas_id', auth()->user()->identitas_id)->count(),
            'jabatan' => RiwayatJabatan::where('identitas_id', auth()->user()->identitas_id)->count(),
            'diklat' => Diklat::where('identitas_id', auth()->user()->identitas_id)->count(),
            'keluarga' => Keluarga::where('identitas_id', auth()->user()->identitas_id)->count(),
            'tandaJasa' => TandaJasa::where('identitas_id', auth()->user()->identitas_id)->count(),

        ]);
    }

    public function dataKhusus()
    {
        return view('klien.data-khusus', [
            'page' => 'Klien | Data Khusus',
        ]);
    }

    public function dataKhususLayanan()
    {
        return view('klien.layanan.index', [
            'page' => 'Klien | Layanan'
        ]);
    }

    public function indexLayanan2()
    {
        return view('klien.layanan.index2', [
            'page' => 'Klien | Layanan2'
        ]);
    }

    // SATYA LENCANA
    public function satyaLencanaForm()
    {
        return view('klien.layanan.satyalencana-form', [
            'page' => 'Layanan | Satya Lencana',
            'jenis_layanan' => JenisLayanan::where('nama_layanan', 'Satya Lencana')->first(),
        ]);
    }

    public function satyaLencanaAdd(Request $request)
    {
        $rules = [
            'surat_permohonan' => 'required|file|mimes:pdf|max:500',
            'sktp' => 'file|mimes:pdf|max:500',
            'drh' => 'required|file|mimes:pdf|max:500',
            'fcskp' => 'required|file|mimes:pdf|max:500',
        ];

        $input = [
            'surat_permohonan' => $request->file('surat_permohonan'),
            'sktp' => $request->file('sktp'),
            'drh' => $request->file('drh'),
            'fcskp' => $request->file('fcskp'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'Max' => '*Kolom :Ukuran harus dibawah 500kb',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/klien/layanan/satyalencana')->withErrors($validator)->withInput();
        }

        $data = [
            'surat_permohonan' => $request->file('surat_permohonan')->getPathName(),
            'sktp' => $request->file('sktp')->getPathName(),
            'drh' => $request->file('drh')->getPathName(),
            'fcskp' => $request->file('fcskp')->getPathName(),
        ];

        $num_file = 0;
        foreach ($data as $r => $val) {
            //$temp = $request->file('sk_jabatan')->getPathName();
            $file = time() . "_" . $r . ".pdf|";
            $folder = "unggah/dokumen-khusus/satyalencana" . explode("|", $file)[0];
            move_uploaded_file($val, $folder);
            $file_stacked[$num_file++] = $file;
        }
        $data = [
            'dokumen' => implode("", $file_stacked),
            'identitas_id' => auth()->user()->identitas_id,
            'jenis_layanan_id' => $request->input('jenis'),
            'status' => '4',
        ];
        Dokumen::create($data);
        return redirect('/klien/layanan/layanankhusus')->with('success', 'Ajuan layanan berhasil dikirim!');
    }

    // IBEL
    public function ibelForm()
    {
        return view('klien.layanan.ibel-form', [
            'page' => 'Layanan | Izin Belajar',
            'jenis_layanan' => JenisLayanan::where('nama_layanan', 'IBEL/TUBEL')->first(),
        ]);
    }

    public function ibelAdd(Request $request)
    {
        $rules = [
            'surat_permohonan' => 'required|file|mimes:pdf|max:500',
            'surat_persetujuan' => 'required|file|mimes:pdf|max:500',
            'fcskp' => 'required|file|mimes:pdf|max:500',
            'fcpak' => 'required|file|mimes:pdf|max:500',
            'spbmbp' => 'required|file|mimes:pdf|max:500',
            'spspkt' => 'required|file|mimes:pdf|max:500',
            'pr' => 'required|file|mimes:pdf|max:500',
        ];

        $input = [
            'surat_permohonan' => $request->file('surat_permohonan'),
            'surat_persetujuan' => $request->file('surat_persetujuan'),
            'fcskp' => $request->file('fcskp'),
            'fcpak' => $request->file('fcpak'),
            'spbmbp' => $request->file('spbmbp'),
            'spspkt' => $request->file('spspkt'),
            'pr' => $request->file('pr'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'Max' => '*Kolom :Ukuran harus dibawah 500kb',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/klien/layanan/ibel')->withErrors($validator)->withInput();
        }

        $data = [
            'surat_permohonan' => $request->file('surat_permohonan')->getPathname(),
            'surat_persetujuan' => $request->file('surat_persetujuan')->getPathname(),
            'fcskp' => $request->file('fcskp')->getPathname(),
            'fcpak' => $request->file('fcpak')->getPathname(),
            'spbmbp' => $request->file('spbmbp')->getPathname(),
            'spspkt' => $request->file('spspkt')->getPathname(),
            'pr' => $request->file('pr')->getPathname(),
        ];

        $num_file = 0;
        foreach ($data as $r => $val) {
            //$temp = $request->file('sk_jabatan')->getPathName();
            $file = time() . "_" . $r . ".pdf|";

            $folder = "unggah/dokumen-khusus/ibel/" . explode("|", $file)[0];

            move_uploaded_file($val, $folder);
            $file_stacked[$num_file++] = $file;
        }
        $data = [
            'dokumen' => implode("", $file_stacked),
            'identitas_id' => auth()->user()->identitas_id,
            'jenis_layanan_id' => $request->input('jenis'),
            'status' => '4',
        ];
        Dokumen::create($data);
        return redirect('/klien/layanan/layanankhusus')->with('success', 'Ajuan layanan berhasil dikirim!');
    }

    // Mutasi Kenaikan Pangkat Penyesuaian Ijazah
    public function mkppiForm()
    {
        return view('klien.layanan.mkppi-form', [
            'page' => 'Layanan | Mutasi Kenaikan Pangkat Penyesuaian Ijazah',
            'jenis_layanan' => JenisLayanan::where('nama_layanan', 'Mutasi kenaikan pangkat penyesuaian ijazah')->first(),
        ]);
    }

    public function mkppiAdd(Request $request)
    {
        $rules = [
            'fcpsss' => 'required|file|mimes:pdf|max:500',
            'fcskptt' => 'required|file|mimes:pdf|max:500',
            'fsjssal' => 'required|file|mimes:pdf|max:500',
            'fcskmwk' => 'required|file|mimes:pdf|max:500',
            'fckn' => 'required|file|mimes:pdf|max:500',
            'fcdrh' => 'required|file|mimes:pdf|max:500',
            'fctlupi' => 'required|file|mimes:pdf|max:500',
            'askuty' => 'required|file|mimes:pdf|max:500',
        ];

        $input = [
            'fcpsss' => $request->file('fcpsss'),
            'fcskptt' => $request->file('fcskptt'),
            'fsjssal' => $request->file('fsjssal'),
            'fcskmwk' => $request->file('fcskmwk'),
            'fckn' => $request->file('fckn'),
            'fcdrh' => $request->file('fcdrh'),
            'fctlupi' => $request->file('fctlupi'),
            'askuty' => $request->file('askuty'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'Max' => '*Kolom :Ukuran harus dibawah 500kb',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/klien/layanan/mkppi')->withErrors($validator)->withInput();
        }

        $data = [
            'fcpsss' => $request->file('fcpsss')->getPathname(),
            'fcskptt' => $request->file('fcskptt')->getPathname(),
            'fsjssal' => $request->file('fsjssal')->getPathname(),
            'fcskmwk' => $request->file('fcskmwk')->getPathname(),
            'fckn' => $request->file('fckn')->getPathname(),
            'fcdrh' => $request->file('fcdrh')->getPathname(),
            'fctlupi' => $request->file('fctlupi')->getPathname(),
            'askuty' => $request->file('askuty')->getPathname(),
        ];

        $num_file = 0;
        foreach ($data as $r => $val) {
            //$temp = $request->file('sk_jabatan')->getPathName();
            $file = time() . "_" . $r . ".pdf|";
            $folder = "unggah/dokumen-khusus/mkppi/" . explode("|", $file)[0];
            move_uploaded_file($val, $folder);
            $file_stacked[$num_file++] = $file;
        }
        $data = [
            'dokumen' => implode("", $file_stacked),
            'identitas_id' => auth()->user()->identitas_id,
            'jenis_layanan_id' => $request->input('jenis'),
            'status' => '4',
        ];
        Dokumen::create($data);
        return redirect('/klien/layanan/layanankhusus')->with('success', 'Ajuan layanan berhasil dikirim!');
    }

    // Mutasi Pelayanan Kenaikan Pangkat Jabatan Fungsional Tertentu
    public function mpkpjftForm()
    {
        return view('klien.layanan.mpkpjft-form', [
            'page' => 'Layanan | Mutasi Pelayanan Kenaikan Pangkat Jabatan Fungsional Tertentu',
            'jenis_layanan' => JenisLayanan::where('nama_layanan', 'Mutasi pelayanan kenaikan pangkat jabatan fungsional tertentu')->first(),
        ]);
    }

    public function mpkpjftAdd(Request $request)
    {
        $rules = [
            'fcpsss' => 'required|file|mimes:pdf|max:500',
            'fcskptt' => 'required|file|mimes:pdf|max:500',
            'fsjssal' => 'required|file|mimes:pdf|max:500',
            'fcskmwk' => 'required|file|mimes:pdf|max:500',
            'fckn' => 'required|file|mimes:pdf|max:500',
            'fcdrh' => 'required|file|mimes:pdf|max:500',
            'fcstlud' => 'required|file|mimes:pdf|max:500',
            'fcskps' => 'required|file|mimes:pdf|max:500',
        ];

        $input = [
            'fcpsss' => $request->file('fcpsss'),
            'fcskptt' => $request->file('fcskptt'),
            'fsjssal' => $request->file('fsjssal'),
            'fcskmwk' => $request->file('fcskmwk'),
            'fckn' => $request->file('fckn'),
            'fcdrh' => $request->file('fcdrh'),
            'fcstlud' => $request->file('fcstlud'),
            'fcskps' => $request->file('fcskps'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'Max' => '*Kolom :Ukuran harus dibawah 500kb',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/klien/layanan/mpkpjft')->withErrors($validator)->withInput();
        }

        $data = [
            'fcpsss' => $request->file('fcpsss')->getPathname(),
            'fcskptt' => $request->file('fcskptt')->getPathname(),
            'fsjssal' => $request->file('fsjssal')->getPathname(),
            'fcskmwk' => $request->file('fcskmwk')->getPathname(),
            'fckn' => $request->file('fckn')->getPathname(),
            'fcdrh' => $request->file('fcdrh')->getPathname(),
            'fcstlud' => $request->file('fcstlud')->getPathname(),
            'fcskps' => $request->file('fcskps')->getPathname(),
        ];

        $num_file = 0;
        foreach ($data as $r => $val) {
            //$temp = $request->file('sk_jabatan')->getPathName();
            $file = time() . "_" . $r . ".pdf|";
            $folder = "unggah/dokumen-khusus/mpkpjft/" . explode("|", $file)[0];
            move_uploaded_file($val, $folder);
            $file_stacked[$num_file++] = $file;
        }
        $data = [
            'dokumen' => implode("", $file_stacked),
            'identitas_id' => auth()->user()->identitas_id,
            'jenis_layanan_id' => $request->input('jenis'),
            'status' => '4',
        ];
        Dokumen::create($data);
        return redirect('/klien/layanan/layanankhusus')->with('success', 'Ajuan layanan berhasil dikirim!');
    }

    // Kenaikan Pangkat Reguler
    public function pkprForm()
    {
        return view('klien.layanan.pkpr-form', [
            'page' => 'Layanan | Kenaikan Pangkat Reguler',
            'jenis_layanan' => JenisLayanan::where('nama_layanan', 'Pelayanan Kenaikan pangkat reguler')->first(),
        ]);
    }

    public function pkprAdd(Request $request)
    {
        $rules = [
            'fcpsss' => 'required|file|mimes:pdf|max:500',
            'fcskptt' => 'required|file|mimes:pdf|max:500',
            'fsjssal' => 'required|file|mimes:pdf|max:500',
            'fcskmwk' => 'required|file|mimes:pdf|max:500',
            'fcstlud' => 'required|file|mimes:pdf|max:500',
        ];

        $input = [
            'fcpsss' => $request->file('fcpsss'),
            'fcskptt' => $request->file('fcskptt'),
            'fsjssal' => $request->file('fsjssal'),
            'fcskmwk' => $request->file('fcskmwk'),
            'fcstlud' => $request->file('fcstlud'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'Max' => '*Kolom :Ukuran harus dibawah 500kb',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/klien/layanan/pkpr')->withErrors($validator)->withInput();
        }

        $data = [
            'fcpsss' => $request->file('fcpsss')->getPathname(),
            'fcskptt' => $request->file('fcskptt')->getPathname(),
            'fsjssal' => $request->file('fsjssal')->getPathname(),
            'fcskmwk' => $request->file('fcskmwk')->getPathname(),
            'fcstlud' => $request->file('fcstlud')->getPathname(),
        ];

        $num_file = 0;
        foreach ($data as $r => $val) {
            //$temp = $request->file('sk_jabatan')->getPathName();
            $file = time() . "_" . $r . ".pdf|";
            $folder = "unggah/dokumen-khusus/pkpr/" . explode("|", $file)[0];
            move_uploaded_file($val, $folder);
            $file_stacked[$num_file++] = $file;
        }
        $data = [
            'dokumen' => implode("", $file_stacked),
            'identitas_id' => auth()->user()->identitas_id,
            'jenis_layanan_id' => $request->input('jenis'),
            'status' => '4',
        ];
        Dokumen::create($data);
        return redirect('/klien/layanan/layanankhusus')->with('success', 'Ajuan layanan berhasil dikirim!');
    }

    // Mutasi Pelayanan Kenaikan Pangkat Jabatan Fungsional Tertentu
    public function kpjsForm()
    {
        return view('klien.layanan.kpjs-form', [
            'page' => 'Layanan | Kenaikan Pangkat Jabatan Struktural',
            'jenis_layanan' => JenisLayanan::where('nama_layanan', 'Kenaikan pangkat jabatan struktural')->first(),
        ]);
    }

    public function kpjsAdd(Request $request)
    {
        $rules = [
            'fcpsss' => 'required|file|mimes:pdf|max:500',
            'fcppktt' => 'required|file|mimes:pdf|max:500',
            'fcskjss' => 'required|file|mimes:pdf|max:500',
            'fckmwk' => 'required|file|mimes:pdf|max:500',
            'fckn' => 'required|file|mimes:pdf|max:500',
            'fcdrh' => 'required|file|mimes:pdf|max:500',
            'fcstlud' => 'required|file|mimes:pdf|max:500',
            'fcskpps' => 'required|file|mimes:pdf|max:500',
        ];

        $input = [
            'fcpsss' => $request->file('fcpsss'),
            'fcppktt' => $request->file('fcppktt'),
            'fcskjss' => $request->file('fcskjss'),
            'fckmwk' => $request->file('fckmwk'),
            'fckn' => $request->file('fckn'),
            'fcdrh' => $request->file('fcdrh'),
            'fcstlud' => $request->file('fcstlud'),
            'fcskpps' => $request->file('fcskpps'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'Max' => '*Kolom :Ukuran harus dibawah 500kb',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/klien/layanan/kpjs')->withErrors($validator)->withInput();
        }

        $data = [
            'fcpsss' => $request->file('fcpsss')->getPathname(),
            'fcppktt' => $request->file('fcppktt')->getPathname(),
            'fcskjss' => $request->file('fcskjss')->getPathname(),
            'fckmwk' => $request->file('fckmwk')->getPathname(),
            'fckn' => $request->file('fckn')->getPathname(),
            'fcdrh' => $request->file('fcdrh')->getPathname(),
            'fcstlud' => $request->file('fcstlud')->getPathname(),
            'fcskpps' => $request->file('fcskpps')->getPathname(),
        ];

        $num_file = 0;
        foreach ($data as $r => $val) {
            //$temp = $request->file('sk_jabatan')->getPathName();
            $file = time() . "_" . $r . ".pdf|";
            $folder = "unggah/dokumen-khusus/kpjs/" . explode("|", $file)[0];
            move_uploaded_file($val, $folder);
            $file_stacked[$num_file++] = $file;
        }
        $data = [
            'dokumen' => implode("", $file_stacked),
            'identitas_id' => auth()->user()->identitas_id,
            'jenis_layanan_id' => $request->input('jenis'),
            'status' => '4',
        ];
        Dokumen::create($data);
        return redirect('/klien/layanan/layanankhusus')->with('success', 'Ajuan layanan berhasil dikirim!');
    }

    public function indexListSurat()
    {
        return view('klien.layanan.list-surat', [
            'page' => 'Layanan | Template Surat'
        ]);
    }

    public function updateFoto(Request $request)
    {
        ($request);
        $data = Identitas::where('identitas_id', auth()->user()->identitas_id)->first();

        $rules = [
            'foto' => 'file|mimes:png,jpg,jpeg|max:500',
        ];

        $input = [
            'foto' => $request->file('foto'),
        ];

        $messages = [
            'max' => '*Kolom :attribute maksimal :max.',
            'file' => '*File :attribute wajib dipilih.',
            'mimes' => '*Format file :attribute tidak didukung.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/klien/dashboard')->withErrors($validator)->withInput();
        }

        File::delete(public_path($data['foto']));
        $extFoto = $request->file('foto')->getClientOriginalExtension();
        $newFileFoto = auth()->user()->nip . "." . $extFoto;
        $tempFoto = $request->file('foto')->getPathName();
        $folderFoto = "unggah/identitas/foto/" . $newFileFoto;
        move_uploaded_file($tempFoto, $folderFoto);
        $pathFoto = "/unggah/identitas/foto/" . $newFileFoto;

        $data = [
            'foto' => $pathFoto,
        ];

        Identitas::where('identitas_id', auth()->user()->identitas_id)->update($data);

        return redirect('/klien/dashboard')->with('success', 'Foto berhasil diubah');
    }
}
