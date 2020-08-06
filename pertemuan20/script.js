$(document).ready(function(){
	//hilangkan tombol cari
	$('#tombol-cari').hide();

	// event ketiak keyword ditulis
	$('#keyword').on('keyup', function(){
		//munculkan icon loading
		$('.loader').show();

		// ajx menggunakan load
		// $('#container').load('ajax/film.php?keyword=' + $('#keyword').val());

		//$.get()
		$.get('ajax/film.php?keyword=' + $('#keyword').val(), function(data){

			$('#container').html(data);
			$('.loader').hide();
		});

	});
});