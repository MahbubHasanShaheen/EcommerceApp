<!--start header nav area-->

<div class="nav">
<nav class="navbar" style="border-bottom: 1px solid silver;">
   <div class="col-md-2">
    <ul class="nav navbar-nav" style="width:240px">
    <li class="dropdown" style="">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Product Category<span class="caret"></span></a>
          <ul class="dropdown-menu" style="padding-left: 5px;">
            
           <?php
            $db = new DBContext();
            $sql = " select * from category";
            foreach ($db->getData($sql) as  $value) {
             echo '<li style="padding:6px"><a href="'.appsConfig::Link('category/'.$value['id']).'">'.$value['name'].'</a></li>';
            }


            ?>

          </ul>
        </li>
    </ul>
  </div>
  <div class="col-md-10">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="background-color:brown;padding: 14px;margin-right: 6px;">
        <span class="sr-only">Toggle navigation</span>
        <span style="color: white;"  class="icon-bar">=</span>
        <span style="color:white"  class="icon-bar">=</span>
        <span style="" class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php appsConfig::URL('home')?>">Home <span class="sr-only">(current)</span></a></li>


                <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About Us<span class="caret"></span></a>
          <ul class="dropdown-menu">
            
        <li><a href="<?php appsConfig::URL('mission')?>">Our Mission</a></li>

        <li><a href="<?php appsConfig::URL('privacy')?>">Privacy & Policy</a></li>

        <li><a href="<?php appsConfig::URL('help')?>">Managment</a></li>

          </ul>
        </li>

        <!--<li class="dropdown" >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Product Category<span class="caret"></span></a>
          <ul class="dropdown-menu">
            
          <?php
            //$db = new DBContext();
            //$sql = " select * from category";
            //foreach ($db->getData($sql) as  $value) {
             //echo '<li><a href="'.appsConfig::Link('category/'.$value['id']).'">'.$value['name'].'</a></li>';
           // }


            ?>

          </ul>
        </li>-->
        <li><a href="<?php appsConfig::URL('discount')?>">Discount Gallery</a></li>
        <li><a href="<?php appsConfig::URL('offer')?>">Special Offer</a></li>
        <li><a href="<?php appsConfig::URL('newproduct')?>">New Collection</a></li>
        <li><a href="<?php appsConfig::URL('gallary')?>">Gallery</a></li>
        <li><a href="<?php appsConfig::URL('contact')?>">Contact</a></li>
   </div>
  </nav>
 </div>
</div>
    

<!--end header nav area-->

<script type="">
    $(document).ready(function() {
      // grab the initial top offset of the navigation 
        var stickyNavTop = $('.nav').offset().top;
        
        // our function that decides weather the navigation bar should have "fixed" css position or not.
        var stickyNav = function(){
          var scrollTop = $(window).scrollTop(); // our current vertical position from the top
               
          // if we've scrolled more than the navigation, change its position to fixed to stick to top,
          // otherwise change it back to relative
          if (scrollTop > stickyNavTop) { 
              $('.nav').addClass('sticky');
          } else {
              $('.nav').removeClass('sticky'); 
          }
      };

      stickyNav();
      // and run it again every time you scroll
      $(window).scroll(function() {
        stickyNav();
      });
    });
  </script>
