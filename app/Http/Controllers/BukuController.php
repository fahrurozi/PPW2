<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use File;
use Image;

class BukuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $batas = 5;
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $jumlah = Buku::all()->count();
        $total = Buku::all()->sum('harga');
        $no = $batas * ($data_buku->currentPage() -1);
        return view('buku', compact('data_buku', 'no', 'jumlah', 'total'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required|string',
            'penulis' => 'required|string|max:30',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
        ],
        [
            'judul.required' => "judul wajib diisi",
            'penulis.required' => "penulis wajib diisi",
            'harga.required' => "harga wajib diisi",
            'tgl_terbit.required' => "tgl_terbit wajib diisi",
        ]
    );

        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->buku_seo = str_replace(' ', '-', strtolower($request->judul));
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;

        $foto = $request->foto;
        $namafile = time() . '.' . $foto->getClientOriginalExtension();

        Image::make($foto)->resize(200, 150)->save('thumb/' . $namafile);
        $foto->move('images/', $namafile);

        $buku->foto = $namafile;

        $buku->save();
        return redirect('/buku')->with('pesan', 'Data Buku Berhasil disimpan');
        
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('pesan', 'Data Buku Berhasil dihapus');
    }

    public function edit($id)
    {
        $data_buku = Buku::where('id', $id)->get();
        return view('buku.edit', ['data_buku' => $data_buku]);
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);
        
        $buku->judul = $request->judul;
        $buku->buku_seo = str_replace(' ', '-', strtolower($request->judul));
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;

        if ($request->foto!= NULL) {
            $oldfilename = $buku->foto;
            $image_path = "thumb/" . $oldfilename;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $foto = $request->foto;
            $namafile = time() . '.' . $foto->getClientOriginalExtension();

            Image::make($foto)->resize(200, 150)->save('thumb/' . $namafile);
            $foto->move('images/', $namafile);

            $buku->foto = $namafile;
        }

        $buku->update();
        return redirect('/buku')->with('pesan', 'Data Buku Berhasil diedit');
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->kata;
        $data_buku = Buku::where('judul', 'like',"%".$cari."%")->orwhere('penulis', 'like',"%".$cari."%")->paginate($batas);
        $jumlah = Buku::all()->count();
        $total = Buku::all()->sum('harga');
        $no = $batas * ($data_buku->currentPage() -1);
        return view('buku.search', compact('data_buku', 'no', 'jumlah', 'total', 'cari'));
    }

    public function list_buku()
    {
        $batas = 5;
        $bukus = Buku::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($bukus->currentPage() - 1);

        return view('buku.seo.list_buku', compact('bukus', 'no'));
    }

    public function galbuku($title){
        $bukus = Buku::where('buku_seo', $title)->first();  
        $galeris = $bukus->photos()->orderBy('id', 'desc')->paginate(6);
        
        return view('buku.seo.galeri_buku', compact('bukus', 'galeris'));
    }

    
}
