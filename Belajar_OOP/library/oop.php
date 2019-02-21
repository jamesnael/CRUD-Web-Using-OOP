<?php
	class oop{
		function simpan($table,$value,$con,$redirect){
			$sql = mysqli_query($con,"INSERT INTO $table VALUES($value)");
			if($sql){
				echo "<script>alert('Input Data Sukses');document.location.href='$redirect'</script>";
			}else{
				echo printf("Error: %s\n", mysqli_error($con));
  				exit();
			}
		}
		function hapus($con,$table,$where,$value,$redirect){
			$sql = mysqli_query($con, "DELETE FROM $table WHERE $where=$value");
			if($sql){
				echo "<script>alert('Hapus Data Sukses');document.location.href='$redirect'</script>";
			}else{
				echo printf("Error: %s\n", mysqli_error($con));
  				exit();
			}
		}
		function tampil($con,$table){
			$sql = mysqli_query($con, "SELECT * FROM $table");
			$isi = [];
			while($data= mysqli_fetch_array($sql)){
				$isi[] = $data;
			}return $isi;
			
		}
		function edit($con,$table,$where,$value){
			$sql = mysqli_query($con, "SELECT * FROM $table WHERE $where=$value");
			$tampil = mysqli_fetch_array($sql);
			return $tampil;

		}
		function update($con,$table,$set,$where,$value,$redirect){
			$sql = mysqli_query($con, "UPDATE $table SET $set WHERE $where=$value");
			if($sql){
				echo "<script>alert('Update Data Sukses');document.location.href='$redirect'</script>";
			}else{
				echo printf("Error: %s\n", mysqli_error($con));
  				exit();
			}

		}
	}


?>