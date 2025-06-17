<?php

/**
 * @var $errno \core\ErrorHandler
 * @var $errstr \core\ErrorHandler
 * @var $errfile \core\ErrorHandler
 * @var $errline \core\ErrorHandler
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Errors</title>
</head>
<body>
<div style="margin: 10px; padding: 10px;">
    <h1>Error</h1>
    <p><strong>Error Code:</strong> <?php echo $errno; ?></p>
    <p><strong>Error Message:</strong> <?php echo $errstr; ?></p>
    <p><strong>Error File:</strong> <?php echo $errfile; ?></p>
    <p><strong>Error Line:</strong> <?php echo $errline; ?></p>
    <p><a href="<?php echo HOME ?>">Home</a></p>
</div>
</body>
</html>
