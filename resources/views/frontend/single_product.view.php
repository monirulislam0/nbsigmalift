<?php 
    $route = "/product/".strtolower(rtrim(preg_replace('/[\/\s]+/', '-', $product['product_title']), '-'))."-".$product['id'];

    template_include("/frontend/partials/header",compact('page','route'));

?>

<style>
    .p-4{
        padding: 0px !important;
    }
</style>
 <!-- Product Section -->
 <div class="container py-5" style="padding-bottom:0px !important;">
        <div class="row">
                <div class="col-md-3">
                <!-- Vertical Navigation Menu -->
                <div class="nav flex-column nav-pills" aria-orientation="vertical">
                    <a class="nav-link active" href="#">Categories</a>
                    <?php
                        foreach($categoreis as $category):
                    ?>
                    <a class="nav-link" href="/products-categories/<?= strtolower(rtrim(preg_replace('/[\/\s]+/', '-', $category['category_name']), '-'))."-".$category['id'] ?>"><?= $category['category_name'] ?></a>
                    <?php 
                        endforeach;
                    ?>
                </div>
                </div>
                <div class="col-md-4">
                        <div class="card">
                                  <style>
                            .thumbnail-image {
                            min-height:380px; 
                            width: 100%;
                            background-color: rgba(0,0,0,0.15);
                            background-image: url('<?= assets("/uploads/".$product['product_thumbnail']) ?>');
                            background-size: contain;
                            background-repeat: no-repeat;
                            background-position: center center;
                            }
                        </style>
                        <div class="thumbnail-image" id="thumb_image">
                        </div>
                        <img src="<?= assets("/uploads/".$product['product_thumbnail']) ?>" style="display:none"/>
                           
                        </div>
                        <div class="col-md-12">
                            <style>
                            
                            .box {
                              position: relative;
                              width: 80px;
                              height: 80px;
                              background: #fff;
                              box-shadow:  0 2px 8px rgb(0 0 0 / 57%);
                              overflow: hidden;
                              cursor: pointer;
                              transition: transform .2s;
                            }
                        
                            /* your product image */
                            .box img {
                              display: block;
                              width: 100%;
                              height: 100%;
                              object-fit: cover;
                            }
                        
                            /* SVG border overlay */
                            .box svg {
                              position: absolute;
                              top: 0; left: 0;
                              width: 100%; height: 100%;
                              pointer-events: none;       /* let clicks pass through */
                              transform: rotate(-90deg);
                            }
                        
                            .box rect {
                              fill: none;
                              stroke: #007BFF;
                              stroke-width: 4;
                              stroke-dasharray: 480;
                              stroke-dashoffset: 480;
                              transition: none;
                            }
                        
                            .box:hover {
                              transform: scale(1.05);
                            }
                            .box:hover rect {
                              animation: draw 0.3s forwards ease-in-out;
                            }
                        
                            @keyframes draw {
                              to { stroke-dashoffset: 0; }
                            }
                          </style>
                            
                            <div class="row">
                            <?php 
                                    $unserial = unserialize($product['product_galleries']);
                                    if(! $unserial){
                                        $unserial = [];
                                    }
                                    foreach($unserial as $image):
                                ?>
                            <div class="col-3">


                                  <div class="box">
                                  <img src="<?= assets("/uploads/".$image) ?>" alt="Product 1" onclick="changeImage(event, this)">
                                  <svg viewBox="0 0 120 120">
                                    <rect x="2" y="2" width="116" height="116" rx="8" ry="8"/>
                                  </svg>
                                </div>
                              

                            </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                </div>
            <!-- Product Details -->
            <div class="col-md-5">
                <h5 class="fw-bold text-primary"><?= $product['product_title'] ?></h5>
                <p class="text-muted">Model: <?= $product['product_model'] ?></p>

                <p class="mt-4"> <?= $product['short_description']?></p>

               

                <!-- Quote Button -->
            
                <a href="<?= assets('/uploads/'.$product['product_pdf'])?>" 
                class="btn btn-primary btn-lg mt-4"target="_blank" 
                rel="noopener noreferrer">Catalog <i class="fas fa-download ms-2 fs-6"></i></a>
                <!-- Quote Button -->
                <a href="#inquiry" class="btn btn-primary btn-lg mt-4">Send Inquiry</a>
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
                    <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                    fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    
                    <!-- Your share button code -->
                    
                <div class="container  mt-5">
                    <h4>Share this Post</h4>
                    <div class="d-flex justify-content-left gap-2 mt-3">
                        <a href="#"  class="btn btn-facebook" id="facebookShare">
                            <div class="fb-share-button" 
                            data-href="<?= $route ?>" 
                            data-layout="button">
                            </div>
                        </a>
                        <a href="https://instagram.com/create/story?media_url=<?= rtrim(getenv('SITE_URL'),'/').'/uploads/'.$product['product_thumbnail'] ?>" target="_blank"" target="_blank" class="btn btn-instagram">
                            <i class="fab fa-instagram"></i> Share
                        </a>
                        <a href="void:0;" target="_blank" class="btn btn-twitter" onclick="shareOnX()">
                            <i class="fab fa-twitter"></i> Tweet
                        </a>
                        <?php 
                            $base_url = rtrim(getenv('SITE_URL'), '/');
                        ?>
                        <a href="https://pinterest.com/pin/create/button/?url=<?= $base_url.'/'.$route?>&media=<?= $base_url.'/uploads/'.$product['product_thumbnail']?>&description=<?= $product['og_description'] ?? $product['short_description'] ?>" data-pin-do="buttonPin" data-pin-config="above" target="_blank" class="btn btn-pinterest">
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
               
            </div>
        </div>
    </div>
    <div class="container py-0">
        <div class="row">
            <div class="col-md-3"></div>
            <style>
                .p-5 img{
                    width:100% !important;
                }
            </style>
            <div class="col-md-9" style="overflow:hidden;">
                <h2 class="fw-bold text-primary">
                    Product Details
                </h2>
                <hr class="hr">
                <div class="p-4">
                 <?= $product['long_description'] ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="fw-bold text-primary">
                    Related Products
                </h2>
                <hr class="hr">
                <div class="row mb-5 product-list">
                    <?php 
                        foreach($related_products as $rows => $rel_product):
                            
                            // if($product["id"] == $rel_product["id"]) continue;
                            if(12 == $rows ) break;
                    ?>
                       <div class="col-md-2 mb-4 product-item" >
                       <a href="/product/<?= strtolower(rtrim(preg_replace('/[\/\s]+/', '-', $rel_product['product_title']), '-'))."-".$rel_product['id'] ?>">
                       <div class="card">
                             <style>
                            .product_image {
                            height: 180px; 
                            width: 100%;
                            background-color: rgba(0,0,0,0.15);
                            
                            background-size: contain;
                            background-repeat: no-repeat;
                            background-position: center center;
                            }
                        </style>
                        <div class="product_image" style="background-image: url('<?= assets("/uploads/".$rel_product['product_thumbnail']) ?>');">
                        </div>
                            
                            <div class="card-body">
                                <h5 class="card-title text-center bold"><?= $rel_product['product_title'] ?> </h5>
                            </div>
                        </div>
                       </a>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote Form Section -->
    <div id="inquiry"></div>
    <div id="quote" class="container py-5 bg-light">
            <h4 class="text-primary">Send Inquiry</h4>
                <hr class="hr">
                <div>
                    <?php if(session_get('message')):?>
                        <p style="padding:7px; background-color: green; color: white; "><?= session_get('message')?></p>
                    <?php endif; ?>
                </div>

        
             <form action="/admin/contact-us/store" id="query_form" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <?php if(error('name')): ?>
                            <p class="text-danger"> <?= error('name') ?></p>
                        <?php endif; ?>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your full name" >
                    </div>
                    <div class="mb-3">
                    <?php if(error('email')): ?>
                            <p class="text-danger"> <?= error('email') ?></p>
                        <?php endif; ?>
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
                    </div>
                    <div class="mb-3">
                    <?php if(error('message')): ?>
                            <p class="text-danger"> <?= error('message') ?></p>
                        <?php endif; ?>
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="5" placeholder="Enter your message" name="message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
                <script>
                    document.querySelector('button[type="submit"]').addEventListener('click', function(event) {
                    // Prevent the default form submission behavior (if needed)
                    event.preventDefault();
                    
                    // Now submit the form
                    document.getElementById('query_form').submit();
                });

                </script>
    </div>
    <script>
  // Function to change the main image when a thumbnail is clicked
  function changeImage(event) {
    const imgUrl=  event.target.getAttribute('src');
    element = document.getElementById("thumb_image");
    document.getElementById("thumb_image").style.backgroundImage = "url("+imgUrl+")";
    console.log(element, imgUrl);
  }
</script>
<?php 

    template_include("/frontend/partials/footer");

?>