<?php
$current_ip = $_SERVER["REMOTE_ADDR"];
$whitelist = array("127.0.0.1","186.176.227.218","13.112.81.110","190.171.117.61");
$qtech = array("122.53.186.98","222.127.94.12");
$dev_whitelisted = in_array($current_ip,$whitelist);
$qtech_whitelisted = in_array($current_ip,$qtech);
$GameCompanyVisible = $this->session->userdata('GameCompanyVisible');
?>

<!-- BEGIN FOOTER -->
    <!-- END FOOTER -->
</div>

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?=ASSET_PATH?>/global/plugins/respond.min.js"></script>
<script src="<?=ASSET_PATH?>/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="<?=ASSET_PATH?>/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?=ASSET_PATH?>/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
        type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript"
        src="<?=ASSET_PATH?>/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?=ASSET_PATH?>/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
@*
<script src="<?=ASSET_PATH?>/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
*@
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script type="text/javascript" src="<?=ASSET_PATH?>/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"
        src="<?=ASSET_PATH?>/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="<?=ASSET_PATH?>/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=ASSET_PATH?>/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/layout/scripts/demo.js" type="text/javascript"></script>

<script src="<?=ASSET_PATH?>/layout/scripts/jquery-core.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/layout/scripts/jquery-splitter.js" type="text/javascript"></script>

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?=ASSET_PATH?>/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"
        type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?=ASSET_PATH?>/global/plugins/jstree/dist/jstree.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?=ASSET_PATH?>/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=ASSET_PATH?>/pages/scripts/ui-tree.js"></script>
<script src="<?=ASSET_PATH?>/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script src="<?=ASSET_PATH?>/pages/scripts/index.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="<?=ASSET_PATH?>/pages/scripts/components-pickers.js"></script>

 <script type="text/javascript" src="<?=ASSET_PATH?>/js/plugin/jquery.modal/jquery.simplemodal.js"></script>


<script src="<?=ASSET_PATH?>/js/initPages.js"></script>

<script src="<?=ASSET_PATH?>/js/controllers/agent.js"></script>

 
<script>

function initControls(){
    Metronic.init(); // init metronic core componets
    Layout.init(); // init layout
    QuickSidebar.init(); // init quick sidebar
    Demo.init(); // init demo features
    Index.init();
    Index.initDashboardDaterange();
    //Index.initJQVMAP(); // init index page's custom scripts
    //Index.initCalendar(); // init index page's custom scripts
    //Index.initCharts(); // init index page's custom scripts
    //Index.initChat();
    //Index.initMiniCharts();
    Tasks.initDashboardWidget();

    $("#draggable_ajax").draggable({
        handle: ".modal-header"
    });

    $("#draggable").draggable({
        handle: ".modal-header"
    });
    $("#draggable_write2").draggable({
        handle: ".modal-header"
    });
    $("#draggable_view").draggable({
        handle: ".modal-header"
    });

    ComponentsPickers.init();
}

    jQuery(document).ready(function () {
        initControls();        
    });
</script>


<script language="JavaScript">

    jQuery(document).ready(function() {
        $("#mainSplitter").jqxSplitter({
            width: '100%',
            height: '900px',
            theme: 'energyblue',
            panels: [
                {collapsible: true, size: "250px"},
                {collapsible: true}

            ]
        });
        var leftWidth = 100;
        var rightWidth = $(window).width() - leftWidth;
        // $("#leftPanel").css("width", leftWidth + "px");
        $("#rightPanel").css("width", rightWidth + "px");

        var screenHeight = 170;
        var mainHeight = $(window).height() - screenHeight;
        $("#mainSplitter").css("height", mainHeight + "px");

    });


</script>


    <div id="ajaxLayer" style="display:none"></div>


</body>

</html>

  
<script>

function treeClick(id) {
    // $("#searchForm").submit();
    // showLayer('/member/getAgentDataList','','rightPanel');
    // UITree.init();
};

function search_prg() {
    // $("#searchForm").submit();
    showLayer('/member/getAgentDataList','','rightPanel');
    // UITree.init();
};

$(document).ready(function(){
    initAgentPage();
});
     
$(document).keypress(function(e){
    if(e.which == 13 ){
        valueCheck();
    }
});

</script>

        
<?php
    if (!isset($showLogin)) {
        $showLogin = "no";
    }

	if ( $showLogin == "yes" )
	{
?>

<script>
	$(document).ready(function(){
		showLayer('/member/loginLayer','');

	});
</script>

<?		
	}
?>