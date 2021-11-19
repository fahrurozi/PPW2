@extends('layout.blackthemes')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title"> Edit Galeri</h4>

            </div>
            <div class="card-body" style="padding:0px 50px 50px 50px">
                @if(count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif
                @foreach($galeri as $item)
                <form method="post" action="{{route('galeri.update', $item->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="nama_galeri" id="nama_galeri" value="{{$item->nama_galeri}}" class="form-control" placeholder="Masukan Judul Galeri">
                    </div>
                    <div class="form-group">
                        <label for="id_buku">Buku</label>
                        <select name="id_buku" class="form-control">
                            <option style="color: grey" value="">Pilih Buku</option>
                            @foreach($buku as $data)
                            @if($data->id==$item->id_buku)
                            <option style="color: black" value="{{$data->id}}" selected>{{$data->judul}}</option>
                            @endif
                            <option style="color: black" value="{{$data->id}}">{{$data->judul}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" value="{{$item->keterangan}}" name="keterangan" id="keterangan" class="form-control" placeholder="keterangan">
                    </div>
                    <div class="">
                        <label for="foto">Upload Foto</label>
                        <input type="file" class="form-control" name="foto" id="foto">
                        <img id="preview" src="{{asset('thumb/'.$item->foto)}}" style="height: 150px;width: 150px" alt="your image" />
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/galeri" style="color: red; font-weight: 400">Batal</a>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
<script>
    foto.onchange = evt => {
        const [file] = foto.files
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection