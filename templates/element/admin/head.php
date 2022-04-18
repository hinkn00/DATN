<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $this->Html->meta('csrfToken',$this->request->getAttribute('csrfToken'));?>
    <title>
        <?= 'Admin'?>:
        <?= isset($title) ? $title : $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">    
    <?= $this->Html->css(['bootstrap.min','font-awesome.min','admin/main','admin/jquery-ui.css'])?>
    <?= $this->Html->script(['jquery.min','admin/jquery-ui'])?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>