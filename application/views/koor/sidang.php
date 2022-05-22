<div class="row">
    <div class="col-sm-12 col-md-10">
        <h5 class="mb-0"><i class="fa fa-cubes"></i> Data Sidang</h5>
    </div>
    <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#sidang">
        Pengajuan Draft Laporan
    </button>
    <!-- Modal -->
    <div class="modal fade" id="sidang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('koor/proyek/ajukan_sidang') ?>" method="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <input autocomplete="off" type="hidden" class="form-control" id="mulai" value="<?= $this->session->userdata('username') ?>" name="nim">

                            <label for="">Mulai Pengumpulan draft Laporan</label>
                            <input autocomplete="off" type="date" class="form-control" id="mulai" value="" name="mulai">

                        </div>

                        <duv class="form-group">
                            <label for="">Akhir Pengumpulan Draft Laporan </label>
                            <input autocomplete="off" type="date" class="form-control" id="akhir" value="" name="akhir">

                        </duv>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
</div>
<hr class="mt-0" />
<div class="table-responsive">
    <table class="table table-sm table-hover table-striped" id="tables">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Jadwal Sidang</th>
                <th scope="col">Judul Proyek</th>
                <th scope="col">Kategori Proyek</th>
                <th scope="col">Dosen Pembimbing</th>
                <th scope="col">Dosen Penguji</th>
                <th scope="col">Aksi</th>
            </tr>
            <?php $no = 1;
            foreach ($data as $row) : ?>
                <tr>
                    <td><?= $no ?></td>
                    <?php
                    if (!empty($row['tanggal'])) {
                        echo '<td class="align-middle text-center">' . date('d/m/Y', strtotime($row['tanggal'])) . '</td>';
                    } else {
                        echo '<td class="align-middle text-center">Kosong</td>';
                    } ?>
                    <td><?= $row['judul'] ?></td>
                    <?php if ($row['keg'] == 'p1') {
                        echo '<td class="align-middle text-center">Proyek 1</td>';
                    } elseif ($row['keg'] == 'p2') {
                        echo '<td class="align-middle text-center">Proyek 2</td>';
                    } elseif ($row['keg'] == 'p3') {
                        echo '<td class="align-middle text-center">Proyek 3</td>';
                    } elseif ($row['keg'] == 'ta') {
                        echo '<td class="align-middle text-center">Proyek TA</td>';
                    } elseif ($row['keg'] == 'inter') {
                        echo '<td class="align-middle text-center">Intership</td>';
                    }   ?>
                    <td><?= $row['pembim'] ?></td>
                    <td><?= $row['penguji'] ?></td>
                    <td>
                        <button data-target="#pilih<?= $row['id_tim'] ?>" data-toggle="modal" class="btn btn-primary">
                            Dospeng
                        </button>
                        <button data-target="#jadwal<?= $row['id_tim'] ?>" data-toggle="modal" class="btn btn-primary">
                            Jadwal
                        </button>
                    </td>
                    <?php $no++; ?>
                    <!-- Modal DOSPENG -->
                    <div class="modal fade" id="pilih<?= $row['id_tim'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Dosen Penguji</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('koor/insertpenguji') ?>" method="post">
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <input autocomplete="off" type="hidden" class="form-control" id="id_tim" value="<?= $row['id_tim'] ?>" name="id_tim">

                                            <label for="">Pilih Dosen Penguji</label>
                                            <select class="form-control" id="dospeng" name="penguji" required>
                                                <option class="" value="111">--pilih--</option>
                                                <?php foreach ($penguji as $data) : ?>
                                                    <option class="" value=" <?= $data['username'] ?>"> <?= $data['nama'] ?></option>

                                                <?php

                                                endforeach; ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Ajukan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END MODAL DOSPEM -->
                    <!-- MODAL JADWAL -->
                    <div class="modal fade" id="jadwal<?= $row['id_tim'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajukan Sidang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('koor/insertjadwalsidang') ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input autocomplete="off" type="hidden" class="form-control" id="id" value="<?= $row['id_tim'] ?>" name="id">
                                            <label for="">Mulai Ajukan Sidang</label>
                                            <input autocomplete="off" type="date" class="form-control" id="jadwal" value="" name="jadwal">

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Ajukan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END MODAL JADWAL -->
                </tr>
            <?php endforeach ?>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</div>