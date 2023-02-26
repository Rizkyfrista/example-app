<?php

namespace App\Http\Controllers;

use App\Models\Details;
use Inertia\Inertia;

class DetailsController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all posts from database
        $details = Details::latest()->get();

        //render with data "details"
        return Inertia::render('Details/Index', [
            'details' => $details
        ]);
    }
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return Inertia::render('Details/Create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //set validation
        $request->validate([
            'jenjangpendidikanterakhir' => 'required',
            'namaintitusiterakhir' => 'required',
            'jurusan' => 'required',
            'tahunlulus' => 'required',
            'ipk' => 'required',
        ]);

        //create post
        $post = Post::create([
            'jenjangpendidikanterakhir'     => $request->jenjangpendidikanterakhir,
            'namaintitusiterakhir'   => $request->namaintitusiterakhir,
            'jurusan'   => $request->jurusan,
            'tahunlulus'     => $request->tahunlulus,
            'ipk'   => $request->ipk,
        ]);

        if($post) {
            return Redirect::route('details.index')->with('message', 'Data Berhasil Disimpan!');
        }
    }

    /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    public function edit(Details $details)
    {
        return Inertia::render('Details/Edit', [
            'details' => $details
        ]);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Details $details)
    {
        //set validation
        $request->validate([
            'jenjangpendidikanterakhir' => 'required',
            'namaintitusiterakhir' => 'required',
            'jurusan' => 'required',
            'tahunlulus' => 'required',
            'ipk' => 'required',
        ]);

        //update post
        $post->update([
            'jenjangpendidikanterakhir'     => $request->jenjangpendidikanterakhir,
            'namaintitusiterakhir'   => $request->namaintitusiterakhir,
            'jurusan'   => $request->jurusan,
            'tahunlulus'     => $request->tahunlulus,
            'ipk'   => $request->ipk,
        ]);

        if($details) {
            return Redirect::route('details.index')->with('message', 'Data Berhasil Diupdate!');
        }
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        //find details by ID
        $details = Details::findOrfail($id);

        //delete details
        $details->delete();

        if($details) {
            return Redirect::route('details.index')->with('message', 'Data Berhasil Dihapus!');
        }

    }
}
