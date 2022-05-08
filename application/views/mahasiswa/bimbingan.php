<div class="row">
    <div class="col-sm-12 col-md-10">
        <h5 class="mb-0"><i class="fa fa-cubes"></i> Data Bimbingan</h5>
    </div>
     <div class="col-sm-12 col-md-2">
        <a href="<?= site_url('tambah_barang'); ?>" class="btn btn-success btn-sm btn-block">Tambah Bimbingan</a>
    </div>
</div>
<hr class="mt-0" />
<div class="table-responsive">
    <table class="table table-sm table-hover table-striped" id="tables">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kode Bimbingan</th>
                <th scope="col">Nilai Ketua</th>
                <th scope="col">Nilai Anggota</th>
                <th scope="col">Pesan</th>
                <th scope="col">kegiatan</th>
                <th scope="col">File</th>
            </tr>
            <?php $no = 1; foreach($bim as $row): ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row['id_bimbingan'] ?></td>
                    <td><?= $row['nilai_ket'] ?></td>
                    <td><?= $row['nilai_part'] ?></td>
                    <td><?= $row['pesan'] ?></td>
                    <td><?= $row['kegiatan'] ?></td>
                    <td><?= $row['file'] ?></td>
                    <?php $no++; ?>
                </tr>
            <?php endforeach ?>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>


  

</div>