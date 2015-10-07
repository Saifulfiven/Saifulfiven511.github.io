<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Select to Autocomplete</title>
	<script src="jquery.js"></script>
	<script src="jquery-ui-autocomplete.js"></script>
	<script src="jquery.select-to-autocomplete.min.js"></script>
	<script type="text/javascript" charset="utf-8">
	  (function($){
	    $(function(){
	      $('select').selectToAutocomplete();
	      $('form').submit(function(){
	        alert( $(this).serialize() );
	        return false;
	      });
	    });
	  })(jQuery);
	</script>
	<style type="text/css" media="screen">
	  body {
	    font-family: Arial, Verdana, sans-serif;
	    font-size: 13px;
	  }
    .ui-autocomplete {
      padding: 0;
      list-style: none;
      background-color: #fff;
      width: 218px;
      border: 1px solid #B0BECA;
      max-height: 350px;
      overflow-y: scroll;
    }
    .ui-autocomplete .ui-menu-item a {
      border-top: 1px solid #B0BECA;
      display: block;
      padding: 4px 6px;
      color: #353D44;
      cursor: pointer;
    }
    .ui-autocomplete .ui-menu-item:first-child a {
      border-top: none;
    }
    .ui-autocomplete .ui-menu-item a.ui-state-hover {
      background-color: #D5E5F4;
      color: #161A1C;
    }
	</style>
</head>
<body>
<?php
include "koneksi.php";
$query = mysql_query("SELECT * FROM laporan");

  echo "<form>
    <select name='Country' id='country-selector' autofocus='autofocus' autocorrect='off' autocomplete='off'>
      <option value='0' selected='selected'></option>";
      while($qu = mysql_fetch_array($query)){
      	echo "<option value='$qu[id_laporan]'>$qu[nm_barang]</option>";
      }
      echo "</select>
    
    <input type='submit' value='Submit'>
  </form>";
  ?>
</body>
</html>