declare var $: any;
declare var jquery: any;

function API_REQUEST(path: string, method: string, param = []) {
	let url = "https://api.hyperion.dev.macaron-dev.fr" + path;
	return new Promise<string>(function(resolve, reject){
		var xhr = new XMLHttpRequest();
		xhr.open(method, url, true);
		xhr.onreadystatechange = function(){
			if(xhr.readyState === xhr.DONE){
				try {
					let res = JSON.parse(xhr.responseText);
					resolve(res);
				}catch (e) {
					reject(e);
				}
			}
		}
		if(method === "POST" || method === "PUT"){
			xhr.send(JSON.stringify(param))
		}else {
			xhr.send();
		}
	})
}