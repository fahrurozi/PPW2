@extends('layout.blackthemes')


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title"> Tambah Buku</h4>

            </div>
            <div class="card-body" style="padding:0px 50px 50px 50px">
                @if(count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif
                <form method="post" action="{{route('buku.store')}}" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukan Judul Buku">
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" name="penulis" id="penulis" class="form-control" placeholder="Penulis">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga">
                    </div>
                    <div class="form-group">
                        <label for="tgl_terbit">Tgl. Terbit</label>
                        <input type="date" id="tgl_terbit" name="tgl_terbit" class="date form-control" placeholder="yyyy/mm/dd">
                    </div>
                    <div class="">
                        <label for="foto">Upload Foto</label>
                        <input required type="file" class="form-control" name="foto" id="foto">
                        <img id="preview"  style="height: 150px;width: 150px; display: none"  />
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/buku" style="color: red; font-weight: 400">Batal</a>
                </form>
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
            document.getElementById("preview").style.display = "block";
            preview.src = URL.createObjectURL(file)
            
        }
    }
</script>
@endsection