@extends('/layout.blackthemes')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title"> List Buku</h4>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <form action="{{route('buku.search')}}" method="get">@csrf
                            <input type="text" name="kata" placeholder="Cari..." id="kata" class="form-control" style="width: 100%; display: inline; margin-top: 10px; margin-bottom: 10px; float:center; border-color : #e14eca">
                        </form>
                    </div>
                    <div class="col-md-4" style=" display: flex; justify-content: flex-end; padding-right: 50px"> <button class="btn btn-primary animation-on-hover" type="button"><a href="{{route('buku.create')}}" style="color: white;">Tambah Buku</a></button></div>
                </div>
            </div>
            <div class="card-body" style="padding:0px 50px 0px 50px">
                @if(count($data_buku))
                <div class="alert alert-success">Ditemukan <strong>{{count($data_buku)}}</strong> data dengan kata : <strong>{{$cari}}</strong></div>
                @else
                <div class="alert alert-warning">
                    <h4>Data {{$cari}} tidak ditemukan</h4> <a href="/buku" class="btn btn-warning">Kembali</a>
                </div>
                @endif
                <div class="table-responsive ps">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th>id</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Harga</th>
                                <th>Tanggal Terbit</th>
                                <th style="width: 20%;" class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_buku as $item)
                            <tr>
                                <td>{{++$no}}</td>
                                <td>{{$item->judul}}</td>
                                <td>{{$item->penulis}}</td>
                                <td>{{"Rp".number_format($item->harga,2,',','.')}}</td>
                                <td>{{$item->tgl_terbit->format('Y/m/d')}}</td>
                                <td><button class="btn btn-info btn-sm"><a href="{{route('buku.edit', $item->id)}}" style="color: white; font-weight: 600">Edit</a></button>
                                    <form action="{{route('buku.destroy', $item->id)}}" method="post" style="display: inline;">
                                        @csrf
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('yakin mau dihapus?')" style="color: white;">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                        <tr>
                            <td colspan="6"></td>
                        </tr>
                        <tr>
                            <td colspan="5">Jumlah Data</td>
                            <td colspan="1">{{$jumlah}}</td>
                        </tr>
                        <tr>
                            <td colspan="5">Jumlah Harga</td>
                            <td colspan="1">{{"Rp".number_format($total,2,',','.')}}</td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td colspan="1">
                                <div>{{$data_buku->links()}}</div>
                            </td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>

</div>


@endsection