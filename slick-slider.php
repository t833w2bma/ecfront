<?php
$dir = './slider';
$dirName = realpath($dir) ;//フルパス
$url = '/wordpress/wp-content/themes/storefront';
    // ディレクトリからディレクトリ・ファイル名を昇順で取得します。
$fileArrayAsc = scandir($dirName);
?>
<link rel="stylesheet" href="<?=$url?>/slick/slick.css" media="screen" />
<link rel="stylesheet" href="<?=$url?>/slick/slick-theme.css" media="screen" />
<style>
img { max-width: 100%;}
.multiple-item,.multiple-item-2{padding:0;list-style-type:none;margin:1px 0}
.slick-slide { height: auto;}
.slick-track { line-height: 1;}
</style>


<ul class="multiple-item">
  <?php 
  $item = '';
  foreach ($fileArrayAsc as $key => $file) 
    if(preg_match('/(.jpg)/', $file))
      $item .= "<li class='slick'><img src='$url/slider/$file' alt=''></li>";
      echo $item;
      ?>
</ul>


<ul class="multiple-item-2">
  <?php 

shuffle($fileArrayAsc);
$item2 = '';
  foreach ($fileArrayAsc as $key => $file) 
    if(preg_match('/(.jpg)/', $file))
      $item2 .=  "<li class='slick'><img src='$url/slider/$file' alt=''></li>";
      echo $item2.$item;
  ?>
</ul>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="<?=$url?>/slick/slick.js"></script>   
<script>
jQuery(function() {
    jQuery('.multiple-item').slick({
          infinite: true,
          autoplay:true,
          arrows:false,
          slidesToShow: 4,
          slidesToScroll: 1,
          responsive: [{
               breakpoint: 768,
                    settings: {
                         slidesToShow: 3,
                         slidesToScroll: 1,
               }
          },{
               breakpoint: 480,
                    settings: {
                         slidesToShow: 2,
                         slidesToScroll: 1,
                    }
               }
          ]
     });

    jQuery('.multiple-item-2').slick({
          infinite: true,
          autoplay:true,
          arrows:false,
          slidesToShow: 8,
          slidesToScroll: 2,
     });
});
</script>
 