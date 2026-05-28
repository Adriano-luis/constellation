<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constallation Test</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/home.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/footer.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/login.css">
</head>
<body>
    <?php $this->loadViewInTemplate('header'); ?>
    <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    <?php $this->loadViewInTemplate('footer'); ?>
</body>
</html>