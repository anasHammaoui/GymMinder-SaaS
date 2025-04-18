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
    <title>GymMinder - Home</title>
    @vite("resources/css/app.css")
</head>
<body class="bg-[#030410] min-h-screen flex flex-col">
    <!-- Navigation -->
    <nav class="container mx-auto flex items-center justify-between py-6 px-4 md:px-8 lg:px-24">
        <div>
            <img src="{{ asset('assets/images/LogoWhite.png') }}" alt="GymMinder Logo" class="h-20">
        </div>
        <ul class="hidden md:flex space-x-8 text-white font-medium">
            <li><a href="#" class="hover:text-blue-300">Home</a></li>
            <li><a href="#benefits" class="hover:text-blue-300">Benefits</a></li>
            <li><a href="#testimonials" class="hover:text-blue-300">Testimonials</a></li>
            <li><a href="#pricing" class="hover:text-blue-300">Prices</a></li>
        </ul>
        <div class="flex space-x-4">
            <a href="#" class="text-white border border-white px-5 py-2 rounded-lg font-medium hover:bg-white hover:bg-opacity-10 transition">Sign up</a>
            <a href="#" class="bg-blue-500 text-white px-5 py-2 rounded-lg font-medium hover:bg-blue-600 transition">Try it</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4  md:px-8 lg:px-24 py-16">
        <div class="max-w-xl text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-2">Effortless Gym <br>Management with <span class="text-blue-500">GYM <br>MINDER!</span></h1>
            <p class="mb-8 text-gray-300">Simplify memberships, streamline operations, payments, and <br>grow your gym with ease.</p>
            <a href="#" class="bg-blue-500 text-white px-8 py-3 rounded-lg font-medium shadow hover:bg-blue-600 transition">Get Started Now</a>
        </div>
        <div class="mt-10 md:mt-0">
            <img src="{{ asset('assets/images/dashboard.jpg') }}" alt="GymMinder Dashboard" class="w-full max-w-md rounded-lg shadow-lg border border-gray-700">
        </div>
    </section>
    <!-- Features Section -->
    <section class="py-16 lg:pb-2 bg-[#030410] lg:relative">
        <div class="container mx-auto px-4 md:px-8 lg:px-24 lg:absolute z-20">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Membership Management Card -->
                <div style="background: #030410; box-shadow: 2px -2px 10px rgba(255, 255, 255, 0.05);" class=" rounded-3xl p-8 shadow-lg text-white border border-gray-800">
                    <div class="mb-4 w-16 h-16 rounded-full flex items-center justify-center mx-auto">
                       <img src="{{ asset('assets/images/1.png') }}" alt="icon">
                    </div>
                    <h3 class="font-bold text-2xl mb-3 text-center">Membership Management</h3>
                    <p class="text-gray-300 mb-6 text-center">Easily track members, subscriptions, and renewals in one place.</p>
                    <a href="#" class="text-blue-400 hover:text-blue-300 flex items-center justify-center">
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
                    <a href="#" class="text-blue-400 hover:text-blue-300 flex items-center justify-center">
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
                    <h3 class="font-bold text-2xl mb-3 text-center">Business Analytics Dashboard</h3>
                    <p class="text-gray-300 mb-6 text-center">Gain insights into gym performance, revenue, and member engagement.</p>
                    <a href="#" class="text-blue-400 hover:text-blue-300 flex items-center justify-center">
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
    <section class="container mx-auto py-16 md:py-0 px-4 md:px-8 lg:px-24">
        <h2 class="text-3xl font-bold text-white mb-12 text-center">Why Choose <span class="text-blue-500">GYM MINDER</span>?</h2>
        <div class="flex flex-col md:flex-row gap-16 items-center">
            <div class="flex-1">
                <img src="{{ asset('assets/images/LogoWhite.png') }}" alt="GymMinder Mascot" class="w-full max-w-md mx-auto">
            </div>
            <div class="flex-1 text-white">
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
                <a href="#" class="inline-block bg-blue-500 text-white px-8 py-3 rounded-lg font-medium mt-8 hover:bg-blue-600 transition text-center">GET STARTED NOW</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-16 bg-[#030410]" style="background-image: url('{{ asset('assets/images/bg.png') }}'); background-size: cover; background-position: center;">
        <div class="container mx-auto px-4 md:px-8 lg:px-24">
            <h2 class="text-3xl font-bold text-white mb-2 text-center">What Our Clients Say</h2>
            <p class="text-gray-400 text-center mb-12">Discover What Does Our Proud Clients Say About Us</p>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- First testimonial -->
                <div class="backdrop-blur-lg rounded-2xl p-6 border border-gray-800" 
                     style="box-shadow: 2px -2px 10px rgba(255, 255, 255, 0.05);">
                    <p class="mb-6 text-gray-300">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Sed do eiusmod tempor incididunt ut labore et dolore 
                        magna aliqua. Ut enim ad minim veniam, quis nostrud 
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.
                    </p>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center">
                            <img src="https://avatar.iran.liara.run/public/girl" alt="Client" class="w-12 h-12 rounded-full mr-3">
                            <div>
                                <div class="text-white font-medium">Evelin Matos</div>
                                <div class="text-gray-500 text-sm">Médico</div>
                            </div>
                        </div>
                        <div class="text-yellow-400">★ ★ ★ ★ ★</div>
                    </div>
                </div>
                
                <!-- Second testimonial -->
                <div class=" backdrop-blur-lg rounded-2xl p-6 border border-gray-800" 
                style="box-shadow: 2px -2px 10px rgba(255, 255, 255, 0.05);">
                    <p class="mb-6 text-gray-300">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Sed do eiusmod tempor incididunt ut labore et dolore 
                        magna aliqua. Ut enim ad minim veniam, quis nostrud 
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.
                    </p>
                    <hr class="border-gray-800 my-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <img src="https://avatar.iran.liara.run/public/boy" alt="Client" class="w-12 h-12 rounded-full mr-3">
                            <div>
                                <div class="text-white font-medium">Thiago Cloves</div>
                                <div class="text-gray-500 text-sm">Médico Ortopedista</div>
                            </div>
                        </div>
                        <div class="text-yellow-400">★ ★ ★ ★ ★</div>
                    </div>
                </div>
                
                <!-- Third testimonial -->
                <div class="backdrop-blur-lg rounded-2xl p-6 border border-gray-800" 
                style="box-shadow: 2px -2px 10px rgba(255, 255, 255, 0.05);">
                    <p class="mb-6 text-gray-300">
                        Nam convallis pellentesque nisl. Nunc eleifend leo vitae
                        magna. In id erat non orci commodo lobortis. Proin neque 
                        massa, cursus ut, gravida ut, lobortis eget, lacus. Sed diam.
                        Praesent fermentum tempor tellus.
                    </p>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center">
                            <img src="https://avatar.iran.liara.run/public" alt="Client" class="w-12 h-12 rounded-full mr-3">
                            <div>
                                <div class="text-white font-medium">Vanessa Lopes</div>
                                <div class="text-gray-500 text-sm">Enfermeira</div>
                            </div>
                        </div>
                        <div class="text-yellow-400">★ ★ ★ ★ ★</div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial navigation dots -->
            <div class="flex justify-center mt-8 space-x-2">
                <button class="w-2 h-2 rounded-full bg-blue-500"></button>
                <button class="w-2 h-2 rounded-full bg-gray-700"></button>
                <button class="w-2 h-2 rounded-full bg-gray-700"></button>
            </div>
        </div>
    </section>
    <!-- Pricing Section -->
    <section id="pricing" class=" bg-[#030410]">
        <div class="container mx-auto px-4 md:px-8 lg:px-24">
                        
            <div class="text-center mt-16">
                <h3 class="text-2xl font-bold text-white mb-4">What are you waiting <span class="text-blue-500">Join Now</span> and make your business go to the moon!</h3>
                <a href="#" class="inline-block bg-blue-500 text-white px-8 py-3 rounded-lg font-medium mt-4 hover:bg-blue-600 transition">Join Now</a>
            </div>
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="flex-1">
                    <img src="{{ asset('assets/images/LogoWhite.png') }}" alt="GymMinder Mascot" class="w-full max-w-md mx-auto">
                </div>
                
                <div class="md:w-1/2 text-white">
                    <h2 class="text-3xl font-bold mb-8">Simple & Affordable Pricing!</h2>
                    
                    <ul class="space-y-4">
                        <li class="flex items-center">
                            <span class="text-blue-500 mr-3">•</span>
                            <p>One-Time Subscription – Get full access to all features for just $20/month</p>
                        </li>
                        <li class="flex items-center">
                            <span class="text-blue-500 mr-3">•</span>
                            <p>No hidden fees. Cancel anytime</p>
                        </li>
                    </ul>
                    
                    <a href="#" class="inline-block border border-gray-600 bg-transparent text-white px-8 py-3 rounded-lg font-medium mt-8 hover:bg-white hover:bg-opacity-10 transition">GET STARTED NOW</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#030410] py-8 mt-auto border-t-1 border-indigo-400">
        <div class="container mx-auto px-4 md:px-8 lg:px-24">
            <div class="flex flex-col md:flex-row items-center justify-around">
                <div class="mb-6 md:mb-0 ">
                    <img src="{{ asset('assets/images/LogoWhite.png') }}" alt="GymMinder Logo" class="h-16 mx-auto">
                    <p class="text-gray-300 mt-4 max-w-md">
                        Gym Minder is an all-in-one platform for effortless gym management, helping gym owners streamline operations and boost member engagement.
                    </p>
                    <div class="mt-8  text-sm text-gray-500">
                        © 2023, Gym Minder. All rights reserved.
                    </div>
                </div>
                
                <div class="flex flex-col items-start">
                    <h3 class="text-white mb-4 text-lg">Home</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Benefits</a></li>
                        <li><a href="#testimonials" class="text-gray-400 hover:text-white">Testimonials</a></li>
                        <li><a href="#pricing" class="text-gray-400 hover:text-white">Prices</a></li>
                    </ul>
                </div>
                
                <div class="mt-6 md:mt-0">
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
            
           
        </div>
    </footer>
</body>
</html>