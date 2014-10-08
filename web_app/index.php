<?php

require 'include/dbhelper.inc.php';
require 'include/application_top.php';
require 'include/application_header.php';
?>
<form action="index.php" method="post" style="margin-top: 100px; margin-bottom: 110px;">
    <div class="row">
        <div class="large-7 small-11 columns login-box large-centered small-centered">
            <h3 id="title-login">Upload the Sqlite 3 Database</h3>
            <hr />
            <div class="row" id="loading-div" style="display:none;min-height:200px;padding-top:50px;">
                <div class="large-3 columns large-centered small-4 small-centered">
                    <img src="resources/img/common/ajax-loader.gif"/>
                </div>
            </div>
            <div class="row" id="login-div">
                <div class="large-2 hide-for-small columns">
                    <label class="right inline">Email</label>
                    <label class="right inline">Password</label> </div>
                <div class="large-8 columns">
                    <input name="email" placeholder="utopiadevelopers@gmail.com" type="text" />
                    <input name="password" placeholder="password" type="password" />
                </div>
                <div class="large-2 columns">
                </div>
            </div>
            <div class="row" id="sign-button-div">
                <div class="large-offset-2 large-2 columns">
                    <button class="button secondary tiny login-button">Sign In</button>
                </div>
                <div class="large-8 columns" style="margin-top: 10px;">
                    <a class="left inline" href="#"><!-- Forget Your Password? --></a>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
require 'include/application_footer.php';
require 'include/application_bottom.php';
?>
