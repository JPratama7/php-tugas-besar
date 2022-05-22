                    <!-- Modal DOSPENG -->
                    <div class="modal fade" id="pilih<?= $a['id_proyek'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Dosen Penguji</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('koor/proyek/ajukan_dospeng') ?>" method="post">
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <input autocomplete="off" type="hidden" class="form-control" id="id_proyek" value="<?= $a['id_proyek'] ?>" name="id_proyek">

                                            <label for="">Pilih Dosen Penguji</label>
                                            <select class="  form-control" id="dospeng" name="dospeng" required>
                                                <option class="" value="111">--pilih--</option>
                                                <?php foreach ($user as $us => $uss) : ?>
                                                    <option class="" value=" <?= $uss['nim'] ?>"> <?= $uss['nama'] ?></option>

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
                    <div class="modal fade" id="jadwal<?= $a['id_proyek'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajukan Sidang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('koor/proyek/jadwal_sidang') ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input autocomplete="off" type="hidden" class="form-control" id="id" value="<?= $a['id_proyek'] ?>" name="id">
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