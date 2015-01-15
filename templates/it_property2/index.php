<?php
// © IceTheme 2013
// GNU General Public License


defined('_JEXEC') or die;

// A code to show the offline.php page for the demo
if (JRequest::getCmd("tmpl", "index") == "offline") {
    if (is_file(JPATH_ROOT . "/templates/" . $this->template . "/offline.php")) {
        require_once(JPATH_ROOT . "/templates/" . $this->template . "/offline.php");
    } else {
        if (is_file(JPATH_ROOT . "/templates/system/offline.php")) {
            require_once(JPATH_ROOT . "/templates/system/offline.php");
        }
    }
} else {
  
// Include Variables
include_once(JPATH_ROOT . "/templates/" . $this->template . '/icetools/vars.php');

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <link href="http://fonts.googleapis.com/css?family=Goudy+Bookletter+1911" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Raleway:100" rel="stylesheet" type="text/css"

<?php if ($this->params->get('responsive_template')) { ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php } ?>
  
<jdoc:include type="head" />

  <?php
    // Include CSS and JS variables 
    include_once(JPATH_ROOT . "/templates/" . $this->template . '/icetools/css.php');
    ?>

    <link rel="stylesheet" type="text/css" href="templates/it_property2/css/jformer.css" ></link>
    <script type="text/javascript" src="/media/jui/js/jFormer.js" ></script>

</head>

<body class="<?php echo $pageclass->get('pageclass_sfx'); ?>">


<?php if ($this->params->get('styleswitcher')) { ?>
<ul id="ice-switcher">  
    <li class= "style1"><a href="templates/<?php echo $this->template;?>/css/styles/style-switcher.php?templatestyle=style1"><span>Style 1</span></a></li>  
    <li class= "style2"><a href="templates/<?php echo $this->template;?>/css/styles/style-switcher.php?templatestyle=style2"><span>Style 2</span></a></li> 
    <li class= "style3"><a href="templates/<?php echo $this->template;?>/css/styles/style-switcher.php?templatestyle=style3"><span>Style 3</span></a></li> 
    <li class= "style4"><a href="templates/<?php echo $this->template;?>/css/styles/style-switcher.php?templatestyle=style4"><span>Style 4</span></a></li> 
    <li class= "style5"><a href="templates/<?php echo $this->template;?>/css/styles/style-switcher.php?templatestyle=style5"><span>Style 5</span></a></li>  
    <li class= "style6"><a href="templates/<?php echo $this->template;?>/css/styles/style-switcher.php?templatestyle=style6"><span>Style 6</span></a></li>  
</ul> 
<?php } ?>


 
<!-- top bar --> 
<div id="topbar" class="clearfix">

    <div class="container">
        
            <?php if ($this->countModules('statistics')) { ?>
            <!-- statistics --> 
            <div id="statistics">  
                 <jdoc:include type="modules" name="statistics" />
            </div><!-- statistics --> 
            <?php } ?> 
            
                       
            <?php if 
            ($this->params->get('social_icon_fb') or  
            $this->params->get('social_icon_tw') or
            $this->params->get('googleplus') or
            $this->params->get('rss_feed') or
            $this->params->get('social_icon_yt')) 
            { ?>
            <div id="social_icons">
                <ul>
                    <?php if($this->params->get('social_icon_fb')) { ?>
                    <li class="social_facebook">
                    <a target="_blank" rel="tooltip" data-placement="bottom" title="" data-original-title="<?php echo JText::_('SOCIAL_FACEBOOK_TITLE'); ?>" href="http://www.facebook.com/<?php echo $social_fb_user; ?>"><span>Facebook</span></a>      
                    </li>        
                    <?php } ?>  
                    
                    <?php if($this->params->get('social_icon_tw')) { ?>
                    <li class="social_twitter">
                    <a target="_blank" rel="tooltip" data-placement="bottom" title="" data-original-title="<?php echo JText::_('SOCIAL_TWITTER_TITLE'); ?>" href="http://www.twitter.com/<?php echo $social_tw_user; ?>" ><span>Twitter</span></a>
                    </li>
                    <?php } ?>
                
                    <?php if($this->params->get('rss_feed')) { ?>
                    <li class="social_rss_feed">
                    <a target="_blank" rel="tooltip" data-placement="bottom" title="" data-original-title="<?php echo JText::_('SOCIAL_RSS_TITLE'); ?>" href="<?php echo $rss_feed_url; ?>"><span>RSS Feed</span></a>
                    </li>        
                    <?php } ?>
                </ul>
                
            </div>
            <?php } ?>
            
            <?php if ($this->countModules('topmenu')) { ?>
            <!-- topmenu --> 
            <div id="topmenu">
                <jdoc:include type="modules" name="topmenu" />
            </div><!-- /topmenu --> 
            <?php } ?>
            
            <?php if ($this->countModules('language')) { ?>
            <!-- language --> 
            <div id="language">  
                 <jdoc:include type="modules" name="language" />
            </div><!-- language --> 
            <?php } ?> 
                        
    </div>
    
</div><!-- /top bar --> 


<!-- header -->
<header id="header">

    <div class="container">

        <div id="logo">  
        <p><a href="<?php echo $this->baseurl ?>"><?php echo $logo; ?></a></p> 
        </div>
      
        <jdoc:include type="modules" name="mainmenu" />
        
    </div>

</header><!-- /header -->   


<!-- slideshow -->
<?php if ($this->countModules('iceslideshow')) { ?>
<div id="iceslideshow">
   
  <div class="container">
  
    <jdoc:include type="modules" name="iceslideshow" />
  
  </div>
   
</div>
<?php } ?>
<!-- /slideshow -->


<!-- iproperty search -->
<?php if ($this->countModules('ip_search')) { ?>
<div id="ip_search">

  <div class="container">
  
       <jdoc:include type="modules" name="ip_search" style="block"/>
       
  </div>
  
</div>
<?php } ?>
<!-- /iproperty search -->



    
<!-- promo --> 
<?php if ($this->countModules('promo1 + promo2 + promo3 + promo4')) { ?>
<section id="promo">

    <div class="container">
    
        <div class="row">
        
            <?php if ($this->countModules('promo1')) { ?>
            <div class="<?php echo $promospan;?> promo">  
                <jdoc:include type="modules" name="promo1" style="block" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('promo2')) { ?>
            <div class="<?php echo $promospan;?> promo">  
                <jdoc:include type="modules" name="promo2" style="block" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('promo3')) { ?>
            <div class="<?php echo $promospan;?> promo">  
                <jdoc:include type="modules" name="promo3" style="block" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('promo4')) { ?>
            <div class="<?php echo $promospan;?> promo">  
                <jdoc:include type="modules" name="promo4" style="block" />
            </div> 
            <?php } ?>
        
        </div>      
         
    </div> 
    
</section>
 <?php } ?>
<!-- /promo --> 


<!-- content -->
<section id="content">
    
    <div class="container">
    
        <div class="row">
        
            <!-- Middle Col -->
            <div id="middlecol" class="<?php echo $content_span;?>">
            
                <div class="inside">
                
                <?php if ($this->countModules('breadcrumbs')) { ?>
                   <!-- breadcrumbs -->
                <div id="breadcrumbs" class="clearfix">
                    <jdoc:include type="modules" name="breadcrumbs" />
                </div><!-- /breadcrumbs -->
                <?php } ?>            
                
                <jdoc:include type="message" />
                <jdoc:include type="component" />
                
                </div>
            
            </div><!-- / Middle Col  -->
            
            
            <?php if ($this->countModules('sidebar')) { ?>      
            <!-- sidebar -->
            <aside id="sidebar" class="span4 <?php if($this->params->get('sidebar_position') == 'left') {  echo $sidebar_left; } ?>" >
                <div class="inside">
                
                    <jdoc:include type="modules" name="sidebar" style="sidebar" />
                
                </div>
            
            </aside>
            <!-- /sidebar -->
           <?php } ?>
            
        </div>
    
    </div>

</section><!-- /content -->


<!-- bottom --> 
<?php if ($this->countModules('bottom1 + bottom2 + bottom3 + bottom4 + icecarousel')) { ?>
<section id="bottom">

    <div class="container">
      
        <?php if ($this->countModules('icecarousel')) { ?>
        <div id="icecarousel"> 
            <jdoc:include type="modules" name="icecarousel" style="slider" />
        </div>   
        <?php } ?>
    
      <?php if ($this->countModules('bottom1 + bottom2 + bottom3 + bottom4')) { ?>
        <div class="row">
        
            <?php if ($this->countModules('bottom1')) { ?>
            <div class="<?php echo $bottomspan;?>">  
                <jdoc:include type="modules" name="bottom1" style="block" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('bottom2')) { ?>
            <div class="<?php echo $bottomspan;?>">  
                <jdoc:include type="modules" name="bottom2" style="block" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('bottom3')) { ?>
            <div class="<?php echo $bottomspan;?>">  
                <jdoc:include type="modules" name="bottom3" style="block" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('bottom4')) { ?>
            <div class="<?php echo $bottomspan;?>">  
                <jdoc:include type="modules" name="bottom4" style="block" />
            </div> 
            <?php } ?>
            
        </div>  
        <?php } ?> 
    
    </div>
  
</section><!-- /bottom --> 
<?php } ?>


<!-- banner --> 
<?php if ($this->countModules('banner1 + banner2 + banner3')) { ?>
<section id="banner">

    <div class="container">
    
        <div class="row">
        
            <?php if ($this->countModules('banner1')) { ?>
            <div class="<?php echo $bannerspan;?> banner">  
                <jdoc:include type="modules" name="banner1" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('banner2')) { ?>
            <div class="<?php echo $bannerspan;?> banner">  
                <jdoc:include type="modules" name="banner2" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('banner3')) { ?>
            <div class="<?php echo $bannerspan;?> banner">  
                <jdoc:include type="modules" name="banner3" />
            </div> 
            <?php } ?>
        
        </div>      
         
    </div> 
    
</section>
 <?php } ?>
<!-- /banner --> 

    
<!-- Message -->
<?php if ($this->countModules('message')) { ?>
<section id="message">

    <div class="message_wraper">
    
        <div class="container">
        
            <jdoc:include type="modules" name="message" />
            
        </div>
     
    </div>
        
</section><!-- /message --> 
<?php } ?>
    
        
    
<!-- footer --> 

<footer id="footer">

    <div class="container">
      
        <?php if ($this->countModules('footer1 + footer2 + footer3 + footer4')) { ?>
        <div class="row">
        
            <?php if ($this->countModules('footer1')) { ?>
            <div class="<?php echo $footerspan;?>">  
            <jdoc:include type="modules" name="footer1" style="block" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('footer2')) { ?>
            <div class="<?php echo $footerspan;?>">  
            <jdoc:include type="modules" name="footer2" style="block" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('footer3')) { ?>
            <div class="<?php echo $footerspan;?>">  
            <jdoc:include type="modules" name="footer3" style="block" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('footer4')) { ?>
            <div class="<?php echo $footerspan;?>">  
            <jdoc:include type="modules" name="footer4" style="block" />
            </div> 
            <?php } ?>
        
        </div> 
        <?php } ?> 
                
        <!-- copyright -->    
        <div id="copyright_area" class="clearfix">  
        
            <?php if ($this->countModules('copyrightmenu')) { ?>
            <div id="copyrightmenu">
            <jdoc:include type="modules" name="copyrightmenu" />
            <jdoc:include type="modules" name="mainmenu" />
            </div>
            <?php } ?>
           
          <img style="float:left; margin-right:20px;" height="55px" width="55px" src="http://propertymanagement.io/images/equalhousing.png">
            
            <p id="copyright">
            &copy; <?php echo date('Y');?> <?php echo $sitename; ?> 
            </p>
            
            <?php if($this->params->get('icelogo')) { ?>
          <p id="icelogo">
          <a href="#" target="_blank" title="Equal Housing Opportunity"></a></p>
            <?php } ?> 
                
            <?php if ($this->params->get('go2top')) { ?>
            <a href="#" class="scrollup" style="display: inline; "><?php echo JText::_('TPL_TPL_FIELD_SCROLL'); ?></a>
            <?php } ?>  
        </div><!-- copyright -->  
        
    
    </div>
   
</footer><!-- /footer --> 

 
    
<?php if ($this->params->get('styleswitcher')) { ?> 
<script type="text/javascript">  
jQuery.fn.styleSwitcher = function(){
  $(this).click(function(){
    loadStyleSheet(this);
    return false;
  });
  function loadStyleSheet(obj) {
    $('body').append('<div id="overlay" />');
    $('body').css({height:'100%'});
    $('#overlay')
      .fadeIn(500,function(){
        /* change the default style */
        $.get( obj.href+'&js',function(data){
          $('#stylesheet').attr('href','<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/styles/' + data + '.css');
          cssDummy.check(function(){
            $('#overlay').fadeOut(1000,function(){
              $(this).remove();
            });  
          });
        });
        /* change the responsive style */
        $.get( obj.href+'&js',function(data){
          $('#stylesheet-responsive').attr('href','<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/styles/' + data + '_responsive.css');
          
          cssDummy.check(function(){
            $('#overlay').fadeOut(1000,function(){
              $(this).remove();
            });  
          });
        });
      });
  }
  var cssDummy = {
    init: function(){
      $('<div id="dummy-element" style="display:none" />').appendTo('body');
    },
    check: function(callback) {
      if ($('#dummy-element').width()==2) callback();
      else setTimeout(function(){cssDummy.check(callback)}, 200);
    }
  }
  cssDummy.init();
}
  $('.ice-template-style a').styleSwitcher(); 
  $('#ice-switcher a').styleSwitcher(); 
</script>  
<?php } ?>

<?php if ($this->params->get('google_analytics')) { ?>
<!-- Google Analytics -->  
<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', '<?php echo $this->params->get('analytics_code');; ?>']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script>
<!-- Google Analytics -->  
<?php } ?>

</body>
</html>
<?php } ?>
