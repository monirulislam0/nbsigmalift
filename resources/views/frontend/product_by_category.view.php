<?php 

    template_include("/frontend/partials/header");

?>



  <!-- Shop Page -->
    <div class="container py-5">
        <div class="row">

            <!-- Products Section -->
             <div class="col-md-3">
             <div class="nav flex-column nav-pills" aria-orientation="vertical">
                    <a class="nav-link active" href="#">Categories</a>
                    <?php
                        $categories = \app\http\models\Categories::all()->get();
                        foreach($categories as $category):
                    ?>
                    <a class="nav-link" href="/products-categories/<?= strtolower(rtrim(preg_replace('/[\/\s]+/', '-', $category['category_name']), '-'))."-".$category['id'] ?>"><?= $category['category_name'] ?></a>
                    <?php 
                        endforeach;
                    ?>
                </div>
             </div>
            <div class="col-md-9">
                <h4 class="p-3">Products By Category "<?= $searched['category_name'] ?? $searched['subcategory_name'] ?>"</h4>
                
                <div class="row" id="product-list">
                    <?php 
                        foreach($products as $product):
                    ?>
                    <!-- Sample Product Cards -->
                    <div class="col-md-4 mb-4 product-item" data-category="electronics">
                       <a href="/product/<?= strtolower(rtrim(preg_replace('/[\/\s]+/', '-', $product['product_title']), '-'))."-".$product['id'] ?>">
                      <div class="card">
                        <style>
                            .product_image {
                            height: 350px; 
                            width: 100%;
                            background-color: rgba(0,0,0,0.15);
                            background-size: contain;
                            background-repeat: no-repeat;
                            background-position: center center;
                            }
                        </style>
                        <div class="product_image" style="background-image: url('<?= assets("/uploads/".$product['product_thumbnail'])?>');">
                        </div>
                            
                            <div class="card-body">
                                <h8 class="card-title text-center bold"><?= $product['product_title'] ?> </h8>
                               
                                     
                                    
                            </div>
                        </div>
                       
                       </a>
                    </div>
                    <?php 

                        endforeach;

                        if(! count($products)) echo "<h2>No Product(s) found for this category !!<h2>";
                    ?>

                    <!-- Add more products as needed -->
                </div>
            </div>
        </div>
    </div>




<?php 

    template_include("/frontend/partials/footer");

?>