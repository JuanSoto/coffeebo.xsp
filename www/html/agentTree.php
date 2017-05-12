<?php 
    $data = json_decode($agentHIERARCHYResult);
    if ($data->{'status'} == 'OK')
    {
 ?>

<!------------------------------- Tree ---------------------------------------------->
<div id="tree_1" class="tree-demo">
    <ul>
        <?php 
            $State = "true";
            foreach ($data->{'data'} as $agent) 
            {
                if ($agent->{'Level'} == '0') 
                {                                
        ?>
                    <li onclick="agent.treeClick(event,<?= $agent->{'AgentID'} ?>); return false;" data-jstree='{ "icon" : "fa fa-users icon-state-success " }'> <?= $agent->{'loginName'} ?>
                        <ul>
        <?php   } 
                else  
                {                    
        ?>
                                 <li onclick="agent.treeClick(event,<?= $agent->{'AgentID'} ?>); return false;" data-jstree='{ "selected" : <?= $State?>, "icon" : "fa fa-user-o icon-state-success" }'>
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

<?php }
    else { 
?>
    <h3>No agents found... </h3>
<?php } ?>