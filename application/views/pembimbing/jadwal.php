<div class="row">
    <div class="col-sm-12 col-md-10">
        <h5 class="mb-0"><i class="fa fa-cubes"></i> Data Bimbingan</h5>
    </div>
</div>
<hr class="mt-0" />
<div class="table-responsive">
    <table class="table table-sm table-hover table-striped" id="tables">
        <thead class="thead-dark">
            <tr style="text-align:center;">
                <th class="text-center" scope="col" style=" width: 1%; height: 50%;">#</th>
                <th class="text-center" scope="col" style=" width: 5%; height: 50% ">Kode Tim</th>
                <th class="text-center" scope="col" style=" width: 10%; height: 50% ">Jenis Kegiatan</th>
                <th class="text-center" scope="col">Nama Ketua</th>
                <th class="text-center" scope="col">Nama Anggota</th>
                <th class="text-center" scope="col" style=" width: 6%">Nilai Ketua</th>
                <th class="text-center" scope="col" style=" width: 7%">Nilai Anggota</th>
                <th class="text-center" scope="col">Revisi</th>
                <th class="text-center" scope="col">Kegiatan</th>
                <th class="text-center" scope="col">Aksi</th>
            </tr>
            <?php $no = 1;
            foreach ($sidang as $row) : ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row['id_tim'] ?></td>
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
                    }   ?>
                    <td><?= $row['mhs1'] ?></td>
                    <td><?= $row['mhs2'] ?></td>
                    <td><?= $row['nilai_ket'] ?></td>
                    <td><?= $row['nilai_part'] ?></td>
                    <td><?= $row['revisi'] ?></td>
                    <td class="d-flex" width="140px">
                        <form action="<?= base_url("pem/downloadBimbingan/{$row['id_tim']}"); ?>" method="post" enctype="multipart/form-data"><button type="submit" class="mx-1 btn btn-primary">Download</button></form>
                        <button class="mx-1 btn btn-primary" data-toggle="modal" data-target="#tanggapi<?= $row['id_tim'] ?>">Tanggapi</button>
                    </td>
                    <?php $no++; ?>
                </tr>

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
                                        <label for="">Masukan Nilai Mhs Ketua</label>
                                        <input autocomplete="off" type="numb" class="form-control" id="nilai_ket" value="<?= $row['nilai_ket'] ?>" name="nilai_ket">
                                        <input autocomplete="off" type="hidden" class="form-control" id="id_tim" value="<?= $row['id_tim'] ?>" name="id_tim">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Masukan Nilai Mhs Partner</label>
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


            <?php endforeach ?>
        </thead>
    </table>
</div>




</div>