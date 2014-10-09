<script src="resources/js/vendor/jquery.js"></script>
<script src="resources/js/foundation.min.js"></script>

<?php

for($i=0;$i<sizeof($js_array);$i++)
{
    echo '<script src="resources/js/modules/'.$js_array[$i].'.js"></script>';
}

?>

<script>
    $(document).foundation();
</script>
</body>
</html>