<div class="row">
    <div class="col-sm-12 col-md-10">
        <h5 class="mb-0"><i class="fa fa-cubes"></i> Data Tim</h5>
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
                    <td><?= $row['status'] == 'Y' ? 'Approved' : 'Not Approved' ?></td>
                    <td><?= $row['abstrak'] ?></td>
                    <td>
                        <div style=" display: flex; flex-wrap: wrap">
                            <form action="<?= base_url("koor/downloadDraf/{$row['id_tim']}"); ?>" method="post" enctype="multipart/form-data"><button type="submit" class="mx-1 btn btn-primary">Draf</button></form>
                            <form action="<?= base_url("koor/downloadPropos/{$row['id_tim']}"); ?>" method="post" enctype="multipart/form-data"><button type="submit" class="mx-1 btn btn-primary">Proposal</button></form>
                            <form action="<?= base_url("koor/downloadAkhir/{$row['id_tim']}"); ?>" method="post" enctype="multipart/form-data"><button type="submit" class="mx-1 btn btn-primary">Final</button></form>
                            <button class="mx-1 btn btn-primary" data-toggle="modal" data-target="#tanggapi<?= $row['id_tim'] ?>">Tanggapi</button>
                        </div>
                    </td>
                    <?php $no++; ?>
                </tr>
                <!-- MODALS TIM -->
                <div class="modal fade" id="tanggapi<?= $row['id_tim'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Data Tim</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('koor/updatetim'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" hidden name="id_tim" value="<?= $row['id_tim'] ?>">
                                        <label for="">Ketua</label>
                                        <select name="ketua" id="">
                                            <?php
                                            foreach ($mhs as $m) :
                                                if ($m['nama'] == $row['mhs1']) {
                                                    echo "<option value=" . $m['username'] . " selected >" . ucwords($m['nama']) . "</option>";
                                                } else {
                                                    echo "<option value=" . $m['username'] . ">" . ucwords($m['nama']) . "</option>";
                                                }
                                            ?>
                                            <?php
                                            endforeach
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Anggota</label>
                                        <select name="anggota" id="">
                                            <?php
                                            foreach ($mhs as $m) :
                                                if ($m['nama'] == $row['mhs2']) {
                                                    echo "<option value=" . $m['username'] . " selected >" . ucwords($m['nama']) . "</option>";
                                                } else {
                                                    echo "<option value=" . $m['username'] . ">" . ucwords($m['nama']) . "</option>";
                                                }
                                            ?>
                                            <?php
                                            endforeach
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kegiatan</label>
                                        <select name="keg" id="keg">
                                            <option value="p1" <?= $row['keg'] == 'p1' ? 'selected' : '' ?>>Proyek 1</option>
                                            <option value="p2" <?= $row['keg'] == 'p2' ? 'selected' : '' ?>>Proyek 2</option>
                                            <option value="p3" <?= $row['keg'] == 'p3' ? 'selected' : '' ?>>Proyek 3</option>
                                            <option value="inter" <?= $row['keg'] == 'inter' ? 'selected' : '' ?>>Intership</option>
                                            <option value="ta" <?= $row['keg'] == 'ta' ? 'selected' : '' ?>>Tugas Akhir</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Pembimbing</label>
                                        <select name="pembim" id="" value="<?= $row['pem'] ?>">
                                            <?php
                                            foreach ($dosen as $pembim) :
                                                if ($pembim['nama'] == $row['pem']) {
                                                    echo "<option value=" . $pembim['username'] . " selected >" . $pembim['nama'] . "</option>";
                                                } else {
                                                    echo "<option value=" . $pembim['username'] . ">" . $pembim['nama'] . "</option>";
                                                }
                                            ?>
                                            <?php
                                            endforeach
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Penguji</label>
                                        <select name="penguji" id="" value="<?= $row['peng'] ?>">
                                            <?php
                                            foreach ($dosen as $penguji) :
                                            ?>
                                                <option value="<?= $penguji['username'] ?>"><?= $penguji['nama'] ?></option>
                                            <?php
                                            endforeach
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Approve Tim</label>
                                        <select name="approve" id="approve">
                                            <option value="Y" <?= $row['status'] == 'Y' ? 'selected' : '' ?>>Ya</option>
                                            <option value="N" <?= $row['status'] == 'N' ? 'selected' : '' ?>>Tidak</option>
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