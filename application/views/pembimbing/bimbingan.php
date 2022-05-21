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
                <th scope="col">Kode Tim</th>
                <th scope="col">Jenis Kegiatan</th>
                <th scope="col">NPM Ketua</th>
                <th scope="col">Nilai Ketua</th>
                <th scope="col">Nilai Anggota</th>
                <th scope="col">Pesan</th>
                <th scope="col">Kegiatan</th>
                <th scope="col">Aksi</th>
            </tr>
            <?php $no = 1;
            foreach ($bim as $row) : ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row['id_bimbingan'] ?></td>
                    <td><?= $row['keg'] ?></td>
                    <td><?= $row['npm1'] ?></td>
                    <td><?= $row['nilai_ket'] ?></td>
                    <td><?= $row['nilai_part'] ?></td>
                    <td><?= $row['pesan'] ?></td>
                    <td><?= $row['kegiatan'] ?></td>
                    <td class="d-flex" width="140px">
                        <form action="<?= base_url("pem/downloadBimbingan/{$row['id_bimbingan']}"); ?>" method="post" enctype="multipart/form-data"><button type="submit" class="mx-1 btn btn-primary">Download</button></form>
                        <button class="mx-1 btn btn-primary" data-toggle="modal" data-target="#tanggapi<?= $row['id_bimbingan'] ?>">Tanggapi</button>
                    </td>
                    <?php $no++; ?>
                </tr>

                <div class="modal fade" id="tanggapi<?= $row['id_bimbingan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Tanggapan Dospem</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('pem/updatebim'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Masukan Nilai Mhs Ketua</label>
                                        <input autocomplete="off" type="numb" class="form-control" id="nilai_ket" value="" name="nilai_ket">
                                        <input autocomplete="off" type="hidden" class="form-control" id="id_bimbingan" value="<?= $row['id_bimbingan'] ?>" name="id_bimbingan">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Masukan Nilai Mhs Partner</label>
                                        <input autocomplete="off" type="numb" class="form-control" id="nilai_part" value="" name="nilai_part">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Masukan Pesan</label>
                                        <textarea class=" form-control" name="pesan" id="pesan" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Approve Bimbingan</label>
                                        <select name="approve" id="approve">
                                            <option value="" selected>---</option>
                                            <option value="Y">Ya</option>
                                            <option value="N">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            <?php endforeach ?>
        </thead>
    </table>
</div>




</div>