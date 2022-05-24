<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Dokumen Akhir</title>
</head>

<body>
    <div class="col-sm-12 col-md-10">
        <h5 class="modal-title" id="exampleModalLongTitle">Daftar Dokumen Akhir</h5>
    </div>

    <form action="<?= base_url('mahasiswa/insertDokAk'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
                <label class="font-weight-bold">Dokumen Akhir</label>
                <input type="file" class="form-control" name="file_akhir" id="file_akhir" aria-describedby="proposal" min="0" required>
            </div>
        </div>
        <div class="col-sm-12 col-md-10">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>

</body>

</html>