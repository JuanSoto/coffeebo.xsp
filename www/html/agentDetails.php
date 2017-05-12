<?php $CI =& get_instance();?>

<?php 
    require_once('././appcode/includes/xsp.il8.php');
?>

<?php
  $result = $agentInfoTabResult + $agentSubAgentsTabResult;
  error_log(json_encode($result),3,"C:/temp/ErrorMessage.log"); 
  $data = json_decode($agentInfoTabResult);
  if ($data->{'status'} == 'OK')
  {
    $language = $this->session->userdata('language');
    $agent = $data->{'data'}[0];
?>
<div id="tab_agent" class="tab-pane fade in active">  
                <?php if($this->session->userdata('agentLevel') < $agent->{'level'}){ ?>
                <FORM name="AgCustMaintenanceForm" method="post" action="">
                    <input type="hidden" name="agentID" value="<?=$this->session->userdata('agentID')?>" />
                <?php    } ?>
                <table cellpadding="2" cellspacing="2" width="100%" align="center" class="pure-table pure-table-bordered">
                <tr valign="top">
                <td width="50%" align="left">
                           <table cellpadding="2" border="0" cellspacing="2" width="100%" height="230px" align="center"   class="pure-table pure-table-bordered">
                              <tr valign="top">
                                <td colspan="4" height="15px" align="center" class="ui-widget-header"><?= il8("basic info",$language) ?></td>
                              </tr>
                              <tr>
                                <td style="padding-top:2px" colspan="4" align="left"></td>
                              </tr>
                              <tr valign="top" >
                                <td width="20%"  align="right" style="background-color:#D0E5F5"><?= il8("agent id",$language) ?>:</td>
                                <td width="30%" align="left" style="padding-left:15px;"> <?=$agent->{'loginName'}?></td>
                                <td width="20%" align="right" style="background-color:#D0E5F5" ><?= il8("agent name",$language) ?>:</td>
                                <td width="30%" align="left" style="padding-left:15px;">
                                  <INPUT id=nameFirst maxLength=30 name=nameFirst value="<?=$agent->{'Name'}?>">
                                </td>
                              </tr>
                              <tr valign="top">
                                <td align="right" style="background-color:#D0E5F5"><?= il8("level",$language) ?> :</td>
                                <td align="left" style="padding-left:15px;"><?=$agent->{'level'}?></td>
                                <td align="right" style="background-color:#D0E5F5"><?= il8("master agent",$language) ?></td>
                                <td align="left" style="padding-left:15px;"><?=$agent->{'MasterAgentName'}?></td>
                              </tr>
                              <tr valign="top">
                                <td align="right" style="background-color:#D0E5F5"><?= il8("password",$language) ?>:</td>
                                <td align="left" style="padding-left:15px;">
                                        <INPUT type=password id=password maxLength=12 name=password size=14 value="">
                                </td>
                                    <td align="right" style="background-color:#D0E5F5"><?= il8("agent commision",$language) ?> %:</td>
                                <td align="left" style="padding-left:15px;"><input type="number" min="0" max="100" placeholder="Agent Commission%" name="agent_commission" required="required" value="<?=$agent->{'CommissionPercent'}?>"/></td>
                              </tr>
                              <tr>
                                    <?php if($agent->{'level'} > 1){ ?>
                                <td align="right" style="background-color:#D0E5F5"><?= il8("iframe url",$language) ?> %:</td>
                                <td align="left" style="padding-left:15px;"><input type="text" placeholder="iframe url" name="iframeURL" id="iframeURL" required="required" value="<?=$agent->{'iframeURL'} ?>"/></td>
                                <td align="right" style="background-color:#D0E5F5"><?=     il8("passphrase",$language) ?>:</td>
                                <td align="left" style="padding-left:15px;">
                                        <INPUT type=text id=passphrase maxLength=12 name=passphrase size=14 value="<?=$agent->{'passphrase'} ?>">
                                </td>
                                <?php } ?>
                              </tr>
                               
                            <?php if($this->session->userdata('agentLevel') < $agent->{'level'}){ ?>
                              <tr>
  
                                <td align="right" style="background-color:#D0E5F5"><?=    il8("status",$language) ?>:</td>
                                <td align="left" style="padding-left:15px;">                                  
                                  <select  name="active" id="active">
                                    <option value="Y" <?php if($agent->{'Active'}=="Y"){ ?>selected<?php } ?>> <?= il8("yes",$language) ?> </option>
                                    <option value="N" <?php if($agent->{'Active'}=="N"){ ?>selected<?php } ?>> <?= il8("no",$language) ?> </option>
                                  </select>
                                </td>

                                <td align="right" style="background-color:#D0E5F5"><?=    il8("register date",$language)?>:</td>
                                <td align="left" style="padding-left:15px;">
                                  <?=$agent->{'createdon'}?>
                                </td>

                              </tr>
                      <tr >
                        <td align="right" style="background-color:#D0E5F5"><?=    il8("ceo",$language)?>:</td>
                        <td align="left" style="padding-left:15px;">
                        <input type="text" name="field1" id="field1" value="<?=$agent->{'field1'}?>">
                        </td>
                        <td align="right" style="background-color:#D0E5F5"><?=    il8("phone",$language)?>:</td>
                        <td align="left" style="padding-left:15px;">
                        <input type="text" name="field2" id="field2" value="<?=$agent->{'field2'}?>">
                        </td>
                      </tr>
                      <tr >
                        <td align="right" style="background-color:#D0E5F5"><?=    il8("open date",$language)?>:</td>
                        <td align="left" style="padding-left:15px;">
                        <input type="text" name="field3" id="field3" value="<?=$agent->{'field3'}?>">
                        </td>
                        <td align="right" style="background-color:#D0E5F5"><?=    il8("close date",$language)?>:</td>
                        <td align="left" style="padding-left:15px;">
                        <input type="text" name="field4" id="field4" value="<?=$agent->{'field4'}?>">
                        </td>
                      </tr>
                      <tr >
                        <td align="right" style="background-color:#D0E5F5"><?=    il8("address",$language)?>:</td>
                        <td align="left" style="padding-left:15px;" colspan="5">
                        <input type="text" name="field5" id="field5" style="width:90%" value="<?=$agent->{'field5'}?>">
                        </td>
                      </tr>

                      <tr >
                        <td align="right" style="background-color:#D0E5F5"><?=    il8("memo",$language)?>:</td>

                      </tr>

                               <tr>
                                 

                                    <td align="right" style="background-color:#D0E5F5"><?=il8("coupon auth",$language)?>:</td>
                                <td align="left" style="padding-left:15px;">
                                        <?php if ( $this->session->userdata('agentLevel') == $agent->{'level'} ) {
                                                if ( $agent->{'CouponAuthFlag'} == "Y" ) il8("authorize",$language);
                                                if ( $agent->{'CouponAuthFlag'} == "N" ) il8("unauthorize",$language);
                                            } else { ?>
                                          <select  name="CouponAuthFlag" id="CouponAuthFlag">
                                            <option value="Y" <?php if($agent->{'CouponAuthFlag'}=="Y"){ ?>selected<?php } ?> > <?= il8("authorize",$language) ?> </option>
                                            <option value="N" <?php if($agent->{'CouponAuthFlag'}=="N"){ ?>selected<?php } ?> > <?= il8("unauthorize",$language) ?> </option>
                                          </select>
                                        <?php } ?>
                                </td>


                                    <td align="right" style="background-color:#D0E5F5"><?= il8("coupon money",$language) ?>:</td>
                                <td align="left" style="padding-left:15px;">
                                            <?php if ( $this->session->userdata('agentLevel') == $agent->{'level'} ) {
                                                     $agent->{'CouponLimitMoney'};
                                                 } else { ?>
                                                   <input type="number" min="0" name="CouponLimitMoney" value="<?=$agent->{'CouponLimitMoney'} ?>"/>
                                            <?php } ?>
                                </td>

                               </tr>


                               <?php } ?>
                            </table>
            
                <td width="50%" align="left">
        
                        <table cellpadding="2" border="0" cellspacing="2" width="100%" height="230px" align="center"  style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc; border-right: 1px solid #ccc;border-left: 1px solid #ccc;">
                            <tr valign="top">
                              <td colspan="4" height="15px" align="center" class="ui-widget-header"><?=il8("child agent",$language) ?></td>
                            </tr>

        
                    <tr>
                      <td align="center" valign="top" >

                                <div style="overflow-y:scroll; height:180px; width:100%">
                                <? $CI->load->view("agentHierarchy",$result); ?>                
                                </div>
                      </td>
                            </tr>
                        </table>           
                </td>
              </tr>    
                <?php if($this->session->userdata('agentLevel') < $agent->{'level'}){ ?>
                    <tr>
                      <td  align="center" colspan="2" height="50">
                                <input type="submit" name="save" id="save" value="  <?=il8("save",$language)?>  "/>
                        <a href="" style="text-decoration:none"><input type="button" name="button4" id="button4" value="   CANCEL   " /></a>
                      </td>
                     </tr>
                <?php } ?>
            </table>
            <?php if($this->session->userdata('agentLevel') < $agent->{'level'}){ ?>
              </FORM>
            <?php } ?>
            </div>
<?php }
    else { 
?>
    <h3>Agent details not found... </h3>
<?php } ?>