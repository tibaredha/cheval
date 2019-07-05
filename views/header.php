<!doctype html>
<?php
 ob_start();
$execution_time = microtime(); // Start counting
// $page->javascript("jquery.min.js");
// $page->javascript("JsCode.js");
// $page->javascript("js.js");
// $page->
// $page->
// $page->
// $page->Div($id = "Canvas1");
HTML::HtmlStart();
// HTML::Head($title = 'tibaredha', $typeScript = -1, $script = -1);
echo "<meta http-equiv=\"pragma\" content=\"no-cache\" />";
echo "<title>";
if (isset ($this->title)){echo $this->title; }else {echo "cheval" ;}
echo "</title>";
HTML::Meta($author = "tibaredha", $keywords = array("tibaredha,amranemimi"), $descr = "gestion", $lang = -1, $robots = -1, $reply = -1, $httpequiv = array());
echo "<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf8\" />";
echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
HTML::Icon(URL."public/images/".logo.".jpg?t=".time());
HTML::Style(URL."public/css/default.css?t=".time());
HTML::Style(URL."public/css/cheval.css?t=".time());
HTML::Style(URL."public/css/jquery-ui.css?t=".time());
HTML::Style(URL."public/css/slide.css?t=".time());
HTML::javascript(URL."public/js/jquery.min.js?t=".time());
HTML::javascript(URL."public/js/jquery-ui.min.js?t=".time());
HTML::javascript(URL."public/js/custom.js?t=".time());
HTML::javascript(URL."public/js/JsCode.js?t=".time());
HTML::javascript(URL."public/js/jquery.maskedinput.js?t=".time());
HTML::javascript(URL."public/js/slide.js?t=".time());
HTML::javascript(URL."public/webcam/webcam.js?t=".time());
if (isset($this->js)) 
	{
		foreach ($this->js as $js)
		{
			echo '<script type="text/javascript" src="'.URL.'views/'.$js.'?t='.time().'"></script>';
			// echo '<script type="text/javascript" src="'.URL.'views/dashboard/js/monscript.js?t="'.time().'></script>	';	
		}
	}

?>
<SCRIPT LANGUAGE="JavaScript"> 
<!-- Disable 
// function disableselect(e){ 
// return false 
// } 

// function reEnable(){ 
// return true 
// } 

//if IE4+ 
// document.onselectstart=new Function ("return false") 
// document.oncontextmenu=new Function ("return false") 
//if NS6 
// if (window.sidebar){ 
// document.onmousedown=disableselect 
// document.onclick=reEnable 
// } 
//--> 
</script> 	
<?php	
HTML::HeadEnd();
HTML::Body($action = 'onload="InitThis();"');
Session::init();
header("Cache-Control:no-cache"); 




		if (Session::get('loggedIn') == false):
		echo "<div id=\"header00\">";
		echo "<p><img id=\"prerie\" src=\"public/images/cheval/preriex.jpg\" alt=\"\"></p>";  
        echo "</div>";
        echo "<div id=\"header000\">"; 
        //echo "<marquee behavior=\"scroll\" direction=\"left\" scrollamount=\"4\">Office National de Développement des Elevages Equins et camelins ONDEEC</marquee>";	
        echo "<marquee behavior=\"scroll\" direction=\"left\" scrollamount=\"4\">Maintenance informatique prévue le jeudi 27 juillet de 18h à 21h. L'accès à l'ensemble des services en ligne de l'ONDEEC sera perturbé. Merci de votre compréhension.  </marquee>";	
		echo "</div>";
		
		endif;

		if (Session::get('loggedIn') == true):
		echo "<div id=\"header0\">";
		echo "<p>";
		echo "<a href=\"".URL."tcpdf/docpdf/dz/2002.pdf\">Office National de Développement des Elevages Equins et camelins ONDEEC</a> Version : " .version ;
		echo "&nbsp;";
		// echo '<a href="https://www.facebook.com/"><img src="'.URL.'public/images/yt.png'.'" width=\'10\' height=\'10\' border=\'0\' alt=\'\'/></a>';
		
		echo "</p>";
		echo "</div>";		
		endif;

        echo "<div id=\"header\">";		
		if (Session::get('loggedIn') == false):
			// echo '<a href="'.URL.'index">index</a>';echo '&nbsp;';
			// echo '<a href="'.URL.'help">help</a>';echo '&nbsp;';
			// echo '<a href="'.URL.'setup">Installation</a>';echo '&nbsp;';
		endif;	

	
      if (Session::get('loggedIn') == true):
		echo '<a href="'.URL.'dashboard" onclick="beep();" >Accueil</a>';echo '&nbsp;';
		if (Session::get('login') == 'admin'  or Session::get('login') == 'tibaredha'):
			echo '<a href="'.URL.'dashboard/Evaluation/0">Evaluation</a>';echo '&nbsp;';
			// echo '<a href="'.URL.'dashboard/SIGA">Sig</a>';echo '&nbsp;';
			echo '<a href="'.URL.'dashboard/dump/">Dump</a>';echo '&nbsp;';
		    echo '<a href="'.URL.'dashboard/XLS/">Xls</a>';echo '&nbsp;';
		    echo '<a href="'.URL.'dashboard/ondeec/0">Ondeec</a>';echo '&nbsp;';
		
		
		endif;
		echo '<a href="'.URL.'dashboard/user/">Compte</a>';echo '&nbsp;';
		echo '<a href="'.URL.'dashboard/logout">Logout</a>';echo '&nbsp;';   
	else:
	    echo '<a href="'.URL.'">Accueil</a>';echo '&nbsp;';
		echo '<a href="'.URL.'ca">Conseil d’administration</a>';echo '&nbsp;';
		echo '<a href="'.URL.'orga">Organigramme</a>';echo '&nbsp;';
		echo '<a href="'.URL.'PI">Partenaires Internationaux</a>';echo '&nbsp;';
		
		
		
		
		echo '<a href="'.URL.'login">Login</a>';echo '&nbsp;';
		echo '<a href="'.URL.'register">Register</a>';echo '&nbsp;';
	 // echo "<div id=\"connection\">";
	    // echo '<form action="login/run" method="post">';		
		// echo '<input type="text" name="login" />';
		// echo '<input type="password" name="password" />';
		// echo '<input type="submit" />';
		// echo '</form>';
	// echo "</div>";
	
	
	
	
	endif;	
	                           
	if (Session::get('loggedIn') == true)
	{
	echo '<p id="reg">';
	echo 'Welcome : '.Session::get('login');
	echo '</p>';
	echo '<p id="reg">';
	echo 'Station : '.HTML::nbrtostring('station','id',Session::get('station'),'station') ;
	echo '</p>';
	// echo '<p id="reg">';
	// echo 'Wilaya : '.HTML::nbrtostring('wilregion','id',Session::get('wregion'),'wilregion') ;
	// echo '</p>';
	}
?>
</div>	
<div id="content">






	