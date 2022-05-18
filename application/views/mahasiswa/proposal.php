<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h5 class="modal-title" id="exampleModalLongTitle">Daftar Proyek</h5>
    <form action="<?= base_url('mahasiswa/insertproposal'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
                <label class="font-weight-bold">Judul Proyek</label>
                <input autocomplete="off" type="text" class="form-control" name="judul_proyek" id="judul_proyek" aria-describedby="judul_proyek" required>
                <input autocomplete="off" type="hidden" class="form-control" name="npm1" id="npm1" value="<?= $_SESSION['username'] ?>" required>
            </div>
            <div>
                <label class="font-weight-bold">NPM Anggota</label>
                <input class="form-control" name="npm2" id="npm2" required>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Proyek</label>
                <select class="  form-control" id="proyek" name="proyek" required>
                    <option class="" value="">--pilih--</option>
                    <option class="" value="p1">1</option>
                    <option class="" value="p2">2</option>
                    <option class="" value="p3">3</option>
                    <option class="" value="ta">TA</option>
                </select>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Dosen Pembimbing</label>
                <select class="  form-control" id="dospem" name="dospem" required>
                    <option class="">--pilih--</option>
                    <?php foreach ($dos as $d) : ?>
                        <option class="" value="<?=$d['username']?>"> <?= $d['nama']; ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Abstraksi Proyek</label>
                <textarea class="form-control" name="abstraksi" id="abstraksi" rows="3" required></textarea>

            </div>
            <div class="form-group">
                <label class="font-weight-bold">Proposal Proyek</label>
                <input type="file" class="form-control" name="proposal" id="proposal" aria-describedby="proposal" min="20" required>
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>

</body>
</html>