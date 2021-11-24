
@extends('layout.blackthemes')


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title"> Tambah Komentar</h4>

            </div>
            <div class="card-body" style="padding:0px 50px 50px 50px">
                @if(count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif
                <form method="post" action="{{route('store.comment', $data_buku->id)}}">
                @csrf
                    <div class="form-group">
                        <label for="comment">Komentar</label>
                        
                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                    </div>
                   
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url()->previous() }}" style="color: red; font-weight: 400">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
