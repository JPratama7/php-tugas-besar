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
                <th scope="col">Nama Ketua</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Nama Pembimbing</th>
                <th scope="col">Nama Penguji</th>
                <th scope="col">Kegiatan Proyek</th>
                <th scope="col">Status Tim</th>
                <th scope="col">Abstrak</th>
                <th scope="col">Aksi</th>
            </tr>
            <?php $no = 1;
            foreach ($tim as $row) : ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row['mhs1'] ?></td>
                    <td><?= $row['mhs2'] ?></td>
                    <td><?= $row['pem'] ?></td>
                    <td><?= $row['peng'] ?></td>
                    <?php if ($row['keg'] == 'p1') {
                        echo '<td>Proyek 1</td>';
                    } elseif ($row['keg'] == 'p2') {
                        echo '<td>Proyek 2</td>';
                    } elseif ($row['keg'] == 'p3') {
                        echo '<td>Proyek 3</td>';
                    } elseif ($row['keg'] == 'ta') {
                        echo '<td>Proyek TA</td>';
                    } elseif ($row['keg'] == 'inter') {
                        echo '<td>Intership</td>';
                    } ?>
                    <td><?= $row['status'] == 'y' ? 'Approved' : 'Not Approved' ?></td>
                    <td><?= $row['abstrak'] ?></td>
                    <td>
                        <div style=" display: flex; flex-wrap: wrap">
                            <form action="<?= base_url("koor/downloadDraf/{$row['id_tim']}"); ?>" method="post" enctype="multipart/form-data"><button type="submit" class="mx-1 btn btn-primary">Draf</button></form>
                            <form action="<?= base_url("koor/downloadPropos/{$row['id_tim']}"); ?>" method="post" enctype="multipart/form-data"><button type="submit" class="mx-1 btn btn-primary">Proposal</button></form>
                            <form action="<?= base_url("koor/downloadAkhir/{$row['id_tim']}"); ?>" method="post" enctype="multipart/form-data"><button type="submit" class="mx-1 btn btn-primary">Final</button></form>
                            <!-- <button class="mx-1 btn btn-primary" data-toggle="modal" data-target="#tanggapi<?= $row['id_bimbingan'] ?>">Tanggapi</button>  -->
                        </div>
                    </td>
                    <?php $no++; ?>
                </tr>
                <!-- MODALS TIM -->
                <div class="modal fade" id="tanggapi<?= $row['id_tim'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                        <label for="">Pembimbing</label>
                                        <input autocomplete="off" type="numb" class="form-control" id="nilai_ket" value="<?= $row['nilai_ket'] ?>" name="nilai_ket">
                                        <input autocomplete="off" type="hidden" class="form-control" id="id_bimbingan" value="<?= $row['id_bimbingan'] ?>" name="id_bimbingan">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Penguji</label>
                                        <input autocomplete="off" type="numb" class="form-control" id="nilai_part" value="<?= $row['nilai_part'] ?>" name="nilai_part">
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
                <!-- END MODALS TIM -->
            <?php endforeach ?>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>




</div>