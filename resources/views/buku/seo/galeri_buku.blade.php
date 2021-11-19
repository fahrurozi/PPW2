@extends('layout.blackthemes')


@section('content')
<h2>Galeri Buku {{$bukus->judul}}</h2>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title"> Galeri Buku {{$bukus->judul}}</h4>
            </div>
            <div class="card-body" style="padding:50px">
                <div class="row">
                    @foreach($galeris as $galeri)
                    <div class="col-md-3">
                        <!-- <img src="{{asset('thumb/'.$galeri->foto)}}" > -->
                        <a href="{{asset('thumb/'.$galeri->foto)}}" data-lightbox="image-1" data-title="{{$galeri->nama_galeri}}">
                            <img src="{{asset('thumb/'.$galeri->foto)}}"  style="width: 50%; height: auto" alt="" srcset="">
                        </a>
                        <p><h5>{{$galeri->nama_galeri}}</h5></p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
@endsection