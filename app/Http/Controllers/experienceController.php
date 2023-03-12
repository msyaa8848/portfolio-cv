<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class experienceController extends Controller
{
    function __construct()
    {
        $this->_type = 'experience';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = riwayat::where('type', $this->_type)->orderBy('tgl_akhir', 'desc')->get();
        return view('dashboard.experience.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('tajuk', $request->tajuk);
        Session::flash('info1', $request->info1);
        Session::flash('tgl_mulai', $request->tgl_mulai);
        Session::flash('tgl_akhir', $request->tgl_akhir);
        Session::flash('isi', $request->isi);

        $request->validate(
            [
                'tajuk' => 'required',
                'info1' => 'required',
                'tgl_mulai' => 'required',
                'isi' => 'required',
            ],
            [
                'tajuk.required' => 'tajuk wajib diisi',
                'info1.required' => 'Nama perusahaan wajib diisi',
                'tgl_mulai.required' => 'Tanggal mulai wajib diisi',
                'isi.required' => 'Isian tulisan wajib diisi',
            ]
        );

        $data = [
            'tajuk' => $request->tajuk,
            'info1' => $request->info1,
            'type' => $this->_type,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'isi' => $request->isi
        ];
        riwayat::create($data);

        return redirect()->route('experience.index')->with('success', 'Berhasil menambahkan data experience');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = riwayat::where('id', $id)->where('type', $this->_type)->first();
        return view('dashboard.experience.edit')->with('data', $data);
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
        $request->validate(
            [
                'tajuk' => 'required',
                'info1' => 'required',
                'tgl_mulai' => 'required',
                'isi' => 'required',
            ],
            [
                'tajuk.required' => 'tajuk wajib diisi',
                'info1.required' => 'Nama perusahaan wajib diisi',
                'tgl_mulai.required' => 'Tanggal mulai wajib diisi',
                'isi.required' => 'Isian tulisan wajib diisi',
            ]
        );

        $data = [
            'tajuk' => $request->tajuk,
            'info1' => $request->info1,
            'type' => $this->_type,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'isi' => $request->isi
        ];
        riwayat::where('id', $id)->where('type', $this->_type)->update($data);

        return redirect()->route('experience.index')->with('success', 'Berhasil melakukan update data experience');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        riwayat::where('id', $id)->where('type', $this->_type)->delete();
        return redirect()->route('experience.index')->with('success', 'Berhasil melakukan delete data experience');
    }
}