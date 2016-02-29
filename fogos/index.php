<?php 
error_reporting (E_ALL ^ E_NOTICE);

require_once('DB/dbConnection.php');
$connection=databaseConnection();


$restaurantID=3;
$restaurantEatnowID=349;



?>

<!doctype html>
<html lang="en">
<head>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


        <?php 
         $query = "SELECT DISTINCT title, metaDescription, analytics_code from metaTag, resDetails where metaTag.resID = '$restaurantID' and resDetails.statusID=1 ";
            $result = mysql_query($query);

                while($row=mysql_fetch_array($result)){
                    extract($row);
                    echo("

                        <title>$title</title>
                        <meta name='Description' content='$metaDescription'>
                        $analytics_code
                        ");
                }

        ?>
<!--  FAVICON  -->
<link rel="shortcut icon" href="http://restaurants.eatnow.ie/favicon.ico" />
<!--  //FAVICON  -->

<!--  JQUERY CSS  -->
<link rel="stylesheet" type="text/css" href="http://restaurants.eatnow.ie/style/jquery/magnific-popup.css" />
<!--  //JQUERY CSS  -->

<!--  ANIMATE CSS  -->
<link rel="stylesheet" type="text/css" href="http://restaurants.eatnow.ie/style/animate/animate.css" />
<!--  //ANIMATE CSS  -->

<!--  FONTS  -->
<link href='http://fonts.googleapis.com/css?family=Bad+Script' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Merriweather:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="http://restaurants.eatnow.ie/style/font-awesome.min.css" />
<!--  //FONTS  -->

<!--  CSS  -->
<link rel="stylesheet" type="text/css" href="http://restaurants.eatnow.ie/style/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="http://restaurants.eatnow.ie/style/switch.color.css" />
<link rel="stylesheet" type="text/css" href="style.css" />
<!--  //CSS  -->

<!-- meta tag -->
<link href="https://www.eatnow.ie" rel="canonical" />
<meta property="og:url" content="https://www.eatnow.ie" />
<meta property="og:title" content="Order Takeaway from Local Restaurant Delivery Menus | eatnow.ie" />
<meta property="og:site_name" content="Eatnow" />
<!-- //meta tag -->
        


<!--  THEMES COLOR STYLE  -->



</head>
    

    <?php 
        echo ("<body style='background-color:");
         $query = "SELECT  DISTINCT bgColor, statusID from colors, resDetails where colors.resID = '$restaurantID' and resDetails.statusID = 1 ";
         $result = mysql_query($query);

            while($row=mysql_fetch_array($result)){
                extract($row);
                    echo("$bgColor");
                   

            }
        ?>
    '>
       <!--for metaTag-->
        


    
    <!--  PRELOADER  -->
    <img id="preloader" alt="" src="http://restaurants.eatnow.ie/images/preloader/preloader.GIF">
    <!--  //PRELOADER  -->

    <div class="page-wrapper">
    </div>





        <!--  HEADER  -->
        <?php 
        echo ("<header id='header' class='header' style='background-color:");
         $query = "SELECT  DISTINCT headerColor, statusID from colors, resDetails where colors.resID = '$restaurantID' and resDetails.statusID = 1 ";
         $result = mysql_query($query);

            while($row=mysql_fetch_array($result)){
                extract($row);
                    echo("$headerColor");
                   

            }
            echo("'>");
        ?>
    
        
            <div class="container">
                <!--  LOGO  -->
            <?php
                $query = "SELECT logoURL, statusID, resDetails.resID from logoRest, resDetails where resDetails.resID=logoRest.resID and logoRest.resID = '$restaurantID' and resDetails.statusID=1 ";
                $result = mysql_query($query);

                while($row=mysql_fetch_array($result)){
                    extract($row);
                    echo("<a class='logo pull-left slide-page' href='#home'>$logoURL</a>");

                }
            ?>
                
                <!--  //LOGO  -->

                <!--  MENU  -->

                <em id="mobileMenu" class="glyph fa-bars mobile-menu"></em>
                <nav id="mainNavi" class="main-navi pull-right">
                <?php 
                $query = "SELECT * from restNav where resID = '$restaurantID' ";
                $result = mysql_query($query);
                while($row=mysql_fetch_array($result)){
                    extract($row);
                    echo("<a href='index.php#$navTitle'>".$navTitle."</a>");

                }
                echo("<a href='https://www.eatnow.ie/restaurantDetails.php?resid=349&resname=fogos-pizza#tabs|Tabs_Group:details_menu'> <font color='red'> Order Online </font> </a>");

                ?>
                    
                </nav> 
                <!--  //MENU  -->
            </div>            
        </header>
        <!--  //HEADER  -->

        <!--for colors-->
        
        
        <section id="home" class="home">
            <!--  HOME  -->
            
            <!--  TOP SLIDER  -->
            <div class="flexslider">
                <ul class="slides">
                        
                <?php //for home page

                $query = "SELECT resName, smallTitle, bigTitle, description, buttonHover1, buttonHover2, bgImage, statusID from resDetails,home where home.resID =resDetails.resID and resDetails.resID='$restaurantID' and resDetails.statusID=1 " ;
                $result = mysql_query($query);
                while($row=mysql_fetch_array($result)){
                    extract($row);
                    echo(" <li>
                    <div class='slider-text-wrapper first'>");
                    echo("
                        <div class='slider-logo'>$resName</div>
                        <div class='middle'>$smallTitle</div>
                        <div class='big'>$bigTitle</div>
                        <div class='dot'></div>
                        <p>$description</p>
                        <a class='button slide-page' href='https://www.eatnow.ie/restaurantDetails.php?resid=349&resname=fogos-pizza#tabs|Tabs_Group:details_menu'>
                        <span>$buttonHover1</span>
                        <span>$buttonHover2</span>
                        </a>
                        </div>
                        <img class='parallax' src='http://restaurants.eatnow.ie/$bgImage' alt=''>
                        </li>


                        ");
                }
                ?>
                    
                            
                            
                    
                </ul>
            </div>

            <img class="scroll-image" src="http://restaurants.eatnow.ie/images/icons/scroll.png" alt="">
            <!--  //TOP SLIDER  -->
        </section>
        <!--  //HOME  -->

        <!--  RESTAURANT  -->
        
    <?php
            echo ("<section id='about' class='restuarant animate' style='background-color:");  
 $query = "SELECT DISTINCT aboutResColor, statusID from colors, resDetails where colors.resID ='$restaurantID' and resDetails.statusID = 1 ";
         $result = mysql_query($query);

            while($row=mysql_fetch_array($result)){
                extract($row);
                    echo("$aboutResColor");
                   

            } 
                                
            ?>
'>
     
       


        
            <div class="container">
                <div class="title">
                    
                 
                 <?php //for about Us

                    $query = "SELECT resName, welcome, image1, image2, story, storyDetails, chef, chefDetails, abtbgImage, statusID FROM aboutUs,resDetails WHERE aboutUs.resID = resDetails.resID AND resDetails.resID = '$restaurantID' and resDetails.statusID=1 ";
                    $result = mysql_query($query);
                    while($row=mysql_fetch_array($result)){
                    extract($row);
                    echo(" <div>about restaurant</div>
                        $welcome$resName
                        </div>

                        ");
                    }


                ?>
        
                
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 restaurant-block">
                        <img src="<?php echo "http://restaurants.eatnow.ie/".$image2; ?>" align="middle">
                        <div class="block-title"><?php echo $story ;?></div>
                            <div class="dot"></div>
                        <p class="mini"><?php echo $storyDetails ;?></p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 restaurant-block">
                        <img src="<?php echo "http://restaurants.eatnow.ie/".$image1; ?>" align="top">
                        <div class="block-title"><?php echo $chef; ?></div>
                        <div class="dot"></div>
                        <p class="mini"><?php echo $chefDetails; ?></p>
                    </div>
                </div>
            </div>

 <style>
body {
    background-image: url("http://restaurants.eatnow.ie/images/about/bg.jpg");
}
</style>
            
        </section>
        <!--  //RESTAURANT  -->

        <!--  for MENU  --> 
        <section id="menu" class="menu animate">
            <div class="clearfix">
          

                <?php 

               
                require_once('EatnowDB/dbConnection.php');
                $connectionEatnow=databaseConnectionEatnow();

                $queryEatnow = "SELECT maincatename,maincateid from rt_category_main where restaurant_id = '$restaurantEatnowID'";
                $resultEatnow = mysql_query($queryEatnow);
                $num_rows = mysql_num_rows($resultEatnow);
                                
                while($rowEatnow=mysql_fetch_array($resultEatnow)){
                    extract($rowEatnow);
                    /*getting menu names inside category */
                    $queryMenu = "SELECT menu_name, menu_price, menu_description FROM rt_restaurant_menu WHERE menu_category = '$maincateid'";
		            $resultMenu = mysql_query($queryMenu);
                                               
                    

                    echo("
                        <div class='col-lg-2 col-md-2 col-sm-2 menu-block' align='center' style='border-right:2px dotted #2E0700;border-top:2px dotted #2E0700;background: rgba(0,0,0,0.3);'>
                            <img src= 'http://restaurants.eatnow.ie/images/Blank.png' border='2px' alt=''>
                            <div>
                            
                                <div class='position'>
                                    <em class='glyph $icons'></em>
                                    <!-- <a href='http://www.eatnow.ie/restaurantDetails.php?resid=349&resname=fogos-pizza#tabs|Tabs_Group:details_menu'> -->
                                  
                                    <span>$maincatename</span>
                                   <br> <br> <br> <br>
                                   <p class='food-details'> <table style='width:100%'>
                                                <tr>
                                                    <th>Description</th> 
                                                    <th>Price</th>
                                                </tr>");
                             while($rowMenu=mysql_fetch_array($resultMenu)){
                                extract($rowMenu);

                                /*
                                if(empty($menu_description)){
                                     echo (" <tr>
                                                <td>'$menu_name'</td>
                                                <td>'$menu_price'</td> 
                                              </tr>");    
                                            

                               } else{
                                    echo (" <tr>
                                                <td>'$menu_name' : <em>'$menu_description' </em></td>
                                                <td>'$menu_price'</td> 
                                              </tr>");    
                                              }
                                            echo ("</table> </p>    
                                                </div>

                                            </div>
                                        </div>  
                                        ");



                                }


                             */
                                echo (" <tr>
                                                <td>'$menu_name' : <em>'$menu_description' </em></td>
                                                <td>'$menu_price'</td> 
                                              </tr>");    
                                              }
                                            echo ("</table> </p>    
                                                </div>

                                            </div>
                                        </div>  
                                        ");
                            }
                                
                    
                
                
mysql_close($connectionEatnow);
        ?>

                
                
            <!--
            <div class="clearfix">
            -->
            <?php

            //if($num_rows>8){
             //  echo ("
            //   <a class='more-food' href='index.php'>
            //    <em class='glyph fa-repeat'></em>
            //    <span>show other dishes</span>
           // </a>

           //    "); 
           // }
            //else{

          //  }
            
            ?>
        </div>
            
        </section>
        <!--  //MENU  -->

        <!--  MENU POPUP  -->

        <section id="popup" class="popup">
            <div class="clearfix">
                <article class="col-lg-3 col-md-3 col-sm-3">
                </article>
                <article class="col-lg-6 col-md-6 col-sm-6">
                    <div class="details-wrapper">
                        <div class="position">
                            <em class="glyph fa-pagelines"></em>
                            <span></span>
                        </div>
                        <p class="food-details mini"></p>
                    </div>
                     
                </article>
                <article class="col-lg-3 col-md-3 col-sm-3">
                </article>
                <a href="index.html" class="button glyph prev fa-angle-left"></a>
                <a href="index.html" class="button close-button">Close</a>
                <a href="https://www.eatnow.ie/restaurantDetails.php?resid=349&resname=fogos-pizza#tabs|Tabs_Group:details_menu" class="button order-button">Order Online</a>
                <a href="index.html" class="button glyph next fa-angle-right"></a>
              

            </div>
        </section>
 
         
                         
                         
           
        
        
        <!--  //MENU POPUP  -->

        <!--  ACHIEVMENT  -->
        <!--
        <section class="achievement images-bg animate">
            <div class="container">
                <div class="row">
                    <article class="col-lg-3 col-md-3 col-sm-3 achievement-block">
                        <span class="calc" data-to="1845">0</span>
                        <div>COFFEE CUPS SOLD</div>
                    </article>
                    <article class="col-lg-3 col-md-3 col-sm-3 achievement-block">
                        <span class="calc" data-to="345">0</span>
                        <div>REGULAR CUSTOMERS</div>
                    </article>
                    <article class="col-lg-3 col-md-3 col-sm-3 achievement-block">
                        <span class="calc" data-to="648">0</span>
                        <div>MUFFINS BAKED</div>
                    </article>
                    <article class="col-lg-3 col-md-3 col-sm-3 achievement-block">
                        <span class="calc" data-to="74">0</span>
                        <div>SUCCESSFUL PARTIES</div>
                    </article>
                </div>
            </div>
            <img src="http://restaurants.eatnow.ie/images/achievement/1.jpg" alt="">
        </section>
    -->
        <!--  //ACHIEVMENT  -->

        <!--  EVENTS  -->
        
            
            <?php
require_once('DB/dbConnection.php');
                    $connection=databaseConnection();
            echo ("<section id='events' class='events animate' style='background-color:");  
 $query = "SELECT DISTINCT eventTitleColor, statusID from colors, resDetails where colors.resID ='$restaurantID' and resDetails.statusID = 1 ";
         $result = mysql_query($query);

            while($row=mysql_fetch_array($result)){
                extract($row);
                    echo("$eventTitleColor");
                   

            } 
                                
            ?>
'>


            <div class="container">
                <div class="flexslider">
                    <ul class="slides">
       

                <?php //for Events
                    
                    $query = "SELECT resName, eventbigTitle, eventsmallTitle, eventDescription, eventbuttonHover1, eventbuttonHover2, statusID FROM events,resDetails WHERE events.resID = resDetails.resID AND resDetails.resID = $restaurantID and resDetails.statusID=1 ";
                    $result = mysql_query($query);
                    while($row=mysql_fetch_array($result)){
                    extract($row);

                    echo ("
                        <li>
                            <div class='title bottom' style='$eventTitleColor'>
                                <div> $eventsmallTitle</div>
                                $eventbigTitle
                            </div>
                            <div class='dot'></div>
                            <p class='mini'>$eventDescription</p>
                            <a class='button slide-page' href='index.php#contact'>
                                <span>$eventbuttonHover1</span>
                                <span>$eventbuttonHover2</span>
                            </a>
                        </li>



                        ");
                    
                    }


                ?>

                </ul>
                </div>
            </div>
        </section>

        
                        
                    
        <!--  //EVENTS  -->

        <!--  RESERVATION  -->


        <section id="reservation" class="reservation animate" >
                        <div class="clearfix">

        <?php
                    $query = "SELECT resName, eventsImageUrl, eventImagePopup, statusID FROM images, resDetails WHERE images.resID = resDetails.resID AND resDetails.resID = '$restaurantID' and resDetails.statusID=1 ";
                    $result = mysql_query($query);
                    while($row=mysql_fetch_array($result)){
                    extract($row);
                    echo("
                         
                     <div class='col-lg-3 col-md-3 col-sm-6 reservation-block'>
                        <a href='http://restaurants.eatnow.ie/$eventImagePopup'>
                            <img src='http://restaurants.eatnow.ie/$eventsImageUrl' alt=''>
                                <span>
                                    <em class='glyph fa-search'></em>
                                </span>
                        </a>                    
                    </div>

                        ");
                    }
                        
        ?>                         
        </section>

        <!--  //RESERVATION  -->

        <!--  COMMENT  -->
            <?php
            echo ("<section class ='comment animate' style='background-color:");  
 $query = "SELECT DISTINCT CommentColor, statusID from colors, resDetails where colors.resID ='$restaurantID' and resDetails.statusID = 1 ";
         $result = mysql_query($query);

            while($row=mysql_fetch_array($result)){
                extract($row);
                    echo("$CommentColor");
                   

            } 
                                
            ?>
'>
      
            <div class="container">
                <div class="flexslider">
                    <ul class="slides">
                 <?php 
                    $query = "SELECT name, feedback, statusID FROM comments, resDetails WHERE comments.resID = resDetails.resID AND resDetails.resID = '$restaurantID' and resDetails.statusID=1 ";
                    $result = mysql_query($query);
                    while($row=mysql_fetch_array($result)){
                    extract($row);

                        echo("


                             <li>
                             <em>“</em>
                            <div class='block-title'>
                                <div> $name</div>
                                
                            </div>
                            <div class='dot'></div>
                            <p class='mini'>$feedback</p>
                            
                            </li>

                            ");
                    }
                ?>
                        
                    </ul>
                </div>
            </div>
        </section>
        <!--  //COMMENT  -->

        <!--  CONTACTS  -->
            <?php
            echo ("<section id='contact' class='contacts images-bg animate' style='background-color:");  
 $query = "SELECT DISTINCT contactColor, statusID from colors, resDetails where colors.resID ='$restaurantID' and resDetails.statusID = 1 ";
         $result = mysql_query($query);

            while($row=mysql_fetch_array($result)){
                extract($row);
                    echo("$contactColor");
                   

            } 
                                
            ?>
'>
            <div class="container">


                <div class="title" <?php echo ("style='background-color:'".$headerColor.";"); ?>> 

                <?php 
                
                echo 'Your  ' . htmlspecialchars($_GET["name"]) . '!';
                    $query = "SELECT DISTINCT contactsmallTitle, statusID FROM contactUs, resDetails WHERE contactUs.resID = resDetails.resID AND resDetails.resID = '$restaurantID' and resDetails.statusID=1 ";
                    $result = mysql_query($query);
                    while($row=mysql_fetch_array($result)){
                    extract($row);

                        echo(" 
                            
                            <div >Fill out the Form below</div>
                             Get in Touch
                            

                           
                            
                            
                                                    
                            
                            ");
                    }
                ?>
          
                </div>                
                <form action="<?php echo ("submit.php?id=$restaurantID ");?>" method ='POST' >
                <p style="color:red; font-size: 20px;"><strong> <?php if ($_GET["a"]) {
                	echo $_GET["a"]; } ?></strong></p> 
                
                </h3>
                    <div class='row'>


                        
                    <?php 
                        $query = "SELECT * FROM resDetails WHERE resID=1";
                        $result = mysql_query($query);
                        if (!empty($result)){
                            echo("
                            <div class='col-lg-4 '>
                            <input name='name' placeholder='Name' type='text'  required />                       
                            </div>
                            <div class='col-lg-4 '>
                            <input name='contactEmail' placeholder='E-Mail' type='text' required />
                            </div>
                            <div class='col-lg-4 '>
                            <input name='phone' placeholder='Phone' type='text' required />
                            </div>

                             <div>
                            <textarea name='  message' placeholder='message'rows='10' class='textarea' type='text' ></textarea>
                            </div>
                        <br>
                            <div >

                            <input type = 'submit'  class='button'  value = 'submit'> 
                            </div>
                            ");

                        }
                        else{
                            echo(" 
                                
                                ");

                        }
                    ?> 


                            
                                              
                </form>
            </div>
            </section>


           <!-- <img src=http://restaurants.eatnow.ie/<?php echo $contactbgImage ; ?> alt="">
            
        <!--  //CONTACTS  -->

        <!--  BLOG  -->
            <?php
            echo ("<section class='blogColor' style='background-color:");  
 $query = "SELECT DISTINCT blogColor, statusID from colors, resDetails where colors.resID ='$restaurantID' and resDetails.statusID = 1 ";
         $result = mysql_query($query);

            while($row=mysql_fetch_array($result)){
                extract($row);
                    echo("$blogColor");
                   

            } 
                                
            ?>
'>
          
            <div class="container">

                <?php 
                    $query = "SELECT resName, blogTitle1, blogTitle2, chefDishes, favDescription, chooseDishes, chooseDescription, statusID FROM resBlog, resDetails WHERE resBlog.resID = resDetails.resID AND resDetails.resID = '$restaurantID' and resDetails.statusID=1 limit 2";
                    $result = mysql_query($query);
                    while($row=mysql_fetch_array($result)){
                    extract($row);

                        echo("
                            
                            <div class='title'>
                            <div>$blogTitle1</div>
                                $blogTitle2
                            
                            
                            
                            
                   


                            ");
                



                     }
                ?>
                </div>
                
                <div class="row">
                    <article class="col-lg-6 col-md-6 col-sm-6 blog-block">
                        <?php 
                        $query = "SELECT resName, blogTitle1, blogTitle2, chefDishes, favDescription, chooseDishes, chooseDescription, date1, label1, statusID  FROM resBlog, resDetails WHERE resBlog.resID = resDetails.resID AND resDetails.resID = '$restaurantID' and resDetails.statusID=1 ";
                        $result = mysql_query($query);
                        while($row=mysql_fetch_array($result)){
                        extract($row);

                             echo("

                                <span class='date'>  $date1 </span>
                                <span class='label'> $label1 </span>
                                <span class = 'name'> $chefDishes</span>
                                <p class = 'mini'> $favDescription</p>


                                ");
                        }
                        ?>

                      
                        
                    </article>
                    <article class="col-lg-6 col-md-6 col-sm-6 blog-block">
                        <?php 
                        $query = "SELECT resName, blogTitle1, blogTitle2, chefDishes, favDescription, chooseDishes, chooseDescription, date2, label2, statusID FROM resBlog, resDetails WHERE resBlog.resID = resDetails.resID AND resDetails.resID = '$restaurantID' and resDetails.statusID=1 ";
                        $result = mysql_query($query);
                        while($row=mysql_fetch_array($result)){
                        extract($row);

                             echo("

                                <span class='date'>  $date2 </span>
                                <span class='label'> $label2 </span>
                                <span class = 'name'> $chooseDishes</span>
                                <p class = 'mini'> $chooseDescription</p>


                                ");
                        }
                        ?>

                    </article>
                </div>
            </div>
        </section>
        <!--  //BLOG  -->
        
        <!--  FOOTER  -->
            <?php
            echo ("<footer class='footer' style='background-color:");  
 $query = "SELECT DISTINCT OpeninghrsColor, statusID from colors, resDetails where colors.resID ='$restaurantID' and resDetails.statusID = 1 ";
         $result = mysql_query($query);

            while($row=mysql_fetch_array($result)){
                extract($row);
                    echo("$OpeninghrsColor");
                   

            } 
                                
            ?>
'>
            <div class="container">
                <article class="opening">
                    <div class="row">
                    

                <?php 
                    $query = "SELECT resName, openingID, day, startTime, endTime, statusID FROM openingHours, resDetails WHERE openingHours.resID = resDetails.resID AND resDetails.resID = '$restaurantID' and resDetails.statusID=1 ";
                    $result = mysql_query($query);
                    $num_rows = mysql_num_rows($result);
                    if($num_rows>=1){
                        echo ("<strong>Opening Hours</strong>");
                    }
                    while($row=mysql_fetch_array($result)){
                    extract($row);

                    echo (" 
                        <div class='opening-hours'>
                            <div> <span>$day</span></div>
                            <div> $startTime-$endTime</div>
                            
                                
                         </div>   
                           
                        ");
                    
                            
                    }

                ?>
                        

                    </div>
                        
                </article>
                    <?php
            echo ("<article class='address row' style='background-color:");  
 $query = "SELECT DISTINCT addressColor, statusID from colors, resDetails where colors.resID ='$restaurantID' and resDetails.statusID = 1 ";
         $result = mysql_query($query);

            while($row=mysql_fetch_array($result)){
                extract($row);
                    echo("$addressColor");
                   

            } 
                                
            ?>
'>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                     <span> <a href ="http://www.eatnow.ie">
        <IMG STYLE="position:absolute; TOP:64.5px; LEFT:-10px; WIDTH:200px; HEIGHT:40px" SRC="http://restaurants.eatnow.ie/images/logo_eatnowie.png">
	</a></span>
                        <div class="clearfix">
                            
                            
                            <?php

                            $query = "SELECT resName, AddressID, address1, resPhone1, resEmail1, socialMedia, statusID FROM resAddress, resDetails WHERE resAddress.resID = resDetails.resID AND resDetails.resID = '$restaurantID' and resDetails.statusID=1 ";
                            $result = mysql_query($query);
                            while ($row = mysql_fetch_array($result)) {
                                extract($row);
                                echo ("
                                    <strong class='pull-left'>Address</strong>
                                    <span>$address1</span>
                                         


                                         
                                    ");


                            }
                            ?>
                            
                        </div>                    
                    </div>


                    <div class='col-lg-4 col-md-4 col-sm-6'>
                        <div class='clearfix'>
                        
                        <?php
                         $query = "SELECT resName, AddressID, address1, resPhone1, resEmail1, socialMedia, statusID FROM resAddress, resDetails WHERE resAddress.resID = resDetails.resID AND resDetails.resID = '$restaurantID' and resDetails.statusID=1 ";
                            $result = mysql_query($query);
                            while ($row = mysql_fetch_array($result)) {
                                extract($row);
                                echo ("
                                    <strong class='pull-left'>Phone</strong>
                                    <span>$resPhone1</span>
                                    $map

                                         

                                         
                                    ");


                            }
                        ?>
                        </div>       
                        <div class='clearfix'>
                            
                        <?php
                         $query = "SELECT resName, AddressID, address1, resPhone1, resEmail1, socialMedia, statusID FROM resAddress, resDetails WHERE resAddress.resID = resDetails.resID AND resDetails.resID = '$restaurantID' and resDetails.statusID=1 ";
                            $result = mysql_query($query);
                            while ($row = mysql_fetch_array($result)) {
                                extract($row);
                                echo (" <strong class='pull-left'>E-mail</strong>
                                    $resEmail1
                                        

                                         
                                    ");


                            }
                        ?>
                        </div>                      
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="share-button">
                            <?php
                         $query = "SELECT resName, AddressID, address1, resPhone1, resEmail1, socialMedia, statusID FROM resAddress, resDetails WHERE resAddress.resID = resDetails.resID AND resDetails.resID = '$restaurantID' and resDetails.statusID=1 ";
                            $result = mysql_query($query);
                            while ($row = mysql_fetch_array($result)) {
                                extract($row);
                                echo ("
                                    $socialMedia
                                        

                                         
                                    ");


                            }
                        ?>
                           
                        </div>
                        <span><font color="#F39200">© Neptix 2015 . All Rights Reserved.</font></span>
                    </div>
                </article>
                <a href="#home" class="glyph fa-angle-up move-up slide-page"></a>
            </div>
        </footer>
        <!--  //FOOTER  -->

        <!--  MAP --> 
                    <?php
                         $query = "SELECT resName, mapID, maps, statusID FROM map, resDetails WHERE map.resID = resDetails.resID AND resDetails.resID = '$restaurantID' and resDetails.statusID=1 ";
                            $result = mysql_query($query);
                            while ($row = mysql_fetch_array($result)) {
                                extract($row);
                                echo ("

                                    $maps'
                                    ");
                            }
                    ?>
        
        <!--  //MAP  -->

        
        <!--  //COLOR PICKER  --> 
    </div>    

<!--  JQUERY SCRIPT  --> 
<script type="text/javascript" src="http://restaurants.eatnow.ie/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="http://restaurants.eatnow.ie/js/jquery/jquery.mb.YTPlayer.js"></script>
<script type="text/javascript" src="http://restaurants.eatnow.ie/js/jquery/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="http://restaurants.eatnow.ie/js/jquery/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="http://restaurants.eatnow.ie/js/jquery/jquery.countTo.js"></script>
<script type="text/javascript" src="http://restaurants.eatnow.ie/js/jquery/jquery.scrollTo-min.js"></script>
<script type="text/javascript" src="http://restaurants.eatnow.ie/js/jquery/jquery.magnific-popup.min.js"></script>
<!--  //JQUERY SCRIPT  --> 

<!--  BOOTSTRAP SCRIPT  --> 
<script type="text/javascript" src="http://restaurants.eatnow.ie/js/bootstrap/bootstrap.min.js"></script>
<!--  //BOOTSTRAP SCRIPT  --> 

<!--  SITE SCRIPT  --> 
<script type="text/javascript" src="http://restaurants.eatnow.ie/js/custom.script.js"></script>
<!--  //SITE SCRIPT  --> 
    
</body>
</html>