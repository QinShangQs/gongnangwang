$.ajaxSetup({
  async: false
});

$(document).ready(function(){
	//禁止右键视频
	$('video').bind('contextmenu',function() { return false; }); 
});