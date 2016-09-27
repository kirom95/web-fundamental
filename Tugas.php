<html>
	<head><title>Upload File</title></head>
	<body>
		<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
		File PDF: <input type="file" name="fl" /> <br />	  
		Simpan Sebagai:<input type="text" name="NamaFile" /> <br />	 
		<input type="submit" name="submit" value="UPLOAD" />  
		</form>

		<?php
		
		if (isset($_POST['submit'])&& isset($_FILES['fl'])){
			// Tentukan lokasi penyimpanan file yang di-upload
			$dir='./upload/';
			$file = $_FILES['fl']['tmp_name'];
			$name = $_FILES['fl']['name'];
			$info = pathinfo($name);
			
			$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
			$file_ext = substr($filename, strripos($filename, '.')); // get file name

			// Pastikan file yang di-upload ada
			if(!is_uploaded_file($file)){
				exit('Tidak ada file yang di-upload');
			}			

			//menetapkan data maksimu file yang di upload
			//if(filesize($file)>2000000){
				//echo 'ukuran file'.filesize($file).'<br />';
				//exit('file terlalu besar ukuran file maksimum 2 MB');
				//}

			//menetapkan tipe file
			if($info['extension'] == 'pdf'){
				echo"Tipe file PDF ";
			} else{
				exit('Hanya bisa upload file PDF');
			}
			
			// Pindahkan file ke direktori penyimpanan
			if(!move_uploaded_file($file, $dir.$name)){
				echo "File gagal di-upload";
			}else {
				echo"File berhasil di-upload";
			}
		}
	?>
	</body>
</html>