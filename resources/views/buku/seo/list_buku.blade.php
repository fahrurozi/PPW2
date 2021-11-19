@extends('layout.blackthemes')


@section('content')
<h2>List Buku SEO</h2>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title"> List Buku SEO</h4>
            </div> 
            <div class="card-body" style="padding:50px">
                <div class="table-responsive ps">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <!-- <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Gambar</th>
                                <th style="width: 20%;" class="text-center">#</th>
                            </tr> -->
                        </thead>
                        <tbody>
                            @foreach($bukus as $buku)
                            <tr>
                                <td>{{++$no}}</td>
                                <td style="width: 40%;">{{$buku->judul}}</td>
                                <td ><img src="{{asset('thumb/'.$buku->foto)}}" alt=""></td>
                                <td><button class="btn btn-success btn-sm" ><a  href="{{route('detail.galeri.buku', (str_replace(' ', '-', strtolower($buku->judul))))}}" style="color: white; font-weight: 600">Lihat</a></button>
                                </td>
                            </tr>
                           @endforeach
                           

                        </tbody>
                        <tr>
                            <td colspan="4"></td>
                        </tr>
                                              
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="1">
                                <div>{{$bukus->links()}}</div>
                            </td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection