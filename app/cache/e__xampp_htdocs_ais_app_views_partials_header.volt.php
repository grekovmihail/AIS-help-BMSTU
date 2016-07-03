<!DOCTYPE html>
<html>
    <head>
    <body>

    <?php if (isset($_SESSION['auth'])) { ?>    
        <header>
     <form action="search.php" method="post">
     <div class="navbar">
        <div class="navbar-inner">
        <a class="brand" href="<?php echo $this->url->get('/'); ?>">АИС</a>
         <ul class="nav nav-tabs">
        <ul class="nav">
        <li><a href="<?php echo $this->url->get('bd_marshrut/new'); ?>"> Маршруты  </a></li>
        <li><a href="<?php echo $this->url->get('bdresurss/new'); ?>"> Редактирование ресурсов </a></li>
        <li><a href="<?php echo $this->url->get('bdresurss/index'); ?>"> Просмотр ресурсов </a></li>
       

        </ul>
        </div>
       </div>


            <!-- end navigation-block -->
        </header>
  <?php } ?>