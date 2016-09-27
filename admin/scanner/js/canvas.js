var canvas = window.canvas = document.querySelector('canvas');
canvas.width = 50;
canvas.height = 50;

var button = document.querySelector('#snap');
var vd = document.querySelector('#video');
var idFromQr = "";
button.onclick = function() {
  document.getElementById('results').innerHTML = "";
  $(".toClear").empty();
  $("#signArea0").hide();
  $("#signArea1").hide();
  canvas.width = vd.offsetWidth;
  canvas.height = vd.offsetHeight;
  canvas.getContext('2d').
  drawImage(video, 0, 0, canvas.width, canvas.height);
  idFromQr = qrcode.decode();
  document.getElementById('results').innerHTML = idFromQr;
  fetchData(parseInt(idFromQr));
};

function fetchData(dataIn)
{
	$.ajax({
		url : 'fetchUserData.php',
		type : 'GET',
		data : {
			'user_id' : dataIn
		},
		dataType:'text',
		success : function(data) {              
			cleanAndDisplay(data);
		},
		error : function(request,error)
		{
			alert("Request: "+JSON.stringify(request));
		}
	});
}

function cleanAndDisplay(str)
{
	String(str);
	var data = str.split("||");
	$("#results").html(data[0]);
	$("#namePlace").html(data[1]);
	$("#orgPlace").html(data[2]);
	if(parseInt(data[3])==0){
		$("#signArea0").show();
		$("#signArea1").hide();
	}else{
		$("#signArea1").show();
		$("#signArea0").hide();
	}
}

function changeStat()
{
	
	
}