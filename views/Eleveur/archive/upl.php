<?php 
// verifsession();
// lang(Session::get('lang'));
$url1 = explode('/',$_GET['url']);
// view::button('cons',$url1[2]);	
?>
<h1>Changer photos  : <?php echo  HTML::nbrtostring('cheval','id',$url1[2],'NomA')  ;?></h1><hr><br/>
<fieldset id="fieldset0">
<legend><?php echo  HTML::nbrtostring('cheval','id',$url1[2],'NomA')  ;?></legend>
<?php
HTML::Image(URL."public/images/".$url1[2].".jpg?t=".time(), $width = 200, $height = 250, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='imagecanva11');
 $fichier1 = "d:/cheval/public/images/cheval/".$url1[2].'.jpg' ;
if (file_exists($fichier1))
{
HTML::Image(URL."public/images/cheval/".$url1[2].".jpg?t=".time(), $width = 200, $height = 250, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='imagecanva22');
}
else 
{
HTML::Image(URL."public/images/cheval/cr.jpg?t=".time(), $width = 200, $height = 250, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='imagecanva22');
}
?>
</fieldset>

<form method="post" action="<?php echo URL;?>dashboard/upl1/<?php  echo $url1[2];?>"  name="fileForm" id="fileForm" enctype="multipart/form-data" > 
<table align="center" border="2">
          <tr>
		  <td align="center">
		  <input type="file"   name="upfile"  size="100">&nbsp;&nbsp;<br/><br/>
		  </td>
		  </tr>
          <tr>
		  <td align="center">
		  <input class="text" type="submit" name="submitBtn" value="Upload"><br/><br/>
		  </td>
		  </tr>
        </table>
      
	    <?php HTML::menuview($url1[2],$_SERVER['SERVER_NAME']);?>
	  
	  </form>	
</form>
<hr />

<?php 
if (isset($this->msg)) 
{
echo $this->msg;
}
else 
{
echo '*upload_max_filesize=10M';
}
?>
<?php HTML::Br(32);?>
