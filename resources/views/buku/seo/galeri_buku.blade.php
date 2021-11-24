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
                            <img src="{{asset('thumb/'.$galeri->foto)}}" style="width: 50%; height: auto" alt="" srcset="">
                        </a>
                        <p>
                        <h5>{{$galeri->nama_galeri}}</h5>
                        </p>
                    </div>
                    @endforeach
                </div>
                <br>
                <hr>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="py-auto">Komentar</h3>
                    </div>

                    <div class="col-md-4"></div>
                    <div class="col-md-4" style=" display: flex; justify-content: flex-end; padding-right: 50px">
                        <button class="btn btn-primary animation-on-hover" type="button">
                            <a href="{{route('create.comment', $bukus->id)}}" style="color: white;">Tambah Komentar</a>
                        </button>
                    </div>
                </div>
                <br>
                @foreach($comment as $komen)

                <div class="row">
                    <div class="col-md-12 rounded py-3" style="background-color: #5603ad;">
                        <h4>- {{$komen->users->name}} -</h4>
                        <p>Komentar : <span>{{$komen->comment}}</span></p>
                        <p style="color:grey">{{$komen->updated_at}}</p>
                    </div>
                </div>
                <br>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection