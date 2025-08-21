<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vintage Threads | Retro Clothing Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Playfair Display', serif;
        }
        
        :root {
            --cream: #F5F1E8;
            --dark-brown: #3A3228;
            --light-brown: #9C8779;
            --gold: #C8A97E;
            --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        body {
            background-color: var(--cream);
            color: var(--dark-brown);
            overflow-x: hidden;
            min-height: 100vh;
            cursor: none;
        }
        
        /* Custom Cursor */
        .cursor {
            width: 25px;
            height: 25px;
            border: 2px solid var(--dark-brown);
            border-radius: 50%;
            position: fixed;
            transform: translate(-50%, -50%);
            pointer-events: none;
            z-index: 9999;
            transition: transform 0.1s, width 0.2s, height 0.2s;
            mix-blend-mode: difference;
        }
        
        .cursor-follower {
            width: 8px;
            height: 8px;
            background-color: var(--dark-brown);
            border-radius: 50%;
            position: fixed;
            transform: translate(-50%, -50%);
            pointer-events: none;
            z-index: 9998;
            transition: transform 0.2s, width 0.2s, height 0.2s;
        }
        
        .cursor.hover, .cursor-follower.hover {
            transform: translate(-50%, -50%) scale(1.5);
            background-color: var(--gold);
        }
        
        /* Particles Background */
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        
        /* Navigation */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 5%;
            background-color: var(--cream);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .logo {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-brown);
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        
        .logo i {
            margin-right: 0.5rem;
            color: var(--gold);
            transition: var(--transition);
        }
        
        .logo:hover i {
            transform: rotate(-20deg);
        }
        
        .nav-links {
            display: flex;
            list-style: none;
        }
        
        .nav-links li {
            margin: 0 1.2rem;
        }
        
        .nav-links a {
            color: var(--dark-brown);
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 500;
            position: relative;
            padding: 0.5rem 0;
            transition: var(--transition);
        }
        
        .nav-links a:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--gold);
            transition: var(--transition);
        }
        
        .nav-links a:hover:after {
            width: 100%;
        }
        
        .nav-icons {
            display: flex;
            align-items: center;
        }
        
        .nav-icons i {
            font-size: 1.4rem;
            margin-left: 1.5rem;
            color: var(--dark-brown);
            transition: var(--transition);
            cursor: pointer;
        }
        
        .nav-icons i:hover {
            color: var(--gold);
            transform: translateY(-3px);
        }
        
        .menu-btn {
            display: none;
            font-size: 1.8rem;
            cursor: pointer;
        }
        
        /* Hero Section */
        .hero {
            height: 90vh;
            display: flex;
            align-items: center;
            padding: 0 5%;
            position: relative;
            overflow: hidden;
        }
        
        .hero-content {
            max-width: 600px;
            z-index: 1;
        }
        
        .hero h1 {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 1s forwards 0.5s;
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            line-height: 1.6;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 1s forwards 0.8s;
        }
        
        .btn {
            display: inline-block;
            padding: 1rem 2.5rem;
            background-color: var(--dark-brown);
            color: var(--cream);
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: var(--transition);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 1s forwards 1.1s;
            border: 2px solid var(--dark-brown);
        }
        
        .btn:hover {
            background-color: transparent;
            color: var(--dark-brown);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .hero-image {
            position: absolute;
            right: 5%;
            bottom: 0;
            height: 90%;
            opacity: 0;
            transform: translateX(50px);
            animation: fadeRight 1.5s forwards 1s;
        }
        
        /* Featured Products */
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin: 4rem 0 3rem;
            position: relative;
            padding-bottom: 1rem;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background-color: var(--gold);
        }
        
        .products {
            padding: 2rem 5%;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2.5rem;
        }
        
        .product-card {
            background: rgba(255, 255, 255, 0.7);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            transition: var(--transition);
            opacity: 0;
            transform: translateY(50px);
        }
        
        .product-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        
        .product-img {
            height: 280px;
            overflow: hidden;
            position: relative;
        }
        
        .product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }
        
        .product-card:hover .product-img img {
            transform: scale(1.1);
        }
        
        .product-info {
            padding: 1.5rem;
        }
        
        .product-info h3 {
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
        }
        
        .product-info p {
            color: var(--light-brown);
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        
        .product-price {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .price {
            font-weight: 700;
            font-size: 1.3rem;
            color: var(--dark-brown);
        }
        
        .add-to-cart {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--cream);
            cursor: pointer;
            transition: var(--transition);
        }
        
        .add-to-cart:hover {
            transform: rotate(180deg) scale(1.1);
            background-color: var(--dark-brown);
        }
        
        /* About Section */
        .about {
            padding: 6rem 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        
        .about-image {
            flex: 1;
            min-width: 300px;
            margin-right: 3rem;
            opacity: 0;
            transform: translateX(-50px);
        }
        
        .about-image img {
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .about-content {
            flex: 1;
            min-width: 300px;
            opacity: 0;
            transform: translateX(50px);
        }
        
        .about-content h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }
        
        .about-content p {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }
        
        /* Newsletter */
        .newsletter {
            background-color: var(--dark-brown);
            color: var(--cream);
            padding: 5rem 5%;
            text-align: center;
            opacity: 0;
            transform: translateY(50px);
        }
        
        .newsletter h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }
        
        .newsletter p {
            max-width: 600px;
            margin: 0 auto 2rem;
            font-size: 1.1rem;
            line-height: 1.6;
        }
        
        .newsletter-form {
            display: flex;
            max-width: 500px;
            margin: 0 auto;
        }
        
        .newsletter-form input {
            flex: 1;
            padding: 1rem 1.5rem;
            border: none;
            border-radius: 50px 0 0 50px;
            font-size: 1rem;
            outline: none;
        }
        
        .newsletter-form button {
            padding: 1rem 2rem;
            background-color: var(--gold);
            color: var(--cream);
            border: none;
            border-radius: 0 50px 50px 0;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .newsletter-form button:hover {
            background-color: var(--cream);
            color: var(--dark-brown);
        }
        
        /* Footer */
        footer {
            background-color: var(--cream);
            padding: 4rem 5% 2rem;
            box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 3rem;
        }
        
        .footer-column {
            flex: 1;
            min-width: 250px;
            margin-bottom: 2rem;
        }
        
        .footer-column h3 {
            font-size: 1.4rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .footer-column h3:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: var(--gold);
        }
        
        .footer-column p, .footer-column a {
            color: var(--light-brown);
            margin-bottom: 0.8rem;
            display: block;
            text-decoration: none;
            transition: var(--transition);
        }
        
        .footer-column a:hover {
            color: var(--dark-brown);
            transform: translateX(5px);
        }
        
        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .social-icons a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--light-brown);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--cream);
            transition: var(--transition);
        }
        
        .social-icons a:hover {
            background-color: var(--gold);
            transform: translateY(-5px);
        }
        
        .copyright {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            color: var(--light-brown);
        }
        
        /* Modal */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s ease;
        }
        
        .modal.active {
            opacity: 1;
            visibility: visible;
        }
        
        .modal-content {
            background-color: var(--cream);
            width: 90%;
            max-width: 500px;
            border-radius: 15px;
            padding: 2.5rem;
            position: relative;
            transform: translateY(-50px);
            transition: all 0.4s ease;
        }
        
        .modal.active .modal-content {
            transform: translateY(0);
        }
        
        .close-modal {
            position: absolute;
            top: 1rem;
            right: 1.5rem;
            font-size: 1.8rem;
            cursor: pointer;
            color: var(--light-brown);
            transition: var(--transition);
        }
        
        .close-modal:hover {
            color: var(--dark-brown);
            transform: rotate(90deg);
        }
        
        .modal-title {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: var(--dark-brown);
        }
        
        .modal-body {
            margin-bottom: 2rem;
        }
        
        .modal-body p {
            line-height: 1.6;
            margin-bottom: 1rem;
        }
        
        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }
        
        .btn-outline {
            background-color: transparent;
            color: var(--dark-brown);
            border: 2px solid var(--dark-brown);
        }
        
        .btn-outline:hover {
            background-color: var(--dark-brown);
            color: var(--cream);
        }
        
        /* Animations */
        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeRight {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        /* Responsive Styles */
        @media (max-width: 992px) {
            .hero h1 {
                font-size: 3rem;
            }
            
            .hero-image {
                height: 70%;
            }
            
            .about-image, .about-content {
                margin: 0 0 2rem;
            }
        }
        
        @media (max-width: 768px) {
            .nav-links {
                position: fixed;
                top: 70px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 70px);
                background-color: var(--cream);
                flex-direction: column;
                align-items: center;
                justify-content: center;
                transition: var(--transition);
                padding: 2rem;
            }

            .nav-links li {
                margin: 1.2rem 0;
            }

            .nav-links a {
                font-size: 1.4rem;
            }
            
            .nav-links.active {
                left: 0;
            }
            
            .nav-links li {
                margin: 1.5rem 0;
            }
            
            .menu-btn {
                display: block;
            }
            
            .hero {
                flex-direction: column;
                justify-content: center;
                text-align: center;
            }
            
            .hero-content {
                margin-bottom: 3rem;
            }
            
            .hero-image {
                position: relative;
                right: 0;
                height: 300px;
                margin-top: 2rem;
            }
            
            .newsletter-form {
                flex-direction: column;
            }
            
            .newsletter-form input {
                border-radius: 50px;
                margin-bottom: 1rem;
            }
            
            .newsletter-form button {
                border-radius: 50px;
            }
        }
        
        @media (max-width: 576px) {
            .hero h1 {
                font-size: 2rem;
                line-height: 1.3;
                margin-bottom: 1rem;
            }

            .hero p {
                font-size: 1rem;
                margin-bottom: 1.5rem;
            }

            .btn {
                padding: 0.8rem 1.8rem;
                font-size: 0.9rem;
            }

            .nav-icons i {
                font-size: 1.2rem;
                margin-left: 1rem;
            }

            .menu-btn {
                font-size: 1.5rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .product-card {
                min-width: 100%;
            }
            
            .modal-content {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Custom Cursor -->
    <div class="cursor"></div>
    <div class="cursor-follower"></div>
    
    <!-- Particles Background -->
    <div id="particles-js"></div>
    
    <!-- Navigation -->
    <nav>
        <a href="#" class="logo">
            <i class="fas fa-vest"></i>
            Vintage Threads
        </a>
        
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">Collections</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        
        <div class="nav-icons">
            <i class="fas fa-search"></i>
            <i class="fas fa-shopping-cart"></i>
            <i class="fas fa-user"></i>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Timeless Style for the Modern Classic</h1>
            <p>Discover our curated collection of vintage-inspired clothing that blends retro charm with contemporary comfort.</p>
            <a href="#" class="btn">Shop Collection</a>
        </div>
        <img src="https://images.unsplash.com/photo-1525299374597-911581e1bdef?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80" alt="Fashion Model" class="hero-image">
    </section>
    
    <!-- Featured Products -->
    <h2 class="section-title">Featured Collection</h2>
    <section class="products">
        <div class="product-card">
            <div class="product-img">
                <img src="https://images.unsplash.com/photo-1551232864-3f0890e580d9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80" alt="Classic Shirt">
            </div>
            <div class="product-info">
                <h3>Vintage Button-Up</h3>
                <p>Classic fit with retro pattern</p>
                <div class="product-price">
                    <span class="price">$49.99</span>
                    <div class="add-to-cart">
                        <i class="fas fa-plus"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="product-card">
            <div class="product-img">
                <img src="https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80" alt="Denim Jacket">
            </div>
            <div class="product-info">
                <h3>Retro Denim Jacket</h3>
                <p>Vintage wash with classic details</p>
                <div class="product-price">
                    <span class="price">$89.99</span>
                    <div class="add-to-cart">
                        <i class="fas fa-plus"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="product-card">
            <div class="product-img">
                <img src="https://images.unsplash.com/photo-1618932260643-eee4a2f652a6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80" alt="High-Waisted Trousers">
            </div>
            <div class="product-info">
                <h3>High-Waisted Trousers</h3>
                <p>Elegant and comfortable</p>
                <div class="product-price">
                    <span class="price">$59.99</span>
                    <div class="add-to-cart">
                        <i class="fas fa-plus"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="product-card">
            <div class="product-img">
                <img src="https://images.unsplash.com/photo-1582142306909-195724d3a58c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80" alt="Summer Dress">
            </div>
            <div class="product-info">
                <h3>Floral Summer Dress</h3>
                <p>Lightweight with vintage pattern</p>
                <div class="product-price">
                    <span class="price">$75.99</span>
                    <div class="add-to-cart">
                        <i class="fas fa-plus"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- About Section -->
    <section class="about">
        <div class="about-image">
            <img src="https://images.unsplash.com/photo-1603400521630-9f2de124b33b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80" alt="Store Interior">
        </div>
        <div class="about-content">
            <h2>Our Story</h2>
            <p>Founded in 1995, Vintage Threads began as a small boutique with a passion for timeless fashion. We believe that true style transcends trends and that the most cherished pieces in your wardrobe are those with character and history.</p>
            <p>Today, we continue to curate collections that blend vintage aesthetics with modern comfort, ensuring each piece tells a story while fitting seamlessly into contemporary life.</p>
            <a href="#" class="btn">Learn More</a>
        </div>
    </section>
    
    <!-- Newsletter -->
    <section class="newsletter">
        <h2>Join Our Newsletter</h2>
        <p>Subscribe to our newsletter to receive updates on new arrivals, special offers, and exclusive discounts.</p>
        <form class="newsletter-form">
            <input type="email" placeholder="Your email address">
            <button type="submit">Subscribe</button>
        </form>
    </section>
    
    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-column">
                <h3>Vintage Threads</h3>
                <p>Timeless style for the modern classic. Quality clothing with a retro touch for everyday elegance.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>
            
            <div class="footer-column">
                <h3>Shop</h3>
                <a href="#">Women's Collection</a>
                <a href="#">Men's Collection</a>
                <a href="#">Accessories</a>
                <a href="#">New Arrivals</a>
                <a href="#">Sale</a>
            </div>
            
            <div class="footer-column">
                <h3>Support</h3>
                <a href="#">Contact Us</a>
                <a href="#">FAQs</a>
                <a href="#">Shipping & Returns</a>
                <a href="#">Size Guide</a>
                <a href="#">Privacy Policy</a>
            </div>
            
            <div class="footer-column">
                <h3>Contact</h3>
                <p><i class="fas fa-map-marker-alt"></i> 123 Retro Avenue, Fashion District</p>
                <p><i class="fas fa-phone"></i> (555) 123-4567</p>
                <p><i class="fas fa-envelope"></i> info@vintagethreads.com</p>
            </div>
        </div>
        
        <div class="copyright">
            <p>&copy; 2023 Vintage Threads. All rights reserved.</p>
        </div>
    </footer>
    
    <!-- Modal -->
    <div class="modal" id="newsletter-modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2 class="modal-title">Subscribe to our newsletter</h2>
            <div class="modal-body">
                <p>Join our community of fashion enthusiasts and be the first to know about new collections, exclusive offers, and style tips.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Your email address">
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline">Cancel</button>
                <button class="btn">Subscribe</button>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        // Initialize particles.js
        document.addEventListener('DOMContentLoaded', function() {
            particlesJS('particles-js', {
                particles: {
                    number: { value: 30, density: { enable: true, value_area: 800 } },
                    color: { value: "#9C8779" },
                    shape: { type: "circle" },
                    opacity: { value: 0.5, random: true },
                    size: { value: 3, random: true },
                    line_linked: { enable: true, distance: 150, color: "#9C8779", opacity: 0.4, width: 1 },
                    move: { enable: true, speed: 2, direction: "none", random: true, straight: false, out_mode: "out" }
                },
                interactivity: {
                    detect_on: "canvas",
                    events: { onhover: { enable: true, mode: "repulse" }, onclick: { enable: true, mode: "push" } }
                }
            });
            
            // Custom cursor
            const cursor = document.querySelector('.cursor');
            const cursorFollower = document.querySelector('.cursor-follower');
            
            document.addEventListener('mousemove', function(e) {
                cursor.style.transform = `translate3d(${e.clientX}px, ${e.clientY}px, 0)`;
                cursorFollower.style.transform = `translate3d(${e.clientX}px, ${e.clientY}px, 0)`;
            });
            
            // Hover effect for cursor
            const hoverElements = document.querySelectorAll('a, button, .add-to-cart, .nav-icons i, .menu-btn');
            
            hoverElements.forEach(el => {
                el.addEventListener('mouseenter', () => {
                    cursor.classList.add('hover');
                    cursorFollower.classList.add('hover');
                });
                
                el.addEventListener('mouseleave', () => {
                    cursor.classList.remove('hover');
                    cursorFollower.classList.remove('hover');
                });
            });
            
            // Scroll animations
            function checkScroll() {
                const products = document.querySelectorAll('.product-card');
                const aboutImage = document.querySelector('.about-image');
                const aboutContent = document.querySelector('.about-content');
                const newsletter = document.querySelector('.newsletter');
                
                products.forEach((product, index) => {
                    const position = product.getBoundingClientRect();
                    
                    if(position.top < window.innerHeight - 100) {
                        setTimeout(() => {
                            product.style.opacity = '1';
                            product.style.transform = 'translateY(0)';
                        }, index * 200);
                    }
                });
                
                if(aboutImage) {
                    const aboutImagePosition = aboutImage.getBoundingClientRect();
                    if(aboutImagePosition.top < window.innerHeight - 100) {
                        aboutImage.style.opacity = '1';
                        aboutImage.style.transform = 'translateX(0)';
                    }
                }
                
                if(aboutContent) {
                    const aboutContentPosition = aboutContent.getBoundingClientRect();
                    if(aboutContentPosition.top < window.innerHeight - 100) {
                        aboutContent.style.opacity = '1';
                        aboutContent.style.transform = 'translateX(0)';
                    }
                }
                
                if(newsletter) {
                    const newsletterPosition = newsletter.getBoundingClientRect();
                    if(newsletterPosition.top < window.innerHeight - 100) {
                        newsletter.style.opacity = '1';
                        newsletter.style.transform = 'translateY(0)';
                    }
                }
            }
            
            window.addEventListener('scroll', checkScroll);
            window.addEventListener('load', checkScroll);
            
            // Modal functionality
            const modal = document.getElementById('newsletter-modal');
            const closeModal = document.querySelector('.close-modal');
            const cancelBtn = document.querySelector('.btn-outline');
            const subscribeBtn = document.querySelector('.modal-footer .btn');
            
            function openModal() {
                modal.classList.add('active');
            }
            
            function closeModalFunc() {
                modal.classList.remove('active');
            }
            
            // Open modal after 3 seconds
            setTimeout(openModal, 3000);
            
            closeModal.addEventListener('click', closeModalFunc);
            cancelBtn.addEventListener('click', closeModalFunc);
            subscribeBtn.addEventListener('click', function(e) {
                e.preventDefault();
                alert('Thank you for subscribing!');
                closeModalFunc();
            });
            
            // Mobile menu
            const menuBtn = document.querySelector('.menu-btn');
            const menuIcon = menuBtn.querySelector('i');
            const navLinks = document.querySelector('.nav-links');
            
            menuBtn.addEventListener('click', function() {
                navLinks.classList.toggle('active');
                if(navLinks.classList.contains('active')) {
                    menuIcon.classList.remove('fa-bars');
                    menuIcon.classList.add('fa-times');
                } else {
                    menuIcon.classList.remove('fa-times');
                    menuIcon.classList.add('fa-bars');
                }
            });
        });
    </script>
</body>
</html>