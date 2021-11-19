@extends('layout.blackthemes')


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title"> Tambah Galeri</h4>

            </div>
            <div class="card-body" style="padding:0px 50px 50px 50px">
                @if(count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif
                <form method="post" action="{{route('galeri.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input required type="text" name="nama_galeri" id="nama_galeri" class="form-control" placeholder="Masukan Judul Galeri">
                    </div>
                    <div class="form-group">
                        <label for="id_buku">Buku</label>
                        <select required name="id_buku" class="form-control">
                            <option style="color: grey" value="" selected>Pilih Buku</option>
                            @foreach($buku as $data)
                            <option style="color: black" value="{{$data->id}}">{{$data->judul}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input required type="text" name="keterangan" id="keterangan" class="form-control" placeholder="keterangan">
                    </div>
                    <div class="">
                        <label for="foto">Upload Foto</label>
                        <input required type="file" class="form-control" name="foto" id="foto">
                        <img id="preview"  style="height: 150px;width: 150px; display: none"  />
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/galeri" style="color: red; font-weight: 400;">Batal</a>
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