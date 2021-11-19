
@extends('/layout.blackthemes')

@section('content')
<h2>Galeri</h2>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title"> List Galeri</h4>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4" style=" display: flex; justify-content: flex-end; padding-right: 50px"> <button class="btn btn-primary animation-on-hover" type="button"><a href="{{route('galeri.create')}}" style="color: white;">Tambah Galeri</a></button></div>
                </div>
            </div>
            <div class="card-body" style="padding:50px">
                <div class="table-responsive ps">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th>no</th>
                                <th>Nama Galeri</th>
                                <th>Nama Buku</th>
                                <th>Gambar</th>
                                <th style="width: 20%;" class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galeri as $data)
                            <tr>
                                <td>{{++$no}}</td>
                                <td>{{$data->nama_galeri}}</td>
                                <td>{{$data->bukus->judul}}</td>

                                <td><img src="{{asset('thumb/'.$data->foto)}}" style="width: 100px;" /></td>

                                <td><button class="btn btn-info btn-sm"><a href="{{route('galeri.edit', $data->id)}}" style="color: white; font-weight: 600">Edit</a></button>
                                    <form action="{{route('galeri.destroy', $data->id)}}" method="post" style="display: inline;">
                                        @csrf
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('yakin mau dihapus?')" style="color: white;">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>

                        <tr>
                            <td colspan="4"></td>
                            <td colspan="1">
                                <div>{{$galeri->links()}}</div>
                            </td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection