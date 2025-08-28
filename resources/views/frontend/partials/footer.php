<?php 
    $site_settings = \app\http\models\SiteSettings::all()->first()->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #3498db;
        --accent-color: #e74c3c;
        --light-bg: #f8f9fa;
        --dark-text: #2c3e50;
        --light-text: #ecf0f1;
        --transition-speed: 0.3s;
        --footer-dark: #1e2a38; /* Professional dark blue */
    }
    
    /* Modern Footer */
    .footer {
        background: linear-gradient(135deg, var(--primary-color), var(--footer-dark));
        color: var(--light-text);
        padding: 60px 0 20px;
        position: relative;
        overflow: hidden;
    }
    
    .footer:before {
        content: '';
        position: absolute;
        top: -50px;
        left: 0;
        right: 0;
        height: 100px;
        background: linear-gradient(to bottom, rgba(255,255,255,0.05), transparent);
        z-index: 1;
    }
    
    .footer .logo {
        height: 70px;
        width: 100%;
        max-width: 250px;
        margin: 0 auto 20px;
        filter: brightness(0) invert(1);
        position: relative;
        z-index: 2;
    }
    
    .footer h5 {
        font-weight: 600;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 10px;
        z-index: 2;
    }
    
    .footer h5:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background: var(--secondary-color);
        border-radius: 2px;
    }
    
    .footer p {
        opacity: 0.9;
        line-height: 1.8;
        margin-bottom: 20px;
        position: relative;
        z-index: 2;
    }
    
    .footer ul {
        padding-left: 0;
        z-index: 2;
        position: relative;
    }
    
    .footer ul li {
        margin-bottom: 12px;
        list-style: none;
        transition: transform var(--transition-speed) ease;
    }
    
    .footer ul li:hover {
        transform: translateX(8px);
    }
    
    .footer ul li a {
        color: var(--light-text);
        text-decoration: none;
        display: block;
        position: relative;
        padding-left: 20px;
        opacity: 0.9;
        transition: all var(--transition-speed) ease;
    }
    
    .footer ul li a:before {
        content: '→';
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        transition: all var(--transition-speed) ease;
        color: var(--secondary-color);
    }
    
    .footer ul li a:hover {
        color: var(--secondary-color);
        opacity: 1;
        padding-left: 28px;
    }
    
    .footer ul li a:hover:before {
        opacity: 1;
    }
    
    .contact-info {
        position: relative;
        z-index: 2;
    }
    
    .contact-info p {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 15px;
    }
    
    .contact-info i {
        color: var(--secondary-color);
        font-size: 1.2rem;
        min-width: 20px;
        margin-top: 4px;
    }
    
    .social-icons {
        display: flex;
        gap: 15px;
        margin-top: 20px;
        z-index: 2;
        position: relative;
    }
    
    .social-icons a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(255,255,255,0.1);
        color: white;
        font-size: 18px;
        transition: all var(--transition-speed) ease;
    }
    
    .social-icons a:hover {
        background: var(--secondary-color);
        transform: translateY(-5px) scale(1.1);
    }
    
    .footer hr {
        background: rgba(255,255,255,0.1);
        height: 1px;
        margin: 40px 0 25px;
    }
    
    .copyright {
        text-align: center;
        padding-top: 20px;
        font-size: 0.9rem;
        opacity: 0.7;
        position: relative;
        z-index: 2;
    }
    
    /* Floating social icons */
    .floating-social {
        position: fixed;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        z-index: 1000;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    
    .floating-social a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        color: white;
        font-size: 24px;
        text-decoration: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .floating-social a:after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: rgba(255,255,255,0.1);
        top: 0;
        left: 0;
        transform: scale(0);
        border-radius: 50%;
        transition: transform 0.3s ease;
    }
    
    .floating-social a:hover:after {
        transform: scale(1);
    }
    
    .floating-social a:hover {
        transform: translateY(-5px);
    }
    
    .floating-social a.whatsapp {
        background: linear-gradient(135deg, #25D366, #128C7E);
    }
    
    .floating-social a.messenger {
        background: linear-gradient(135deg, #006AFF, #00B2FF);
    }
    
    .floating-social a.email {
        background: linear-gradient(135deg, #EA4335, #D44638);
    }
    
    .floating-social i {
        transition: transform 0.3s ease;
    }
    
    .floating-social a:hover i {
        transform: scale(1.2);
    }
    
    .floating-social .tooltip {
        position: absolute;
        right: 70px;
        background: rgba(0,0,0,0.8);
        color: white;
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 14px;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        pointer-events: none;
    }
    
    .floating-social .tooltip:after {
        content: '';
        position: absolute;
        right: -10px;
        top: 50%;
        transform: translateY(-50%);
        border-width: 5px;
        border-style: solid;
        border-color: transparent transparent transparent rgba(0,0,0,0.8);
    }
    
    .floating-social a:hover .tooltip {
        opacity: 1;
        visibility: visible;
        right: 75px;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .footer .col-md-4 {
            margin-bottom: 40px;
            text-align: center;
        }
        
        .footer h5:after {
            left: 50%;
            transform: translateX(-50%);
        }
        
        .social-icons {
            justify-content: center;
        }
        
        .floating-social {
            display: none;
        }
    }
    
    /* Animation for elements */
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
    
    .floating-social a {
        animation: float 4s ease-in-out infinite;
    }
    
    .floating-social a.whatsapp {
        animation-delay: 0.2s;
    }
    
    .floating-social a.messenger {
        animation-delay: 0.4s;
    }
    
    .floating-social a.email {
        animation-delay: 0.6s;
    }
    
    /* Decorative elements */
    .footer-pattern {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            radial-gradient(circle at 10% 20%, rgba(52, 152, 219, 0.05) 0%, transparent 20%),
            radial-gradient(circle at 90% 80%, rgba(231, 76, 60, 0.05) 0%, transparent 20%);
        z-index: 1;
    }
  </style>
</head>
<body>

<!-- Floating social icons -->
<div class="floating-social">
    <a href="https://wa.me/+8616622133544" target="_blank" class="whatsapp">
        <i class="fa-brands fa-whatsapp"></i>
        <span class="tooltip">Chat on WhatsApp</span>
    </a>
    <a href="http://m.me/214947331706489" target="_blank" class="messenger">
        <i class="fa-brands fa-facebook-messenger"></i>
        <span class="tooltip">Message on Messenger</span>
    </a>
    <a href="mailto:sales@hayashimulift-jp.com" class="email">
        <i class="fa-solid fa-envelope"></i>
        <span class="tooltip">Email Us</span>
    </a>
</div>

<footer class="footer mt-5">
    <div class="footer-pattern"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="logo" style="
                    background-image: url('<?= assets("/uploads/".$site_settings['logo']) ?>');
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: contain;
                "></div>
               
                <p>HAYASHIMU Elevator, established in 2011, specializes in the development and manufacturing of high-quality elevators, including passenger, home, cargo, car elevators, and escalators.</p>
                
                <div class="social-icons">
                    <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.youtube.com/@hayashimulift" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a href="https://www.instagram.com/hayashimulift/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/hayashimulift" target="_blank"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
            
            <div class="col-md-4 mb-4 mb-md-0">
                <h5><b>QUICK LINKS</b></h5>
                <ul class="list-unstyled">
                    <?php 
                    $categories = \app\http\models\Categories::all()->get();
                    foreach($categories as $keys => $category) :
                        if($keys == 7) break;
                    ?>
                    <li><a href="/products-categories/<?= strtolower(rtrim(preg_replace('/[\/\s]+/', '-', $category['category_name']), '-'))."-".$category['id'] ?>"><?= $category['category_name'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <div class="col-md-4">
                <h5><b>CONTACT US</b></h5>
                <div class="contact-info">
                    <p><i class="fas fa-phone-alt"></i> +8616622133544</p>
                    <p><i class="fas fa-envelope"></i> sales@hayashimulift-jp.com</p>
                    <p><i class="fas fa-map-marker-alt"></i> Building 3, No.1058, Taoyao Village, Lipu Town, Zhuji City, Zhejiang Province, China.</p>
                </div>
            </div>
        </div>
        
        <hr>
        
        <div class="copyright">
            <?= $site_settings['copywrite_text'] ?>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Animate elements on scroll
    document.addEventListener('DOMContentLoaded', function() {
        // Animate footer elements
        const footerElements = document.querySelectorAll('.footer .col-md-4');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = "1";
                    entry.target.style.transform = "translateY(0)";
                }
            });
        }, { threshold: 0.1 });
        
        footerElements.forEach(el => {
            el.style.opacity = "0";
            el.style.transform = "translateY(30px)";
            el.style.transition = "opacity 0.6s ease, transform 0.6s ease";
            observer.observe(el);
        });
    });
</script>
</body>
</html>