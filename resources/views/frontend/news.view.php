<?php 


    $route = "/news";
    template_include("/frontend/partials/header" ,compact('page','route'));
    template_include("/frontend/partials/banner",compact('page'));



?>
<div class="container pt-5">
    <div class="row">
        <div class="col-md-3">
        <div class="nav flex-column nav-pills" aria-orientation="vertical">
            <a class="nav-link " href="#">About us</a>

            <a class="nav-link" href="/certificate">Certificate</a>
            <a class="nav-link  " href="/company-profile">Commpany Profile</a>
            <a class="nav-link" href="/products">Products</a>
            <a class="nav-link" href="/global-partners">Global Partners</a>
            <a class="nav-link " href="/projects">Our Projects</a>
            <a class="nav-link active" href="/news">News</a>
            <a class="nav-link " href="/contact-us">Contact us</a>
        </div>
        </div>
        <div class="col-md-9 news-list">
            <div class="row">
            <?php 
                foreach($news as $item):
            ?>
            
            <div class="col-md-4 news-item" >
               <div class="m-3" style="border:1px solid #ccc; padding-bottom:10px; margin-top:0px;">
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
                 <div class="" style="padding-left:40px; margin-top:10px">
                 <p>Time:  <?= date('d M, Y', strtotime($item['date_time'])) ?></p>
                  <h5><?= substr($item['news_title'],0,100)?></h5>
                  <a href="/news/<?= strtolower(rtrim(preg_replace('/[\/\s]+/', '-', $item['news_title']), '-'))."-".$item['id'] ?>" class="btn-link ">Read more</a>
                 </div>
               </div>
              </div>
            <?php 
                endforeach;
            ?>
            </div>
        </div>
    </div>
</div>
<?php 

    template_include("/frontend/partials/footer");

?>