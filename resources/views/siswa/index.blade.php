<div id="siswa">
    <h2>Daftar Siswa</h2>

    <?php if (!empty($siswa)):?>
        <ul>
            <?php foreach ($siswa as $anak): ?>
                <li><?= $anak ?></li>
            <?php endforeach ?>
        </ul>
    <?php else:  ?>
        <p>Tidak ada data siswa.</p>
    <?php endif ?>
</div> 