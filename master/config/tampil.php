<!DOCTYPE html>
<head>
<script type="text/javascript">
function confirm() {
var msg;
msg = alert('Yakin Ingin Menghapus Data ? ');
var agree=confirm(msg);
if (agree){
	return true ;
}else{
	return false ;
}
</script>
</head>
<body>
<?php
error_reporting(0);
require_once "tambah.php";

if (isset($_GET['aksi'])){
if (($_GET['aksi']) == 'tambah'){

	echo "<form method=POST action=calendar.php?page=spr&aksi=kambah>
	<table>
		<tr>
			<td>Username</td> <td><input type=text name=nama placeholder='Input Username' required><td>
		</tr>
		<tr>
			<td>Password</td><td><input type=text name=alamat placeholder='Input Password' required></td>
		</tr>
		
		<tr><td>Hak Akses</td>
			<td>
					<input type=radio name=akses value='OPERATOR' checked>OPERATOR
					<input type=radio name=akses value='ADMIN'>ADMIN
					<input type=radio name=akses value='MASTER'>MASTER
			
			</td>
		</tr>
		<tr>
			<td><input type=submit value=Submit name=tambah class='btn btn-warning'> <input class='btn btn-warning' type=submit onclick=history.back(); value=Batal></td>
		</tr></table><hr>";
		
	}elseif (($_GET['aksi']) == 'kambah'){
			$user = strtoupper($_POST['nama']);
			$pass = md5(strtoupper($_POST['alamat']));
			$akses  = $_POST['akses'];
			
		$quer = "INSERT INTO a_user (username,password,akses,id_session) VALUES ('$user','$pass','$akses','$pass')";
		$query = mysqli_query($con,$quer);
		if ($query){
			?>
			<script>
			alert('Data Anda Berhasil diinput');
			document.location = 'calendar.php?page=spr';
			</script>
			<?php
		}else{
			echo "Data Gagal diinput";
		}
			
	}elseif (($_GET['aksi']) == 'edit'){
		$id = $_GET['id_ucer'];
	?>
	<form method=POST action="<?php $_SERVER['PHP_SELF']?>?page=spr&aksi=update">
	<table>
		<input type='hidden' name="id_user" value="<?php echo $id; ?>">
		<tr>
			<td>Username</td><td><input type=text name="username" value="<?php echo ambiledit('username',$id,$con); ?>" readonly><td>
		</tr>
		<tr>
			<td>Password<td><input type='text' name="password"></td>
		</tr>
		<tr>
			<?php
			$c = ambiledit('akses',$id,$con);
			if ($akses == 'MASTER'){
			if ($c == 'OPERATOR'){
      		echo "<td>Hak Akses</td> <td> : <input type=radio name='akses' value='OPERATOR' checked>OPERATOR
                                        <input type=radio name='akses' value='ADMIN'> ADMIN
                                        <input type=radio name='akses' value='MASTER'> MASTER</td>";
    		}
    		elseif($c == 'ADMIN'){
      			echo "<td>Hak Akses </td> <td> : <input type=radio name='akses' value='OPERATOR'>OPERATOR  
                                        <input type=radio name='akses' value='ADMIN' checked>ADMIN
                                        <input type=radio name='akses' value='MASTER'> MASTER</td>";
    		}
   			else{
      			echo "<td>Hak Akses </td> <td> : <input type=radio name='akses' value='OPERATOR'>OPERATOR  
                                        <input type=radio name='akses' value='ADMIN'>ADMIN
                                        <input type=radio name='akses' value='MASTER' checked>MASTER</td>";
    		}
    	}
    		elseif ($akses == 'OPERATOR' AND $c == 'OPERATOR'){
      		echo "<td>Hak Akses</td> <td> : <input type=radio name='akses' value='OPERATOR' checked>OPERATOR</td>";
    		}elseif ($akses == 'ADMIN' AND $c == 'ADMIN'){
    			echo "<td>Hak Akses </td> <td> : <input type=radio name='akses' value='ADMIN' checked>ADMIN</td>";
    		}

    		?>			
		</tr>
			<input type="hidden" name="ucer" value="<?php echo ambiledit('username',$id); ?>">
		<tr>
			<td><input type="submit" value="Update" name=tambah class="btn btn-warning"> <input class="btn btn-warning" type="reset" onclick=history.back() value="Cancel"></td>
		</tr>
		</table>
		</form>
		<hr>
<?php
	}elseif(($_GET['aksi']) == 'update'){
		$id = $_POST['id_user'];
		$ucer 	= $_POST['ucer'];
		$user 	= $_POST['username'];
		$pass 	= $_POST['password'];
		$ak 	= $_POST['akses'];
		updatet($id,$user,$pass,$ucer,$ak,$con);
	}elseif (($_GET['aksi']) == 'hapus'){
		$id = $_GET['id_ucer'];
		hapus($id,$con);
	}?>
<?php
}
$user = $_SESSION['username'];
$akses= $_SESSION['akses'];
if ($akses == 'MASTER'){
echo "<a href='".$_SERVER['PHP_SELF']."?page=spr&aksi=tambah' class='btn btn-warning'>Tambah</a><br>";

echo "<table cellpadding=0 cellspacing=0 border=0 class='table table-striped table-bordered' id='example'>
		<thead>
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Hak Akses</th>
			<th>Tools</th>
		</tr>
		</thead>
		<tbody>";
$no=1;
$wo = "SELECT * FROM a_user";
$wow = mysqli_query($con,$wo);
while($data = mysqli_fetch_array($wow)){
echo "
	<tr>
		<td>$no</td>
		<td>$data[username]</td>
		<td>$data[akses]</td>
		<td>

		";?>

		<a href="<?php echo "config/tampil.php?aksi=hapus&id_ucer=$data[id_user]";?>" class="btn btn-warning" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="icon-remove icon-white"></i>Hapus</a>
	<?php echo "<a href='".$_SERVER['PHP_SELF']."?page=spr&aksi=edit&id_ucer=$data[id_user]' class='btn btn-warning'><i class='icon-pencil icon-white'></i>Edit</a>
			
			</td>
		</tr>
		";
$no++;
}
echo "</tbody></table>";

}elseif ($akses == 'ADMIN' || $akses == 'OPERATOR'){
echo "<table cellpadding=0 cellspacing=0 border=0 class=table table-striped table-bordered id=example>
		<thead>
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Hak Akses</th>
			<th>Tools</th>
		</tr>
		</thead>
		<tbody>";
$no=1;
$wo = "SELECT * FROM a_user WHERE akses = '$akses' AND username = '$user'";
$wow = mysqli_query($con,$wo);
while($data = mysqli_fetch_array($wow)){
echo "
	<tr>
		<td>$no</td>
		<td>$data[username]</td>
		<td>$data[akses]</td>
		<td>

		";?>
		<?php echo "<a href='".$_SERVER['PHP_SELF']."?page=spr&aksi=edit&id_ucer=$data[id_user]' class='btn btn-warning'><i class='icon-pencil icon-white'></i>Edit</a>
			
			</td>
		</tr>
		";
$no++;
}
echo "</tbody></table>";
	
}
?>
</body>
</html>