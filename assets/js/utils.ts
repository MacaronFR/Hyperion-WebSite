declare var $: any;
declare var jquery: any;

function API_REQUEST(path: string, method: string, param=[]){
	let url = "https://api.hyperion.dev.macaron-dev.fr" + path;
	$.ajax(url,
		{
			contentType: "application/json",
			dataType: 'jsonp',
			crossDomain: true,
			method: method,
			username: "hyperion",
			password: "hyperiondeb1",
		});
}