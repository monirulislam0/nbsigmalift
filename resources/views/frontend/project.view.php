<?php 

$route = "/projects";
template_include("/frontend/partials/header" ,compact('page','route'));
template_include("/frontend/partials/banner",compact('page'));

?>
<div class="p-3"></div>
<div class="container">
    <div class="row">

      <div class="col-md-3">

      <div class="nav flex-column nav-pills" aria-orientation="vertical">
            <a class="nav-link " href="#">About us</a>

            <a class="nav-link" href="/certificate">Certificate</a>
            <a class="nav-link  " href="/company-profile">Commpany Profile</a>
            <a class="nav-link" href="/products">Products</a>
            <a class="nav-link" href="/global-partners">Global Partners</a>
            <a class="nav-link active" href="/projects">Our Projects</a>
            <a class="nav-link" href="/news">News</a>
            <a class="nav-link " href="/contact-us">Contact us</a>
        </div>
      </div>
      <div class="col-md-9">
         <div class="row">
              <?php foreach($projects as $item):?>
            <div class="col-md-4 pb-2">
                <div class="card text-bg-dark">
                <div style="
                    height: 260px; 
                    width: 100%;
                    background-color: rgba(0,0,0,0.15);
                    background-image: url('<?= assets("/uploads/".$item['project_image']) ?>');
                    background-size: contain;
                    background-repeat: no-repeat;
                    background-position: center center;
                    ">
                    </div>
                    <div class="card-img-overlay" style="background-color: rgba(0, 0, 0, 0.2)">
                        <h5 class="card-title" style="position: absolute; top:85%; text-transform:uppercase"><?= $item['location'] ?></h5>
                    </div>
                </div>
           </div>
            <?php endforeach; ?>
         </div>
      </div>

    </div>
</div>
<?php 

    template_include("/frontend/partials/footer");

?>