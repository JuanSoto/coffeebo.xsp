function initAgentPage(){
	if (initAgentPage){
		// Init Agent Tree
        showLayer('/member/getAgentDataTree','','leftPanel');
        UITree.init();
        // Init Agent List
        showLayer('/member/getAgentDataList','','rightPanel');
    }  
}