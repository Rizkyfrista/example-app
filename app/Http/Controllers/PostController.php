<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Pendidikan;
use App\Models\RiwayatPekerjaan;
use App\Models\RiwayatPelatihan;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all posts from database
        $posts = Post::latest()->get();

        //render with data "posts"
        return Inertia::render('Post/Index', [
            'posts' => $posts
        ]);
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return Inertia::render('Post/Create');
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
            'firstname'   => 'required',
            'lastname'   => 'required',
            'address'   => 'required',
            'city_state_zip'   => 'required',
            'homephone'   => 'required',
            'cellphone'   => 'required',
            'email'   => 'required',
            'appliedposition'   => 'required',
            'expectedsalary'   => 'required',
        ]);

        //create post
        $post = Post::create([
            'firstname'     => $request->firstname,
            'lastname'   => $request->lastname,
            'address'   => $request->address,
            'city_state_zip'     => $request->city_state_zip,
            'homephone'   => $request->homephone,
            'cellphone'   => $request->cellphone,
            'email'     => $request->email,
            'appliedposition'   => $request->appliedposition,
            'expectedsalary'   => $request->expectedsalary,
        ]);

        if ($post) {
            $pendidikann = $request->pendidikan;
            $pelatihann = $request->riwayatpelatihan;
            $pekerjaann = $request->riwayatpekerjaan;

            if (count($pendidikann) > 0) {
                foreach ($pendidikann as $pendidikan) {
                    $pendidikan['post_id'] = $post->id;
                    Pendidikan::create($pendidikan);
                }
            }
            if (count($pelatihann) > 0) {
                foreach ($pelatihann as $pel) {
                    $pel['post_id'] = $post->id;
                    RiwayatPelatihan::create($pel);
                }
            }
            if (count($pekerjaann) > 0) {
                foreach ($pekerjaann as $pek) {
                    $pek['post_id'] = $post->id;
                    RiwayatPekerjaan::create($pek);
                }
            }
            return Redirect::route('posts.index')->with('message', 'Data Berhasil Disimpan!');
        }
    }

    public function show(Post $post)
    {
        //render with data "posts"
        return Inertia::render('Post/Detail', [
            'pendidikann' => $post->pendidikann,
            'pelatihann' => $post->pelatihann,
            'pekerjaann' => $post->pekerjaann,
        ]);
    }

    /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    public function edit(Post $post)
    {
        $post['pendidikann'] = $post->pendidikann;
        $post['pelatihann'] = $post->pelatihann;
        $post['pekerjaann'] = $post->pekerjaann;

        return Inertia::render('Post/Edit', [
            'post' => $post,
        ]);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Post $post)
    {

        //set validation
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'city_state_zip' => 'required',
            'homephone' => 'required',
            'cellphone' => 'required',
            'email' => 'required',
            'appliedposition' => 'required',
            'expectedsalary' => 'required',
        ]);

        //update post
        $updated = $post->update([
            'firstname'     => $request->firstname,
            'lastname'   => $request->lastname,
            'address'   => $request->address,
            'city_state_zip'     => $request->city_state_zip,
            'homephone'   => $request->homephone,
            'cellphone'   => $request->cellphone,
            'email'     => $request->email,
            'appliedposition'   => $request->appliedposition,
            'expectedsalary'   => $request->expectedsalary,
            'pendidikan'   => $request->pendidikan_data,
            'riwayatpelatihan'   => $request->riwayatpelatihan_data,
            'riwayatpekerjaan'   => $request->riwayatpekerjaan_data,
        ]);

        if ($updated) {
            $collectIdPendidikann = array_map(function ($pendidikan) {
                return $pendidikan['id'];
            }, $request->pendidikan);

            if (count($collectIdPendidikann) > 0) {
                foreach ($collectIdPendidikann as $idPendidikan) {
                    $findPendidikan = Pendidikan::where('id', $idPendidikan)->where('post_id', $post->id)->first();

                    $filterPendidikan = array_filter($request->pendidikan, function ($pendidikan) use ($idPendidikan) {
                        return $pendidikan['id'] == $idPendidikan;
                    });
                    $result = [];

                    if ($findPendidikan) {
                        foreach ($filterPendidikan as $tempPendidikan) {
                            $result = $tempPendidikan;
                        }
                        $findPendidikan->update($result);
                    } else {
                        foreach ($filterPendidikan as $tempPendidikan) {
                            $tempPendidikan['post_id'] = $post->id;
                            $result = $tempPendidikan;
                        }
                        Pendidikan::create($result);
                    }
                }
            }

            $collectIdPelatihann = array_map(function ($riwayatpelatihan) {
                return $riwayatpelatihan['id'];
            }, $request->riwayatpelatihan);

            if (count($collectIdPelatihann) > 0) {
                foreach ($collectIdPelatihann as $idPelatihan) {
                    $findPelatihan = RiwayatPelatihan::where('id', $idPelatihan)->where('post_id', $post->id)->first();

                    $filterPelatihan = array_filter($request->riwayatpelatihan, function ($riwayatpelatihan) use ($idPelatihan) {
                        return $riwayatpelatihan['id'] == $idPelatihan;
                    });
                    $result = [];

                    if ($findPelatihan) {
                        foreach ($filterPelatihan as $tempPelatihan) {
                            $result = $tempPelatihan;
                        }
                        $findPelatihan->update($result);
                    } else {
                        foreach ($filterPelatihan as $tempPelatihan) {
                            $tempPelatihan['post_id'] = $post->id;
                            $result = $tempPelatihan;
                        }
                        RiwayatPelatihan::create($result);
                    }
                }
            }

            $collectIdPekerjaann = array_map(function ($riwayatpekerjaan) {
                return $riwayatpekerjaan['id'];
            }, $request->riwayatpekerjaan);

            if (count($collectIdPendidikann) > 0) {
                foreach ($collectIdPekerjaann as $idPekerjaan) {
                    $findPekerjaan = RiwayatPekerjaan::where('id', $idPekerjaan)->where('post_id', $post->id)->first();

                    $filterPekerjaan = array_filter($request->riwayatpekerjaan, function ($riwayatpekerjaan) use ($idPekerjaan) {
                        return $riwayatpekerjaan['id'] == $idPekerjaan;
                    });
                    $result = [];

                    if ($findPekerjaan) {
                        foreach ($filterPekerjaan as $tempPekerjaan) {
                            $result = $tempPekerjaan;
                        }
                        $findPekerjaan->update($result);
                    } else {
                        foreach ($filterPekerjaan as $tempPekerjaan) {
                            $tempPekerjaan['post_id'] = $post->id;
                            $result = $tempPekerjaan;
                        }
                        RiwayatPekerjaan::create($result);
                    }
                }
            }

            return Redirect::route('posts.index')->with('message', 'Data Berhasil Di Update!');
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
        //find post by ID
        $post = Post::findOrfail($id);

        //delete post
        $post->delete();

        if ($post) {
            return Redirect::route('posts.index')->with('message', 'Data Berhasil Dihapus!');
        }
    }

    public function pendidikanDestroy($id)
    {
        try {
            $pendidikan = Pendidikan::find($id);

            if ($pendidikan) {
                $pendidikan->delete();
            }

            return redirect()->back()->with('message', 'Berhasil Delete Pendidikan');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function pelatihanDestroy($id)
    {
        try {
            $pelatihan = riwayatpelatihan::find($id);

            if ($pelatihan) {
                $pelatihan->delete();
            }

            return redirect()->back()->with('message', 'Berhasil Delete Pelatihan');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function pekerjaanDestroy($id)
    {
        try {
            $pekerjaan = riwayatpekerjaan::find($id);
            if ($pekerjaan) {
                $pekerjaan->delete();
            }

            return redirect()->back()->with('message', 'Berhasil Delete Pekerjaan');
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
