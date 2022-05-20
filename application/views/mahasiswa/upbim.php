<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= base_url('mahasiswa/insertbim') ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label for="" class="font-weight-bold">Kegiatan Pembimbingan :</label>
                        <textarea class=" form-control" name="kegiatan" id="kegiatan" rows="3" required></textarea>
                        <label for="" class=" mt-3 font-weight-bold">File Laporan :</label>
                        <input type="file" class="form-control" name="file_bim" id="file_bim" aria-describedby="file_bim" min="20" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
    </form>
</body>
</html>

