<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> :: FILEUPLOAD :: </title>
<script type="text/javascript" src="./jquery/jquery-1.4.2.min.js"></script>
<script language="javascript">
<!--
	function _add_more()
	{
		var txt = "<br><input type='file' name='item_file[]'>";
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
</head>
<body>
<br>
<form name="frm" method="post" onsubmit="return validate(this);" enctype="multipart/form-data">
<input type="hidden" name="pgaction">
	<table>	
		<tr>
			<td colspan="2">Upload any number of file</td>
		</tr>
		<tr>
			<td valign="top"><div id="dvFile"><input type="file" name="item_file[]"></div></td>
			<td valign="top"><a href="javascript:_add_more();" title="Add more"><img src="plus_icon.gif" border="0"></a></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" value="Upload File"></td>
		</tr>
	</table>
</form>
</body>
</html>
