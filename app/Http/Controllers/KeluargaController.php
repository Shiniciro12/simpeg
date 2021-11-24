<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Keluarga;
use App\Models\Identitas;
use File;

class KeluargaController extends Controller
{
    public function index()
    {
        return view('keluarga.index', [
            'page' => 'Data Keluarga',
            "rows" => Keluarga::select('keluarga.*', 'identitas.nama AS nama_peg')->join('identitas', 'identitas.identitas_id', '=', 'keluarga.identitas_id')->latest()->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }
    
    //umum view
    public function UmumView()
    {
        return view('klien.form-umum.riwayat-keluarga.index', [
            'page' => 'Data Keluarga',
            "rows" => Keluarga::select('keluarga.*', 'identitas.nama AS nama_peg')->join('identitas', 'identitas.identitas_id', '=', 'keluarga.identitas_id')->latest()->where('keluarga.identitas_id', '=', auth()->user()->identitas_id)->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    //umum add
    public function UaddForm()
    {
        return view('klien.form-umum.riwayat-keluarga.add', [
            'rowsIdentitas' => Identitas::latest()->get(),
            'page' => 'Tambah Keluarga',
        ]);
    }

    //store umum
    public function UStore(Request $request)
    {
       
            if ($request->input('status_keluarga_orang_tua') == 'Orang Tua') {
                $rules = [
                    'nip_orang_tua' => 'required',
                    'nik_orang_tua' => 'required|numeric|unique:keluarga,nik|digits:16',
                    'nama_orang_tua' => 'required',
                    'tempat_lahir_orang_tua' => 'required',
                    'tgl_lahir_orang_tua' => 'required|date',
                    'jenis_kelamin_orang_tua' => 'required',
                    'status_keluarga_orang_tua' => 'required',
                    'ket_orang_tua' => 'required',
                    'status_kawin_orang_tua' => 'required',
                    'tgl_kawin_orang_tua' => 'required|date',
                    'status_tunjangan_orang_tua' => 'required',
                    'pendidikan_orang_tua' => 'required',
                    'pekerjaan_orang_tua' => 'required',
                    'alamat_orang_tua' => 'required',
                    'desa_kelurahan_orang_tua' => 'required',
                    'kecamatan_orang_tua' => 'required',
                    'kabupaten_kota_orang_tua' => 'required',
                    'provinsi_orang_tua' => 'required',
                    'hp_orang_tua' => 'required|numeric|digits_between:11,12',
                    'kode_pos_orang_tua' => 'required|numeric|digits:5',
                    'dokumen_orang_tua' => 'file|mimes:pdf|max:500',
                ];
        
                $input = [
                    'nip_orang_tua' => $request->input('nip_orang_tua'),
                    'nik_orang_tua' => $request->input('nik_orang_tua'),
                    'nama_orang_tua' => $request->input('nama_orang_tua'),
                    'tempat_lahir_orang_tua' => $request->input('tempat_lahir_orang_tua'),
                    'tgl_lahir_orang_tua' => $request->input('tgl_lahir_orang_tua'),
                    'jenis_kelamin_orang_tua' => $request->input('jenis_kelamin_orang_tua'),
                    'status_keluarga_orang_tua' => $request->input('status_keluarga_orang_tua'),
                    'ket_orang_tua' => $request->input('ket_orang_tua'),
                    'status_kawin_orang_tua' => $request->input('status_kawin_orang_tua'),
                    'tgl_kawin_orang_tua' => $request->input('tgl_kawin_orang_tua'),
                    'status_tunjangan_orang_tua' => $request->input('status_tunjangan_orang_tua'),
                    'pendidikan_orang_tua' => $request->input('pendidikan_orang_tua'),
                    'pekerjaan_orang_tua' => $request->input('pekerjaan_orang_tua'),
                    'alamat_orang_tua' => $request->input('alamat_orang_tua'),
                    'desa_kelurahan_orang_tua' => $request->input('desa_kelurahan_orang_tua'),
                    'kecamatan_orang_tua' => $request->input('kecamatan_orang_tua'),
                    'kabupaten_kota_orang_tua' => $request->input('kabupaten_kota_orang_tua'),
                    'provinsi_orang_tua' => $request->input('provinsi_orang_tua'),
                    'hp_orang_tua' => $request->input('hp_orang_tua'),
                    'kode_pos_orang_tua' => $request->input('kode_pos_orang_tua'),
                    'dokumen_orang_tua' => $request->file('dokumen_orang_tua'),
                ];
        
                $messages = [
                    'required' => '*Kolom :attribute wajib diisi.',
                    'digits_between' => '*Kolom :attribute minimal 11 dan maksimal 12 karekter.',
                    'numeric' => '*Kolom :attribute harus berupa karakter angka.',
                    'unique' => '*Kolom :attribute sudah terdaftar.',
                    'max' => '*Kolom :attribute maksimal :max.',
                    'file' => '*File :attribute wajib dipilih.',
                    'mimes' => '*Format file :attribute tidak didukung.',
                    'digits' => '*Kolom :attribute tidak sesuai.',
                    'date' => '*Kolom :attribute tidak valid.',
                ];
        
                $validator = Validator::make($input, $rules, $messages);
                if ($validator->fails()) {
                    return redirect('/klien/dataumum/keluarga/add')->withErrors($validator)->withInput();
                }

                $data = [
                    'nip' => $request->input('nip_orang_tua'),
                    'nik' => $request->input('nik_orang_tua'),
                    'nama' => $request->input('nama_orang_tua'),
                    'tempat_lahir' => $request->input('tempat_lahir_orang_tua'),
                    'tgl_lahir' => $request->input('tgl_lahir_orang_tua'),
                    'jenis_kelamin' => $request->input('jenis_kelamin_orang_tua'),
                    'status_keluarga' => $request->input('status_keluarga_orang_tua'),
                    'ket' => $request->input('ket_orang_tua'),
                    'status_kawin' => $request->input('status_kawin_orang_tua'),
                    'tgl_kawin' => $request->input('tgl_kawin_orang_tua'),
                    'status_tunjangan' => $request->input('status_tunjangan_orang_tua'),
                    'pendidikan' => $request->input('pendidikan_orang_tua'),
                    'pekerjaan' => $request->input('pekerjaan_orang_tua'),
                    'alamat' => $request->input('alamat_orang_tua'),
                    'desa_kelurahan' => $request->input('desa_kelurahan_orang_tua'),
                    'kecamatan' => $request->input('kecamatan_orang_tua'),
                    'kabupaten_kota' => $request->input('kabupaten_kota_orang_tua'),
                    'provinsi' => $request->input('provinsi_orang_tua'),
                    'hp' => $request->input('hp_orang_tua'),
                    'kode_pos' => $request->input('kode_pos_orang_tua'),
                    'dokumen' => $request->file('dokumen_orang_tua'),
                ];

                $id_identitas = Identitas::where('nip', $request->input('nip_orang_tua'))->first();
                $extension = $request->file('dokumen_orang_tua')->getClientOriginalExtension();
                $newFile =  $id_identitas['identitas_id'] . "-Keluarga-Ortu-" . date('s') .  "." . $extension;
                $temp = $request->file('dokumen_orang_tua')->getPathName();
                $folder = "unggah/dokumen-keluarga/" . $newFile;
                move_uploaded_file($temp, $folder);
        
                $path = "/unggah/dokumen-keluarga/" . $newFile;
                $data['dokumen'] = $path;
                $data['identitas_id'] = $id_identitas['identitas_id'];
              
                Keluarga::create($data);
                return redirect('/klien/dataumum/keluarga')->with('success', 'Data berhasil ditambahkan');
            
            }  elseif  ($request->input('status_keluarga_pasangan') == 'Pasangan') {
                    $rules = [
                        'nip_pasangan' => 'required',
                        'nik_pasangan' => 'required|numeric|unique:keluarga,nik|digits:16',
                        'nama_pasangan' => 'required',
                        'tempat_lahir_pasangan' => 'required',
                        'tgl_lahir_pasangan' => 'required|date',
                        'jenis_kelamin_pasangan' => 'required',
                        'status_keluarga_pasangan' => 'required',
                        'ket_pasangan' => 'required',
                        'status_kawin_pasangan' => 'required',
                        'tgl_kawin_pasangan' => 'required|date',
                        'status_tunjangan_pasangan' => 'required',
                        'pendidikan_pasangan' => 'required',
                        'pekerjaan_pasangan' => 'required',
                        'alamat_pasangan' => 'required',
                        'desa_kelurahan_pasangan' => 'required',
                        'kecamatan_pasangan' => 'required',
                        'kabupaten_kota_pasangan' => 'required',
                        'provinsi_pasangan' => 'required',
                        'hp_pasangan' => 'required|numeric|digits_between:11,12',
                        'kode_pos_pasangan' => 'required|numeric|digits:5',
                        'dokumen_pasangan' => 'file|mimes:pdf|max:500',
                    ];
            
                    $input = [
                        'nip_pasangan' => $request->input('nip_pasangan'),
                        'nik_pasangan' => $request->input('nik_pasangan'),
                        'nama_pasangan' => $request->input('nama_pasangan'),
                        'tempat_lahir_pasangan' => $request->input('tempat_lahir_pasangan'),
                        'tgl_lahir_pasangan' => $request->input('tgl_lahir_pasangan'),
                        'jenis_kelamin_pasangan' => $request->input('jenis_kelamin_pasangan'),
                        'status_keluarga_pasangan' => $request->input('status_keluarga_pasangan'),
                        'ket_pasangan' => $request->input('ket_pasangan'),
                        'status_kawin_pasangan' => $request->input('status_kawin_pasangan'),
                        'tgl_kawin_pasangan' => $request->input('tgl_kawin_pasangan'),
                        'status_tunjangan_pasangan' => $request->input('status_tunjangan_pasangan'),
                        'pendidikan_pasangan' => $request->input('pendidikan_pasangan'),
                        'pekerjaan_pasangan' => $request->input('pekerjaan_pasangan'),
                        'alamat_pasangan' => $request->input('alamat_pasangan'),
                        'desa_kelurahan_pasangan' => $request->input('desa_kelurahan_pasangan'),
                        'kecamatan_pasangan' => $request->input('kecamatan_pasangan'),
                        'kabupaten_kota_pasangan' => $request->input('kabupaten_kota_pasangan'),
                        'provinsi_pasangan' => $request->input('provinsi_pasangan'),
                        'hp_pasangan' => $request->input('hp_pasangan'),
                        'kode_pos_pasangan' => $request->input('kode_pos_pasangan'),
                        'dokumen_pasangan' => $request->file('dokumen_pasangan'),
                    ];
                 
                    $messages = [
                        'required' => '*Kolom :attribute wajib diisi.',
                        'digits_between' => '*Kolom :attribute minimal 11 dan maksimal 12 karekter.',
                        'numeric' => '*Kolom :attribute harus berupa karakter angka.',
                        'unique' => '*Kolom :attribute sudah terdaftar.',
                        'max' => '*Kolom :attribute maksimal :max.',
                        'file' => '*File :attribute wajib dipilih.',
                        'mimes' => '*Format file :attribute tidak didukung.',
                        'digits' => '*Kolom :attribute tidak sesuai.',
                        'date' => '*Kolom :attribute tidak valid.',
                    ];
            
                    $validator = Validator::make($input, $rules, $messages);
                    if ($validator->fails()) {
                        return redirect('/klien/dataumum/keluarga/add')->withErrors($validator)->withInput();
                    }

                    $data = [
                        'nip' => $request->input('nip_pasangan'),
                        'nik' => $request->input('nik_pasangan'),
                        'nama' => $request->input('nama_pasangan'),
                        'tempat_lahir' => $request->input('tempat_lahir_pasangan'),
                        'tgl_lahir' => $request->input('tgl_lahir_pasangan'),
                        'jenis_kelamin' => $request->input('jenis_kelamin_pasangan'),
                        'status_keluarga' => $request->input('status_keluarga_pasangan'),
                        'ket' => $request->input('ket_pasangan'),
                        'status_kawin' => $request->input('status_kawin_pasangan'),
                        'tgl_kawin' => $request->input('tgl_kawin_pasangan'),
                        'status_tunjangan' => $request->input('status_tunjangan_pasangan'),
                        'pendidikan' => $request->input('pendidikan_pasangan'),
                        'pekerjaan' => $request->input('pekerjaan_pasangan'),
                        'alamat' => $request->input('alamat_pasangan'),
                        'desa_kelurahan' => $request->input('desa_kelurahan_pasangan'),
                        'kecamatan' => $request->input('kecamatan_pasangan'),
                        'kabupaten_kota' => $request->input('kabupaten_kota_pasangan'),
                        'provinsi' => $request->input('provinsi_pasangan'),
                        'hp' => $request->input('hp_pasangan'),
                        'kode_pos' => $request->input('kode_pos_pasangan'),
                        'dokumen' => $request->file('dokumen_pasangan'),
                    ];

                    $id_identitas = Identitas::where('nip', $request->input('nip_pasangan'))->first();
                    $extension = $request->file('dokumen_pasangan')->getClientOriginalExtension();
                    $newFile =  $id_identitas['identitas_id'] . "-Keluarga-Pasangan-" . date('s') .  "." . $extension;
                    $temp = $request->file('dokumen_pasangan')->getPathName();
                    $folder = "unggah/dokumen-keluarga/" . $newFile;
                    move_uploaded_file($temp, $folder);
            
                    $path = "/unggah/dokumen-keluarga/" . $newFile;
                    $data['dokumen'] = $path;
                    $data['identitas_id'] = $id_identitas['identitas_id'];
                  
                    Keluarga::create($data);
                    return redirect('/klien/dataumum/keluarga')->with('success', 'Data berhasil ditambahkan');

                 } else {
                        $rules = [
                            'nip_anak' => 'required',
                            'nik_anak' => 'required|numeric|unique:keluarga,nik|digits:16',
                            'nama_anak' => 'required',
                            'tempat_lahir_anak' => 'required',
                            'tgl_lahir_anak' => 'required|date',
                            'jenis_kelamin_anak' => 'required',
                            'status_keluarga_anak' => 'required',
                            'ket_anak' => 'required',
                            'status_kawin_anak' => 'required',
                            'tgl_kawin_anak' => 'required|date',
                            'status_tunjangan_anak' => 'required',
                            'pendidikan_anak' => 'required',
                            'pekerjaan_anak' => 'required',
                            'alamat_anak' => 'required',
                            'desa_kelurahan_anak' => 'required',
                            'kecamatan_anak' => 'required',
                            'kabupaten_kota_anak' => 'required',
                            'provinsi_anak' => 'required',
                            'hp_anak' => 'required|numeric|digits_between:11,12',
                            'kode_pos_anak' => 'required|numeric|digits:5',
                            'dokumen_anak' => 'file|mimes:pdf|max:500',
                        ];
                
                        $input = [
                            'nip_anak' => $request->input('nip_anak'),
                            'nik_anak' => $request->input('nik_anak'),
                            'nama_anak' => $request->input('nama_anak'),
                            'tempat_lahir_anak' => $request->input('tempat_lahir_anak'),
                            'tgl_lahir_anak' => $request->input('tgl_lahir_anak'),
                            'jenis_kelamin_anak' => $request->input('jenis_kelamin_anak'),
                            'status_keluarga_anak' => $request->input('status_keluarga_anak'),
                            'ket_anak' => $request->input('ket_anak'),
                            'status_kawin_anak' => $request->input('status_kawin_anak'),
                            'tgl_kawin_anak' => $request->input('tgl_kawin_anak'),
                            'status_tunjangan_anak' => $request->input('status_tunjangan_anak'),
                            'pendidikan_anak' => $request->input('pendidikan_anak'),
                            'pekerjaan_anak' => $request->input('pekerjaan_anak'),
                            'alamat_anak' => $request->input('alamat_anak'),
                            'desa_kelurahan_anak' => $request->input('desa_kelurahan_anak'),
                            'kecamatan_anak' => $request->input('kecamatan_anak'),
                            'kabupaten_kota_anak' => $request->input('kabupaten_kota_anak'),
                            'provinsi_anak' => $request->input('provinsi_anak'),
                            'hp_anak' => $request->input('hp_anak'),
                            'kode_pos_anak' => $request->input('kode_pos_anak'),
                            'dokumen_anak' => $request->file('dokumen_anak'),
                        ];
                     
                
                        $messages = [
                            'required' => '*Kolom :attribute wajib diisi.',
                            'digits_between' => '*Kolom :attribute minimal 11 dan maksimal 12 karekter.',
                            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
                            'unique' => '*Kolom :attribute sudah terdaftar.',
                            'max' => '*Kolom :attribute maksimal :max.',
                            'file' => '*File :attribute wajib dipilih.',
                            'mimes' => '*Format file :attribute tidak didukung.',
                            'digits' => '*Kolom :attribute tidak sesuai.',
                            'date' => '*Kolom :attribute tidak valid.',
                        ];
                
                        $validator = Validator::make($input, $rules, $messages);
                        if ($validator->fails()) {
                            return redirect('/klien/dataumum/keluarga/add')->withErrors($validator)->withInput();
                        }

                        $data = [
                            'nip' => $request->input('nip_anak'),
                            'nik' => $request->input('nik_anak'),
                            'nama' => $request->input('nama_anak'),
                            'tempat_lahir' => $request->input('tempat_lahir_anak'),
                            'tgl_lahir' => $request->input('tgl_lahir_anak'),
                            'jenis_kelamin' => $request->input('jenis_kelamin_anak'),
                            'status_keluarga' => $request->input('status_keluarga_anak'),
                            'ket' => $request->input('ket_anak'),
                            'status_kawin' => $request->input('status_kawin_anak'),
                            'tgl_kawin' => $request->input('tgl_kawin_anak'),
                            'status_tunjangan' => $request->input('status_tunjangan_anak'),
                            'pendidikan' => $request->input('pendidikan_anak'),
                            'pekerjaan' => $request->input('pekerjaan_anak'),
                            'alamat' => $request->input('alamat_anak'),
                            'desa_kelurahan' => $request->input('desa_kelurahan_anak'),
                            'kecamatan' => $request->input('kecamatan_anak'),
                            'kabupaten_kota' => $request->input('kabupaten_kota_anak'),
                            'provinsi' => $request->input('provinsi_anak'),
                            'hp' => $request->input('hp_anak'),
                            'kode_pos' => $request->input('kode_pos_anak'),
                            'dokumen' => $request->file('dokumen_anak'),
                        ];

                        $id_identitas = Identitas::where('nip', $request->input('nip_anak'))->first();
                        $extension = $request->file('dokumen_anak')->getClientOriginalExtension();
                        $newFile =  $id_identitas['identitas_id'] . "-Keluarga-Anak-" . date('s') .  "." . $extension;
                        $temp = $request->file('dokumen_anak')->getPathName();
                        $folder = "unggah/dokumen-keluarga/" . $newFile;
                        move_uploaded_file($temp, $folder);
                
                        $path = "/unggah/dokumen-keluarga/" . $newFile;
                        $data['dokumen'] = $path;
                        $data['identitas_id'] = $id_identitas['identitas_id'];
                      
                        Keluarga::create($data);
                        return redirect('/klien/dataumum/keluarga')->with('success', 'Data berhasil ditambahkan');
                    }

    }


    public function addForm()
    {
        return view('keluarga.add-form', [
            'rowsIdentitas' => Identitas::latest()->get(),
            'page' => 'Tambah Keluarga',
        ]);
    }

    public function add(Request $request)
    {
        $rules = [
            'nip' => 'required',
            'nik' => 'required|numeric|unique:keluarga|digits:16',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'status_keluarga' => 'required',
            'status_kawin' => 'required',
            'tgl_kawin' => 'required|date',
            'status_tunjangan' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'desa_kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten_kota' => 'required',
            'provinsi' => 'required',
            'hp' => 'required|numeric|digits_between:11,12',
            'kode_pos' => 'required|numeric|digits:5',
            'dokumen' => 'file|mimes:pdf|max:500',
        ];

        $input = [
            'nip' => $request->input('nip'),
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'status_keluarga' => $request->input('status_keluarga'),
            'status_kawin' => $request->input('status_kawin'),
            'tgl_kawin' => $request->input('tgl_kawin'),
            'status_tunjangan' => $request->input('status_tunjangan'),
            'pendidikan' => $request->input('pendidikan'),
            'pekerjaan' => $request->input('pekerjaan'),
            'alamat' => $request->input('alamat'),
            'desa_kelurahan' => $request->input('desa_kelurahan'),
            'kecamatan' => $request->input('kecamatan'),
            'kabupaten_kota' => $request->input('kabupaten_kota'),
            'provinsi' => $request->input('provinsi'),
            'hp' => $request->input('hp'),
            'kode_pos' => $request->input('kode_pos'),
            'dokumen' => $request->file('dokumen'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'digits_between' => '*Kolom :attribute minimal 11 dan maksimal 12 karekter.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'max' => '*Kolom :attribute maksimal :max.',
            'file' => '*File :attribute wajib dipilih.',
            'mimes' => '*Format file :attribute tidak didukung.',
            'digits' => '*Kolom :attribute tidak sesuai.',
            'date' => '*Kolom :attribute tidak valid.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/keluarga/add')->withErrors($validator)->withInput();
        }

        $id_identitas = Identitas::where('nip', $request->input('nip'))->first();

        $extension = $request->file('dokumen')->getClientOriginalExtension();

        $newFile =  $id_identitas['identitas_id'] . "-Keluarga-" . date('s') .  "." . $extension;

        $temp = $request->file('dokumen')->getPathName();
        $folder = "unggah/dokumen-keluarga/" . $newFile;
        move_uploaded_file($temp, $folder);

        $path = "/unggah/dokumen-keluarga/" . $newFile;

        $data = [
            'identitas_id' => $id_identitas['identitas_id'],
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'status_keluarga' => $request->input('status_keluarga'),
            'status_kawin' => $request->input('status_kawin'),
            'tgl_kawin' => $request->input('tgl_kawin'),
            'status_tunjangan' => $request->input('status_tunjangan'),
            'pendidikan' => $request->input('pendidikan'),
            'pekerjaan' => $request->input('pekerjaan'),
            'alamat' => $request->input('alamat'),
            'desa_kelurahan' => $request->input('desa_kelurahan'),
            'kecamatan' => $request->input('kecamatan'),
            'kabupaten_kota' => $request->input('kabupaten_kota'),
            'provinsi' => $request->input('provinsi'),
            'hp' => $request->input('hp'),
            'telepon' => $request->input('telepon'),
            'kode_pos' => $request->input('kode_pos'),
            'dokumen' => $path,
        ];

        Keluarga::create($data);

        return redirect('/keluarga')->with('success', 'Data berhasil ditambahkan');
    }

    public function updateForm($ubah)
    {
        $ambil_data = Keluarga::where('keluarga_id', $ubah)->first();
        $nip = Identitas::where('identitas_id', $ambil_data['identitas_id'])->first();
        return view('keluarga.update-form', [
            'rowsIdentitas' => Identitas::latest()->get(),
            'rowsKeluarga' => $ambil_data,
            'rowsStatusKeluarga' => ['Kepala Keluarga', 'Istri', 'Anak', 'Famili Lain'],
            'rowsStatusKawin' => ['Belum Kawin', 'Kawin', 'Janda', 'Duda'],
            'rowsPendidikan' => ['Belum Sekolah', 'TK/Paud', 'SD Sederajat', 'SMP Sederajat', 'SMA Sederajat', 'Diploma III', 'Diploma IV', 'S1/Sarjana', 'S2/Master', 'S3/Doktor'],
            'page' => 'Ubah Keluarga',
            'nip' => $nip
        ]);
    }

    public function update(Request $request)
    {
        $id_identitas = Identitas::where('nip', $request->input('nip'))->first();

        $keluarga = Keluarga::where('nik', $request->input('nik'))->first();
        $dokumen = $request->file('dokumen') ? 'required|file|mimes:pdf|max:500' : '';

        $nik = $keluarga['nik'] != $request->input('nik') ? '|unique:keluarga' : '';

        $rules = [
            'nip' => 'required',
            'nik' => 'required|numeric|digits:16' . $nik,
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'status_keluarga' => 'required',
            'status_kawin' => 'required',
            'tgl_kawin' => 'required|date',
            'status_tunjangan' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'desa_kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten_kota' => 'required',
            'provinsi' => 'required',
            'hp' => 'required|numeric|digits_between:11,12',
            'kode_pos' => 'required|numeric|digits:5',
            'dokumen' => ''. $dokumen,
        ];

        $input = [
            'nip' => $request->input('nip'),
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'status_keluarga' => $request->input('status_keluarga'),
            'status_kawin' => $request->input('status_kawin'),
            'tgl_kawin' => $request->input('tgl_kawin'),
            'status_tunjangan' => $request->input('status_tunjangan'),
            'pendidikan' => $request->input('pendidikan'),
            'pekerjaan' => $request->input('pekerjaan'),
            'alamat' => $request->input('alamat'),
            'desa_kelurahan' => $request->input('desa_kelurahan'),
            'kecamatan' => $request->input('kecamatan'),
            'kabupaten_kota' => $request->input('kabupaten_kota'),
            'provinsi' => $request->input('provinsi'),
            'hp' => $request->input('hp'),
            'kode_pos' => $request->input('kode_pos'),
            'dokumen' => $request->file('dokumen'),
        ];

        $messages = [
            'required' => '*Kolom :attribute wajib diisi.',
            'digits_between' => '*Kolom :attribute minimal 11 dan maksimal 12 karekter.',
            'numeric' => '*Kolom :attribute harus berupa karakter angka.',
            'unique' => '*Kolom :attribute sudah terdaftar.',
            'digits' => '*Kolom :attribute tidak sesuai.',
            'date' => '*Kolom :attribute tidak valid.',
            'max' => '*Kolom :attribute maksimal :max.',
            'file' => '*File :attribute wajib dipilih.',
            'mimes' => '*Format file :attribute tidak didukung.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/keluarga/add')->withErrors($validator)->withInput();
        }
        $pathkeluarga = $keluarga['dokumen'];
       
        if ($request->file('dokumen')) {
            
            File::delete(public_path($pathkeluarga));
            $extkeluarga = $request->file('dokumen')->getClientOriginalExtension();
            $cum = explode("/",$pathkeluarga);
            $newFilekeluarga = end($cum);
            $tempkeluarga = $request->file('dokumen')->getPathName();
            $folderkeluarga = "unggah/riwayat-pangkat/" . $newFilekeluarga;
            move_uploaded_file($tempkeluarga, $folderkeluarga);
            $pathkeluarga = "/unggah/riwayat-pangkat/" . $newFilekeluarga;
        }
        $data = [
            'identitas_id' => $id_identitas['identitas_id'],
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'status_keluarga' => $request->input('status_keluarga'),
            'status_kawin' => $request->input('status_kawin'),
            'tgl_kawin' => $request->input('tgl_kawin'),
            'status_tunjangan' => $request->input('status_tunjangan'),
            'pendidikan' => $request->input('pendidikan'),
            'pekerjaan' => $request->input('pekerjaan'),
            'alamat' => $request->input('alamat'),
            'desa_kelurahan' => $request->input('desa_kelurahan'),
            'kecamatan' => $request->input('kecamatan'),
            'kabupaten_kota' => $request->input('kabupaten_kota'),
            'provinsi' => $request->input('provinsi'),
            'hp' => $request->input('hp'),
            'telepon' => $request->input('telepon'),
            'kode_pos' => $request->input('kode_pos'),
            'dokumen' => $pathkeluarga,
        ];

        Keluarga::where('keluarga_id', $request->input('keluarga_id'))->update($data);

        return redirect('/keluarga')->with('success', 'Data berhasil diubah');
    }

    public function delete(Request $request)
    {
        File::delete(public_path($request->input('dokumen')));
        Keluarga::destroy($request->input('keluarga_id'));
        return redirect('/keluarga')->with('success', 'Data berhasil dihapus');
    }
}
