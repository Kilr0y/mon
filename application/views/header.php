<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="<?=isset($description) ? $description : '' ?>" />
    <meta name="author" content="monova.org" />
    <link rel="shortcut icon" href="data:image/png;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAAD18/EOnYJppXVUNPdxUDD/cE4u/25MK/9sSin/a0gn/2lGJf9nRCP/ZkIh/2RAHv9iPhz/ZUMg95uBZ6X18/EOnoVsoYdvWf+Nemj/iHVi/4RvXP+BbFr/e2RQ/3ZfSv9xWkT/bVZB/2hPOP9kSjL/X0Qs/1o/Jv9ZOx//nIJpo3FNKfWNb1H/qZJ7/6mSfP9+XT3/dlc6/6iRe/+pkXv/qZN8/25NLv92VDP/qZJ8/6mSe/+eg2r/Xj4f/2VDIfd2UzL/s56K////////////moBn/4VnSv////////////////+Qc1j/g2VI////////////4trS/2FBI/9iPh3/fl4//6SMdf///////////5+Gbf+dhGv/////////////////vaya/3tYN////////////+Lb0/9kRSf/ZEEf/4JjRv+cgmn///////////+mjnf/u6mX/////////////////+zn4v90Tyv////////////k3db/Z0gr/2ZDIv+EZkn/l3xi////////////rpmE/9vSyP//////////////////////i2xN////////////5+Ha/2pLLv9oRST/h2lM/5N3Xf///////////7qnlf/5+Pb//////+jh2/////7//////6+Zhf/+/v7//////+vm4P9sTTD/aUcm/4lsT/+QdFn////////////d1Mv////////////Ftqf/6+bh///////OwbT//fz8///////v6+b/bk8y/2tJKf+Mb1P/kXZc//z7+v///////Pz7////////////qpR+/7+unf//////7urm//v6+f//////8/Dt/3BRM/9tSyv/jnJW/5mAZ//08e7//////////////////////5B0Wf+TeF3///////////////7///////j29P9yUjT/b04u/5F1Wf+jjXf/6uXf//////////////////f18/+FaU3/hWlO//Ds6P/////////////////8+/r/dVU3/3FQMP+TeF3/rpuI/+La0v/////////////////YzsT/mIFs/56Mev/BsKD//////////////////v79/3laPP9zUjL/lHhc87qqmv+qlH7/v66d/7+unf+/rp3/noRr/6ubi/+0qZ7/jW9R/7+unv+/rp3/v66d/8Cvnv95WTv/eFc49aOLc5zDtab/yb2x/8S3qv+/saT/uaqc/7OjlP/Bt67/vbOp/6eWhv+ei3n/mYVy/5R/bP+Qemb/g2lQ/6CHb5/39vQKo4tzm45xU/CNcFP6i25Q+olrTvqHaUv6hWZI+oJkRfqBYkL6f19B+n1dPvp7Wjv6fFs88KGIcJz49vQKgAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgAEAAA=="/>

    <title><?php echo $title ?></title>

    <link href="<?php echo site_url()?>css/bootstrap.min.css" rel="stylesheet" /> 
    <link href="<?php echo site_url()?>css/stars.css" rel="stylesheet" /> 
    <link href="<?php echo site_url()?>css/style.css" rel="stylesheet" /> 
    <link href="<?php echo site_url()?>css/details.css" rel="stylesheet"/>
    <link href="<?php echo site_url()?>css/jquery.fancybox.css" rel="stylesheet" />
    
    <script>
        var base_uri = "<?php echo site_url()?>";
        var user_login = <?=$this->session->userdata('user_login') ? '"' . $this->session->userdata('user_login') . '"' : 'FALSE' ?>;
    </script>
    <script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>
  </head>

  <body role="document"> 

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?=site_url()?>" title="Home" class="visible-xs-block " style="float: left; margin: 3px 0 0 15px;">
            <img class="top-logo" src="<?=site_url()?>img/logo.png" />
          </a> 
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
                <a href="<?=site_url()?>" title="Home" class="visible-sm-block visible-md-block visible-lg-block"><img class="top-logo" src="<?=site_url()?>img/logo.png" /></a> 
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
                        <li><a href="<?=site_url('adult')?>"><i class="fa fa-venus-mars fa-lg"></i>&nbsp;Adult</a></li>
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
            <li><a href="#" class="lightbox_button" data-name="upload"><i class="fa fa-upload fa-lg"></i>&nbsp;&nbsp;Upload</a></li>
            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <i class="fa fa-users fa-lg"></i>&nbsp;&nbsp;Community
                </a>
                <ul class="dropdown-menu community-menu" role="menu">
                    <li><a href="<?=base_url('forum')?>"><i class="fa fa-comments-o fa-lg"></i>&nbsp;&nbsp;Forum</a></li>
                    <li><a href="#"><i class="fa fa-pencil fa-lg"></i>&nbsp;&nbsp;Blog</a></li>
                    <li><a href="#"><i class="fa fa-question fa-lg"></i>&nbsp;&nbsp;FAQ</a></li>                                           
                </ul>
            </li>
            
            <li><a class="lightbox_button" data-name="socials" href="#"><i class="fa fa-thumbs-o-up fa-lg"></i>&nbsp;&nbsp;Socials</a></li>

              <?php if ($this->session->userdata('user_id')): ?>
                  <li><a href="<?=base_url('feedback')?>"><i class="fa fa-thumbs-o-up fa-lg"></i>&nbsp;&nbsp;Feedback</a></li>
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          <i class="fa fa-user fa-lg"></i>&nbsp;&nbsp;<?=$this->session->userdata('user_login')?>
                      </a>
                      <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Profile</a></li>
                          <li><a href="<?=site_url('bookmarks')?>">My Bookmarks</a></li>
                          <li><a href="#">Settings</a></li>
                          <li><a href="#">My Uploads</a></li>
                          <li class="divider"></li>
                          <li><a href="#" id="logout-submit">Logout</a></li>                        
                      </ul>
                   </li>
              <?php else: ?>
                  <li><a class="lightbox_button" data-name="login" href="#contact"><i class="fa fa-sign-in fa-lg"></i>&nbsp;&nbsp;Login</a></li>
              <?php endif ?>

          </ul>
          
          
        </div><!--/.nav-collapse -->
      </div>      
    </nav>
    
    <div class="main-container container theme-showcase <?=$page_class?>" role="main">
    
    <?php include('cloud_tags.php') ?>
    
