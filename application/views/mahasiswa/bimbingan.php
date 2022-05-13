<div class="row">
    <div class="col-sm-12 col-md-10">
        <h5 class="mb-0"><i class="fa fa-cubes"></i> Data Bimbingan</h5>
    </div>
</div>
<hr class="mt-0" />
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#bimbing1">
    Buat Bimbingan
</button>
<div class="modal fade" id="bimbing1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Buat Bimbingan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('mahasiswa/insertbim'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <label for="" class="font-weight-bold">Kegiatan Pembimbingan :</label>
                    <textarea class=" form-control" name="kegiatan" id="kegiatan" rows="3" required></textarea>
                    <label for="" class=" mt-3 font-weight-bold">File Laporan</label>
                    <input autocomplete="off" type="text" class="form-control" id="file_laporan" value="" name="file_laporan">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>

    </div>
</div>
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