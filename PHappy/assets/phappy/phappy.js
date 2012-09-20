window.phappy = {
	onclick: function(item){
		var item = $(item);
		var data = {};
		$('input[type=text],select,textarea').each(function(i,item){
			var item = $(item);
			data[item.attr('id')] = item.val();
		});
		$('input[type=radio]:checked').each(function(i,item){
			var item = $(item);
			data[item.attr('name')] = item.val();
		});
		$('input[type=checkbox]').each(function(i,item){
			var item = $(item);
			data[item.attr('id')] = item.attr('checked') ? 1 : 0;
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
		if(!item.length){
			item = $('[name="' + id + '"]')
		}
		var name = item.prop('nodeName');
		if(name=='INPUT'){
			if(item.attr('type') == 'text'){
				item.val(value);
			}else if(item.attr('type') == 'checkbox'){
				if(value){
					item.attr('checked', 'checked');
				}else{
					item.removeAttr('checked');
				}
			}else if(item.attr('type') == 'radio'){
				$('input[name="' + id + '"]')
					.removeAttr('checked')
					.filter('[value="' + value + '"]').attr('checked', 'checked');
			}
		}else if(name == 'SELECT'){
			item.val(value);
		}else if(name == 'TEXTAREA'){
			item.val(value);
		}else{
			item.html(value);
		}
	}
};
$(function(){
	$('button').on('click', function(e){
		phappy.onclick(e.srcElement);
	})
});