<?php
	function redirect($url)
	{
		echo '<script language="javascript">window.location="'.$url.'"</script>';
		exit();
	}
?>