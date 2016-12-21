
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
        });
		
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

		$('#foo3').carouFredSel({
			auto: false,
			prev: '#prev3',
			next: '#next3',
			pagination: "#pager3",
			mousewheel: true,
			swipe: {
				onMouse: true,
				onTouch: true
			}
		});

		$('#foo0').carouFredSel($('#foo0').carouFredSel(
			scroll : {
                 duration : 1000,
                 pauseDuration : 10000
            }););
	});
/*
	$('#mon-carrousel').carouFredSel($('#mon-carrousel').carouFredSel({
		auto: true,
			scroll : {
                 duration : 1000,
                 pauseDuration : 1000
            }
		}););

	
	
*/

