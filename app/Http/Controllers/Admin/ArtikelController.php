<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $artikel = Artikel::where('judul', 'LIKE', "%$keyword%")
                ->orWhere('artikel', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $artikel = Artikel::latest()->paginate($perPage);
        }

        return view('admin.artikel.index', compact('artikel'));
    }

    public function indexB()
    {
        $artikel = Artikel::all();

        return view('artikel', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.artikel.create');
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
            'judul' => 'required',
            'artikel' => 'required']);

        $requestData = $request->all();
        
        Artikel::create($requestData);

        return redirect('admin/artikel')->with('flash_message', 'Artikel added!');
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
        $artikel = Artikel::findOrFail($id);

        return view('admin.artikel.show', compact('artikel'));
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
        $artikel = Artikel::findOrFail($id);

        return view('admin.artikel.edit', compact('artikel'));
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
            'judul' => 'required',
            'artikel' => 'required']);
            
        $requestData = $request->all();
        
        $artikel = Artikel::findOrFail($id);
        $artikel->update($requestData);

        return redirect('admin/artikel')->with('flash_message', 'Artikel updated!');
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
        Artikel::destroy($id);

        return redirect('admin/artikel')->with('flash_message', 'Artikel deleted!');
    }
}
