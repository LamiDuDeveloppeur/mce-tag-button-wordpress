var Actions = {
	init : function() {
		tags = tinyMCEPopup.getWindowArg("tags");
		document.getElementById('query-results').innerHTML = tags;
	},
	setTag : function() {
	
		content = tinyMCEPopup.getWindowArg("content");
		tag = document.getElementById('link').value;
		title = document.getElementById('title').value;
		
		content = '<a href="'+tag+'" title="'+title+'">'+content+'</a>';
		console.debug(content);
		tinyMCE.activeEditor.selection.setContent(content);
		
		tinyMCEPopup.restoreSelection();
		tinyMCEPopup.close();
	}
};
function clickTag(tag) {
	document.getElementById('link').value = '/tag/'+tag;
	document.getElementById('title').value = 'All articles associated to '+tag;
}
tinyMCEPopup.onInit.add(Actions.init, Actions);
