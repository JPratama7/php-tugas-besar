<div class="row">
    <div class="col-sm-12 col-md-10">
        <h5 class="mb-0"><i class="fa fa-cubes"></i> Kegiatan</h5>
    </div>
</div>
<hr class="mt-0" />
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#bimbing1">
    Buat Kegiatan
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
            <form action="<?= base_url('mahasiswa/insertbim') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <label for="" class="font-weight-bold">Dosen Koor :</label>
                    <textarea class=" form-control" name="kegiatan" id="kegiatan" rows="1" required></textarea>
                    
                </div>
                <div class="modal-body">
                    <label for="" class="font-weight-bold">Kegiatan :</label>
                    <textarea class=" form-control" name="kegiatan" id="kegiatan" rows="3" required></textarea>
                    
                </div>
                <div class="modal-body">
                    <label for="" class="font-weight-bold">Tanggal berakhir :</label>
                    <input type="date" class="form-control" name="file_bim" min="20" required>
                    
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
                <th scope="col">Kegiatan</th>
                <th scope="col">Nama Dosen</th>
                <th scope="col">Tanggal Berakhir</th>
            </tr>
           
        </thead>
        <tbody>
        </tbody>
    </table>
</div>




</div>