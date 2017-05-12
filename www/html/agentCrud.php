<?php $CI =& get_instance();?>

<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tab_agent">Agent</a></li>
    <li><a data-toggle="tab" href="#menu1">Login</a></li>
    <li><a data-toggle="tab" href="#menu2">Whitelist IP address</a></li>
    <li><a data-toggle="tab" href="#menu3">Limits</a></li>
  </ul>
    <div class="tab-content">
        <? $CI->load->view("agentDetails"); ?>

        <div id="menu1" class="tab-pane fade">
          <h3>Menu 1</h3>
          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div id="menu2" class="tab-pane fade">
          <h3>Menu 2</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        </div>
        <div id="menu3" class="tab-pane fade">
          <h3>Menu 3</h3>
          <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
        </div>
    </div>





</div>