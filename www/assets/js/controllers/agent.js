var agent = {
	getSearchData: function(){
		var data = {
			agentPercent : $('#agentPercent').val(),
			status : $('#agstatus').val(),
			agentName : $('#agentName').val()
		}
		return data;
	},
	getInitAgentsList: function(){
		var data = agent.getSearchData();
		// console.log("data:...", data);
		showLayer('/member/getAgentDataList',data,'rightPanel');
	},
	treeClick: function(event,id){
		$('#agent_id').val(id);
		event.preventDefault();
		event.stopPropagation();
		var data = $.extend({}, {agentId:id}, agent.getSearchData());
		// console.log("data:...", data);
		showLayer('/member/getAgentDataList',data,'rightPanel');
	},
	search: function(){
		// $('#agent_id').val(id);
		// event.preventDefault();
		// event.stopPropagation();
		var data = $.extend({}, {agentId:$('#agent_id').val()}, agent.getSearchData());
		// console.log("data:...", data);
		showLayer('/member/getAgentDataList',data,'rightPanel');
	},
	modal: function(event, id){
		console.log("event: ", event);
		console.log("id: ", id);
		if (!event) {
        	event = window.event; 
		};

    	var el = (event.target || event.srcElement); 
    	var data = {
    		agentId:id
    	};
    	showLayerModal(el,'/member/loadModalView',data,'modal-body');
		// $(el).attr("href","#draggable");
	}
}