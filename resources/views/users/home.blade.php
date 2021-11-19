@extends('/layout.blackthemes')

@section('content')
<h2>Users</h2>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title"> List Users</h4>
                <div class="row">
                    <div class="col-md-4"></div>
                    <!-- <div class="col-md-4">
                        <form action="" method="get">@csrf
                            <input type="text" name="kata" placeholder="Cari..." id="kata" class="form-control" style="width: 100%; display: inline; margin-top: 10px; margin-bottom: 10px; float:center; border-color : #e14eca">
                        </form>
                    </div> -->
                    <div class="col-md-4" style=" display: flex; justify-content: flex-end; padding-right: 50px"> <button class="btn btn-primary animation-on-hover" type="button"><a href="{{route('users.create')}}" style="color: white;">Tambah Users</a></button></div>
                </div>
            </div>
            <div class="card-body" style="padding:50px">
                <div class="table-responsive ps">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th>no</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th style="width: 20%;" class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_users as $user)
                            <tr>
                                <td>{{++$no}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->level}}</td>
                                <td><button class="btn btn-info btn-sm"><a href="{{route('users.edit', $user->id)}}" style="color: white; font-weight: 600">Edit</a></button>
                                    <form action="{{route('users.destroy', $user->id)}}" method="post" style="display: inline;">
                                        @csrf
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('yakin mau dihapus?')" style="color: white;">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection