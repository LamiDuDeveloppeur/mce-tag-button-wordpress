// tinymce.create('tinymce.plugins.tagsbutton',{
	// init : function(ed,url){
		// ed.addButton('tagsbutton',{
			// title : 'Ajouter une vidéo Dailymotion',
			// image : url + '/tags.png',
			// onclick : function(){
				// var content = ed.selection.getContent();
				// ed.selection.setContent('<a href="/tag/'+content+'">'+ content +'</a>');
			// }
		// });
	// },
	// createControl : function(n,cm){
		// return null;
	// }
// });
// tinymce.PluginManager.add('tagsbutton',tinymce.plugins.tagsbutton);

tinymce.create('tinymce.plugins.tagsbutton',{
	init : function(ed,url){
		ed.addCommand('mceExample', function() {
			var content = ed.selection.getContent();
			jQuery.post(ajaxurl, {action: 'get_data'}, function(response) {
				var tags = response;
				ed.windowManager.open({
					file : url + '/tags.php',
					width: 480,
					height: 400,
					inline : 1
				}, {
					plugin_url : url,
					content : content,
					tags : tags
				});
			});
			
		});
		ed.addButton('tagsbutton', {
			title : 'Tags',
			cmd : 'mceExample',
			image : url + '/tags.png'
		});
		ed.onNodeChange.add(function(ed, cm, n, co) {
			disabled = co && n.nodeName != 'A';
		});
	}
});
tinymce.PluginManager.add('tagsbutton',tinymce.plugins.tagsbutton);