<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Tags available on your blog.</title>
	<link media="all" type="text/css" href="tags.css" rel="stylesheet">
	<script type="text/javascript" src="/wp-includes/js/jquery/jquery.js"></script>
	<script type="text/javascript" src="../../../../wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script type="text/javascript" src="tags.js"></script>
</head>
<form id="tag_form" onsubmit="Actions.setTag();return false;" action="#">
	<p>Click on available tags below to complete these fields</p>
	<div class="box">
		<label>Link</label>
		<input type="text" disabled value="" name="link" id="link" />
	</div>
	<div class="box">
		<label>Title</label>
		<input type="text" value="" name="title" id="title" />
	</div>
	<div class="box">
		<p class="howto" style="border-top: 1px solid #aaa"><br />Tags available on your website</p>
		<ul id="query-results">
			
		</ul>
	</div>
	<div class="actions">
		<input type="submit" id="insert" name="insert" value="Ok" />
		<input type="button" id="cancel" name="cancel" value="Cancel" onclick="tinyMCEPopup.close();" />
	</div>
</form>
