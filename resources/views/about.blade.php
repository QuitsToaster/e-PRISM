<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-PRISM · About Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom gradient for vibrant dark blue to black */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%);
        }
        .text-gradient-primary {
            background: linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .border-gradient-primary {
            border: 2px solid transparent;
            background: linear-gradient(white, white) padding-box,
                        linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%) border-box;
        }
        .about-card {
            transition: all 0.3s ease;
        }
        .about-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(37,99,235,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);
        }
        /* Add these to your existing style section */
        .hover-card-effect {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-card-effect:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 30px -12px rgba(37, 99, 235, 0.25);
        }

        .border-gradient-card {
            border: 2px solid transparent;
            background: linear-gradient(white, white) padding-box,
                        linear-gradient(135deg, #2563eb, #1a1a1a) border-box;
        }
    </style>
</head>
<body class="bg-white">

<!-- Navigation with vibrant dark blue to black gradient header -->
<nav class="bg-gradient-primary">
    <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
        <div class="text-xl font-bold text-white">e-PRISM</div>
        <div class="space-x-6 text-sm text-white/90">
            <a href="{{ route('welcome') }}" class="hover:text-white">Features</a>
            <a href="{{ route('welcome') }}" class="hover:text-white">Feedback</a>
            <a href="{{ route('about') }}" class="hover:text-white border-b-2 border-white">About</a>
        </div>
    </div>
</nav>

<!-- Main About Content -->
<div class="max-w-4xl mx-auto px-4 py-16 md:py-20">
    
    <!-- Header with gradient badge -->
    <div class="text-center mb-12">
        <div class="inline-block px-3 py-1 bg-gradient-to-r from-[#2563eb]/10 to-[#1a1a1a]/10 text-sm font-medium rounded-full mb-4 border border-[#2563eb]/20">
            <span class="bg-gradient-to-r from-[#2563eb] to-[#1a1a1a] bg-clip-text text-transparent">📋 ABOUT THE PROJECT</span>
        </div>
        <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
            <span class="text-gradient-primary">Streamline</span> your research<br>
            submissions with <span class="text-gradient-primary">e-PRISM</span>
        </h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Electronic Program for Research Initiative Submission & Management allows proponents 
            to submit research papers section by section, and administrators to review, approve, 
            and manage submissions efficiently.
        </p>
    </div>

    <!-- About Cards - Our Story -->
    <div class="grid md:grid-cols-2 gap-8 mt-16">
        <!-- Left Column - Main Story -->
        <div class="space-y-6">
            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-lg about-card">
                <div class="w-14 h-14 bg-gradient-primary rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Our Story</h2>
                <p class="text-gray-600 leading-relaxed">
                    We are 4th year graduating students from the <span class="font-semibold text-[#2563eb]">University of La Salette</span>, 
                    College of Information Technology. This system project is part of our activity during the 
                    <span class="font-semibold text-[#2563eb]">486 hours of shift</span> at the Schools Division Office, Santiago City.
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-lg about-card">
                <div class="w-14 h-14 bg-gradient-primary rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Our Gratitude</h2>
                <p class="text-gray-600 leading-relaxed">
                    We are glad and thankful for the opportunity that our department faculty in 
                    <span class="font-semibold text-[#2563eb]">College of Information Technology</span> gave us, 
                    and for the Schools Division Office personnel for their guidance and support throughout this journey.
                </p>
            </div>
        </div>

        <!-- Right Column - Team & Details -->
        <div class="space-y-6">
            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-lg about-card">
                <div class="w-14 h-14 bg-gradient-primary rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold mb-4 text-gray-800">The Team</h2>
                <p class="text-gray-600 leading-relaxed mb-4">
                    <span class="font-semibold">BS Information Technology Students</span><br>
                    University of La Salette - Batch 2026
                </p>
                <div class="space-y-2 text-gray-600">
                    <div class="flex items-center gap-2">
                        <div class="w-1.5 h-1.5 bg-[#2563eb] rounded-full"></div>
                        <span>System Developers & Designers</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-1.5 h-1.5 bg-[#2563eb] rounded-full"></div>
                        <span>Project under OJT (486 hours)</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-1.5 h-1.5 bg-[#2563eb] rounded-full"></div>
                        <span>SDO Santiago City, ISU Ilagan</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-lg about-card">
                <div class="w-14 h-14 bg-gradient-primary rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold mb-4 text-gray-800">SDO Santiago City</h2>
                <p class="text-gray-600 leading-relaxed">
                    This project was developed at the <span class="font-semibold text-[#2563eb]">Schools Division Office, Santiago City</span> 
                    as part of our 486-hour industry shift, where we applied our academic knowledge to create a real-world 
                    research management solution.
                </p>
            </div>
        </div>
    </div>

    <!-- SYSTEM DEVELOPERS SECTION -->
    <div class="mt-20">
        <!-- Section Header with decorative line -->
        <div class="relative mb-12">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center">
                <div class="bg-white px-6">
                    <span class="inline-flex items-center gap-3">
                        <span class="w-2 h-2 bg-gradient-primary rounded-full"></span>
                        <h2 class="text-2xl md:text-3xl font-bold text-gradient-primary">System Developers</h2>
                        <span class="w-2 h-2 bg-gradient-primary rounded-full"></span>
                    </span>
                </div>
            </div>
        </div>

        <!-- Developers Grid - Centered with max width for better appearance -->
        <div class="max-w-4xl mx-auto">
            <div class="grid md:grid-cols-2 gap-8 lg:gap-12">
                <!-- Developer 1 - Bryan Lloyd T. Tan -->
                <div class="group relative">
                    <!-- Card with hover effects -->
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-[#2563eb]/20">
                        <!-- Decorative top gradient line -->
                        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-0 group-hover:w-24 h-1 bg-gradient-primary rounded-full transition-all duration-300"></div>
                        
                        <!-- Avatar with glow effect -->
                        <div class="relative mb-6">
                            <div class="absolute inset-0 bg-gradient-primary rounded-full blur-lg opacity-20 group-hover:opacity-30 transition-opacity"></div>
                            <img src="{{ asset('images/developer1.jpg') }}" 
                                alt="Bryan Lloyd T. Tan"
                                class="relative w-28 h-28 mx-auto rounded-full object-cover border-4 border-white shadow-lg ring-2 ring-[#2563eb]/30 group-hover:ring-[#2563eb]/60 transition-all">
                            
                            <!-- Status indicator (optional) -->
                            <span class="absolute bottom-1 right-1/2 translate-x-12 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></span>
                        </div>

                        <!-- Developer Info -->
                        <div class="text-center">
                            <h3 class="font-bold text-gray-800 text-2xl mb-1">Bryan Lloyd T. Tan</h3>
                            
                            <!-- Role badge with gradient -->
                            <div class="inline-block mb-4">
                                <span class="bg-gradient-primary text-white text-xs px-4 py-1.5 rounded-full shadow-sm">
                                    Backend Developer
                                </span>
                            </div>

                            <!-- Contact details with icons -->
                            <div class="space-y-3 bg-gray-50 rounded-xl p-4">
                                <div class="flex items-center justify-center gap-2 text-sm text-gray-600 hover:text-[#2563eb] transition-colors">
                                    <svg class="w-4 h-4 text-[#2563eb]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>bryanlloydtan@gmail.com</span>
                                </div>
                                <div class="flex items-center justify-center gap-2 text-sm text-gray-600 hover:text-[#2563eb] transition-colors">
                                    <svg class="w-4 h-4 text-[#2563eb]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <span>0976-650-5469</span>
                                </div>
                            </div>

                            <!-- Social links (optional - can add if needed) -->
                            <div class="flex justify-center gap-3 mt-4">
                                <a href="#" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gradient-primary hover:text-white transition-all">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.438 9.8 8.205 11.387.6.113.82-.26.82-.58 0-.287-.01-1.05-.015-2.06-3.338.726-4.042-1.61-4.042-1.61-.546-1.39-1.335-1.76-1.335-1.76-1.09-.746.082-.73.082-.73 1.205.085 1.84 1.237 1.84 1.237 1.07 1.834 2.807 1.304 3.492.997.108-.776.418-1.306.762-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.468-2.38 1.235-3.22-.123-.3-.535-1.52.117-3.16 0 0 1.008-.322 3.3 1.23.96-.267 1.98-.4 3-.405 1.02.005 2.04.138 3 .405 2.29-1.552 3.297-1.23 3.297-1.23.653 1.64.24 2.86.118 3.16.768.84 1.233 1.91 1.233 3.22 0 4.61-2.804 5.62-5.476 5.92.43.37.824 1.102.824 2.22 0 1.602-.015 2.894-.015 3.287 0 .322.216.698.83.578C20.565 21.795 24 17.3 24 12c0-6.63-5.37-12-12-12z"/></svg>
                                </a>
                                <a href="#" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gradient-primary hover:text-white transition-all">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Developer 2 - Timothy John M. Lardizabal -->
                <div class="group relative">
                    <!-- Card with hover effects -->
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-[#2563eb]/20">
                        <!-- Decorative top gradient line -->
                        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-0 group-hover:w-24 h-1 bg-gradient-primary rounded-full transition-all duration-300"></div>
                        
                        <!-- Avatar with glow effect -->
                        <div class="relative mb-6">
                            <div class="absolute inset-0 bg-gradient-primary rounded-full blur-lg opacity-20 group-hover:opacity-30 transition-opacity"></div>
                            <img src="{{ asset('images/developer2.jpg') }}" 
                                alt="Timothy John M. Lardizabal"
                                class="relative w-28 h-28 mx-auto rounded-full object-cover border-4 border-white shadow-lg ring-2 ring-[#2563eb]/30 group-hover:ring-[#2563eb]/60 transition-all">
                            
                            <!-- Status indicator (optional) -->
                            <span class="absolute bottom-1 right-1/2 translate-x-12 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></span>
                        </div>

                        <!-- Developer Info -->
                        <div class="text-center">
                            <h3 class="font-bold text-gray-800 text-2xl mb-1">Timothy John M. Lardizabal</h3>
                            
                            <!-- Role badge with gradient -->
                            <div class="inline-block mb-4">
                                <span class="bg-gradient-primary text-white text-xs px-4 py-1.5 rounded-full shadow-sm">
                                    UI/UX Developer
                                </span>
                            </div>

                            <!-- Contact details with icons -->
                            <div class="space-y-3 bg-gray-50 rounded-xl p-4">
                                <div class="flex items-center justify-center gap-2 text-sm text-gray-600 hover:text-[#2563eb] transition-colors">
                                    <svg class="w-4 h-4 text-[#2563eb]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>timxlardizabal@gmail.com</span>
                                </div>
                                <div class="flex items-center justify-center gap-2 text-sm text-gray-600 hover:text-[#2563eb] transition-colors">
                                    <svg class="w-4 h-4 text-[#2563eb]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <span>0926-610-7475</span>
                                </div>
                            </div>

                            <!-- Social links (optional - can add if needed) -->
                            <div class="flex justify-center gap-3 mt-4">
                                <a href="#" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gradient-primary hover:text-white transition-all">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.438 9.8 8.205 11.387.6.113.82-.26.82-.58 0-.287-.01-1.05-.015-2.06-3.338.726-4.042-1.61-4.042-1.61-.546-1.39-1.335-1.76-1.335-1.76-1.09-.746.082-.73.082-.73 1.205.085 1.84 1.237 1.84 1.237 1.07 1.834 2.807 1.304 3.492.997.108-.776.418-1.306.762-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.468-2.38 1.235-3.22-.123-.3-.535-1.52.117-3.16 0 0 1.008-.322 3.3 1.23.96-.267 1.98-.4 3-.405 1.02.005 2.04.138 3 .405 2.29-1.552 3.297-1.23 3.297-1.23.653 1.64.24 2.86.118 3.16.768.84 1.233 1.91 1.233 3.22 0 4.61-2.804 5.62-5.476 5.92.43.37.824 1.102.824 2.22 0 1.602-.015 2.894-.015 3.287 0 .322.216.698.83.578C20.565 21.795 24 17.3 24 12c0-6.63-5.37-12-12-12z"/></svg>
                                </a>
                                <a href="#" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gradient-primary hover:text-white transition-all">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mission/Vision Box -->
    <div class="mt-16 bg-gradient-to-r from-[#2563eb]/5 to-[#1a1a1a]/5 p-10 rounded-3xl border border-gray-100">
        <div class="grid md:grid-cols-2 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Our Mission</h3>
                <p class="text-gray-600">
                    To digitalize and streamline the research submission process, making it easier for proponents 
                    to submit their work and for administrators to manage reviews efficiently.
                </p>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Our Vision</h3>
                <p class="text-gray-600">
                    To become the standard research management platform for educational institutions, 
                    empowering researchers and administrators through technology.
                </p>
            </div>
        </div>
    </div>

    <!-- Back to Home Button -->
    <div class="text-center mt-16">
        <a href="{{ route('welcome') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-primary text-white rounded-lg hover:opacity-90 transition font-medium shadow-md hover:shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            Return to Homepage
        </a>
    </div>
</div>

<!-- Footer with vibrant dark blue to black gradient -->
<footer class="bg-gradient-primary py-6 mt-12">
    <div class="max-w-6xl mx-auto px-4 text-center text-sm text-white">
        © 2026 e-PRISM · Research Management Platform · University of La Salette · SDO Santiago City
    </div>
</footer>

</body>
</html>