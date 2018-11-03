function refresh_handler(){
	
	
	function refresh(){
		 $.get('datetime.php', null, function(data, textStatus){
		$('body').htmldata);
			
		});
	}
setInterval(refresh,1000);
}

$(document).ready(refresh_handler);
	
