<?php 
 $site_settings = \app\http\models\SiteSettings::all()->first()->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Seo Information -->
    <meta name="description" content=" <?php 
        if(!empty($page['meta_description'])){
            echo $page['meta_description'];
        }else{
            echo $page['og_description'];
        }
    ?>">
    <meta name="keywords" content="<?= $page['meta_tags'] ?>">
    <title> <?php
    
       echo $page['page_title'] ;
    
    ?></title>
    <!-- Open Graph Meta Tags for Social Media -->
    <meta property="og:title" content="<?= $page['og_title'] ?? $page['page_title'] ?>">
    <meta property="og:description" content=" <?= trim( $page['og_description']) ?>">
    <meta property="og:type" content="article" />
    
    <meta property="og:image" content="<?= rtrim(getenv('SITE_URL'),'/')?><?= assets("/uploads/".$page['og_image']) ?? assets("/uploads/".$page['banner_image']) ?>">
    <meta property="og:url" content="<?= rtrim(getenv('SITE_URL'),'/').$route ?>">
    <meta property="og:type" content="article">
    <link rel="shortcut icon" href="<?= assets('/uploads/').$site_settings['icon'] ?>" type="image/x-icon">
    <link rel="canonical" href="<?= rtrim(getenv('SITE_URL'),'/').$route ?>">
    <!-- SEO Information -->
    
    <!--Meta Twitter-->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $page['og_title'] ?? $page['page_title'] ?>">
    <meta name="twitter:description" content="<?= trim($page['og_description']) ?>">
    <meta name="twitter:image" content="<?= rtrim(getenv('SITE_URL'), '/') . ( !empty($page['og_image']) ? assets("/uploads/".$page['og_image']) : assets("/uploads/".$page['banner_image']) ) ?>?v=1">
    <meta name="twitter:url" content="<?= rtrim(getenv('SITE_URL'), '/') . $route ?>">
    <!-- SEO Information -->
    <!--Meta Twitter End-->
    
    
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  
  <link rel="stylesheet" type="text/css" href="<?= assets("/frontend/assets/style.css") ?>">
  <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-bg: #f8f9fa;
            --dark-text: #2c3e50;
            --light-text: #ecf0f1;
            --transition-speed: 0.3s;
        }
        
        /* Modern Contact Bar */
        .contact-bar {
            background: linear-gradient(135deg, var(--primary-color), #1a2530);
            padding: 12px 0;
            color: var(--light-text);
            font-size: 0.9rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: relative;
            z-index: 1000;
        }
        
        .contact-bar a {
            color: var(--light-text);
            text-decoration: none;
            transition: all var(--transition-speed) ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .contact-bar a:hover {
            color: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .contact-text {
            position: relative;
        }
        
        .contact-text:after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--secondary-color);
            transition: width var(--transition-speed) ease;
        }
        
        .contact-bar a:hover .contact-text:after {
            width: 100%;
        }
        
        .social-icons a {
            font-size: 1.2rem;
            margin: 0 10px;
            position: relative;
            display: inline-block;
            transition: all var(--transition-speed) ease;
        }
        
        .social-icons a:hover {
            color: var(--secondary-color);
            transform: translateY(-3px) scale(1.1);
        }
        
        .social-icons a:after {
            content: '';
            position: absolute;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: rgba(52, 152, 219, 0.1);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: transform var(--transition-speed) ease;
            z-index: -1;
        }
        
        .social-icons a:hover:after {
            transform: translate(-50%, -50%) scale(1);
        }
        
        .search-icon {
            cursor: pointer;
            font-size: 1.2rem;
            color: var(--light-text);
            transition: all var(--transition-speed) ease;
            position: relative;
        }
        
        .search-icon:hover {
            color: var(--secondary-color);
            transform: scale(1.1);
        }
        
        .search-icon:after {
            content: '';
            position: absolute;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: rgba(52, 152, 219, 0.1);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: transform var(--transition-speed) ease;
            z-index: -1;
        }
        
        .search-icon:hover:after {
            transform: translate(-50%, -50%) scale(1);
        }
        
        /* Modern Search Bar */
        .search-container {
            width: 100%;
            background: linear-gradient(135deg, var(--secondary-color), #2980b9);
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .search-container input {
            width: 100%;
            padding: 10px 15px;
            border: none;
            border-radius: 30px;
            outline: none;
            background: rgba(255,255,255,0.9);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: all var(--transition-speed) ease;
        }
        
        .search-container input:focus {
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            background: white;
        }
        
        /* Enhanced Dropdown Styles */
        .dropdown-menu {
            border-radius: 0;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            padding: 0;
            overflow: hidden;
        }
        
        .dropdown-item {
            padding: 10px 20px;
            transition: all var(--transition-speed) ease;
            position: relative;
        }
        
        .dropdown-item:hover {
            background: var(--secondary-color);
            color: white;
            padding-left: 25px;
        }
        
        .dropdown-item:before {
            content: '';
            position: absolute;
            width: 4px;
            height: 0;
            left: 0;
            top: 0;
            background: var(--secondary-color);
            transition: height var(--transition-speed) ease;
        }
        
        .dropdown-item:hover:before {
            height: 100%;
        }
        
        .nav-link {
            transition: all var(--transition-speed) ease;
            position: relative;
            font-weight: 500;
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--secondary-color);
            transition: width var(--transition-speed) ease;
        }
        
        .nav-link:hover:after,
        .nav-link.active:after {
            width: 100%;
        }
        
        /* Modern Navbar */
        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 10px 0;
        }
        
        .navbar-toggler {
            border: none;
            outline: none;
            box-shadow: none;
        }
        
        .navbar-toggler i {
            color: var(--primary-color);
            font-size: 1.8rem;
            transition: transform var(--transition-speed) ease;
        }
        
        .navbar-toggler:hover i {
            transform: scale(1.1);
        }
        
        /* Contact info items animation */
        .contact-info-item {
            transition: transform var(--transition-speed) ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .contact-info-item:hover {
            transform: translateX(5px);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .contact-bar .col-md-4 {
                margin-bottom: 10px;
            }
            
            .social-icons {
                justify-content: center;
                margin-top: 10px;
            }
            
            .contact-info-item {
                justify-content: center;
            }
        }
    </style>
</head>
<body>

<div class="contact-bar position-relative">
  <div class="container">
    <div class="row text-center align-items-center">
      <div class="col-md-4">
        <div class="d-flex justify-content-center align-items-center flex-wrap">
          <div class="contact-info-item">
            <a href="https://wa.me/8616622133544" target="_blank">
              <i class="fa-brands fa-weixin animate__animated animate__pulse animate__infinite" style="animation-duration: 2s;"></i>
            </a>
          </div>
          <div class="contact-info-item">
            <a href="https://wa.me/8616622133544" target="_blank">
              <i class="fa-brands fa-whatsapp animate__animated animate__pulse animate__infinite" style="animation-duration: 2s; animation-delay: 0.2s;"></i>
            </a>
          </div>
          <div class="contact-info-item">
            <a href="tel:+8616622133544" target="_blank">
              <i class="fa-solid fa-phone animate__animated animate__pulse animate__infinite" style="animation-duration: 2s; animation-delay: 0.4s;"></i>
              <span class="contact-text">+8616622133544</span>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-info-item justify-content-center">
          <a href="mailto:sales@hayashimulift-jp.com">
            <i class="fas fa-envelope animate__animated animate__pulse animate__infinite" style="animation-duration: 2s; animation-delay: 0.6s;"></i>
            <span class="contact-text">sales@hayashimulift-jp.com</span>
          </a>
        </div>
      </div>
      <div class="col-md-4 d-flex justify-content-center align-items-center flex-wrap">
        <div class="social-icons d-flex">
          <a href="#" target="_blank" class="animate__animated animate__fadeIn"><i class="fab fa-linkedin"></i></a>
          <a href="#" target="_blank" class="animate__animated animate__fadeIn" style="animation-delay: 0.1s;"><i class="fab fa-twitter"></i></a>
          <a href="https://www.youtube.com/@hayashimulift" target="_blank" class="animate__animated animate__fadeIn" style="animation-delay: 0.2s;"><i class="fab fa-youtube"></i></a>
          <a href="https://www.instagram.com/hayashimulift" target="_blank" class="animate__animated animate__fadeIn" style="animation-delay: 0.3s;"><i class="fab fa-instagram"></i></a>
          <a href="https://www.facebook.com/hayashimulift" target="_blank" class="animate__animated animate__fadeIn" style="animation-delay: 0.4s;"><i class="fab fa-facebook"></i></a>
        </div>
        <!-- Search Icon -->
        <div class="ms-3">
          <i class="fas fa-search search-icon animate__animated animate__fadeIn" data-bs-toggle="collapse" data-bs-target="#searchContainer" style="animation-delay: 0.5s;"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Collapsible Search Bar -->
<div class="collapse" id="searchContainer">
  <div class="search-container">
    <div class="container">
      <form class="d-flex" action="/search/content" method="GET">
        <input type="text" class="form-control" placeholder="Search products, news, and more..." aria-label="Search" name="search_key">
      </form>
    </div>
  </div>
</div>


<nav class="navbar navbar-expand-lg sticky-top" style="padding-top:0px; padding-bottom:0px;">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
          <div class="logo" style="
                        background-image: url('<?= assets("/uploads/".$site_settings['logo']) ?>');
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size:contain;
                        height:56px;
                        width: 250px;
                    ">
              </div>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/about">About Us</a>
          <ul class="dropdown-menu" style="border-radius:0;">
              <li class="dropdown-submenu"><a href="/certificate" class="dropdown-item">Certificate</a></li>
              <li class="dropdown-submenu"><a href="/company-profile" class="dropdown-item">Company Profile</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/products" id="navbarDropdown" role="button" aria-expanded="false">
            Products
          </a>
          <?php 
            $categories = \app\http\models\Categories::all()->get();
            if(count($categories)):
             
          ?>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="border-radius:0;">
            <?php foreach($categories as $category) : 
              
              $subcategories = \app\http\models\SubCategories::where($category['id'],'category_id')->get();
              $has_subcategories = count($subcategories);
              
              ?>
            <li class="dropdown-submenu position-relative">
              <a class="dropdown-item 
              <?php if($has_subcategories) echo " dropdown-toggle" ?>
             
              
              " href="/products-categories/<?= strtolower(rtrim(preg_replace('/[\/\s]+/', '-', $category['category_name']), '-'))."-".$category['id'] ?>"><?= $category['category_name'] ?></a>
             <?php 
                
                if($has_subcategories):
             ?>
              <ul class="dropdown-menu" style="border-radius:0;">
                <?php foreach($subcategories as $subcategory) : ?>
                <li><a class="dropdown-item" href="/products-subcategories/<?= strtolower(rtrim(preg_replace('/[\/\s]+/', '-', $subcategory['subcategory_name']), '-'))."-".$subcategory['id'] ?>"><?= $subcategory['subcategory_name']; ?></a></li>
                <?php endforeach; ?>
              </ul>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/global-partners">Global Partners</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/projects">Our Projects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/news">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contact-us">Contact Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Add CSS for hover effect -->
<style>
  /* Hover effect for first-level dropdown */
  .nav-item.dropdown:hover > .dropdown-menu {
    display: block;
    animation: fadeIn 0.3s ease;
  }

  /* Hide the submenu by default */
  .dropdown-submenu .dropdown-menu {
    display: none;
    left: 100%;
    top: 0;
    margin-top: -1px;
    animation: fadeIn 0.3s ease;
  }

  /* Show the submenu on hover */
  .dropdown-submenu:hover > .dropdown-menu {
    display: block;
  }

  /* Fade in animation */
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Optional: Add some transition for smooth dropdown effects */
  .dropdown-menu {
    transition: opacity 0.3s ease, visibility 0.3s ease;
  }
</style>

</body>
</html>