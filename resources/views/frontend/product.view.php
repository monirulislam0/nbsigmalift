<?php 
    $route = '/products';
    template_include("/frontend/partials/header",compact('page','route'));
//    template_include("/frontend/partials/banner", compact("page"));

?>



  <!-- Shop Page -->
    <div class="container py-5">
        <div class="row">
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
            <!-- Products Section -->
            <div class="col-md-9">
                <h4 class="p-3">Products</h4>
                <div class="row" id="product-list">
                    <?php 

                        foreach($products as $product):
                    ?>
                    <!-- Sample Product Cards -->
                    <div class="col-md-4 mb-4 product-item" data-category="electronics">
                       <a  style="text-decoration:none ;"href="/product/<?= strtolower(rtrim(preg_replace('/[\/\s]+/', '-', $product['product_title']), '-'))."-".$product['id'] ?>">
                       <div class="card">
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
                                <h8 class="card-title text-center bold"><?= $product['product_title'] ?> </h8>
                                
                            </div>
                        </div>
                       </a>
                    </div>
                    <?php 

                        endforeach;
                    ?>

                    <!-- Add more products as needed -->
                </div>
            </div>
            <style>
            .pagination {
            justify-content: center;
            margin-top: 20px;
            }
            .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            }
            .page-link {
            border-radius: 50px;
            padding: 10px 20px;
            font-size: 16px;
            }
            .page-item:hover .page-link {
            background-color: #e9ecef;
            }
            .page-item:first-child .page-link,
            .page-item:last-child .page-link {
            padding: 10px 16px;
            }
        </style>
        <?php 
            if(count($products)):
        ?>
            <div class="col-md-9 ">
                <div class="py-5">
                <div class="row">
                    <nav>
                    <ul class="pagination">
                        <?php 
                            $pageNumbers = $_GET['page'] ?? 1 ;

                        ?>
                        <li class="page-item <?= $pageNumbers > 1 ? ' ' : 'disabled' ?>">
                        <a class="page-link" href="/products?page=<?= $pageNumbers -  1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item <?= $pageNumbers == 1 ? 'active' : '' ?> ">
                        <a class="page-link" href="/products">1</a>
                        </li>
                        <?php for($i = 2; $i <= $rows ; $i++): ?>
                            <li class="page-item <?= $pageNumbers == $i ? 'active' : '' ?>">
                            <a class="page-link" href="products?page=<?= $i?>"><?= $i ?></a>
                            </li>
                        <?php endfor;?>
                        <li class="page-item <?= $pageNumbers == $rows ? 'disabled' : '' ?>">
                        <a class="page-link" href="/products?page=<?= $pageNumbers +  1 ?>">Next</a>
                        </li>
                    </ul>
                    </nav>
                </div>
                </div>
            </div>
        <?php 
            endif;
        ?>
        </div>
    </div>




<?php 

    template_include("/frontend/partials/footer");

?>