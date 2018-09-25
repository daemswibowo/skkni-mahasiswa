<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Mahasiswa;
use Illuminate\Http\Request;

/**
 * Class Mahasiswa Controller
 * Disini berisi fungsi CRUD Mahasiswa
 */
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $mahasiswa = Mahasiswa::where('nim', 'LIKE', "%$keyword%")
            ->orWhere('name', 'LIKE', "%$keyword%")
            ->latest()->paginate($perPage);
        } else {
            $mahasiswa = Mahasiswa::latest()->paginate($perPage);
        }

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            "nim" => "required | unique:mahasiswas",
            "name" => "required",
        ]);
        
        $requestData = $request->all();
        
        Mahasiswa::create($requestData);

        return redirect('mahasiswa')->with('flash_message', 'Mahasiswa added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "nim" => "required | unique:mahasiswas,nim,$id",
            "name" => "required",
        ]);

        $requestData = $request->all();

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($requestData);

        return redirect('mahasiswa')->with('flash_message', 'Mahasiswa updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Mahasiswa::destroy($id);

        return redirect('mahasiswa')->with('flash_message', 'Mahasiswa deleted!');
    }
}
