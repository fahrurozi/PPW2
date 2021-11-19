@extends('layout.baru')

@section('content')
<div class="container">
    <h4>Tambah Buku</h4>
    @foreach($data_buku as $item)
    <form method="post" action="{{route('buku.update', $item->id)}}">
        @csrf
        
        <div>Judul <input type="text" name="judul" id="" value="{{$item->judul}}"></div>
        <div>Penulis <input type="text" name="penulis" id="" value="{{$item->penulis}}"></div>
        <div>Harga <input type="text" name="harga" id="" value="{{$item->harga}}"></div>
        <!-- <div>Tgl. Terbit <input type="date" name="tgl_terbit" id="" value="{{$item->tgl_terbit}}"></div> -->
        <div>Tgl. Terbit <input type="text" id="tgl_terbit" name="tgl_terbit" class="date form-control" value="{{$item->tgl_terbit->format('Y/m/d')}}"  placeholder="yyyy/mm/dd" ></div>
        <div><button type="submit">Update</button></div>
        <a href="/buku">Batal</a>
    </form>
    @endforeach
</div>
@endsection