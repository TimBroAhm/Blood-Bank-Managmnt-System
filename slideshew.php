<html>
<head>
</head>
<body>
<div>
  <script language="javascript" type="text/javascript">
                                               var slideShowSpeed = 3000;
                                               var crossFadeDuration = 1;
                                               var Pic = new Array();
											   Pic[0] = 'images/in.png';
											   Pic[1] = 'images/innn.png';
											   Pic[2] = 'images/back8.jpg';
											   Pic[3] = 'images/inn.png';
											   Pic[4] = 'images/C.png';
											   Pic[5] = 'images/sli2.jpg';
											   Pic[6] = 'images/back4.jpg';
											   Pic[7] = 'images/busstation.jpg';
											   Pic[8] = 'images/sli3.jpg';
											   Pic[9] = 'images/sli1.jpg';
											   var t;
											   var j = 0;
											   var p = Pic.length;
											   var preLoad = new Array();
											   for (i = 0; i < p; i++) {
											   preLoad[i] = new Image();
											   preLoad[i].src = Pic[i];
                                                        }
											   function runSlideShow() {
                                               if (document.all) {
                                               document.images.SlideShow.style.filter="blendTrans(duration=3)";
                                               document.images.SlideShow.style.filter="blendTrans(duration=crossFadeDuration)";
                                               document.images.SlideShow.filters.blendTrans.Apply();
                                                }
                                                document.images.SlideShow.src = preLoad[j].src;
                                                if (document.all) {
                                              document.images.SlideShow.filters.blendTrans.Play();
                                                    }
                                               j = j + 1;
                                          if (j > (p - 1)) j = 0;
                                         t = setTimeout('runSlideShow()', slideShowSpeed);
                                               }
                                         window.onload=runSlideShow;
                                        //  End -->
                                         </script>
                                  <img src="images/inn.png" name='SlideShow' style="margin-left:17px;margin-top:-10px" width="767" height="492" style="margin-right:0">
							</div>
							</body>
							</html>