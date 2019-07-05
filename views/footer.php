</div>
<div id="footer">
	Copyright 2017. Designed by  Dr R.TIBA Tel : 07 72 71 80 59<?php  $execution_time = microtime() - $execution_time; printf('    It took %.5f sec', $execution_time); 
	//echo '   It took : '. $execution_time.': sec';           ?>
</div>
<?php


HTML::BodyEnd();
ob_end_flush();
HTML::HtmlEnd();

?>