window.phappy = {
	onclick: function(item){
		var item = $(item);
		var data = item.parents('form').serialize();
		$.ajax({
			type: 'POST',
			dataType: 'script',
			data: data,
			url: '?event=click&id=' + item.attr('id')
		});
		return false;
	}
};
$(function(){
	$('button').on('click', function(e){
		phappy.onclick(e.srcElement);
	})
});