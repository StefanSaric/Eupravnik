var toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],

  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],                                 // remove formatting button
];


var quill = new Quill('#greeting', {
	modules: {
		toolbar: toolbarOptions
	},
	theme: 'snow'
	});
var quill = new Quill('#content', {
	modules: {
		toolbar: toolbarOptions
	},
	theme: 'snow'
	});
var quill = new Quill('#signature', {
	modules: {
		toolbar: toolbarOptions
	},
	theme: 'snow'
	});