

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
                    Menu Title
                </h3>

                <!------------------ Search------------------------------------------>
                <div class="page-bar" style="padding-top:10px;padding-bottom:10px;">

                    <form name="searchForm" method="post" id="searchForm" class="form-inline" role="form">

                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail2">Search</label>
                            <select class="form-control input-small" name="mytask" id="mytask" style="width:250px;">
                                <option value="">All</option>
                                <option value="1">Customer</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail2">Search</label>
                            <select class="form-control input-small" name="searchstatus" id="searchstatus"
                                    style="width:250px;">
                                <option value="">Status</option>
                                <option value="0">Open</option>
                                <option value="1">Close</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="exampleInputPassword2">From</label>
                            <input class="form-control form-control-inline input-small date-picker" size="10"
                                   type="text" value="" placeholder="From" name="sdate" id="sdate"/>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="exampleInputPassword2">To</label>
                            <input class="form-control form-control-inline input-small date-picker" size="10"
                                   type="text" value="" placeholder="To" name="edate" id="edate"/>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail2">Field</label>
                            <select class="form-control input-small" name="select" id="select" style="width:250px;">
                                <option value="">Field</option>
                                <option value="contents">AAAA</option>
                                <option value="contents">BBBB</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputPassword2">keyword</label>
                            <input type="text" class="form-control" id="exampleInputPassword2" placeholder="keyword"
                                   name="sname" id="sname" value="">
                        </div>


                        <button type="button" class="btn btn-success">Search.</button>
                    </form>

                </div>
                <!------------------ End Search------------------------------------------>

                <!-- END PAGE BAR -->
                <div class="contents" style="padding-top:0px;">

                    <!-- BEGIN EXAMPLE TABLE PORTLET-->

                    <div id="mainSplitter">
                        <div class="splitter-panel" id="leftPanel">

                            <!------------------------------- Tree ---------------------------------------------->

                            <div id="tree_1" class="tree-demo">
                                <ul>
                                    <li> Root node 1
                                        <ul>
                                            <li data-jstree='{ "selected" : true }'>
                                                <a href="javascript:;"> Initially selected </a>
                                            </li>
                                            <li data-jstree='{ "icon" : "fa fa-briefcase icon-state-success " }'> custom icon URL </li>
                                            <li data-jstree='{ "opened" : true }'> initially open
                                                <ul>
                                                    <li data-jstree='{ "disabled" : true }'> Disabled Node </li>
                                                    <li data-jstree='{ "type" : "file" }'> Another node </li>
                                                </ul>
                                            </li>
                                            <li data-jstree='{ "icon" : "fa fa-warning icon-state-danger" }'> Custom icon class (bootstrap) </li>
                                        </ul>
                                    </li>
                                    <li data-jstree='{ "type" : "file" }'>
                                        <a href="http://www.jstree.com"> Clickanle link node </a>
                                    </li>
                                </ul>
                            </div>

                            <!------------------------------ End Tree ---------------------------------------------->

                        </div>
                        <div class="splitter-panel" id="rightPanel" style="padding-left:5px;padding-right:5px;">


                            <table class="table table-striped table-bordered table-hover table-checkable order-column"
                                   id="sample_1" style="width:1800px">
                                <thead>
                                <tr>
                                    <th>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="group-checkable"
                                                   data-set="#sample_1 .checkboxes"/>
                                            <span></span>
                                        </label>
                                    </th>
                                    <th widtt="100"> Username</th>
                                    <th> Email</th>
                                    <th> Status</th>
                                    <th> Joined</th>
                                    <th> Actions</th>
                                    <th> Actions</th>
                                    <th> Actions</th>
                                    <th> Actions</th>
                                    <th> Actions</th>
                                    <th> Actions</th>
                                    <th> Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1"/>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td><a class="btn green btn-outline sbold" data-toggle="modal" href="#draggable">
                                        View Demo </a></td>
                                    <td> shuxer11111</td>
                                    <td> shuxer2222222</td>
                                    <td> shuxer3333333333333</td>
                                    <td> shuxer</td>
                                    <td> shuxer</td>
                                    <td> shuxer</td>
                                    <td> shuxer</td>
                                    <td> shuxer</td>
                                    <td> shuxer</td>
                                    <td> shuxer</td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- END EXAMPLE TABLE PORTLET-->


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
                                <div class="modal-body"> Modal body goes here</div>
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
    
    