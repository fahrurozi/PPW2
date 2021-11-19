@extends('/layout.baru')

@section('content')
<div class="container">
    <form action="{{route('buku.search')}}" method="get">@csrf
        <input type="text" name="kata" placeholder="Cari..." id="kata" class="form-control" style="width: 30%; display: inline; margin-top: 10px; margin-bottom: 10px; float:right">
    </form>
    <br>
    <p align='right' style="font-weight:bold"><a href="{{route('buku.create')}}">Tambah Buku</a></p>
    <table border="1" class="table table-dark table-hover">
        <tr>
            <th>id</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tanggal Terbit</th>
            <th>#</th>
        </tr>
        @foreach ($data_buku as $item)
        <tr>
            <td>{{++$no}}</td>
            <td>{{$item->judul}}</td>
            <td>{{$item->penulis}}</td>
            <td>{{"Rp".number_format($item->harga,2,',','.')}}</td>
            <td>{{$item->tgl_terbit->format('Y/m/d')}}</td>
            <td><button><a href="{{route('buku.edit', $item->id)}}">Edit</a></button>
                <form action="{{route('buku.destroy', $item->id)}}" method="post">
                    @csrf
                    <button onclick="return confirm('yakin mau dihapus?')" style="color: red;">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

        <tr>
            <td colspan="6"></td>
        </tr>
        <tr>
            <td colspan="5">Jumlah Data</td>
            <td>{{$jumlah}}</td>
        </tr>
        <tr>
            <td colspan="5">Jumlah Harga</td>
            <td>{{"Rp".number_format($total,2,',','.')}}</td>
        </tr>
        <tr>
            <td colspan="5"></td>
            <td>
                <div>{{$data_buku->links()}}</div>

            </td>
        </tr>

    </table>
</div>
@endsection