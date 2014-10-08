<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="resources/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="resources/img/favicon.ico" type="image/x-icon">
    <title>Expense Manager</title>
    <link rel="stylesheet" href="resources/css/foundation/foundation.css" />
    <link rel="stylesheet" href="resources/css/foundation/normalize.css" />
    <link rel="stylesheet" href="resources/css/frontend/homepage/app.css" />
    <link rel="stylesheet" href="resources/css/frontend/card/card.css" />
    <?php
    for($i=0;$i<sizeof($css_array);$i++)
    {
        echo '<link rel="stylesheet" href="resources/css/common/'.$css_array[$i].'.css" />';
    }
    ?>
</head>
<body>