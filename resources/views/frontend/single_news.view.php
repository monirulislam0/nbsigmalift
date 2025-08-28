<?php 

    $route = "/news/".strtolower(rtrim(preg_replace('/[\/\s]+/', '-', $news['news_title']), '-'))."-".$news['id'] ;
    
    template_include("/frontend/partials/header",compact('page','route'));
?>

<div class="m-2"></div>

    <!-- Main Content Section -->
    <div class="container">
        <div class="row">
            <!-- Full Article -->
            <div class="col-md-12">
                <div class="mb-4">
                    <img src="<?= assets("/uploads/".$news['news_image']) ?>" alt="<?= $news["alt_text"] ?>" class="hero-image img-fluid">
                    <h2 class="mt-3"><?= $news['news_title'] ?> </h2>
                    <p class="text-muted">By Admin | <?= date('d M, Y', strtotime($news['date_time']))?> </p>
                    <p>
                       
                        <?= $news['content'] ?>
                    </p>
                    <!-- Add more content as needed -->
                     <!--Share Section One-->
                        <!--Share On Social Media-->
                    <style>
                        .btn-facebook { background-color: #1877F2; color: white; }
                        .btn-instagram { background: #E4405F; color: white; }
                        .btn-twitter { background: #1DA1F2; color: white; }
                        .btn-pinterest { background: #BD081C; color: white; }
                    
                        .btn-facebook:hover { background-color: #1877F2; }
                        .btn-instagram:hover { background: #C13584; }
                        .btn-twitter:hover { background: #0C85D0; }
                        .btn-pinterest:hover { background: #8C0615; }
                    </style>
                    <div id="fb-root"></div>
                    <script>
                        (function(d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0];
                                            if (d.getElementById(id)) return;
                                            js = d.createElement(s); js.id = id;
                                            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                                            fjs.parentNode.insertBefore(js, fjs);
                                            }(document, 'script', 'facebook-jssdk'));
                    </script>
                    
                    <!-- Your share button code -->
                    
                    <div class="container  mt-5">
                        <h4>Share this Post</h4>
                        <div class="d-flex justify-content-left gap-2 mt-3">
                            <a href="#" class="btn btn-facebook" id="facebookShare">
                                  <div class="fb-share-button" 
                                  data-href="#" 
                                  data-layout="button">
                                  </div>
                              </a>
                              <a href="https://instagram.com/create/story?media_url=<?= rtrim(getenv('SITE_URL'),'/').'/uploads/'.$news['news_image'] ?>" target="_blank"  target="_blank " class="btn btn-instagram ">
                                  <i class="fab fa-instagram "></i> Share
                              </a>
                              <a href="void:0; " target="_blank " class="btn btn-twitter " onclick="shareOnX() ">
                                  <i class="fab fa-twitter "></i> Tweet
                              </a>
                              <?php 
                            $base_url = rtrim(getenv('SITE_URL'), '/');
                        ?>
                              <a href="https://pinterest.com/pin/create/button/?url=<?= $base_url. '/'.$route?>&media=
        <?= $base_url.'/uploads/'.$product['product_thumbnail']?>&description=
            <?= $product['og_description'] ?? $product['short_description'] ?>" data-pin-do="buttonPin" data-pin-config="above" target="_blank" class="btn btn-pinterest">
                            <i class="fab fa-pinterest"></i> Pin
                           </a>
                        </div>
                    </div>
                    
                    <script async defer src="https://assets.pinterest.com/js/pinit.js"></script>
                    <!--Share on Social Media -->
                    
                    
                    <script>
                        function shareOnX() {
                          var url = encodeURIComponent(window.location.href);
                          var text = encodeURIComponent(document.title);
                          window.open('https://twitter.com/intent/tweet?url=' + url + '&text=' + text, '_blank');
                        }
                    </script>
                        <!--Share Section End-->
                </div>

            </div>

          
        </div>
    </div>
   
   <?php 

template_include("/frontend/partials/footer");

?>