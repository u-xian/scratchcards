<?php
/**
 *
 * @package: fileupload
 * @author: Anisur R. Mullick
 * @copyright: Digital Avenues Limited
 * @version: 1.0
 *
 */
if($_POST['pgaction']=="upload")
	upload();
else
	uploadForm();

//The form having dynamic file uploader
function uploadForm() {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> :: FILEUPLOAD :: </title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#C8C8C8" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0">
<br>
<form name="frm" method="post" onsubmit="return validate(this);" enctype="multipart/form-data">
<input type="hidden" name="pgaction">
	<?php if ($GLOBALS['msg']) { echo '<center><span class="err">'.$GLOBALS['msg'].'</span></center>'; }?>
	<table align="center" cellpadding="4" cellspacing="0" bgcolor="#EDEDED">	
		<tr class="tblSubHead">
			<td colspan="2">Upload any number of file</td>
		</tr>
		<tr class="txt">
			<td valign="top"><div id="dvFile"><input type="file" name="item_file[]"></div></td>
			<td valign="top"><a href="javascript:_add_more();" title="Add more"><img src="plus_icon.gif" border="0"></a></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" value="Upload File"></td>
		</tr>
	</table>
</form>
<script language="javascript">
<!--
	function _add_more()
	{
		var txt = "<br><input type=\"file\" name=\"item_file[]\">";
		document.getElementById("dvFile").innerHTML += txt;
	}
	function validate(f)
	{
		var chkFlg = false;
		for(var i=0; i < f.length; i++)
		{
			if(f.elements[i].type=="file" && f.elements[i].value != "") 
			{
				chkFlg = true;
			}
		}
		if(!chkFlg)
		{
			alert('Please browse/choose at least one file');
			return false;
		}
		f.pgaction.value='upload';
		return true;
	}
//-->
</script>
</body>
</html>
<?php
}

//function to store uploaded file

function upload()
{	
	if(count($_FILES["item_file"]['name'])  > 0 ) 
	 { //check if any file uploaded
		$GLOBALS['msg'] = ""; //initiate the global message
		for($j=0; $j < count($_FILES["item_file"]['name']); $j++) 
		{ //loop the uploaded file array
			$filen = $_FILES["item_file"]['name']["$j"]; //file name
			$path = 'uploads/'.$filen; //generate the destination path
			if(move_uploaded_file($_FILES["item_file"]['tmp_name']["$j"],$path)) 
			{ //upload the file
				$GLOBALS['msg'] .= "File# ".($j+1)." ($filen) uploaded successfully<br>"; //Success message
			}
		}
	}
	else 
	{
		$GLOBALS['msg'] = "No files found to upload"; //Failed message	
	}
	uploadForm(); //display the main form
}
?>