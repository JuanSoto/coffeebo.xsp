<?php 
    $data = json_decode($agentHIERARCHYResult);
    // echo $data;
 ?>

<!------------------------------- Tree ---------------------------------------------->
<div id="tree_1" class="tree-demo">
    <ul>
        <li> Root node 1 <?= $data->{'status'}  ?>
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