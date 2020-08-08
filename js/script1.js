$(document).ready(function(){
	$('#tombol-cari').hide();
	/*var keyword = document.getElementById('keyword');
	keyword.addEventListener('keyup', function(){
		console.log('ok');
	});*/
	$('#keyword').on('keyup', function(){
		$('.load').show();
		//$('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());
		$.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data){
			$('#container').html(data);
			$('.load').hide();
		});
	});
});
/*console.log('ok'); //check
//ambil elemen yand dibutuhkan

var keyword = document.getElementById('keyword');
var tombolCari=document.getElementById('tombol-cari');
var container = document.getElementById('container');

keyword.addEventListener('keyup', function(){
	//alert('ok');
	//console.log(keyword.value); //check console browser
	//ajax
	var xhr = new XMLHttpRequest();
	//kesiapan ajax
	xhr.onreadystatechange = function(){
		if(xhr.readyState==4 && xhr.status==200){
			//console.log('ajax ok!');
			//console.log(xhr.responseText);
			container.innerHTML = xhr.responseText;
		}
	}
	// eksekusi ajax
	xhr.open('GET','ajax/mahasiswa.php?keyword='+ keyword.value,true);
	xhr.send();


});*/

