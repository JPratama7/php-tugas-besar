<div class="row">
    <div class="col-sm-12 col-md-10">
        <h5 class="mb-0"><i class="fa fa-cubes"></i> Data Bimbingan</h5>
    </div>
    <div class="col-sm-12 col-md-2">
        <a href="<?= site_url('tambah_barang'); ?>" class="btn btn-success btn-sm btn-block">Tambah Pembimbing</a>
    </div>
</div>
<hr class="mt-0" />
<div class="table-responsive">
    <table class="table table-sm table-hover table-striped" id="tables">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Jumlah Tim</th>
                <th scope="col">Detail</th>
            </tr>
            <?php $no = 1;
            foreach ($data as $row) : ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row['id_proposal'] ?></td>
                    <td><?= $row['npm1'] ?></td>
                    <td><?= $row['npm2'] ?></td>
                    <td><?= $row['keg'] ?></td>
                    <?php $no++; ?>
                </tr>
            <?php endforeach ?>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>




</div>