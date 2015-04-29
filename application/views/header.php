<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="<?=isset($description) ? $description : '' ?>" />
    <meta name="author" content="monova.org" />
    <!--link rel="icon" href="favicon.ico"-->

    <title><?php echo $title ?></title>

    <link href="<?php echo site_url()?>css/bootstrap.min.css" rel="stylesheet" /> 
    <link href="<?php echo site_url()?>css/stars.css" rel="stylesheet" /> 
    <link href="<?php echo site_url()?>css/style.css" rel="stylesheet" /> 
    <link href="<?php echo site_url()?>css/details.css" rel="stylesheet"/>
    
    <script>
        var base_uri = "<?php echo site_url()?>";
    </script>
  </head>

  <body role="document"> 

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left navbar-logo">
              <li>
                <a href="<?=site_url()?>" title="Home"><img class="top-logo" src="<?=site_url()?>img/logo.png" /></a> 
              </li>  
          </ul>
          <?php if ($page != 'index') : ?>       
          <form action="<?php echo site_url('search')?>" class="navbar-form navbar-left">
              <div class="input-group">
                <input type="text" name="term" class="form-control autocomplete" />
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                </div>
              </div>
          </form>
          <?php endif ?>
        
          <ul class="nav navbar-nav navbar-right">            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-list-ul fa-lg"></i>&nbsp;&nbsp;Browse</a>
              <ul class="dropdown-menu multi-column columns-2" role="menu">
                  <div class="nav-column">
                    <ul class="multi-column-dropdown">
                        <li><a href="<?=site_url('latest')?>"><i class="fa fa-clock-o fa-lg"></i>&nbsp;Latest</a></li>
                        <li><a href="<?=site_url('movies')?>"><i class="fa fa-video-camera fa-lg"></i>&nbsp;Movies</a></li>                        
                        <li><a href="<?=$this->config->item('adult_base_url')?>"><i class="fa fa-venus-mars fa-lg"></i>&nbsp;Adult</a></li>
                        <li><a href="<?=site_url('books')?>"><i class="fa fa-book fa-lg"></i>&nbsp;Books</a></li>
                        <li><a href="<?=site_url('games')?>"><i class="fa fa-gamepad fa-lg"></i>&nbsp;Games</a></li>                
                        <li><a href="<?=site_url('anime')?>"><i class="fa fa-video-camera fa-lg"></i>&nbsp;Anime</a></li>
                    </ul>
                  </div>
                  <div class="nav-column">
                    <ul class="multi-column-dropdown">
                      <li><a href="<?=site_url('hot')?>"><i class="fa fa-fire fa-lg"></i>&nbsp;Hot</a></li>
                      <li><a href="<?=site_url('tv')?>"><i class="fa fa-video-camera fa-lg"></i>&nbsp;TV</a></li>
                      <li><a href="<?=site_url('music')?>"><i class="fa fa-music fa-lg"></i>&nbsp;Music</a></li>
                      <li><a href="<?=site_url('software')?>"><i class="fa fa-cog fa-lg"></i>&nbsp;Software</a></li>
                      <li><a href="<?=site_url('pictures')?>"><i class="fa fa-photo fa-lg"></i>&nbsp;Pictures</a></li>
                      <li><a href="<?=site_url('other')?>"><i class="fa fa-list fa-lg"></i>&nbsp;Others</a></li>                      
                    </ul>
                  </div>  
                    
              </ul>
            </li>
            <li><a href="#contact"><i class="fa fa-upload fa-lg"></i>&nbsp;&nbsp;Upload</a></li>
            <li><a href="#contact"><i class="fa fa-comments-o fa-lg"></i>&nbsp;&nbsp;Community</a></li>
            <li><a href="#contact"><i class="fa fa-question fa-lg"></i>&nbsp;&nbsp;FAQ</a></li>
              <?php if ($this->session->userdata('user_id')): ?>
                  <li><a class="lightbox_button" data-name="feedback" href="#"><i class="fa fa-thumbs-o-up fa-lg"></i>&nbsp;&nbsp;Feedback</a></li>
                  <li><a href="#"><i class="fa fa-user fa-lg"></i>&nbsp;&nbsp;<?=$this->session->userdata('user_login')?></a></li>
              <?php else: ?>
                  <li><a class="lightbox_button" data-name="login" href="#contact"><i class="fa fa-sign-in fa-lg"></i>&nbsp;&nbsp;Login</a></li>
              <?php endif ?>

          </ul>
          
          
        </div><!--/.nav-collapse -->
      </div>      
    </nav>
    
    <div class="main-container container theme-showcase <?=$page_class?>" role="main">
    
    <?php include('cloud_tags.php') ?>
    
