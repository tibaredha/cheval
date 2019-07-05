
//reference 
//http://www.codicode.com/art/how_to_draw_on_a_html5_canvas_with_a_mouse.aspx
//http://www.codicode.com/art/undo_and_redo_to_the_html5_canvas.aspx
//https://developer.mozilla.org/fr/docs/Web/HTML/Canvas    
	var mousePressed = false;
    var lastX, lastY;
    var ctx;
	var serveur0='localhost';
    var serveur1='tibaredha.ddns.net';
    var serveur3 = location.host;
	
	var canvas  = document.getElementById('myCanvas');
	var context = canvas.getContext('2d');
 
      //il faut redimentioner  image avec paint //il faut modifier le size  du canevas creatimage.php
      function drawImage() 
	  {
            var serveur3 = location.host;
			var image = new Image();
            image.src = "http://"+serveur3+"/cheval/public/images/ch1.jpg";
            $(image).load(function () {
                ctx.drawImage(image, 0, 0, 700, 500);
                //cPush(); //a ete enleve pour un meilleur resultat
            });
      }




 
    
	// var image0 = new Image();
    // image0.src = "http://"+serveur3+"/cheval/public/images/ch1.jpg"; //adresse de l'image 700/500    ch=600/400
    // image0.onload = function () {context.drawImage(this,0, 0);} 
	
	
function InitThis() {
    
	
	ctx = document.getElementById('myCanvas').getContext("2d");

    $('#myCanvas').mousedown(function (e) {
        mousePressed = true;
		var selpen= $('#selpen').val(); 
		if (selpen=='s')   {Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);} 
		if (selpen=='d')   {Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);} 
		if (selpen=='ro')  {Drawx(selpen,e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);} 
		if (selpen=='lune')  {Drawx(selpen,e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);} 
		if (selpen=='luned')  {Drawx(selpen,e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);} 
		
		
		if (selpen=='epi') {Drawx(selpen,e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);} 
		if (selpen=='epiinf') {Drawx(selpen,e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);} 
		if (selpen=='episup') {Drawx(selpen,e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);} 
		
		if (selpen=='ts') {Drawx(selpen,e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);} 
		if (selpen=='ti') {Drawx(selpen,e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);} 
		
		
		if (selpen=='gzd')  {Drawx(selpen,e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);}
		if (selpen=='gzl')  {Drawx(selpen,e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);}
		if (selpen=='loz')  {Drawx(selpen,e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);}
		if (selpen=='zig')  {Drawx(selpen,e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);}
		
		if (selpen=='ls')   {Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);} 
    });

    $('#myCanvas').mousemove(function (e) {
        if (mousePressed) { Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, true);}
		$('#stats').text('x: '+Math.round(x) + '  y: ' + Math.round(y));
    });

    $('#myCanvas').mouseup(function (e) {
        mousePressed = false;
	    cPush();
		$('#stats').text('x: '+Math.round(x) + '  y: ' + Math.round(y));
    });

    $('#myCanvas').mouseleave(function (e) {
        mousePressed = false;
		cPush(); 
		$('#stats').text('x: '+Math.round(x) + '  y: ' + Math.round(y));
    });
	
	drawImage();
	
	
}

function Draw(x, y, isDown) {
    if (isDown) {
	var selpen= $('#selpen').val(); 
	if (selpen=='s') {
	    ctx.beginPath();
        ctx.strokeStyle = $('#selColor').val();
        ctx.lineWidth = $('#selWidth').val();
        ctx.lineJoin = "round";
        ctx.moveTo(lastX, lastY);
        ctx.lineTo(x, y);
        ctx.closePath();
        ctx.stroke();
	}
	if (selpen=='ls') {
	    ctx.beginPath();
        ctx.strokeStyle = $('#selColor').val();
        ctx.lineWidth = 0.115;
        ctx.lineJoin = "round";
        ctx.moveTo(lastX, lastY);
        ctx.lineTo(x+5, y+5);
        ctx.closePath();
        ctx.stroke();
	}
	if (selpen=='d') {
		var dist=4;     
		      
             //1ere methode avec for 
			  // for (var i = 0; i < 2; i++)
		       // {  		
				// ctx.beginPath();
				// ctx.strokeStyle = $('#selColor').val();
				// ctx.lineWidth = 1;
				// ctx.lineJoin = "round";
				// if (lastY!==y) {
				// ctx.moveTo(lastX + i * + dist, lastY);
				// ctx.lineTo(x + i * + dist, y );
				// }
				// else {
				// ctx.moveTo(lastX + i * + dist, lastY );
				// ctx.lineTo(x + i * + dist, y  );
				// }
				// ctx.closePath();
				// ctx.stroke();
			   // }
               //2eme methode sans for  avec un avantage ligne horizontale en double 
                ctx.beginPath();
				ctx.strokeStyle = $('#selColor').val();
				ctx.lineWidth = 1;
				ctx.lineJoin = "round";
                ctx.moveTo(lastX + 0 * + dist, lastY);
				ctx.lineTo(x + 0 * + dist, y );
                ctx.closePath();
				ctx.stroke();

                ctx.beginPath();
				ctx.strokeStyle = $('#selColor').val();
				ctx.lineWidth = 1;
				ctx.lineJoin = "round";
                ctx.moveTo(lastX + 1 * + dist, lastY+4);
				ctx.lineTo(x + 1 * + dist, y+4 );
                ctx.closePath();
				ctx.stroke();		   
		}
		
    }
    lastX = x;
    lastY = y;
	$('#stats').text('x: '+Math.round(x) + '  y: ' + Math.round(y));
	
}


function Drawx(selpen,x, y, isDown) {
        ctx.strokeStyle = $('#selColor').val();
		ctx.lineWidth =  1;
		ctx.lineJoin = "round";
		ctx.beginPath();
        if (selpen=='ro') 
		{
	    context.arc(x-2, y, 4, 0, 2 * Math.PI);
		ctx.stroke();
	    }
	    
		if (selpen=='lune') 
		{
	    context.arc(x-2+4, y, 14, (Math.PI/180)*60, (Math.PI/180)*300, false);
		ctx.moveTo(x-2+10, y+12);
		context.arc(x-2+10, y, 12, (Math.PI/180)*90, (Math.PI/180)*270, false);
		ctx.stroke();
	    }
		if (selpen=='luned') 
		{
	    context.arc(x-10, y, 12,Math.PI*1.5 ,Math.PI*0.5 , false);
		ctx.moveTo(x-10, y-14);
		context.arc(x-4, y, 14,Math.PI*1.5 ,Math.PI*0.6 , false);
		ctx.stroke();
	    }
		
		
		if (selpen=='epi') 
		{
	    ctx.moveTo(x-6,y-3);
		ctx.lineTo(x+3,y+3);
		ctx.moveTo(x-6,y+3);
		ctx.lineTo(x+3,y-3);
		ctx.stroke();
	    }
		 if (selpen=='epiinf') 
		{
	    ctx.moveTo(x-6,y-3);
		ctx.lineTo(x+3,y+3);
		ctx.moveTo(x-6,y+3);
		ctx.lineTo(x+3,y-3);
		ctx.moveTo(x-6+5,y-2);
		ctx.lineTo(x-6+5,y+2+20);
		ctx.stroke();
	    }
		 if (selpen=='episup') 
		{
	    ctx.moveTo(x-6,y-3);
		ctx.lineTo(x+3,y+3);
		ctx.moveTo(x-6,y+3);
		ctx.lineTo(x+3,y-3);
		ctx.moveTo(x-6+5,y-22);
		ctx.lineTo(x-6+5,y+22-20);
		ctx.stroke();
	    }
		
		if (selpen=='gzd') 
		{
	    ctx.moveTo(x-5,y);
		ctx.lineTo(x+5,y-3);
		ctx.moveTo(x-5,y+3);
		ctx.lineTo(x+5,y+3-3);
		ctx.moveTo(x-5,y+6);
		ctx.lineTo(x+5,y+6-3);
		ctx.moveTo(x-5,y+9);
		ctx.lineTo(x+5,y+9-3);
		ctx.stroke();
	    }
		if (selpen=='gzl') 
		{
	    ctx.moveTo(x-5,y);
		ctx.lineTo(x+5,y+3);
		ctx.moveTo(x-5,y+3);
		ctx.lineTo(x+5,y+6);
		ctx.moveTo(x-5,y+6);
		ctx.lineTo(x+5,y+9);
		ctx.moveTo(x-5,y+9);
		ctx.lineTo(x+5,y+12);
		ctx.stroke();
	    }
		if (selpen=='gzl') 
		{
	    ctx.moveTo(x-5,y);
		ctx.lineTo(x+5,y+3);
		ctx.moveTo(x-5,y+3);
		ctx.lineTo(x+5,y+6);
		ctx.moveTo(x-5,y+6);
		ctx.lineTo(x+5,y+9);
		ctx.moveTo(x-5,y+9);
		ctx.lineTo(x+5,y+12);
		ctx.stroke();
	    }
		if (selpen=='loz') 
		{
	    ctx.moveTo(x, y);
	    ctx.lineTo(x+9,y+20);
        ctx.lineTo(x,y+40);
	    ctx.lineTo(x-9,y+20);
	    ctx.lineTo(x,y);
		ctx.stroke();
	    }
		if (selpen=='zig') 
		{
		var a=3;
	    ctx.moveTo(x, y+a);
		for (var i = 0; i < 30; i+=5)
			   {
			   ctx.lineTo(x+i,y-a);
			   ctx.lineTo(x+i+5,y+a);
			   }
		ctx.stroke();
	    }
		
		if (selpen=='ts') 
		{
	    ctx.moveTo(x, y);
	    ctx.lineTo(x+10,y-20);
        ctx.lineTo(x+20,y);
	    ctx.lineTo(x,y);
		ctx.stroke();
	    }
		if (selpen=='ti') 
		{
	    ctx.moveTo(x, y);
	    ctx.lineTo(x+20,y);
        ctx.lineTo(x+10,y+20);
	    ctx.lineTo(x,y);
		ctx.stroke();
	    }
		
    lastX = x;
    lastY = y;
}

function clearArea() {
    // Use the identity matrix while clearing the canvas
    // ctx.setTransform(1, 0, 0, 1, 0, 0);
    // ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
	// drawImage();
	
	// image0.src = "http://"+serveur3+"/cheval/public/images/ch1.jpg"; //adresse de l'image 700/500    ch=600/400
    // image0.onload = function () {context.drawImage(this,0, 0);} 
	
}


function rec(lastid,url1) {
	// var dataURL = canvas.toDataURL();
    // $.ajax({
    // type: "POST",
    // url: "http://"+url1+"/cheval/test.php",
    // data: { 
         // imgBase64: dataURL,
		 // contenu: lastid
       // }
    // }).done(function(response) {
       // console.log('saved: ' + response);
	   
     // });	
	//window.location = "http://"+serveur3+"/cheval/dashboard/search/0/10?o=id&q="+lastid;
	
	//dashboard/search/0/10?o=NomP&q=
	// print("Hello! I am an alert box!!");
	// alert("Hello! I am an alert box!!");	
   }

   
//*****************************************************************************//   
var cPushArray = new Array();
var cStep = -1;
function cPush() {
    cStep++;
    if (cStep < cPushArray.length) { cPushArray.length = cStep; }
    cPushArray.push(document.getElementById('myCanvas').toDataURL());
}

function drawImage1() {
    
	// alert("Hello! I am an alert box!!1");	
	if (cStep > 0) {
        cStep--;
        var canvasPic = new Image();
        canvasPic.src = cPushArray[cStep];
        canvasPic.onload = function () { ctx.drawImage(canvasPic, 0, 0); }	
    }
	
}

function drawImage2() {

  // alert("Hello! I am an alert box!!2");	

	if (cStep < cPushArray.length-1) {	
		cStep++;
        var canvasPic = new Image();
        canvasPic.src = cPushArray[cStep];
        canvasPic.onload = function () { ctx.drawImage(canvasPic, 0, 0); }
    }
}




 // $(window).load(function () {InitThis()});

//get position  souri 
      // function writeMessage(canvas, message) {
            // var context = canvas.getContext('2d');
            // context.clearRect(0, 0, ctx.canvas.width, 15);
            // context.font = '20pt Calibri';
            // context.fillStyle = 'blue';
            // context.fillText(message, 10, 15);
        // }
        // function getMousePos(canvas, evt) {
            // var rect = canvas.getBoundingClientRect();
            // return {
                // x: evt.clientX - rect.left,
                // y: evt.clientY - rect.top
            // };
        // }
    
        // canvas.addEventListener('mousemove', function (evt) {
            // var mousePos = getMousePos(canvas, evt);
            // var message = 'Mouse Moving: ' + mousePos.x + ',' + mousePos.y;
            // writeMessage(canvas, message);
        // }, false);



