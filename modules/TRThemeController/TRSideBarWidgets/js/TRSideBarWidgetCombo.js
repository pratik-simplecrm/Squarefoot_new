TRSideBarWidgetCombo = {
		show: function(item){
			$('#'+item).addClass('combo_item_active');
			$('#'+item).removeClass('combo_item');
			$('#combo_item_title').text($('#'+item).attr('label'));
			if($('#'+item).length == 0){
				$('#combo_item_title').text(item);
			}
		},
		initialize: function(item){
			$("#combo_next").click(function(){
				var $toHighlight = $('.combo_item_active').next().length > 0 ? $('.combo_item_active').next() : $('#combo_container .combo_item').first();
			    $('.combo_item_active').fadeOut('fast',function(){
			        $('.combo_item_active').addClass('combo_item');
			        $('.combo_item_active').removeClass('combo_item_active');
			        $('#combo_item_title').text($toHighlight.attr('label'));
			        $toHighlight.fadeIn('fast',function(){
			            $toHighlight.addClass('combo_item_active');
			            $toHighlight.removeClass('combo_item');
			        });
			        TRSideBarWidgetCombo.save($toHighlight.attr('id'));
			    });

			});

			$("#combo_prev").click(function(){
	            var $toHighlight = $('.combo_item_active').prev().length > 0 ? $('.combo_item_active').prev() : $('#combo_container .combo_item').last();
	            $('.combo_item_active').fadeOut('fast',function(){
	            	$('.combo_item_active').addClass('combo_item');
			        $('.combo_item_active').removeClass('combo_item_active');
	            	$('#combo_item_title').text($toHighlight.attr('label'));
	            	$toHighlight.fadeIn('fast',function(){
	            		$toHighlight.addClass('combo_item_active');
	            		$toHighlight.removeClass('combo_item');
	            	});
	            	TRSideBarWidgetCombo.save($toHighlight.attr('id'));
	            });

			});

			this.show(item);
		},
		save: function(item){
			$.ajax({
	            url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=setWidgetUserConfig&param=combo_active_element&value="+item+"&to_pdf=true",
	            success:function(result){
	            }
	        });
		}
}