window.phappy = {
	onclick: function(item){
		var item = $(item);
		var data = item.parents('form').serialize();
		$.ajax({
			type: 'POST',
			dataType: 'script',
			data: data,
			url: '?event'
		});
	}
};