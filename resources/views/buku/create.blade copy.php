@extends('layout.baru')


@section('content')

<div class="container">
    <h4>Tambah Buku</h4>
    @if(count($errors)>0)
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form method="post" action="{{route('buku.store')}}">
        @csrf
        <div>Judul <input type="text" name="judul" id=""></div>
        <div>Penulis <input type="text" name="penulis" id=""></div>
        <div>Harga <input type="text" name="harga" id=""></div>
        <!-- <div>Tgl. Terbit <input type="date" name="tgl_terbit" id=""></div> -->
        <div>Tgl. Terbit <input type="text" id="tgl_terbit" name="tgl_terbit" class="date form-control" placeholder="yyyy/mm/dd"></div>
        <div><button type="submit">Simpan</button></div>
        <a href="/buku">Batal</a>
    </form>
</div>
@endsection