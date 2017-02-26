$.ajaxSetup({
  async: false
});

$(document).ready(function(){
	//禁止右键视频
	$('video').bind('contextmenu',function() { return false; }); 
});

String.prototype.replaceAll  = function(s1,s2){   
	return this.replace(new RegExp(s1,"gm"),s2);   	 
}