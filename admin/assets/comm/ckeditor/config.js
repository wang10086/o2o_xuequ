/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'zh-cn';
	// config.uiColor = '#AADC6E';
	
	config.toolbar = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source'] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
		
		{ name: 'styles', items: [ 'Font', 'FontSize' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike',  '-', 'RemoveFormat' ] },
		{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'Outdent', 'Indent',  'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
		{ name: 'links', items: [ 'Link', 'Unlink'] },
		{ name: 'tools', items: [ 'Maximize' ] },
		{ name: 'insert', items: [ 'Image',  'Table', 'Smiley'] },
		
	];
	
	// Toolbar groups configuration.
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'forms' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'links' },
		{ name: 'insert' },
		'/',
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'tools' },
		{ name: 'others' },
		{ name: 'about' }
	];
	
	CKEDITOR.config.font_names="宋体;仿宋;黑体;微软雅黑;Arial/Arial, Helvetica, sans-serif;Comic Sans MS/Comic Sans MS, cursive;Courier New/Courier New, Courier, monospace;Georgia/Georgia, serif;Lucida Sans Unicode/Lucida Sans Unicode, Lucida Grande, sans-serif;Tahoma/Tahoma, Geneva, sans-serif;Times New Roman/Times New Roman, Times, serif;Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;Verdana/Verdana, Geneva, sans-serif";
	CKEDITOR.config.font_defaultLabel="";

	config.image_previewText = '这时是测试图片排版位置的文字，可以在这里看到图片排版效果。';
	config.filebrowserUploadUrl = 'op.php?m=Main&c=Attachment&a=CKUpload&type=file';
	config.filebrowserImageUploadUrl = 'op.php?m=Main&c=Attachment&a=CKUpload&type=img';
	config.removeDialogTabs = 'image:advanced;image:Link';
	config.height  = 500;
	
	config.allowedContent = true;
	config.format_p = { element: 'p', attributes: { 'class': 'normalPara' } };

};
