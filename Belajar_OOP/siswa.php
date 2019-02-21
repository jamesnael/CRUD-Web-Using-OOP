<?php
	include "config/koneksi.php";
	include "library/oop.php";

	@$redirect = "siswa.php";
	$perintah = new oop();
	$table = "siswa";
	$where = "nis";
	@$value = "'$_GET[nis]'";
	if(isset($_POST['simpan'])){
		@$value = "'$_POST[nis]','$_POST[nama]'";
		$perintah->simpan($table,$value,$con,$redirect);
	}
	if(isset($_GET['hapus'])){
		$perintah->hapus($con,$table,$where,$value,$redirect);
	}
	if(isset($_GET['edit'])){
		
		$edit=$perintah->edit($con,$table,$where,$value);
	}
	if(isset($_POST['update'])){
		$set = "nis='$_POST[nis]',nama='$_POST[nama]'";
		$perintah->update($con,$table,$set,$where,$value,$redirect);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="font-family: arial;">
	<form method="post">
		<h1 align="center"><u>CRUD OOP</u></h1>
		<table align="center" border="1" cellpadding="11" cellspacing="0">
			<tr>
				<th align="left">NIS</th>
				<th>:</th>
				<td><input style="height: 18px;" type="number" name="nis" required placeholder="NIS..." value="<?php echo @$edit['nis'] ?>" ></input></td>
			</tr>
			<tr>
				<th align="left">Nama</th>
				<th>:</th>
				<td><input style="height: 18px;" type="text" name="nama" required placeholder="Nama..."  value="<?php echo @$edit['nama'] ?>"></input></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="simpan" value="SIMPAN" style="height: 28px;background-color: black;color:white;border:black;width:80px;border-radius:6px;"><input type="submit" name="update" value="UPDATE" style="margin-left:10px;height: 28px;background-color: black;color:white;border:black;width:80px;border-radius:6px;"></td>
			</tr>
		</table>

		<br>
		<br>
		<h2 align="center"><u>DATA</u></h2>
		<table border="1" cellpadding="11" cellspacing="0"  align="center" >
			<tr style="height: 30px;">
				<th>No</th>
				<th>NIS</th>
				<th>Nama</th>
				<th colspan="2">AKSI</th>
			</tr>
			<?php
			$no = 0;
			$b= $perintah->tampil($con,$table);
			foreach($b as $c){
			$no++;
			?>
			<tr style="height: 30px;">
				<td><?php echo $no; ?></td>
				<td><?php echo $c[0]; ?></td>
				<td><?php echo $c[1]; ?></td>
				<td><a style="color:red" onclick="return confirm('Yakin ingin menghapus data?')"  href="siswa.php?hapus&nis=<?php echo $c[0]; ?>" >HAPUS</a></td>
				<td><a style="color:blue" href="siswa.php?edit&nis=<?php echo $c[0]; ?>">EDIT</a></td>
			</tr>
			<?php } ?>
		</table>
	</form>
</body>
</html>