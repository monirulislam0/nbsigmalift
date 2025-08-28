<?php 
template_include("/frontend/partials/header",compact('page'));

?>
<!-- End Navigation -->

<!-- Bootstrap Carousel -->
      <style>
        /* Custom styling to remove bullet points from the carousel */
        .carousel-indicators {
            display: none;
        }
    </style>
<div id="HayashimuCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- 1st image -->
        <div class="carousel-item active">
            <img src="<?= assets("/uploads/".$sliders[0]['slider_image']) ?>" class="d-block w-100" alt="<?= $slides[0]['alternative_text'] ?>">
        </div>
        <?php 
          foreach($sliders as $keys => $slide):
            if(0 == $keys) continue;
        ?>
        <!-- 2nd image -->
        <div class="carousel-item">
            <img src="<?= assets("/uploads/".$slide['slider_image']) ?>" class="d-block w-100" alt="<?= $slide['alternative_text'] ?>">
        </div>
        <?php endforeach; ?>
    </div>
    <!-- Carousel Navigation Buttons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#HayashimuCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#HayashimuCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<script>
    // Automatically change carousel every 2 seconds
    var myCarousel = document.getElementById('HayashimuCarousel');
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 1000, // Change slide every 2 seconds
        ride: 'carousel' // Enable automatic slide transition
    });
</script>
<!-- Slider End -->


<!-- Product Categories -->
  <div class="container">
        <h4 class="text-center my-4"><u><strong>Product Categories</strong></u></h4>
        <div class="row">
          <?php 
            $categories = \app\http\models\Categories::all()->get();

            foreach($categories as $key => $category):
          ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-2">
               <a href="/products-categories/<?= strtolower(rtrim(preg_replace('/[\/\s]+/', '-', $category['category_name']), '-'))."-".$category['id'] ?>">
                  <div class="card border-0" style="width:100%; height: auto;">
                    <div style="
                    height: 240px; 
                    width: 100%;
                    background-color: rgba(0,0,0,0.15);
                    background-image: url('<?= assets("/uploads/".$category['category_image'])?>');
                    background-size: contain;
                    background-repeat: no-repeat;
                    background-position: center center;
                    ">

                    </div>
                  <div class="card-body">
                  <a href="/products-categories/<?= strtolower(rtrim(preg_replace('/[\/\s]+/', '-', $category['category_name']), '-'))."-".$category['id'] ?>" style="text-decoration: none; " class="card-text text-center text-black"><p class="card-text text-center"><?= $category['category_name']?> </p></a>
                </div>
              </div>
               </a>
            </div>
            <?php 
            if($key == 7) break;
          endforeach; ?>

        </div>
    </div>

<!--Trend Products-->

<!--Recent Products -->
  <div class="container">
        <h4 class="text-center my-4"><u><strong>Trending Products</strong></u></h4>
        <div class="row">
          <?php 
            $products = \app\http\models\Products::where(1, 'trending')->get();

            foreach($products as $key => $product):
          ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-2">
                <a href="/product/<?= strtolower(rtrim(preg_replace('/[\/\s]+/', '-', $product['product_title']), '-'))."-".$product['id'] ?>">
                  
                    <div class="card border-0" style="width:100%; height: auto;">
                          <div style="
                          height: 350px; 
                          width: 100%;
                          background-color: rgba(0,0,0,0.15);
                          background-image: url('<?= assets("/uploads/".$product['product_thumbnail'])?>');
                          background-size: contain;
                          background-repeat: no-repeat;
                          background-position: center center;
                          ">
                          </div>
                      
                      <div class="card-body">
                      <a href="/product/<?= strtolower(rtrim(preg_replace('/[\/\s]+/', '-', $product['product_title']), '-'))."-".$product['id'] ?>" style="text-decoration: none; " class="card-text text-left text-black"> <p class="card-text"><?= substr($product['product_title'], 0, 30)."...." ?></p></a>
                      </div>
                    </div>
                </a>
            </div>
            <?php 
            // if($key == 7) break; 
            endforeach;
            ?>
        </div>
 </div>



<!-- < -->

  <div class="container">

       <h4 class="text-center my-4"><u><strong>Why Choose Us</strong></u></h4>

      <div class="content">
          <div class="sub-title"><h1><strong style="font-size: 16px;">HAYASHIMU ELEVATOR CO., LTD.</strong></h1></div>
          <p>HAYASHIMU Elevator, established in 2011, has spent over a decade advancing the elevator industry. Specializing in the research, development, and manufacturing of a diverse range of elevator solutions, the company offers high-quality products including passenger elevators, home elevators, cargo elevators, car elevators, and escalators. With a strong focus on innovation and reliability, HAYASHIMU Elevator continues to lead in the design and production of cutting-edge vertical transportation systems.</p>
      </div>

  </div>

<div class="container">
       <div class="row">
            <div class="col-md-4 feature">
                <i class="fas fa-building feature-icon"></i>
                <h4>10+ Years</h4>
                <p>Established in 2011, we bring 13 years of expertise in the lift industry, specializing in design & maintenance. Our experience ensures reliable & innovative elevator solutions for diverse needs.</p>
            </div>
            <div class="col-md-4 feature">
                <i class="fas fa-users feature-icon"></i>
                <h4>100+ Teams</h4>
                <p>With a team of 100+ skilled professionals, we provide top-quality elevator solutions and services worldwide, ensuring excellence and innovation in every project.</p>
            </div>
            <div class="col-md-4 feature">
                <i class="fas fa-globe feature-icon"></i>
                <h4>Multilingual</h4>
                <p>The company has a number of small language teams to facilitate communication and service, including English, Chinese, Hindi, Urdu, Bangla, Arabic, etc.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 feature">
                <i class="fas fa-phone feature-icon"></i>
                <h4>Technical Support</h4>
                <p>The company has several technical talents and can solve most of the technical problems of well-known brands of lifts in the market.</p>
            </div>
            <div class="col-md-4 feature">
                <i class="fas fa-shield-alt feature-icon"></i>
                <h4>No Worries After Sale</h4>
                <p>A dedicated team is available to provide technical support services and can be returned or exchanged at any time in case of product quality problems.</p>
            </div>
            <div class="col-md-4 feature">
                <i class="fas fa-headset feature-icon"></i>
                <h4>24/7</h4>
                <p>To enhance efficiency and service quality, the company provides 24/7 online support, ensuring prompt assistance and seamless operations for clients globally.</p>
            </div>
        </div>  
    </div>
  <div class="container">
          <div class="featured-news">
              <h4 class="text-center my-4"><u><strong>Latest News</strong></u></h4>
          </div>
         
          <div class="row">
          <?php 
            $news = \app\http\models\News::where(1,'featured')->get();
            foreach($news as $key => $item):
          ?>
              <div class="col-md-3 news-item">
                <div style="
                    height: 200px; 
                    width: 100%;
                    background-color: rgba(0,0,0,0.15);
                    background-image: url('<?= assets("/uploads/".$item['news_image'])?>');
                    background-size: contain;
                    background-repeat: no-repeat;
                    background-position: center center;
                    ">
                    </div>
                  <p>Time:  <?= date('d M, Y', strtotime($item['date_time'])) ?></p>
                  <p><?= substr($item['news_title'],0,100)?></p>
                  <a href="/news/<?= strtolower(rtrim(preg_replace('/[\/\s]+/', '-', $item['news_title']), '-'))."-".$item['id'] ?>" class="btn btn-primary">Read more</a>
              </div>

             <?php 
              endforeach;
            ?>
          </div>

          <div class="text-center mt-5">
              <a href="/news" class="btn btn-secondary">View All</a>
          </div>
      </div>
<?php 

      template_include("/frontend/partials/footer");
?>