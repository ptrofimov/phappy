window.phappy = {
	onclick: function(item){
		var item = $(item);
		var form = item.parents('form');
		var data = {};
		form.find('input[type=text],input[type=radio],select').each(function(i,item){
			var item = $(item);
			data[item.attr('id')] = item.val();
		});
		form.find('input[type=checkbox]').each(function(i,item){
			var item = $(item);
			data[item.attr('id')] = item.attr('checked')?1:0;
		});
		$.ajax({
			type: 'POST',
			dataType: 'script',
			data: data,
			url: '?event=click&id=' + item.attr('id')
		});
		return false;
	},
	setValue:function(id, value){
		var item = $('#' + id);
		var name = item.prop('nodeName');
		if(name=='INPUT'){
			if(item.attr('type')=='text'){
				item.val(value);
			}else if(item.attr('type')=='checkbox'){
				if(value){
					item.attr('checked', 'checked');
				}else{
					item.removeAttr('checked');
				}
			}
		}
	}
};
$(function(){
	$('button').on('click', function(e){
		phappy.onclick(e.srcElement);
	})
});