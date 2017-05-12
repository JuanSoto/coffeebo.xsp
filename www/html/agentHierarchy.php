<?php
  $data_agent = json_decode($agentInfoTabResult);
  $agent = $data_agent->{'data'}[0];

  $data = json_decode($agentSubAgentsTabResult);
  if ($data->{'status'} == 'OK')
  {
    $language = $this->session->userdata('language');    
?>

<TABLE BORDER = 0  class="pure-table pure-table-horizontal" width="100%" cellpadding=0 cellspacing=0>
    <tr>
        <TH NOWRAP align=center>&nbsp;&nbsp;<i class='fa fa-user'></i> <?= il8("agent",$language) ?> &nbsp;&nbsp;</TH>
        <TH NOWRAP align=center>&nbsp;&nbsp; <?=  il8("agent name",$language) ?> &nbsp;&nbsp;</TH>
        <TH align=center>&nbsp;&nbsp; <?= il8("active",$language) ?> &nbsp;&nbsp;</TH>
        <TH NOWRAP align=center>&nbsp;&nbsp;<i class='fa fa-sort-numeric-asc'></i> <?= il8("level",$language) ?> &nbsp;&nbsp;</TH>
        <TH NOWRAP align=center>&nbsp;&nbsp;<?= il8("masteragent",$language) ?>&nbsp;&nbsp;</TH>
        <TH align=right>&nbsp;&nbsp;<?= il8("balance",$language) ?>&nbsp;&nbsp;</TH>
    </tr>

<?php 
    $pair = 0;
    foreach ($data->{'data'} as $subagent) 
    {
        $styleClass = 'offering_nounXB';
        if ($pair % 2 == 0) {
            $styleClass = 'offering_pairXB';
        }
?>
        <tr class="<?=$styleClass?>" style="cursor:pointer"  onmouseover="MouseEncima(this);" onmouseout="MouseAfuera(this);"  onclick="chg(this.rowIndex);setAgentForm(<?=$subagent->{'agentID'}?>,false)">
            <td align=center nowrap>&nbsp;<?= $subagent->{'loginName'} ?>&nbsp;</td>
            <td align=center nowrap>&nbsp;<?= $subagent->{'Name'} ?>&nbsp;</td>
            <td align=center nowrap>&nbsp;<?= $subagent->{'active'} ?>&nbsp;</td>
            <td align=center nowrap>&nbsp;<?= $subagent->{'level'} ?>&nbsp;</td>
            <td align=center nowrap>&nbsp;<?= $subagent->{'masterAgentName'} ?>&nbsp;</td>
            <td align=right nowrap>&nbsp;<?= $subagent->{'balance'} ?>&nbsp;</td>
        </tr>
<?php
        $pair++;   
    }
?>      

</TABLE><BR>

<?php }
    else { 
?>
    <h3>No sub agents for <?=$agent->{'Name'} </h3>
<?php } ?>