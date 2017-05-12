<?php 
    require_once('././appcode/includes/xsp.il8.php');
?>
<style type="text/css">
    .modal-dialog {
    width: 80%;
    margin: 30px auto;
}
</style>

    <input name="agent_id" id="agent_id" type=hidden value="">

    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"></div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">

        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->


                <!-- BEGIN PAGE HEADER-->
                <h3 class="page-title">
                    JADE BACK OFFICE
                </h3>

                <!------------------ Search------------------------------------------>
                <div class="page-bar" style="padding-top:10px;padding-bottom:10px;">

                    <form name="searchForm" method="post" id="searchForm" class="form-inline" role="form">

                        <div class="form-group">
                            <label class="sr-only" for="agentPercent"><?=il8("percentage",$this->session->userdata('language'))?></label>
                            
                            <select name="agentPercent" id="agentPercent" class="form-control input-small" style="width:250px;">
                                <option value="none"><?=il8("percentage",$this->session->userdata('language'))?></option>
                                <option value="0">0% - 10%</option>
                                <option value="1">10% - 20%</option>
                                <option value="2">20% - 30%</option>
                                <option value="3">30% - 40%</option>
                                <option value="4">40% - 50%</option>
                                <option value="5">50% - 60%</option>
                                <option value="6">60% - 70%</option>
                                <option value="7">70% - 80%</option>
                                <option value="8">80% - 90%</option>
                                <option value="9">90% - 100%</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="agstatus"><?=il8("status",$this->session->userdata('language'))?></label>
                            <select class="form-control input-small" name="agstatus" id="agstatus"
                                    style="width:250px;">
                                <option value="none"><?=il8("status",$this->session->userdata('language'))?></option>
                                <option value="Y"><?=il8("normal",$this->session->userdata('language'))?></option>
                                <option value="N"><?=il8("suspended",$this->session->userdata('language'))?></option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="agentName"><?=il8("agent id",$this->session->userdata('language') ) ?></label>
                            <input class="form-control" type="text" name="agentName" id="agentName" placeholder="<?=il8("agent id",$this->session->userdata('language') ) ?>"/>
                        </div>
                        
                        <button onClick="agent.search(); return false;" type="button" class="btn btn-success"><?=il8("search",$this->session->userdata('language') ) ?></button>
                    </form>

                </div>
                <!------------------ End Search------------------------------------------>

                <!-- END PAGE BAR -->
                <div class="contents" style="padding-top:0px;">

                    <!-- BEGIN EXAMPLE TABLE PORTLET-->

                    <div id="mainSplitter">
                        <div class="splitter-panel" id="leftPanel" style="width: 100%;">
                        <!-- Agent Tree Data -->
                        </div>

                        <div class="splitter-panel" id="rightPanel" style="padding-left:5px;padding-right:5px;">
                        <!-- Agents List Data -->
                        </div>
                    </div>




                    <!------ modal ------------------>
                    <div class="modal fade draggable-modal" id="draggable" tabindex="-1" role="basic"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true"></button>
                                    <h4 class="modal-title">Start Dragging Here</h4>
                                </div>
                                <div id="modal-body" class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close
                                    </button>
                                    <button type="button" class="btn green">Save changes</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!------ modal ------------------>


                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->


        <!-- BEGIN QUICK SIDEBAR -->

        <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    

<script>
   var initAgentPage =  true;
</script>