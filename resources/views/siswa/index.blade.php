@extends('template')

@section('main')
        <div id="siswa">
            <h2>SISWA</h2>

            @if (!empty($siswa_list))
                <table class="table">
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
                            <td>{{ link_to('siswa/'.$siswa->id, 'Detail', ['class' => 'label label-primary']) }}</td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            @else
                <p>Tidak ada data siswa.</p>
            @endif

            <div class="pull-left">
                <strong>Jumlah Siswa : {{ $jumlah_siswa }}</strong>
            </div>
        </div>
@stop

@section('footer')
        <div id="footer">
            <p>&copy; 2019 siswaku.app</p>
        </div>
@stop