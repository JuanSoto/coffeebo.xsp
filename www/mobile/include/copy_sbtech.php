<? $CI =& get_instance(); ?>

<!--풋터시작-->

<div class="footer_sns">
    <ul>
        <li>
            <a href="/">
                <img src="/asset/mobile/images/foot-ico01.png" alt="home">
                <p>메인</p>
            </a>
        </li>
        <li id="betslip_icon">
            <a href="#" onclick="sbtech_betslip()">
                <img src="/asset/mobile/images/betslip.png" alt="cs center">
                <p>bet slip</p>
            </a>
            <div class="alertNumber" id="betslip_count">0</div>
        </li>
        <li>
            <a href="#" onclick="sbtech_history()">
                <img src="/asset/mobile/images/bethis.png" alt="mypage">
                <p>history</p>
            </a>
        </li>
        <li>
            <a href="#" onclick="sbtech_settings()">
                <img src="/asset/mobile/images/setting.png" alt="mypage">
                <p>settings</p>
            </a>
        </li>
        <li>
            <a href="#" onclick="sbtech_rules()">
                <img src="/asset/mobile/images/betrule.png" alt="mypage">
                <p>rules</p>
            </a>
        </li>
    </ul>

</div>
    <!--풋터 끝-->
</div>

<!-- 동적 모달 -->
<div id="ajaxLayer" style="display:none"></div>
<!-- 동적 모달 -->
<iframe name="wHidden" id="wHidden"  src="" style="width:500px;height:500px;display:none"></iframe>

<script language="javascript">
    $(window).load(function() {
        $("#containDiv").show();
        $.modal.close();
    });
</script>
    

</body>
</html>