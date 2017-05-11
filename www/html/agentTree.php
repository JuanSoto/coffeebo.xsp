<?php 
    $data = json_decode($agentHIERARCHYResult);
    // echo $data;
 ?>

<!------------------------------- Tree ---------------------------------------------->
<div id="tree_1" class="tree-demo">
    <ul>
        <?php 
            $State = "true";
            foreach ($data->{'data'} as $agent) 
            {
                error_log(json_encode($agent),3,"C:/temp/ErrorMessage.log"); 
                if ($agent->{'Level'} == '0') 
                {                                
        ?>
                    <li onclick="treeClick(<?= $agent->{'AgentID'} ?>)" data-jstree='{ "icon" : "fa fa-users icon-state-success " }'> <?= $agent->{'loginName'} ?>
                        <ul>
        <?php   } 
                else  
                {                    
        ?>
                                 <li onclick="treeClick(<?= $agent->{'AgentID'} ?>)" data-jstree='{ "selected" : <?= $State?>, "icon" : "fa fa-user-o icon-state-success" }'>
                                                <?= $agent->{'loginName'} ?>
                                </li>                                            

        <?php   
                    $State = "false";
                }
            }
        ?>          
            </ul>
        </li>            
    </ul>
</div>

<!------------------------------ End Tree ---------------------------------------------->