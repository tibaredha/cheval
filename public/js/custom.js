$(document).ready(function() {	
});
$(document).ready(function()
{
		$(".country").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",                        // Le type de ma requete
				url: "/cheval/public/js/AJAXWC.PHP",     // L'url vers laquelle la requete sera envoyee
				data: dataString,                    // Les donnees que l'on souhaite envoyer au serveur au format varaible ,JSON
				cache: false,
				success: function(html)              // La reponse du serveur est contenu dans data  text xml json JSON (JavaScript Object Notation) 
						{
						$(".COMMUNEN").html(html);   // On peut faire ce qu'on veut avec ici
						} 		
			});

		});
});
$(document).ready(function()
{
		$(".ETA").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",                        // Le type de ma requete
				url: "/cheval/public/js/AJAXE.PHP",     // L'url vers laquelle la requete sera envoyee
				data: dataString,                    // Les donnees que l'on souhaite envoyer au serveur au format varaible ,JSON
				cache: false,
				success: function(html)              // La reponse du serveur est contenu dans data  text xml json JSON (JavaScript Object Notation) 
						{
						$(".peredata").html(html);   // On peut faire ce qu'on veut avec ici
						} 		
			});

		});
});
$(document).ready(function()
{
		$(".JUM").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",                        // Le type de ma requete
				url: "/cheval/public/js/AJAXJ.PHP",     // L'url vers laquelle la requete sera envoyee
				data: dataString,                    // Les donnees que l'on souhaite envoyer au serveur au format varaible ,JSON
				cache: false,
				success: function(html)              // La reponse du serveur est contenu dans data  text xml json JSON (JavaScript Object Notation) 
						{
						$(".meredata").html(html);   // On peut faire ce qu'on veut avec ici
						} 		
			});

		});
});

$(document).ready(function()
{
		$(".WILAYAE").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",                        // Le type de ma requete
				url: "/cheval/public/js/AJAXWE.PHP",     // L'url vers laquelle la requete sera envoyee
				data: dataString,                    // Les donnees que l'on souhaite envoyer au serveur au format varaible ,JSON
				cache: false,
				success: function(html)              // La reponse du serveur est contenu dans data  text xml json JSON (JavaScript Object Notation) 
						{
						$(".WILAYAE1").html(html);   // On peut faire ce qu'on veut avec ici
						} 		
			});

		});
});

$(document).ready(function()
{
		$(".Naisseur").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",                        // Le type de ma requete
				url: "/cheval/public/js/AJAXWN.PHP",     // L'url vers laquelle la requete sera envoyee
				data: dataString,                    // Les donnees que l'on souhaite envoyer au serveur au format varaible ,JSON
				cache: false,
				success: function(html)              // La reponse du serveur est contenu dans data  text xml json JSON (JavaScript Object Notation) 
						{
						$(".Naisseur1").html(html);   // On peut faire ce qu'on veut avec ici
						} 		
			});

		});
});




function Nouveau(url) {
	window.location = "http://"+url+"/cheval/dashboard/nouveaux/";	
}
function Nouveaux(url) {
	window.location = "http://"+url+"/cheval/dashboard/nouveau/";	
}
function list(url) {
	window.location = "http://"+url+"/cheval/dashboard/search/0/10?o=NomP&q=";	
}

function certificatx(id,url) {
	window.location = "http://"+url+"/cheval/tcpdf/cheval/certificat.php?id="+id;	
}
function livretx(id,url) {
	window.location = "http://"+url+"/cheval/tcpdf/cheval/livret.php?id="+id;	
}

function Prendrephotos(id,url) {
	window.location = "http://"+url+"/cheval/dashboard/upl/"+id;	
}
function permisdemontex(id,url) {
	window.location = "http://"+url+"/cheval/tcpdf/cheval/permisdemonte.php?id="+id;	
}

function pdgrx(id,url) {
	window.location = "http://"+url+"/cheval/dashboard/pedigree/"+id;	
}
function vendre(id,url) {
	window.location = "http://"+url+"/cheval/dashboard/sale/"+id;	
}
function Vacciner(id,url) {
	window.location = "http://"+url+"/cheval/dashboard/Vacciner/"+id;	
}
function Bilanter(id,url) {
	window.location = "http://"+url+"/cheval/dashboard/Bilanter/"+id;	
}
function Traiter(id,url) {
	window.location = "http://"+url+"/cheval/dashboard/ordonnacednr/"+id;	
}
function Saillir(id,url) {
	window.location = "http://"+url+"/cheval/dashboard/Saillir/"+id;	
}
function view(id,url) {
	window.location = "http://"+url+"/cheval/dashboard/view/"+id;	
}
function list1(url) {
	window.location = "http://"+url+"/cheval/dashboard/nouveaux/";	
}
function valider(urll) { 
	var dataURL = canvas.toDataURL();
    if (dataURL!=='') {
	var lastid = 'temp';
	$.ajax({
    type: "POST",
    url: "http://"+urll+"/cheval/test.php",
    data: { 
          imgBase64: dataURL,
		  contenu: lastid
          }
    }).done(function(response) {
       console.log('saved: ' + response);
	   
     });
	
	document.getElementById("formGCS").submit();
	} else {
	document.getElementById("formGCS").submit();
	}
	//alert("Hello! I am an alert box!!");
	//window.location = "http://"+urll+"/cheval/dashboard/search/0/10?o=id&q="+lastid;			
}
$(document).ready(function()
{
		$(".cheval0").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",                        // Le type de ma requete
				url: "/cheval/public/js/AJAXWR.PHP",     // L'url vers laquelle la requete sera envoyee
				data: dataString,                    // Les donnees que l'on souhaite envoyer au serveur au format varaible ,JSON
				cache: false,
				success: function(html)              // La reponse du serveur est contenu dans data  text xml json JSON (JavaScript Object Notation) 
						{
						$(".cheval1").html(html);   // On peut faire ce qu'on veut avec ici
						} 		
			});

		});
});
$(document).ready(function()
{
		$(".cheval1").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;

			$.ajax
			({
				type: "POST",                        // Le type de ma requete
				url: "/cheval/public/js/AJAXS.PHP",     // L'url vers laquelle la requete sera envoyee
				data: dataString,                    // Les donnees que l'on souhaite envoyer au serveur au format varaible ,JSON
				cache: false,
				success: function(html)              // La reponse du serveur est contenu dans data  text xml json JSON (JavaScript Object Notation) 
						{
						$(".cheval2").html(html);   // On peut faire ce qu'on veut avec ici
						} 		
			});

		});
});
/*Activates the Tabs*/
function tabSwitch(new_tab, new_content) {    
    document.getElementById('content_1').style.display = 'none';  
    document.getElementById('content_2').style.display = 'none';  
    document.getElementById('content_3').style.display = 'none';  
	/*document.getElementById('content_3').style.display = 'none';*/ 
	document.getElementById(new_content).style.display = 'block';     
    document.getElementById('tab_1').className = '';  
    document.getElementById('tab_2').className = '';  
    document.getElementById('tab_3').className = '';  
	/*document.getElementById('tab_3').className = ''; */        
    document.getElementById(new_tab).className = 'active';        
}
function calcule()
{
// affectation de la variable pour le calcul
var a = parseFloat(this.document.formGCS.Nmensurations.value);                 
var b = parseFloat(this.document.formGCS.Nmensurations1.value);                 
var c = parseFloat(this.document.formGCS.Nmensurations2.value);                
var d = parseFloat(this.document.formGCS.Nmensurations4.value);                
var e = parseFloat(this.document.formGCS.Nmensurations11.value);                
// calcul et affectation du résultat à la variable ... result
var result =  parseFloat(a - b ).toFixed(2);               
var result1 =  parseFloat(a / c ).toFixed(2);  
var result2 =  parseFloat(c / d ).toFixed(2);  
var result3 =  parseFloat(d / a ).toFixed(2);
var result4 =  parseFloat(e / d ).toFixed(2);
var result5 =  parseFloat( 100 * ( Math.pow( (d/100), 2) / a) ).toFixed(2);  
var result6 =  parseFloat(( Math.pow( (d/100), 3)* 80) / a) .toFixed(2);
// affichage du résultat
document.getElementById("RESULTAS1" ).innerHTML = result1;
document.getElementById("RESULTAS2" ).innerHTML = result2;
document.getElementById("RESULTAS3" ).innerHTML = result3;
document.getElementById("RESULTAS4" ).innerHTML = result4;
document.getElementById("RESULTAS5" ).innerHTML = result5;
document.getElementById("RESULTAS6" ).innerHTML = result6;
this.document.formGCS.Nmensurations6.value = result;                   
}
function beep() {	
	// var audio = new Audio('beep.mp3');
    // audio.play();	
	//alert("Hello! I am an alert box!!");
}





