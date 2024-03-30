<?php
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=OutputWarga.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<style>
td {
   vertical-align: middle;
}
</style>
<table border="1" style="font-size:13px;border:100px;font-family:Arial;">
    <thead>
      <tr>
          <th>No</th>
          <th width='150'>NIK</th>
          <th width='150'>No KK</th>
          <th width='200'>Nama</th>
          <th>TTL</th>
          <th>JK</th>
          <th>Klasifikasi</th>
          <th>Golongan<br>Darah</th>
          <th>Alamat</th>
          <th>RT / RW</th>
          <th>Kecamatan</th>
          <th>Kabupaten</th>
          <th>Provinsi</th>
          <th>Pendidikan</th>
          <th>Pekerjaan</th>
          <th>Agama</th>
          <th>Kewarganegaraan</th>
      </tr>
    </thead>
    <tbody>
      <?php 
          include ('laporan.php');
          $kk = $_SESSION['kk'];
          $agama = $_SESSION['agama'];
          $klasifikasi= $_SESSION['klasifikasi'];
          $new = new Laporan();
          $all = $new->get_all($kk, $agama, $klasifikasi); 
      ?>
      <?php $no=0; foreach($all as $row): $no++;?>
      <tr>
        <td><center>&nbsp;<?php echo $no; ?></center></td>
        <td>&nbsp;<?php echo $row['nik']; ?></td>
        <td width="80">&nbsp;<?php echo $row['no_kk'] ?></td>
        <td>&nbsp;<?php echo $row['nama'] ?></td>
        <td>&nbsp;<?php echo $row['tempat_lahir'].", ".$row['tanggal_lahir']; ?></td>
        <td width="100">&nbsp;
            <?php 
              if ($row['jk']) {
                echo "Laki-Laki";
              }else{
                echo "Perempuan";
              } 
            ?>      
        </td>
        <td>&nbsp;<?php echo $row['nama_klasifikasi']; ?></td>
        <td>&nbsp;<?php echo $row['golongan_darah']; ?></td>
        <td>&nbsp;<?php echo $row['alamat'] ?></td>
        <td>&nbsp;<?php echo $row['rt']."/".$row['rw'] ?></td>
        <td>&nbsp;<?php echo $row['kecamatan']?></td>
        <td>&nbsp;<?php echo $row['kabupaten']?></td>
        <td>&nbsp;<?php echo $row['provinsi']?></td>
        <td>&nbsp;<?php echo $row['pendidikan']?></td>
        <td>&nbsp;<?php echo $row['pekerjaan']?></td>
        <td>&nbsp;<?php echo $row['nama_agama']?></td>
        <td>&nbsp;<?php echo $row['kewarganegaraan']?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br>