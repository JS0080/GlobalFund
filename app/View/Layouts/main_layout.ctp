<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
    <?php echo $this->Html->css('bootstrap.min.css'); ?>
    <?php echo $this->Html->css('style.css'); ?>
    
 
    
    <?php echo $this->Html->script('bootstrap.min.js'); ?>
    <?php echo $this->Html->script('ie10-viewport-bug-workaround.js'); ?>
  

</head>
<body>

 
<div class="container wrap">

    <div class="row">
        <?php echo $this->element('header'); ?>
        
        <?php echo $content_for_layout; ?> 
    </div>
    <?php echo $this->element('footer'); ?>
