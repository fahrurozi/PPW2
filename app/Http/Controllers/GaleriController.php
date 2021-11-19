<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Galeri;
use App\Buku;
use File;
use Image;

class GaleriController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $batas = 4;
        $galeri = Galeri::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($galeri->currentPage() - 1);

       
        return view('galeri.home', compact('galeri', 'no'));
    }

    public function create()
    {
        $buku = Buku::all();
        return view('galeri.create', compact('buku'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_galeri' => 'required',
            'keterangan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        $galeri = new Galeri;
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan = $request->keterangan;
        $galeri->id_buku = $request->id_buku;

        $foto = $request->foto;
        $namafile = time() . '.' . $foto->getClientOriginalExtension();

        Image::make($foto)->resize(200, 150)->save('thumb/' . $namafile);
        $foto->move('images/', $namafile);

        $galeri->foto = $namafile;
        $galeri->save();

        return redirect('/galeri')->with('pesan', 'Data Galeri berhasil ditambahkan');
    }

    public function edit($id)
    {
        $galeri = Galeri::where('id', $id)->get();
        $buku = Buku::all();
        return view('galeri.edit', compact('galeri', 'buku'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::find($id);
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan = $request->keterangan;
        $galeri->id_buku = $request->id_buku;
        
        if ($request->foto!= NULL) {
            $oldfilename = $galeri->foto;
            $image_path = "thumb/" . $oldfilename;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $foto = $request->foto;
            $namafile = time() . '.' . $foto->getClientOriginalExtension();

            Image::make($foto)->resize(200, 150)->save('thumb/' . $namafile);
            $foto->move('images/', $namafile);

            $galeri->foto = $namafile;
        }

        $galeri->update();
        return redirect('/galeri')->with('pesan', 'Data Galeri Berhasil diedit');
    }

    public function destroy($id)
    {
        $galeri = Galeri::find($id);
        $filename = $galeri->foto;
        $image_path = "thumb/" . $filename;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $galeri->delete();

        return redirect('/galeri')->with('pesan', 'Data Galeri Berhasil dihapus');
    }
}
