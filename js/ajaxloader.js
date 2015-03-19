(function($){
	
	// Default values
	var stepSize = 15;
	var handler = "/dev/ajax_loader/handler/handler.php";
	
	var started = false,
		iterator = 0,
		buttonId = "#ajaxloader-button",
		containerId = "#report-container",
		messageId = "#ajaxloader-message",
		stopMessage = "Остановить",
		startMessage = "Запустить",
		stoppedMessage = "Остановлен",
		startedMessage = "Запущен";
	
	var methods = {
		
		start : function(){
			
			if(started === false){
				$(buttonId).html(stopMessage);
				$(messageId).html(startedMessage);
				started = true;
				methods.send();
			} else {
				console.log("already started");
			}
			
		},
		
		stop : function(){
			
			if(started === true){
				$(buttonId).html(startMessage);
				$(messageId).html(stoppedMessage);
				started = false;
			} else {
				console.log("already stopped");
			}
		},
		
		init : function(params){
			
			console.log("INIT");
			
			if(typeof params.stepSize !== "undefined"){
				stepSize = params.stepSize;
			}
			
			if(typeof params.handler !== "undefined"){
				handler = params.handler;
			}
			
			var button = $(buttonId);
			
			button.on("click", function(){
				
				if(started === false){
					methods.start();
				} else {
					methods.stop();
				}
			});
			
		},
		
		send : function(){
			
			if(started === true){
				
				console.log(stepSize);
				
				iterator++;
				
				$.post(
					handler,
					{
						"stepSize" : stepSize
					}
				).done(function(data){
					
					var htmlIterator = '<span>' + iterator + '</span>',
					htmlItems = '<span>' + data.items_handled + '</span>',
					htmlTime = '<span>' + data.time_exec + '</span>';
					
					if(typeof data.errors !== 'undefined'){
						var htmlErrors = '<span>' + data.errors + '</span>';
					} else {
						var htmlErrors = '<span>Ok</span>';
					}
					
					$('<div/>', {
						'class' : 'report-item'
					}).appendTo(containerId)
					.html(htmlIterator + htmlItems + htmlTime + htmlErrors);
					
					methods.send();
					
				}).fail(function(data){
					$(messageId).html(handler + " : " + data.statusText);
				});
				
			}
		},
		
	};
	
	$.ajaxloader = function(method){
		if (methods[method]){
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if ( typeof method === 'object' || ! method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error('Method ' +  method + ' is not exist');
		}
	}
	
	
})(jQuery);