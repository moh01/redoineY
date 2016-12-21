	$(document).ready(function(){
				var $marque = $('#marque');
					$model = $('#model');

				pageInitialisantion();	
				$.ajax({
					url: 'js/get-ajax.php',
					data: 'charger', 
					dataType: 'json', 
					success: function(json) {
						$.each(json, function(index, value) { 
							$marque.append('<option value="'+ value +'">'+ value +'</option>');
						});
					}
				});	

				$marque.change(function() {
						var val = $(this).val(); 
						if(val != '') {
							$model.empty(); 
							$.ajax({
								url: 'js/get-ajax.php',
								data: 'marque='+ val,
								dataType: 'json',
								success: function(json) {
									$.each(json, function(index, value) {
										$model.append('<option value="'+ value +'">'+ value +'</option>');
									});
									var model = $('#model').val(); 
									boutonChange2(model);
								}
							});
						}
				});
				$model.change(boutonChange);
			});

		function boutonChange2(model) {
						var marque = $('#marque').val(); 
						if((model != '')&&(marque != '')) {
							var response = $.ajax({
								url: 'js/get-ajax.php',
								data:'model='+ model+'&marque='+ marque,
								dataType: 'json',
								success: function(json) {
									if(json.nbr!=0){
										$('.prix-lampe').css("background","url('images/bg_prix.jpg') left no-repeat #ffffff");
										$('.prix-lampe').css("cursor","pointer");
									}else{
										$('.prix-lampe').css("background","url('images/bg_prix2.jpg') left no-repeat #ffffff");
										$('.prix-lampe').css("cursor","default");
									}
									if(json.exist!="false"){
										$('.info-video').css("background","url('images/bg_info.jpg') left no-repeat #FAEF23");
										$('.info-video').css("cursor","pointer");
									}else{
										$('.info-video').css("background","url('images/bg_info2.jpg') left no-repeat #ffffff");
										$('.info-video').css("cursor","default");
									}
								}
							});
						}
		}


		function pageInitialisantion(){
			$('.prix-lampe').css("background","url('images/bg_prix2.jpg') left no-repeat #ffffff");
			$('.prix-lampe').css("cursor","default");
			$('.info-video').css("background","url('images/bg_info2.jpg') left no-repeat #ffffff");
			$('.info-video').css("cursor","default");
		}

		function boutonChange() {
						var model = $(this).val(); 
						var marque = $('#marque').val(); 
						if((model != '')&&(marque != '')) {
							var response = $.ajax({
								url: 'js/get-ajax.php',
								data:'model='+ model+'&marque='+ marque,
								dataType: 'json',
								success: function(json) {
									if(json.nbr!=0){
										$('.prix-lampe').css("background","url('images/bg_prix.jpg') left no-repeat #ffffff");
										$('.prix-lampe').css("cursor","pointer");
									}else{
										$('.prix-lampe').css("background","url('images/bg_prix2.jpg') left no-repeat #ffffff");
										$('.prix-lampe').css("cursor","default");
									}
									if(json.exist!="false"){
										$('.info-video').css("background","url('images/bg_info.jpg') left no-repeat #FAEF23");
										$('.info-video').css("cursor","pointer");
									}else{
										$('.info-video').css("background","url('images/bg_info2.jpg') left no-repeat #ffffff");
										$('.info-video').css("cursor","default");
									}
								}
							});
						}
		}


		function href_fiche_produit() {
						var model = $("#model").val(); 
						var marque = $("#marque").val(); 
						var lien;

						if((model != '')&&(marque != '')) {
							 $.ajax({
								url: 'js/get-ajax.php',
								data:'model='+ model+'&marque='+ marque,
								dataType: 'json',
								success: function(json) { 
									if(json.nbr!=0){
										lien=location.href='ficheProduit_'+marque+'_'+model+'.php';
										return lien;
									}
								}
							});
						}	
						
		};
		
		function hrefFicheProduitTable(model,marque) {
						var lien;

						if((model != '')&&(marque != '')) {
							 $.ajax({
								url: 'js/get-ajax.php',
								data:'model='+ model+'&marque='+ marque,
								dataType: 'json',
								success: function(json) {
									if(json.nbr!=0){
										lien='ficheProduit_'+marque+'_'+model+'.php';
										return lien;
									}
								}
							});
						}	
						
		};

		function href_info_produit() {
						var model = $("#model").val(); 
						var marque = $("#marque").val(); 
						var lien;

						if((model != '')&&(marque != '')) {
							 $.ajax({
								url: 'js/get-ajax.php',
								data:'model='+ model+'&marque='+ marque,
								dataType: 'json',
								success: function(json) {
									if(json.exist!="false"){
										lien=location.href='video-projecteur-'+marque+'-'+model+'.html';
										return lien;
									}
								}
							});
						}

		};
		
	
	$(function() {
		$('#foo2').carouFredSel({
			auto: false,
			prev: '#prev2',
			next: '#next2',
			pagination: "#pager2",
			mousewheel: true,
			swipe: {
				onMouse: true,
				onTouch: true
			}
		});
		
		$('#foo0').carouFredSel({
            scroll : {
                 duration : 1000,
                 pauseDuration : 7000
            }
        });
	});

			

      



          