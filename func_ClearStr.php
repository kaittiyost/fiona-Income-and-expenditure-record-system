<?php
echo clearStr('<script>');
function clearStr($str){
	$str = htmlentities($str);

	return $str;
}
?>