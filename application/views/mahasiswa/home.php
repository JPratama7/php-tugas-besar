<?php if ($this->session->flashdata('msg')) { ?>
		<script>
			alert('<?= $this->session->flashdata('msg') ?> ')
		</script>
<?php } ?>

<div class="container-fluid">
 
  <div class="alert alert-success" role="alert">
      Dashboard
  </div>
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Selamat datang!</h4>
    <p>Selamat datang <strong></strong> di Sistem Informasi Tugas Mahasiswa, anda login sebagai <?php echo $_SESSION['level'];?><strong></strong></p>
  <hr>
  </div>
  <!-- Button trigger modal -->
</div>