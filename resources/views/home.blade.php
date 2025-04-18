<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="GymMinder">
    <meta name="description" content="GymMinder is your all-in-one gym management platform. Schedule, track, and grow your fitness business with ease.">
    <meta name="keywords" content="Gym Management, Fitness Software, Gym SaaS, Workout Scheduler, Gym CRM, GymMinder">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>GymMinder - Home</title>
    @vite("resources/css/app.css")
    <style>
        .outfit{
            font-family: "Outfit", sans-serif;
        }
        html{
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-[#030410] min-h-screen flex flex-col">
    <button onclick="goToTop()" id="scrollToTop" class="bg-blue-600 cursor-pointer p-3 fixed bottom-5 right-5 z-10 rounded-full shadow-lg hover:bg-blue-700 transition-colors">
        <i class="fas fa-arrow-up text-white text-lg"></i>
    </button>
    <!-- Navigation -->
    <nav class="container mx-auto flex items-center justify-between py-6 px-4 md:px-8 lg:px-[170px]">
        <div>
            <img src="{{ asset('assets/images/LogoWhite.png') }}" alt="GymMinder Logo" class="h-20">
        </div>
        
        <!-- Mobile Toggle Button -->
        <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
        
        <!-- Desktop Menu -->
        <ul class="hidden md:flex space-x-8 text-white font-medium">
            <li><a href="#" class="hover:text-blue-300">Home</a></li>
            <li><a href="#benefits" class="hover:text-blue-300">Benefits</a></li>
            <li><a href="#testimonials" class="hover:text-blue-300">Testimonials</a></li>
            <li><a href="#pricing" class="hover:text-blue-300">Prices</a></li>
        </ul>
        
        <div class="hidden md:flex space-x-4">
            @if (auth()->check())
            <a href="/dashboard" class="bg-blue-500 text-white px-5 py-2 rounded-lg font-medium hover:bg-blue-600 transition">Dashboard</a>
            @else
            <a href="/register" class="text-white  px-5 py-2 rounded-lg font-medium hover:bg-white hover:text-black hover:bg-opacity-10 transition">Sign up</a>
            <a href="/login" class="bg-blue-500 text-white px-5 py-2 rounded-lg font-medium hover:bg-blue-600 transition">Login</a>
            @endif
        </div>
    </nav>
    
    <!-- Mobile Menu-->
    <div id="mobile-menu" class="hidden bg-[#030410] border-t border-gray-800 py-4 px-4 md:px-8 lg:px-[170px]">
        <ul class="space-y-4 text-white mb-6">
            <li><a href="#home" class="block hover:text-blue-300">Home</a></li>
            <li><a href="#benefits" class="block hover:text-blue-300">Benefits</a></li>
            <li><a href="#testimonials" class="block hover:text-blue-300">Testimonials</a></li>
            <li><a href="#pricing" class="block hover:text-blue-300">Prices</a></li>
        </ul>
        <div class="flex flex-col space-y-3">
           
            @if (auth() -> check())
            <a href="/dashboard" class="bg-blue-500 text-white px-5 py-2 rounded-lg font-medium hover:bg-blue-600 transition">Dashboard</a>
            @else
            <a href="/register" class="text-white  px-5 py-2 rounded-lg font-medium hover:bg-white hover:text-black  hover:bg-opacity-10 transition text-center">Sign up</a>
            <a href="/login" class="bg-blue-500 text-white px-5 py-2 rounded-lg font-medium hover:bg-blue-600 transition text-center">Login</a>
            @endif
        </div>
    </div>
    <!-- Hero Section -->
    <section id="home" class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4  md:px-8 lg:px-[170px] py-16">
        <div data-aos="fade-right" class="max-w-xl text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-2 outfit">Effortless Gym <br>Management with <span class="text-blue-500">GYM <br>MINDER!</span></h1>
            <p class="mb-8 text-gray-300">Simplify memberships, streamline operations, payments, and <br>grow your gym with ease.</p>
            <a href="/register" class="bg-blue-500 text-white px-8 py-3 rounded-full font-medium shadow hover:bg-blue-600 transition">Get Started Now</a>
        </div>
        <div data-aos="fade-left class="mt-10 md:mt-0">
            <img src="{{ asset('assets/images/dashboard.jpg') }}" alt="GymMinder Dashboard" class="w-full max-w-md rounded-lg shadow-lg border border-gray-700">
        </div>
    </section>
    <!-- Features Section -->
    <section data-aos="fade-up" id="benefits" class="py-16 lg:pb-2 bg-[#030410] lg:relative">
        <div class="container mx-auto px-4 md:px-8 lg:px-[170px] lg:absolute z-20">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Membership Management Card -->
                <div style="background: #030410; box-shadow: 2px -2px 10px rgba(255, 255, 255, 0.05);" class=" rounded-3xl p-8 shadow-lg text-white border border-gray-800">
                    <div class="mb-4 w-16 h-16 rounded-full flex items-center justify-center mx-auto">
                       <img src="{{ asset('assets/images/1.png') }}" alt="icon">
                    </div>
                    <h3 class="font-bold text-2xl mb-3 text-center">Membership Management</h3>
                    <p class="text-gray-300 mb-6 text-center">Easily track members, subscriptions, and renewals in one place.</p>
                    <a href="/register" class="text-blue-400 hover:text-blue-300 flex items-center justify-center">
                        Join Now
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
                
                <!-- Payment Tracking Card -->
                <div style="background: #030410; box-shadow: 2px -2px 10px rgba(255, 255, 255, 0.05);" class=" rounded-3xl p-8 shadow-lg text-white border border-gray-800">
                    <div class="mb-4 w-16 h-16 rounded-full flex items-center justify-center mx-auto">
                        <img src="{{ asset('assets/images/2.png') }}" alt="icon">
                     </div>
                    <h3 class="font-bold text-2xl mb-3 text-center">Payment Tracking</h3>
                    <p class="text-gray-300 mb-6 text-center">Automate and manage payments, send reminders, and avoid revenue loss.</p>
                    <a href="/register" class="text-blue-400 hover:text-blue-300 flex items-center justify-center">
                        Join Now
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
                
                <!-- Business Analytics Card -->
                <div style="background: #030410; box-shadow: 2px -2px 10px rgba(255, 255, 255, 0.05);" class=" rounded-3xl p-8 shadow-lg text-white border border-gray-800">
                    <div class="mb-4 w-16 h-16 rounded-full flex items-center justify-center mx-auto">
                        <img src="{{ asset('assets/images/3.png') }}" alt="icon">
                     </div>
                    <h3 class="font-bold text-2xl mb-3 text-center">Analytics Dashboard</h3>
                    <p class="text-gray-300 mb-6 text-center">Gain insights into gym performance, revenue, and member engagement.</p>
                    <a href="/register" class="text-blue-400 hover:text-blue-300 flex items-center justify-center">
                        Join Now
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="w-full bg-gradient-to-b from-transparent hidden lg:block to-[#030410]">
            <div class="container mx-auto">
                <img src="{{ asset('assets/images/range.png') }}" alt="range" class="w-full">
            </div>
        </div>
    </section>

   

    <!-- Why Choose Section -->
    <section id="testimonials" class="container mx-auto py-8 md:py-0 px-4 md:px-8 lg:px-[170px]">
        <div class="flex flex-col md:flex-row gap-16 items-center">
            <div data-aos="fade-right" class="flex-1">
                <img src="{{ asset('assets/images/LogoWhite.png') }}" alt="GymMinder Mascot" class="w-full max-w-md mx-auto">
            </div>
            <div data-aos="fade-left" class="flex-1 text-white">
                <h2 class="text-2xl md:text-4xl font-bold text-white mb-12 ">Why Choose <span class="text-blue-500">GYM MINDER</span>?</h2>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <span class="text-blue-500 font-bold mr-3">•</span>
                        <p><span class="font-bold">30% Increase in Member Retention</span> - <span class="text-gray-300">Improve engagement and reduce dropouts.</span></p>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-500 font-bold mr-3">•</span>
                        <p><span class="font-bold">50% Faster Payment Processing</span> - <span class="text-gray-300">Automated reminders and online payment options.</span></p>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-500 font-bold mr-3">•</span>
                        <p><span class="font-bold">Real-time Analytics & Reports</span> - <span class="text-gray-300">Make data-driven decisions effortlessly.</span></p>
                    </li>
                </ul>
                <a href="/register" class="inline-block border border-white hover:bg-blue-500 text-white px-8 py-3 rounded-full font-medium mt-8  transition text-center ">GET STARTED NOW</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-16 bg-[#030410]" style="background-image: url('{{ asset('assets/images/bg.png') }}'); background-size: cover; background-position: center;">
        <div class="container mx-auto px-4 md:px-8 lg:px-[170px]">
            <h2 data-aos="fade-up" class="text-3xl font-bold text-white mb-2 text-center">What Our Clients Say</h2>
            <p data-aos="fade-up" class="text-gray-400 text-center mb-12">Discover What Does Our Proud Clients Say About Us</p>
            
            <div data-aos="fade-up" class="swiper testimonials-swiper pb-12 cursor-grab">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- First testimonial -->
                    <div class="swiper-slide">
                        <div class="backdrop-blur-lg rounded-2xl p-6 border border-gray-800" 
                        style="box-shadow: 2px -2px 10px rgba(255, 255, 255, 0.05);">
                            <p class="mb-6 text-gray-300">
                                "GymMinder transformed our gym operations completely! Member tracking is now 
                                seamless, and the payment system has reduced our admin work by half. 
                                Definitely worth every penny for any serious gym owner."
                            </p>
                            <hr class="border-gray-800 my-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Client" class="w-12 h-12 rounded-full mr-3">
                                    <div>
                                        <div class="text-white font-medium">Michael Thompson</div>
                                        <div class="text-gray-500 text-sm">Fitness Center Owner</div>
                                    </div>
                                </div>
                                <div class="text-yellow-400">★ ★ ★ ★ ★</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Second testimonial -->
                    <div class="swiper-slide">
                        <div class="backdrop-blur-lg rounded-2xl p-6 border border-gray-800" 
                        style="box-shadow: 2px -2px 10px rgba(255, 255, 255, 0.05);">
                            <p class="mb-6 text-gray-300">
                                "Since implementing GymMinder, our membership retention has increased by 35%! 
                                The automated reminders keep members engaged, and the analytics help us 
                                understand exactly what our customers want. Best business decision we've made."
                            </p>
                            <hr class="border-gray-800 my-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Client" class="w-12 h-12 rounded-full mr-3">
                                    <div>
                                        <div class="text-white font-medium">Sarah Jensen</div>
                                        <div class="text-gray-500 text-sm">Crossfit Studio Manager</div>
                                    </div>
                                </div>
                                <div class="text-yellow-400">★ ★ ★ ★ ★</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Third testimonial -->
                    <div class="swiper-slide">
                        <div class="backdrop-blur-lg rounded-2xl p-6 border border-gray-800" 
                        style="box-shadow: 2px -2px 10px rgba(255, 255, 255, 0.05);">
                            <p class="mb-6 text-gray-300">
                                "The billing system alone saved us countless hours each month. 
                                We've eliminated payment tracking errors and increased our revenue by 28%. 
                                The customer support team is incredibly responsive whenever we need help. and that's gives us more scalability"
                            </p>
                            <hr class="border-gray-800 my-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://randomuser.me/api/portraits/men/74.jpg" alt="Client" class="w-12 h-12 rounded-full mr-3">
                                    <div>
                                        <div class="text-white font-medium">David Rodriguez</div>
                                        <div class="text-gray-500 text-sm">Bodybuilding Gym Owner</div>
                                    </div>
                                </div>
                                <div class="text-yellow-400">★ ★ ★ ★ ★</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Fourth testimonial -->
                    <div class="swiper-slide">
                        <div class="backdrop-blur-lg rounded-2xl p-6 border border-gray-800" 
                        style="box-shadow: 2px -2px 10px rgba(255, 255, 255, 0.05);">
                            <p class="mb-6 text-gray-300">
                                "GymMinder's analytics dashboard gives me insights I never had before. 
                                I can see peak hours, track class attendance, and identify growth opportunities 
                                at a glance. The interface is intuitive and saves me hours of work every week."
                            </p>
                            <hr class="border-gray-800 my-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Client" class="w-12 h-12 rounded-full mr-3">
                                    <div>
                                        <div class="text-white font-medium">Emma Wilson</div>
                                        <div class="text-gray-500 text-sm">Yoga Studio Director</div>
                                    </div>
                                </div>
                                <div class="text-yellow-400">★ ★ ★ ★ ★</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Section -->
    <section id="pricing" class="pb-8 bg-[#030410]">
        <div class="container mx-auto px-4 md:px-8 lg:px-[170px]">
                        
            <div class="text-center mt-16">
                <h3 data-aos="fade-up" class="text-3xl font-bold text-white mb-4 md:w-1/2 mx-auto">What are you waiting <span class="text-blue-500">Join Now</span> and make your business go to the moon!</h3>
                <a data-aos="fade-up" href="/register" class="inline-block bg-blue-500 text-white px-8 py-3  font-medium mt-4 hover:bg-blue-600 transition rounded-full">Join Now</a>
            </div>
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div data-aos="fade-right" class="flex-1">
                    <img src="{{ asset('assets/images/LogoWhite.png') }}" alt="GymMinder Mascot" class="w-full max-w-md mx-auto">
                </div>
                
                <div data-aos="fade-left" class="md:w-1/2 text-white">
                    <h2 class="text-3xl font-bold mb-8">Simple & Affordable Pricing!</h2>
                    
                    <ul class="space-y-4">
                        <li class="flex items-center">
                            <span class="text-blue-500 mr-3">•</span>
                            <p><span class="font-bold">One-Time Subscription </span>– Get full access to all features for just $20/month</p>
                        </li>
                        <li class="flex items-center">
                            <span class="text-blue-500 mr-3">•</span>
                            <p class="font-bold">No hidden fees. Cancel anytime</p>
                        </li>
                    </ul>
                    
                    <a href="/register" class="inline-block border rounded-full  bg-transparent  px-8 py-3  font-medium mt-8 hover:bg-opacity-10 transition border-white hover:bg-blue-500 text-white">GET STARTED NOW</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#030410] py-8 mt-auto border-t-1 border-indigo-400">
        <div class="container mx-auto px-4 md:px-8 lg:px-[170px]">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-around">
                <div data-aos="fade-up" class="mb-6 md:mb-0 ">
                    <img src="{{ asset('assets/images/LogoWhite.png') }}" alt="GymMinder Logo" class="h-16 mx-auto">
                    <p class="text-gray-300 mt-4 max-w-md">
                        Gym Minder is an all-in-one platform for effortless gym management, helping gym owners streamline operations and boost member engagement.
                    </p>
                    <div class="mt-8 hidden md:block text-sm text-gray-500">
                        © 2023, Gym Minder. All rights reserved.
                    </div>
                </div>
                
                <div data-aos="fade-up" class="flex flex-col items-start">
                    <h3 class="text-white mb-4 text-lg">Home</h3>
                    <ul class="space-y-2">
                        <li><a href="#benefits" class="text-gray-400 hover:text-white">Benefits</a></li>
                        <li><a href="#testimonials" class="text-gray-400 hover:text-white">Testimonials</a></li>
                        <li><a href="#pricing" class="text-gray-400 hover:text-white">Prices</a></li>
                    </ul>
                </div>
                
                <div data-aos="fade-up" class="mt-6 md:mt-0">
                    <h3 class="text-white mb-4 text-lg">Social Media</h3>
                    <div class="flex space-x-3">
                        <a href="#" class="bg-blue-500 hover:bg-blue-700 p-2 rounded-full flex items-center justify-center w-10 h-10">
                            <i class="fa-brands fa-instagram text-white text-lg"></i>
                        </a>
                        <a href="#" class="bg-blue-500 hover:bg-blue-700 p-2 rounded-full flex items-center justify-center w-10 h-10">
                            <i class="fa-brands fa-facebook-f text-white text-lg rounded-full"></i>
                        </a>
                        <a href="#" class="bg-blue-500 hover:bg-blue-700 p-2 rounded-full flex items-center justify-center w-10 h-10">
                            <i class="fa-brands fa-twitter text-white text-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 md:hidden  text-sm text-gray-500">
                © 2023, Gym Minder. All rights reserved.
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // toggle navbar 
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        });
        // scroll to top 
        let button = document.getElementById("scrollToTop");
        window.onscroll = ()=>{scroll()};
        function scroll(){
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
                button.classList.remove("hidden")
            } else {
                button.classList.add("hidden")
            }
        }
        function goToTop(){
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        // swiper
        document.addEventListener('DOMContentLoaded', function() {
                    const swiper = new Swiper('.testimonials-swiper', {
                        slidesPerView: 1,
                        spaceBetween: 30,
                        loop: true,
                        autoplay: {
                            delay: 3000, 
                            disableOnInteraction: false, 
                        },
                        breakpoints: {
                            768: {
                                slidesPerView: 2,
                            },
                            1024: {
                                slidesPerView: 3,
                            }
                        }
                    });
                });
                // aos animation
         
  AOS.init();
    </script>
</body>
</html>