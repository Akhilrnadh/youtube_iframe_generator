<?php
  if (isset($_POST['submit'])) {
      /*echo "hurray";*/
      $url = $_POST['url'];
      $width = $_POST['width'];
      $height = $_POST['height'];
      $align = $_POST['align'];
      $ratio = $_POST['ratio'];
      $progress = $_POST['progress'];
      $autoplay = $_POST['autoplay'];
      $loop = $_POST['loop'];
      $anotation = $_POST['anotation'];
      $captions = $_POST['captions'];
      $fullscreen = $_POST['fullscreen'];
      $title = $_POST['title'];
      $related = $_POST['related'];
      $quality = $_POST['quality'];
      $starttime = $_POST['starttime'];
      $endtime = $_POST['endtime'];
      $branding = $_POST['branding'];
      $controls = $_POST['controls'];

      if (empty($url) || empty($height) || empty($width)) {
          $alert = "<p style='text-align:center; color: #d88289; background-color:hsl(355, 70%, 91%); height: 30px; width: 100%; padding: 5px; border-radius:5px;'>please fill the important fields</p>";
      } else {

            if (!filter_var($url,FILTER_VALIDATE_URL)) {
                //echo "url is fine";
               $alert = "<p style='text-align:center; color: #d88289; background-color:hsl(355, 70%, 91%); height: 30px; width: 100%; padding: 5px; border-radius:5px;'>please enter a valid URL</p>";
            } else {

                $explodeurl = explode('v=', $url);
                //print_r($explodeurl);

                if (!empty($explodeurl[1])) {  
                    $explodeurl = $explodeurl[1];
                    $explodeurl = strtok($explodeurl, '&');
                    //print_r($explodeurl);  
                    $youtubeID = $explodeurl; 

                }elseif (empty($explodeurl[1])) {
                    $explodeurl = explode('/', $url);
                    $explodeurl = $explodeurl[3];
                    //print_r($explodeurl);
                    $youtubeID = $explodeurl; 
                }

                if (isset($height)) {
                    $height = preg_replace('/[^0-9]/', '', $height);
                    //print_r($height);
                }

                if (isset($width)) {
                    $width = preg_replace('/[^0-9]/', '', $width);
                    //print_r($width);
                }

                if ($align == "center") {
                   $align = 'style="text-align: center; margin: auto;"';
                }elseif ($align == "left") {
                    $align = 'style="float: left; margin: 3px;"';
                }elseif ($align == "right") {
                    $align = 'style="float: right; margin: 3px;"';
                }elseif ($align == "default") {
                    $align = "";
                }
                
                if (isset($starttime) && isset($endtime)) {
                    $starttime = preg_replace('/[^0-9]/', '', $starttime);
                    $endtime = preg_replace('/[^0-9]/', '', $endtime);
                    /*echo $starttime;
                    echo $endtime;*/
                    if (empty($starttime) || empty($endtime)) {
                        $starttime = "0";
                        $endtime = "0";
                    }
                }


            }
      }

  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Youtube Embed Code Generator</title>
    <meta name="description" content="Generate youtube video embed code in just 1 click. A fast and easy tool that will generate unlimitted youtube embed code for free. Just paste your youtube video url on our Youtube Video Embed Code Generator and we will do the rest.">
    <meta name="distribution" content="Global" />
    <meta name="rating" content="General" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="revisit-after" content="1 days" />
    <meta name="googlebot" content="noindex,nofollow"/>
    <meta forua="true" http-equiv="Cache-Control" content="max-age=0"/>
    <meta name="language" content="English">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!-- header -->
    <nav class="navbar">
    	<!-- container -->
    	<div class="container flex">
    		<h1><a href="index.php">Yt Embed Code Generator</a></h1>
    		<ul>
    			<li><a href="index.php">Home</a></li>
    			<li><a href="#about">About</a></li>
    			<li><a href="#about">Contact</a></li>
    			<li><a href="#howto">How to?</a></li>
    		</ul>
    	</div>
    </nav>
   <hr>
    <!-- form section -->
    <div class="form">
        <div class="container flex">
            <form method="POST" action="" class="form1">    
            <?php 
               if(isset($alert))
                  {
                    echo $alert;
                  } 
              
                  if (isset($_POST['clear']) == "reset") {
                      header("Location: index.php");
                      exit();
                  }
        
            ?> 
              <div class="form-control">
                  <label>Enter Youtube URL <span style="color: red;">*</span>
                  <input type="text" name="url" placeholder="https://youtu.be/477ujfHeYGw">
                  </label>
              </div> 
              <div class="form-control">
                  <label>Give video height <span style="color: red;">*</span>
                  <input type="text" name="height" placeholder="300">
                  </label>
              </div>
              <div class="form-control">
                  <label>Give video width <span style="color: red;">*</span>
                  <input type="text" name="width" placeholder="500">
                  </label>
              </div> 
              <hr> 
              <p style="text-align: center;">Some additional options (optional)</p>
              <div class="form-control">
                  <label>Give video alignment</label>
                  <select name="align">
                      <option value="default">Default</option>
                      <option value="center">Center</option>
                      <option value="right">Right</option>
                      <option value="left">Left</option>
                  </select>
              </div> 
              <div class="form-control">
                  <label>video Quality</label>
                  <select name="quality">
                      <option value="hd720">Auto
                      </option>
                      <option value="small">240p</option>
                      <option value="medium">360p</option>
                      <option value="large">480p</option>
                      <option value="hd720">720p (HD)</option>
                      <option value="hd1080">180p (Full HD)</option>
                  </select>
              </div>  
               <div class="form-control">
                  <label>video Aspect Ratio</label>
                  <select name="ratio">
                      <option value="16:9">16:9 (Recommended)
                      </option>
                      <option value="4:3">4:3</option>
                      <option value="1:1">1:1</option>
                  </select>
              </div> 
               <div class="form-control">
                  <label>Progress Bar</label>
                  <select name="progress">
                      <option value="0">Hide</option>
                      <option value="1">Vissible</option>
                  </select>
              </div>
              <div class="form-control">
                  <label>Autoplay video</label>
                  <input type="hidden" name="autoplay" value="0">
                  <input type="checkbox" name="autoplay" value="1">
              </div>   
               <div class="form-control">
                  <label>Loop video</label>
                  <input type="hidden" name="loop" value="0">
                  <input type="checkbox" name="loop" value="1">
              </div>
               <div class="form-control">
                  <label>Show annotation</label>
                  <input type="hidden" name="anotation" value="0">
                  <input type="checkbox" name="anotation" value="1">
              </div>
               <div class="form-control">
                  <label>closed captions</label>
                  <input type="hidden" name="captions" value="0">
                  <input type="checkbox" name="captions" value="1">
              </div>
               <div class="form-control">
                  <label>Allow full screen</label>
                  <input type="hidden" name="fullscreen" value="0">
                  <input type="checkbox" name="fullscreen" value="1">
              </div>
               <div class="form-control">
                  <label>Show video title</label>
                  <input type="hidden" name="title" value="0">
                  <input type="checkbox" name="title" value="1">
              </div>
               <div class="form-control">
                  <label>Show related videos</label>
                  <input type="hidden" name="related" value="0">
                  <input type="checkbox" name="related" value="1">
              </div>
              <div class="form-control">
                  <label>Modest Branding</label>
                  <input type="hidden" name="branding" value="0">
                  <input type="checkbox" name="branding" value="1">
              </div>
              <div class="form-control">
                  <label>Disable Player Controls</label>
                  <input type="hidden" name="controls" value="1">
                  <input type="checkbox" name="controls" value="0">
              </div>
              <div class="form-control">
                  <label>video start time (in seconds)</label>
                  <input type="text" name="starttime" name="starttime" placeholder="15">
              </div>
              <div class="form-control">
                  <label>video end time (in seconds)</label>
                  <input type="text" name="endtime" placeholder="30">
              </div>
              <div class="form-control">
                  <button class="btn" name="submit" value="fetch">Submit</button>
              </div>
            </form>  

            <!-- From Result -->
            <div class="result">
                <div class="preview">
                    <h2>Preview of your youtube video</h2>
                    <form method="POST" action="">
                        <style>
                            iframe {
                                width: 100%;
                            }
                        </style>
                        <div class="video">
                        <?php
                          if (isset($youtubeID)) {

                              $iframe = '<iframe frameborder="0" width="'.$width.'" height="'.$height.'" type="text/html" src="https://www.youtube.com/embed/'.$youtubeID.'?autoplay='.$autoplay.'&loop='.$loop.'&iv_load_policy='.$anotation.'&fs='.$fullscreen.'&showinfo='.$title.'&rel='.$related.'&cc_load_policy='.$captions.'&stretch='.$ratio.'&autohide='.$progress.'&start='.$starttime.'&end='.$endtime.'&vq='.$quality.'&modestbranding='.$branding.'&controls='.$controls.'"></iframe>';
                           
                                 echo $iframe;
                             
                          }
                         
                        ?>
                        </div>

                        <div class="form-control">
                            <textarea placeholder="Your generated embed code will be available here" id="myInput">
<?php
  if (isset($youtubeID)) {

      $result = '<div '.$align.'><iframe frameborder="0" width="'.$width.'" height="'.$height.'" type="text/html" src="https://www.youtube.com/embed/'.$youtubeID.'?autoplay='.$autoplay.'&loop='.$loop.'&iv_load_policy='.$anotation.'&fs='.$fullscreen.'&showinfo='.$title.'&rel='.$related.'&cc_load_policy='.$captions.'&stretch='.$ratio.'&autohide='.$progress.'&start='.$starttime.'&end='.$endtime.'&vq='.$quality.'&modestbranding='.$branding.'&controls='.$controls.'"></iframe></div>';
      echo $result;
  }
?>
                            </textarea>
                        </div>
                        <div class="form-control">
                            <button class="btn" type="button" onclick="myFunction()">Copy code</button>
                            <button class="btn" name="clear" value="reset">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <!-- about this tool -->
  <div class="content" id="howto">
      <div class="container">
          <h1>About Youtube embed code generator?</h1>

          <p>Youtube embed code generator is an online tool which is used to generate the embed code of any youtube video. It is designed to help people's who wants to embed youtube videos on their Websites/Applications. The website is designed and developed by trick trendz youtube channel.</p>

        <h2>How Youtube embed code generator works?</h2>
        <p>To create an embed code, just copy the <b>video url</b> you want to and paste the video on the youtube video url input field. Select your desired height and width for the video and click on <b>submit button</b>. You'll get your embed code generted in just one click. Also you can see a preview of the video with the informations you entered or selected. You can copy the embed code by clicking the copy button and pase it on your Website/Applications.</p>

        <h2>Some more additional features in <b>youtube embed code generator tool</b></h2>
        <p>We have added some cool new stuffs in our website to generate your perfect embed code. Lets see one by one
         <ul>
             <li><b>Video Alignment</b> - Align your youtube video from left, center, right</li>
             <li><b>Video Quality</b> - Quality is one of the main factor in a video. By using this tool you can select the video quality of the youtube embed video from auto, 240p, 360p, 480p, 720p HD, 1080p Ultra HD</li>
             <li><b>Video Aspect Ratio</b> - You can give video an aspect ratio of 1:1, 4:3, and 16:9</li>
             <li><b>Video Progress Bar</b> - You can enable or disable the progress bar from video.</li>
             <li><b>Loop Video</b> - If you want to loop the video you can do that.</li>
             <li><b>Show Anotation</b> - You can enable or disable video anotation</li>
             <li><b>Closed Captions</b> - Enable and disable captions in youtube videos</li>
             <li><b>Full Screen</b> - Enable or disable full screen option in generated youtube video</li>
             <li><b>Video title</b> - Can enable or disable youtube video title on generated embed video.</li>
             <li><b>Related Videos</b> - You can disable or enable related video option from the embed video.</li>
             <li><b>Modest Branding</b> - Remove youtube branding from the generated embed video.</li>
             <li><b>Player Controls</b> - You can disable the player controls if you want from the video. If you check player controls disable, then no controls will be shown.</li>
             <li><b>Video Start, End Time</b> - You can set the video start and end time in seconds. If you set a start and end time, then the generated video will be played within that timestamp only.</li>
         </ul>
     </p>

        <h3 id="about">About Me</h3>
        <p>Hi My name is Akhil. I am a web developer passionate in doing my work and sharing my knowledge through my youtube channel. If you want to contact me regarding this website or any other queries, please contact me through gmail - tricktrendzonline@gmail.com. Cheers:-</p>
      </div>
  </div>
  <hr>
  <script>
      function myFunction() {
          var copyText = document.getElementById("myInput");
          copyText.select();
          copyText.setSelectionRange(0, 99999);
          document.execCommand("copy");
        }
  </script>
  <!-- copyright section -->
  <footer class="copyright">
      <p>Copyright &copy; 2021 - All rights reserved</p>
  </footer>
  <hr>
</body>
</html>