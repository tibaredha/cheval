<h1>Visualisation: <?php echo $this->user[0]['NomP'];?></h1><hr><br/>
<form id="Canvas"  name="formGCS"  action="<?php echo URL."Eleveur/create/";  ?>"  method="POST"> 
<div class="tabbed_area"> 
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Eleveur</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">***</a></li> 
			<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">***</a></li> 	
        </ul> 
        <div id="content_1" class="content">  		
		     <?php 
			 HTML::Image(URL.$this->rootphotos3.$this->user[0]['id'].".jpg?t=".time(), $width = 400, $height = 450, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='image');
			 ?>		    
				<label for=""id="lDSAR"  >تاريخ التسجيل : </label><label for=""id="lDSFR"  >Date inscription : </label>
			   <input  id="Datesigna"   class="cheval"type="TXT"  name="Datesigna"  title="***"    autofocus  value="<?php echo html::dateUS2FR($this->user[0]['Datesigna']);?>" />	 
				
				<label for=""id="lProprietaireAR">المالك: </label><label for=""id="lProprietaireFR">Proprietaire: </label>
			    <input  id="NomP"  class="cheval" type="text" name="NomP"   value="<?php echo $this->user[0]['NomP'];?>"        /> 
				 <label for=""id="lStatutsAR">الوضعية: </label><label for=""id="lStatutsFR">Statuts: </label>
			     <select id="Statuts"  class="cheval" name="secteur"  >  
					<option value="<?php echo $this->user[0]['secteur'];?>"><?php echo $this->user[0]['secteur'];?></option>
					<option value="1">Publique</option>
					<option value="0">Privé</option>  
				</select>
				<label for=""id="lWilayaAR">الولاية: </label><label for=""id="lWilayaFR">Wil :</label>
				<?php HTML::WILAYA('wil','country','17000',$this->user[0]['wil']) ;?>
				<label for=""id="lCommuneAR">البلدية: </label><label for=""id="lCommuneFR">Com :</label>
				<?php HTML::COMMUNE('com','COMMUNEN','929',$this->user[0]['com']) ;?>
				<label for=""id="lAdresseAR">العنوان: </label><label for=""id="lAdresseFR">Adresse :</label>
				<input  id="adresse"  class="cheval" type="text" name="adresse" value="<?php echo $this->user[0]['adresse'];?>"/>
				<label for=""id="lTelAR">الجوال: </label><label for=""id="lTelFR">Tel :</label>
				<input  id="Tel"  class="cheval" type="text" name="telphone" value="<?php echo $this->user[0]['telphone'];?>"/>
               
		</div>
		
		<div id="content_2" class="content"> 
		
		<table>
		<tr>
		<td valign=top>		
		
	    <!-- First, include the JPEGCam JavaScript Library 
	    <script type="text/javascript" src="<?php echo URL; ?>public/webcam/webcam.js"></script
		-->
		<script language="JavaScript">
		webcam.set_api_url( "<?php echo URL; ?>public/webcam/test.php?uc=<?php echo $this->user[0]['id'];?>" );
		webcam.set_quality( 90 );                                                       // JPEG quality (1 - 100)
		webcam.set_shutter_sound( true,'<?php echo URL; ?>public/webcam/shutter.mp3' ); // play shutter click sound
	    webcam.set_swf_url( '<?php echo URL; ?>public/webcam/webcam.swf' );
		</script>
		
		<!-- Next, write the movie to the page at 320x240 -->
		<script language="JavaScript">
			document.write( webcam.get_html(400,450) );   //320x240 and 640x480
		</script>
		<!-- Some buttons for controlling things -->
	   <br/>
	   <br/>
	   <form>
	   &nbsp;&nbsp;
		<input type=button value="Configure..." onClick="webcam.configure()">
		&nbsp;&nbsp;
		<input type=button value="Take Snapshot" onClick="take_snapshot()">
	   </form>
			<!-- Code to handle the server response (see test.php) -->
	<script language="JavaScript">
		webcam.set_hook( 'onComplete', 'my_completion_handler' );   //2 option my_completion_handler  my_callback_function
		
		function take_snapshot() {
			// take snapshot and upload to server
			document.getElementById('upload_results').innerHTML = '<h1>Uploading...</h1>';
			webcam.snap();// webcam.snap(); 
			/*
			    This instructs the Flash movie to take a snapshot and upload the JPEG to the server.
				Make sure you set the URL to your API script using webcam.set_api_url(), 
				and have a callback function ready to receive the results from the server, using webcam.set_hook().	
			*/	
		}
		
		
		// fonction  a la fin du trt 
		function my_callback_function(response) {
                alert("Success! PHP returned: " + response);
        }
		function my_completion_handler(msg) {
			// extract URL out of PHP output
			if (msg.match(/(http\:\/\/\S+)/)) {
				var image_url = RegExp.$1;
				// show JPEG image in page
				// document.getElementById('upload_results').innerHTML = '<img src="' + image_url + '">'+'<h1>Upload Successful!ok</h1>'+'<h1>JPEG URL: ' + image_url + '</h1>';
				document.getElementById('upload_results').innerHTML = '<img src="' + image_url + '">';
				// reset camera for another shot
				webcam.reset();
			}
			else alert("PHP Error: " + msg);
		}
	</script>
		
</td>
	<td width=50>&nbsp;</td>
	<td valign=top>
		<div id="upload_results" style="background-color:#eee;"></div>
	</td>
	</tr>
	</table>
		
		
		
		
			
		       	
        </div>
		<div id="content_3" class="content">  
			<?php 
			 HTML::Image(URL.$this->rootphotos3.$this->user[0]['id'].".jpg?t=".time(), $width = 400, $height = 450, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='image');
			?>	
			  
		
		       
		</div>
</div>
        <input type="hidden" name="region" value="<?php echo Session::get('region')  ;?>"/>
		<input type="hidden" name="wregion" value="<?php echo Session::get('wregion')  ;?>"/>
		<input type="hidden" name="station" value="<?php echo Session::get('station')  ;?>"/>
        
		<?php HTML::menuview0('0',$_SERVER['SERVER_NAME']);?>

</form > 