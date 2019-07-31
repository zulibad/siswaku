@extends('template')

@section('main')
        <div id="siswa">
            <h2>ANAK ASUH</h2>

            @if (!empty($siswa_list))
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>NAMA</th>
                            <th>TGL LAHIR</th>
                            <th>JK</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($siswa_list as $siswa): ?>
                        <tr>
                            <td>{{ $siswa->nisn }}</td>
                            <td>{{ $siswa->nama_siswa }}</td>
                            <td>{{ $siswa->tanggal_lahir }}</td>
                            <td>{{ $siswa->jenis_kelamin }}</td>
                            <td>
                                <div class="box-button">
                                    {{ link_to('siswa/'.$siswa->id, 'Detail', ['class' => 'btn btn-primary btn-sm']) }}
                                </div>

                                <div class="box-button">
                                {{ link_to('siswa/'.$siswa->id. '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
                                </div>

                                <div class="box-button">
                                {!! Form::open(['method'=>'DELETE', 'action'=>['SiswaController@destroy', $siswa->id]]) !!}
                                {!! Form::submit('Delete', ['class'=> 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            @else
                <p>Tidak ada data siswa.</p>
            @endif

            <div class="table-nav">
                <div class="jumlah-data">
                     <strong> Jumlah Siswa: {{ $jumlah_siswa }} </strong>
                </div>
                <div class="paging">
                    {{ $siswa_list->links() }}
                </div>
            </div>

            <div class="tombol-nav">
                <a href="siswa/create" class="btn btn-primary">Tambah Siswa</a>
            </div>
        </div>
@stop

<!-- @section('footer')
    @include('footer')
@stop -->