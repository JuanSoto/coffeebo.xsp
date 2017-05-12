<?php 
    $data = json_decode($agentAdminInfoResult);
    if ($data->{'status'} == 'OK')
    {
 ?>

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
                                    <th widtt="100"> Agent ID</th>
                                    <th> Agent Name</th>
                                    <th> Level</th>
                                    <th> Master Agent</th>
                                    <th> Commission Percentage</th>
                                    <th> Agent Current Balance</th>
                                    <th> Basic Rating</th>
                                    <th> Status</th>
                                    <th> Coupon auth (Authorization or authentication?)</th>
                                    <th> Coupon Money</th>
                                    <th> Phone Auth</th>
                                    <th> Register Date</th>
                                    <th> Modify Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    foreach ($data->{'data'} as $agent) {

                                ?>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1"/>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td><a onclick="agent.modal(event,<?= $agent->{'AgentID'} ?>);" class="btn green btn-outline sbold" data-toggle="modal" href="">
                                        <?= $agent->{'loginName'} ?> </a></td>
                                    <td> <?= $agent->{'loginName'} ?></td>
                                    <td> <?= $agent->{'level'} ?></td>
                                    <td> <?= $agent->{'masterAgentName'} ?></td>
                                    <td> <?= $agent->{'CommissionPercent'} ?></td>
                                    <td> </td>
                                    <td> </td>
                                    <td> <?= $agent->{'Active'} ?></td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> <?= $agent->{'createdon'} ?></td>
                                    <td> </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <!-- END EXAMPLE TABLE PORTLET-->

<?php }
    else { 
?>
    <h3>No agents found... </h3>
<?php } ?>