<?php

require 'include/application_includes.php';
require 'include/application_top.php';
require 'include/application_header.php';

$js_array = array('dropzone');
?>
<div style="margin-top: 100px; margin-bottom: 110px;">
    <div class="row">
        <div class="large-7 small-11 columns login-box large-centered small-centered">
            <h3 id="title-login">Upload the Sqlite 3 Database</h3>
            <hr />
            <form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form>
        </div>
    </div>
</div>
<?php
require 'include/application_footer.php';
require 'include/application_bottom.php';
?>
