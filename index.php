<?php
// This is the main HTML structure for the portfolio website
// It includes the navigation, hero section, about section, skills section, projects section, certificates section, and contact form.

// The code uses Tailwind CSS for styling and includes various animations and 3D effects using CSS and JavaScript libraries like Three.js and Typed.js. 
// The website is designed to be responsive and visually appealing, with a focus on showcasing the developer's skills and projects.
// Database configuration
    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "portfolio_db";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS contacts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    subject VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert data
    $sql = "INSERT INTO contacts (name, email, subject, message) 
            VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Message sent successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }
}
$conn->close();


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gopi Chand | Full Stack Developer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1',
                        secondary: '#8b5cf6',
                        dark: '#111827',
                        darker: '#0f172a',
                        accent: '#7c3aed',
                        teal: '#14b8a6',
                        amber: '#f59e0b',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        mono: ['Fira Code', 'monospace'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-slow': 'float 8s ease-in-out infinite',
                        'float-fast': 'float 4s ease-in-out infinite',
                        'spin-slow': 'spin 20s linear infinite',
                        'pulse-slow': 'pulse 6s infinite',
                        'bounce-slow': 'bounce 3s infinite',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Fira+Code&display=swap');
        
        :root {
            --primary: #6366f1;
            --secondary: #8b5cf6;
            --dark: #111827;
            --darker: #0f172a;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }
        
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-thumb {
            background-color: var(--primary);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background-color: #1e293b;
        }
        
        .glow-text {
            text-shadow: 0 0 8px rgba(99, 102, 241, 0.5);
        }
        
        .glow-box {
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.3);
        }
        
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 3rem;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
        }
        
        .skill-bar {
            transition: width 1.5s ease-in-out;
        }
        
        .card-hover {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            border: 1px solid #1e293b;
            transform-style: preserve-3d;
        }
        
        .card-hover:hover {
            transform: translateY(-8px) rotateX(5deg) rotateY(5deg);
            border-color: var(--primary);
            box-shadow: 0 15px 30px rgba(99, 102, 241, 0.4);
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }   
        }
        
        .gradient-text {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 700;
        }
        
        .terminal {
            background-color: rgba(15, 23, 42, 0.8);
            border: 1px solid #1e293b;
            border-radius: 12px;
            font-family: 'Fira Code', monospace;
            transform-style: preserve-3d;
        }
        
        .nav-link {
            position: relative;
            padding-bottom: 5px;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary);
            transition: width 0.4s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .tech-icon {
            transition: all 0.4s ease;
            transform-style: preserve-3d;
        }
        
        .tech-icon:hover {
            transform: scale(1.2) rotateY(15deg);
        }
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        
        .project-card {
            transition: all 0.3s ease;
            transform-style: preserve-3d;
        }
        
        .project-card:hover {
            transform: translateY(-10px) rotateX(5deg) rotateY(5deg);
            box-shadow: 0 25px 50px rgba(99, 102, 241, 0.4);
        }
        
        .contact-input {
            transition: all 0.3s ease;
        }
        
        .contact-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.3);
            transform: translateZ(10px);
        }
        
        .timeline-item {
            position: relative;
            padding-left: 2rem;
            margin-bottom: 3rem;
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 8px;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background: var(--primary);
        }
        
        .timeline-item::after {
            content: '';
            position: absolute;
            left: 7px;
            top: 23px;
            bottom: -20px;
            width: 1px;
            background: #334155;
        }
        
        .timeline-item:last-child::after {
            display: none;
        }
        
        .skill-badge {
            background: rgba(99, 102, 241, 0.15);
            color: var(--primary);
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        
        .skill-badge:hover {
            transform: translateZ(10px);
            background: rgba(99, 102, 241, 0.3);
        }
        
        .certificate-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }
        
        .profile-pic {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid rgba(99, 102, 241, 0.3);
            box-shadow: 0 0 30px rgba(99, 102, 241, 0.4);
            transition: all 0.5s ease;
        }
        
        .profile-pic:hover {
            transform: scale(1.05) rotateY(10deg);
            box-shadow: 0 0 50px rgba(99, 102, 241, 0.6);
        }
        
        .three-d-container {
            perspective: 1000px;
        }
        
        .three-d-card {
            transform-style: preserve-3d;
            transition: transform 0.5s;
        }
        
        .three-d-card:hover {
            transform: rotateY(10deg) rotateX(5deg);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fadeIn {
            animation: fadeIn 1s ease-out forwards;
        }
        
        .floating-cube {
            position: absolute;
            width: 100px;
            height: 100px;
            transform-style: preserve-3d;
            animation: float 8s ease-in-out infinite, spin-slow 20s linear infinite;
        }
        
        .cube-face {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(99, 102, 241, 0.1);
            border: 1px solid rgba(99, 102, 241, 0.3);
        }
        
        .cube-face-front { transform: rotateY(0deg) translateZ(50px); }
        .cube-face-back { transform: rotateY(180deg) translateZ(50px); }
        .cube-face-right { transform: rotateY(90deg) translateZ(50px); }
        .cube-face-left { transform: rotateY(-90deg) translateZ(50px); }
        .cube-face-top { transform: rotateX(90deg) translateZ(50px); }
        .cube-face-bottom { transform: rotateX(-90deg) translateZ(50px); }

        /* Enhanced 3D Effects CSS */
.profile-3d-container {
    perspective: 1000px;
}

.profile-pic.profile-3d {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 30px rgba(100, 108, 255, 0.4);
    transition: all 0.5s ease;
    transform: rotateY(0deg) rotateX(0deg);
    animation: subtle-float 6s ease-in-out infinite;
}

.profile-pic.profile-3d:hover {
    transform: rotateY(15deg) rotateX(10deg) scale(1.05);
    box-shadow: 0 0 50px rgba(100, 108, 255, 0.6);
}

.profile-ring-3d {
    position: absolute;
    top: -10px;
    left: -10px;
    right: -10px;
    bottom: -10px;
    border-radius: 50%;
    border: 3px dashed transparent;
    border-top-color: #4f46e5;
    border-right-color: #ec4899;
    border-bottom-color: #10b981;
    border-left-color: #f59e0b;
    animation: rotate-3d 12s linear infinite, color-change 8s ease-in-out infinite alternate;
}

.profile-glow {
    position: absolute;
    top: -20px;
    left: -20px;
    right: -20px;
    bottom: -20px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(99, 102, 241, 0.2) 0%, rgba(0, 0, 0, 0) 70%);
    animation: pulse-glow 4s ease-in-out infinite alternate;
}

.floating-element-3d {
    filter: blur(20px);
    transform-style: preserve-3d;
    will-change: transform;
}

.animate-float-1 {
    animation: float-3d-1 8s ease-in-out infinite;
}

.animate-float-2 {
    animation: float-3d-2 10s ease-in-out infinite 2s;
}

.animate-float-3 {
    animation: float-3d-3 12s ease-in-out infinite 1s;
}

.gradient-text-3d {
    background: linear-gradient(135deg, #4f46e5 0%, #ec4899 50%, #f59e0b 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    text-shadow: 0 2px 10px rgba(79, 70, 229, 0.3);
    position: relative;
    display: inline-block;
    transform: translateZ(20px);
}

.btn-3d-primary {
    background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
    color: white;
    padding: 0.75rem 2rem;
    border-radius: 0.5rem;
    font-weight: 600;
    box-shadow: 0 10px 20px -5px rgba(79, 70, 229, 0.4), 
                0 4px 6px -2px rgba(79, 70, 229, 0.1),
                inset 0 -2px 0 0 rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
    transform: translateY(0) rotateX(0);
    position: relative;
    overflow: hidden;
}

.btn-3d-primary:hover {
    transform: translateY(-3px) rotateX(5deg);
    box-shadow: 0 15px 25px -5px rgba(79, 70, 229, 0.5), 
                0 8px 10px -2px rgba(79, 70, 229, 0.2),
                inset 0 -2px 0 0 rgba(0, 0, 0, 0.2);
}

.btn-3d-secondary {
    background: transparent;
    color: #4f46e5;
    border: 2px solid #4f46e5;
    padding: 0.75rem 2rem;
    border-radius: 0.5rem;
    font-weight: 600;
    box-shadow: 0 5px 15px -5px rgba(79, 70, 229, 0.3);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-3d-secondary:hover {
    background: #4f46e5;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 10px 20px -5px rgba(79, 70, 229, 0.4);
}

.social-icon-3d {
    color: #d1d5db;
    font-size: 1.75rem;
    transition: all 0.3s ease;
    display: inline-block;
    transform: translateZ(0);
}

.social-icon-3d:hover {
    transform: translateY(-5px) scale(1.2);
    color: white;
    text-shadow: 0 0 10px currentColor;
}

/* Animations */
@keyframes rotate-3d {
    0% {
        transform: rotate(0deg) rotateX(0deg);
    }
    100% {
        transform: rotate(360deg) rotateX(360deg);
    }
}

@keyframes color-change {
    0% {
        border-top-color: #4f46e5;
        border-right-color: #ec4899;
    }
    50% {
        border-top-color: #10b981;
        border-right-color: #f59e0b;
    }
    100% {
        border-top-color: #ec4899;
        border-right-color: #4f46e5;
    }
}

@keyframes pulse-glow {
    0% {
        opacity: 0.3;
        transform: scale(0.95);
    }
    100% {
        opacity: 0.6;
        transform: scale(1.05);
    }
}

@keyframes subtle-float {
    0%, 100% {
        transform: translateY(0) rotateY(0deg);
    }
    50% {
        transform: translateY(-10px) rotateY(5deg);
    }
}

@keyframes float-3d-1 {
    0%, 100% {
        transform: translate3d(0, 0, 0) rotate(0deg);
    }
    50% {
        transform: translate3d(20px, -30px, 20px) rotate(5deg);
    }
}

@keyframes float-3d-2 {
    0%, 100% {
        transform: translate3d(0, 0, 0) rotate(0deg);
    }
    50% {
        transform: translate3d(-30px, 20px, -10px) rotate(-5deg);
    }
}

@keyframes float-3d-3 {
    0%, 100% {
        transform: translate3d(0, 0, 0) rotate(0deg);
    }
    50% {
        transform: translate3d(15px, 25px, 15px) rotate(10deg);
    }
}

.animate-bounce-slow {
    animation: bounce-slow 2.5s infinite;
}

@keyframes bounce-slow {
    0%, 100% {
        transform: translateY(0) translateX(-50%);
    }
    50% {
        transform: translateY(-20px) translateX(-50%);
    }
}
    </style>
</head>
<body class="relative">
    <!-- 3D Floating Cubes Background -->
    <div id="threejs-container" class="fixed inset-0 overflow-hidden -z-10"></div>
    <canvas id="network-canvas" class="fixed inset-0 w-full h-full -z-20"></canvas>

    <!-- Navigation -->
    <nav class="fixed w-full bg-darker bg-opacity-90 backdrop-blur-sm z-50 transition-all duration-300 border-b border-slate-800">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="#home" class="font-bold text-2xl text-primary flex items-center">
                <span class="w-3 h-3 bg-primary rounded-full mr-2"></span>
                <span>Malaji Gopi Chand</span>
            </a>
            <div class="hidden md:flex space-x-8 font-medium items-center">
                <a href="#home" class="text-slate-300 hover:text-primary transition nav-link">Home</a>
                <a href="#about" class="text-slate-300 hover:text-primary transition nav-link">About</a>
                <a href="#skills" class="text-slate-300 hover:text-primary transition nav-link">Skills</a>
                <a href="#projects" class="text-slate-300 hover:text-primary transition nav-link">Projects</a>
                <a href="#certificates" class="text-slate-300 hover:text-primary transition nav-link">Certificates</a>
                <a href="#contact" class="text-slate-300 hover:text-primary transition nav-link">Contact</a>
                <a href="#contact" class="ml-4 bg-gradient-to-r from-primary to-secondary text-white px-6 py-2 rounded-lg font-semibold hover:opacity-90 transition transform hover:scale-105 glow-box">
                    Hire Me
                </a>
            </div>
            <button id="mobile-menu-button" class="md:hidden text-slate-300 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-darker py-4 px-6 border-t border-slate-800">
            <a href="#home" class="block py-2 text-slate-300 hover:text-primary transition">Home</a>
            <a href="#about" class="block py-2 text-slate-300 hover:text-primary transition">About</a>
            <a href="#skills" class="block py-2 text-slate-300 hover:text-primary transition">Skills</a>
            <a href="#projects" class="block py-2 text-slate-300 hover:text-primary transition">Projects</a>
            <a href="#certificates" class="block py-2 text-slate-300 hover:text-primary transition">Certificates</a>
            <a href="#contact" class="block py-2 text-slate-300 hover:text-primary transition">Contact</a>
        </div>
    </nav>

    <!-- Hero Section with Enhanced 3D Effects -->
<section id="home" class="min-h-screen flex flex-col justify-center items-center text-center px-6 pt-16 relative overflow-hidden bg-gradient-to-b from-gray-900 to-gray-800">
    <div class="max-w-4xl mx-auto hero-container">
        <div class="hero-content relative z-10">
            <!-- Floating 3D Elements -->
            <div class="absolute top-1/4 left-1/4 w-16 h-16 rounded-full bg-gradient-to-r from-primary to-secondary opacity-20 floating-element-3d animate-float-1"></div>
            <div class="absolute bottom-1/3 right-1/4 w-24 h-24 rounded-full bg-gradient-to-r from-secondary to-accent opacity-15 floating-element-3d animate-float-2"></div>
            <div class="absolute top-1/3 right-1/3 w-20 h-20 rounded-lg bg-gradient-to-r from-accent to-primary opacity-10 floating-element-3d animate-float-3 transform rotate-45"></div>
            
            <!-- Enhanced 3D Profile Container -->
           <div class="relative mb-10 profile-container flex justify-center items-center">
    <div class="relative inline-block profile-3d-container">
        <img src="profile.jpg"
            alt="Gopi Chand sitting on snow with mountains in the background"
            class="profile-pic profile-3d object-cover shadow-xl border-4 border-white/10">
        <div class="profile-ring-3d"></div>
        <div class="profile-glow"></div>
    </div>
</div>
            
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6">
                <span class="gradient-text-3d">Hello World,</span><br>
                I'm <span class="gradient-text-3d">Gopi Chand</span>
            </h1>
            
            <div class="text-xl md:text-2xl max-w-3xl mb-8 typing-text">
                <span id="typed" class="text-slate-300 text-shadow"></span>
            </div>
            
            <div class="flex flex-wrap justify-center gap-6">
                <a href="#projects" class="btn-3d-primary">
                    View My Work
                </a>
                <a href="#contact" class="btn-3d-secondary">
                    Contact Me
                </a>
            </div>
            
            <div class="mt-16 flex justify-center space-x-8 social-icons-3d">
                <a href="https://github.com/MalajiGopiChand?tab=repositories" target="_blank" class="social-icon-3d">
                    <i class="fab fa-github"></i>
                </a>
                <a href="https://www.linkedin.com/in/malaji-gopi-chand/" target="_blank" class="social-icon-3d">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="https://www.instagram.com/mr.gopichand.7/" target="_blank" class="social-icon-3d">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="social-icon-3d">
                    <i class="fas fa-file-pdf"></i>
                </a>
            </div>
        </div>
    </div>
    
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce-slow">
        <a href="#about" class="text-primary text-4xl hover:text-secondary transition transform hover:scale-125">
            <i class="fas fa-chevron-down"></i>
        </a>
    </div>
</section>
    <!-- About Section -->
    <section id="about" class="py-20 bg-darker">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-16 text-center text-primary section-title">
                About Me
            </h2>
            
            <div class="flex flex-col lg:flex-row gap-12 items-center">
                <div class="lg:w-1/3">
                    <div class="terminal p-6 rounded-xl three-d-card">
                        <div class="flex mb-4">
                            <div class="w-3 h-3 bg-rose-500 rounded-full mr-2"></div>
                            <div class="w-3 h-3 bg-amber-500 rounded-full mr-2"></div>
                            <div class="w-3 h-3 bg-emerald-500 rounded-full"></div>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <div class="text-purple-400">$ whoami</div>
                                <div class="text-slate-300 ml-4">Gopi Chand - Full Stack Developer</div>
                            </div>
                            <div>
                                <div class="text-purple-400">$ education</div>
                                <div class="text-slate-300 ml-4">B.Tech. Computer Science</div>
                                <div class="text-slate-300 ml-4">Lovely Professional University</div>
                            </div>
                            <div>
                                <div class="text-purple-400">$ location</div>
                                <div class="text-slate-300 ml-4">Vijayawada, Andhra Pradesh</div>
                            </div>
                            <div>
                                <div class="text-purple-400">$ hobbies</div>
                                <div class="text-slate-300 ml-4">Photography, Coding, Chess</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="lg:w-2/3">
                    <h3 class="text-2xl font-semibold mb-6 text-primary">My Journey in Tech</h3>
                    <p class="text-slate-400 leading-relaxed mb-6">
                        I'm a passionate full-stack developer with expertise in multiple programming paradigms. My journey in tech began with a deep fascination for problem-solving, which led me to master <span class="text-primary font-medium">C, C++, Java, Python</span> and web technologies like <span class="text-primary font-medium">HTML, CSS, JavaScript, PHP, and MySQL</span>.
                    </p>
                    <p class="text-slate-400 leading-relaxed mb-6">
                        With over 3 years of coding experience, I've developed a strong foundation in both frontend and backend development. My projects range from simple web applications to complex systems with database integration and API development.
                    </p>
                    <p class="text-slate-400 leading-relaxed mb-8">
                        When I'm not coding, you can find me capturing moments through my lens (I'm a professional photographer), playing chess, or exploring new technologies. I believe in continuous learning and pushing the boundaries of what's possible with code.
                    </p>
                    
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                        <div class="bg-slate-900 p-6 rounded-xl border border-slate-800 card-hover">
                            <div class="text-primary text-4xl mb-4">
                                <i class="fas fa-server"></i>
                            </div>
                            <h4 class="font-semibold text-lg">Backend Dev</h4>
                            <p class="text-sm text-slate-500 mt-2">Robust server-side solutions</p>
                        </div>
                        <div class="bg-slate-900 p-6 rounded-xl border border-slate-800 card-hover">
                            <div class="text-primary text-4xl mb-4">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <h4 class="font-semibold text-lg">Frontend Dev</h4>
                            <p class="text-sm text-slate-500 mt-2">Interactive user interfaces</p>
                        </div>
                        <div class="bg-slate-900 p-6 rounded-xl border border-slate-800 card-hover">
                            <div class="text-primary text-4xl mb-4">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                            <h4 class="font-semibold text-lg">System Design</h4>
                            <p class="text-sm text-slate-500 mt-2">Scalable architectures</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 bg-slate-900">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-16 text-center text-primary section-title">
                Technical Skills
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-semibold mb-6 text-primary">Programming Languages</h3>
                    <div class="space-y-6">
                        <div>
                            <div class="flex justify-between mb-3 text-slate-400">
                                <span class="font-medium flex items-center">
                                    <i class="fab fa-cuttlefish text-sm mr-2"></i> C Programming
                                </span>
                                <span>90%</span>
                            </div>
                            <div class="w-full bg-slate-800 rounded-full h-2.5">
                                <div class="bg-gradient-to-r from-primary to-secondary h-2.5 rounded-full" style="width: 90%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-3 text-slate-400">
                                <span class="font-medium flex items-center">
                                    <i class="fab fa-cuttlefish text-sm mr-2"></i> C++
                                </span>
                                <span>85%</span>
                            </div>
                            <div class="w-full bg-slate-800 rounded-full h-2.5">
                                <div class="bg-gradient-to-r from-primary to-secondary h-2.5 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-3 text-slate-400">
                                <span class="font-medium flex items-center">
                                    <i class="fab fa-java text-sm mr-2"></i> Java
                                </span>
                                <span>80%</span>
                            </div>
                            <div class="w-full bg-slate-800 rounded-full h-2.5">
                                <div class="bg-gradient-to-r from-primary to-secondary h-2.5 rounded-full" style="width: 80%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-3 text-slate-400">
                                <span class="font-medium flex items-center">
                                    <i class="fab fa-python text-sm mr-2"></i> Python
                                </span>
                                <span>75%</span>
                            </div>
                            <div class="w-full bg-slate-800 rounded-full h-2.5">
                                <div class="bg-gradient-to-r from-primary to-secondary h-2.5 rounded-full" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-2xl font-semibold mb-6 text-primary">Web Technologies</h3>
                    <div class="space-y-6">
                        <div>
                            <div class="flex justify-between mb-3 text-slate-400">
                                <span class="font-medium flex items-center">
                                    <i class="fab fa-html5 text-sm mr-2"></i> HTML5
                                </span>
                                <span>95%</span>
                            </div>
                            <div class="w-full bg-slate-800 rounded-full h-2.5">
                                <div class="bg-gradient-to-r from-primary to-secondary h-2.5 rounded-full" style="width: 95%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-3 text-slate-400">
                                <span class="font-medium flex items-center">
                                    <i class="fab fa-css3-alt text-sm mr-2"></i> CSS3 & Tailwind
                                </span>
                                <span>90%</span>
                            </div>
                            <div class="w-full bg-slate-800 rounded-full h-2.5">
                                <div class="bg-gradient-to-r from-primary to-secondary h-2.5 rounded-full" style="width: 90%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-3 text-slate-400">
                                <span class="font-medium flex items-center">
                                    <i class="fab fa-js text-sm mr-2"></i> JavaScript
                                </span>
                                <span>85%</span>
                            </div>
                            <div class="w-full bg-slate-800 rounded-full h-2.5">
                                <div class="bg-gradient-to-r from-primary to-secondary h-2.5 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-3 text-slate-400">
                                <span class="font-medium flex items-center">
                                    <i class="fab fa-php text-sm mr-2"></i> PHP & MySQL
                                </span>
                                <span>80%</span>
                            </div>
                            <div class="w-full bg-slate-800 rounded-full h-2.5">
                                <div class="bg-gradient-to-r from-primary to-secondary h-2.5 rounded-full" style="width: 80%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-16">
                <h3 class="text-2xl font-semibold mb-6 text-primary">Tools & Technologies</h3>
                <div class="flex flex-wrap gap-3">
                    <span class="skill-badge px-4 py-2">Database Design</span>
                    <span class="skill-badge px-4 py-2">Version Control (Git)</span>
                    <span class="skill-badge px-4 py-2">CLI Tools</span>
                    <span class="skill-badge px-4 py-2">Data Structures</span>
                    <span class="skill-badge px-4 py-2">Algorithms</span>
                    <span class="skill-badge px-4 py-2">Problem Solving</span>
                    <span class="skill-badge px-4 py-2">Photography</span>
                    <span class="skill-badge px-4 py-2">Adobe Photoshop</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience & Education -->
    <section class="py-20 bg-darker">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-16 text-center text-primary section-title">
                Experience & Education
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-semibold mb-8 text-primary">Work Experience</h3>
                    
                    <div class="timeline">
                        <div class="timeline-item">
                            <h4 class="text-xl font-semibold text-white">MNC Internship - DevTown</h4>
                            <div class="text-slate-400 text-sm mb-2">Nov 2023 | Jaipur, IN</div>
                            <p class="text-slate-400">
                                Full Stack Web Development internship where I worked on complex technical challenges, enhancing problem-solving abilities and critical thinking skills.
                            </p>
                        </div>
                        
                        <div class="timeline-item">
                            <h4 class="text-xl font-semibold text-white">Professional Photographer</h4>
                            <div class="text-slate-400 text-sm mb-2">Jan 2021 - Present</div>
                            <p class="text-slate-400">
                                Managed profiles and photography for famous personalities, developing skills in visual communication and branding. Specialized in portrait and event photography.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-2xl font-semibold mb-8 text-primary">Education</h3>
                    
                    <div class="timeline">
                        <div class="timeline-item">
                            <h4 class="text-xl font-semibold text-white">B.Tech. in Computer Science</h4>
                            <div class="text-slate-400 text-sm mb-2">Lovely Professional University | Phagwara, IN</div>
                            <p class="text-slate-400">
                                Focused on software engineering principles, algorithms, and full-stack development. Active participant in coding competitions and hackathons.
                            </p>
                        </div>
                        
                        <div class="timeline-item">
                            <h4 class="text-xl font-semibold text-white">Higher Secondary</h4>
                            <div class="text-slate-400 text-sm mb-2">Sarada Junior College | AP</div>
                            <p class="text-slate-400">
                                Completed with focus on science and mathematics. Developed strong analytical and problem-solving skills.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-20 bg-slate-900">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-16 text-center text-primary section-title">
                Featured Projects
            </h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Currency Chat Bot -->
                <div class="bg-slate-800 rounded-xl overflow-hidden border border-slate-700 project-card">
                    <div class="h-48 bg-gradient-to-r from-slate-700 to-slate-800 flex items-center justify-center">
                        <i class="fas fa-robot text-primary text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-3 text-primary">Currency Chat Bot</h3>
                        <p class="text-slate-400 mb-4">An AI-powered chatbot for currency conversion and financial information. Features natural language processing and real-time exchange rates.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">Python</span>
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">NLP</span>
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">API</span>
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">Machine Learning</span>
                        </div>
                        <a href="https://github.com/MalajiGopiChand/currency-chat-bot" target="_blank" class="text-primary font-medium hover:underline inline-flex items-center transition hover:text-secondary">
                            View on GitHub <i class="fas fa-external-link-alt ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Financial Flow -->
                <div class="bg-slate-800 rounded-xl overflow-hidden border border-slate-700 project-card">
                    <div class="h-48 bg-gradient-to-r from-slate-700 to-slate-800 flex items-center justify-center">
                        <i class="fas fa-chart-line text-primary text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-3 text-primary">Financial Flow</h3>
                        <p class="text-slate-400 mb-4">Personal finance management system with analytics and reporting. Tracks expenses, income, and investments with visualization tools.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">PHP</span>
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">MySQL</span>
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">JavaScript</span>
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">Chart.js</span>
                        </div>
                        <a href="https://github.com/MalajiGopiChand/Financial-flow" target="_blank" class="text-primary font-medium hover:underline inline-flex items-center transition hover:text-secondary">
                            View on GitHub <i class="fas fa-external-link-alt ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>
                
                                <!-- Budget Tracker -->
                <div class="bg-slate-800 rounded-xl overflow-hidden border border-slate-700 project-card">
                    <div class="h-48 bg-gradient-to-r from-slate-700 to-slate-800 flex items-center justify-center">
                        <i class="fas fa-wallet text-primary text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-3 text-primary">Budget Tracker</h3>
                        <p class="text-slate-400 mb-4">A comprehensive budgeting application with expense categorization, monthly reports, and financial goal tracking.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">JavaScript</span>
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">HTML/CSS</span>
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">Local Storage</span>
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">Responsive</span>
                        </div>
                        <a href="https://github.com/MalajiGopiChand/Budget-Tracker" target="_blank" class="text-primary font-medium hover:underline inline-flex items-center transition hover:text-secondary">
                            View on GitHub <i class="fas fa-external-link-alt ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>

                <!-- Daily Fitness Tracker -->
                <div class="bg-slate-800 rounded-xl overflow-hidden border border-slate-700 project-card">
                    <!-- Fitness Section with Dumbbell Icon -->
                    <div class="h-48 bg-gradient-to-r from-slate-700 to-slate-800 flex items-center justify-center">
                        <i class="fas fa-dumbbell text-primary text-6xl"></i>
                    </div>

                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-3 text-primary">Daily Fitness Tracker</h3>
                        <p class="text-slate-400 mb-4">A web application to track daily fitness activities, including workouts, nutrition, and progress over time.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">PHP</span>
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">MySQL</span>
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">Bootstrap</span>
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">CRUD</span>
                        </div>
                        <a href="https://github.com/MalajiGopiChand/gym-fitness" target="_blank" class="text-primary font-medium hover:underline inline-flex items-center transition hover:text-secondary">
                            View on GitHub <i class="fas fa-external-link-alt ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Portfolio Website -->
                <div class="bg-slate-800 rounded-xl overflow-hidden border border-slate-700 project-card">
                    <div class="h-48 bg-gradient-to-r from-slate-700 to-slate-800 flex items-center justify-center">
                        <i class="fas fa-briefcase text-primary text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-3 text-primary">Portfolio Website</h3>
                        <p class="text-slate-400 mb-4">Interactive personal portfolio showcasing projects, skills, and experience with modern animations and responsive design.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">HTML5</span>
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">CSS3</span>
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">JavaScript</span>
                            <span class="bg-slate-700 text-primary text-xs px-3 py-1 rounded-full">Tailwind</span>
                        </div>
                        <a href="https://github.com/MalajiGopiChand/Portfolio" target="_blank" class="text-primary font-medium hover:underline inline-flex items-center transition hover:text-secondary">
                            View on GitHub <i class="fas fa-external-link-alt ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>
                
                
            <div class="text-center mt-12">
                <a href="https://github.com/MalajiGopiChand?tab=repositories" target="_blank" class="inline-flex items-center px-6 py-3 border border-primary text-primary rounded-lg hover:bg-primary hover:text-white transition duration-300">
                    <i class="fab fa-github mr-2"></i> View All Projects on GitHub
                </a>
            </div>
        </div>
    </section>

    <!-- Certificates Section -->
    <section id="certificates" class="py-20 bg-darker">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-16 text-center text-primary section-title">
                Certificates & Achievements
            </h2>
            
            <div class="certificate-grid">
                <!-- Certificate 1 -->
                <div class="bg-slate-800 rounded-xl overflow-hidden border border-slate-700 card-hover">
                    <div class="h-48 bg-gradient-to-r from-slate-700 to-slate-800 flex items-center justify-center">
                        <i class="fas fa-certificate text-amber-500 text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-primary">Full Stack Web Development</h3>
                        <p class="text-slate-400 mb-4">DevTown MNC Internship Certification for successful completion of intensive full-stack development program.</p>
                        <div class="text-sm text-slate-500">Issued: Nov 2023</div>
                    </div>
                </div>
                
                <!-- Certificate 2 -->
                <div class="bg-slate-800 rounded-xl overflow-hidden border border-slate-700 card-hover">
                    <div class="h-48 bg-gradient-to-r from-slate-700 to-slate-800 flex items-center justify-center">
                        <i class="fas fa-medal text-amber-500 text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-primary">Programming in C</h3>
                        <p class="text-slate-400 mb-4">Certification for advanced C programming skills from Lovely Professional University.</p>
                        <div class="text-sm text-slate-500">Issued: 2022</div>
                    </div>
                </div>
                
                <!-- Certificate 3 -->
                <div class="bg-slate-800 rounded-xl overflow-hidden border border-slate-700 card-hover">
                    <div class="h-48 bg-gradient-to-r from-slate-700 to-slate-800 flex items-center justify-center">
                        <i class="fas fa-trophy text-amber-500 text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-primary">Hackathon Participant</h3>
                        <p class="text-slate-400 mb-4">Certificate of participation in national level hackathon for developing innovative solutions.</p>
                        <div class="text-sm text-slate-500">Issued: 2023</div>
                    </div>
                </div>
                
                <!-- Certificate 4 -->
                <div class="bg-slate-800 rounded-xl overflow-hidden border border-slate-700 card-hover">
                    <div class="h-48 bg-gradient-to-r from-slate-700 to-slate-800 flex items-center justify-center">
                        <i class="fas fa-award text-amber-500 text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-primary">Photography Excellence</h3>
                        <p class="text-slate-400 mb-4">Recognized for outstanding photography skills and creative visual storytelling.</p>
                        <div class="text-sm text-slate-500">Issued: 2021</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-slate-900">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-16 text-center text-primary section-title">
                Get In Touch
            </h2>
            
            <div class="flex flex-col lg:flex-row gap-12">
                <div class="lg:w-1/2">
                    <h3 class="text-2xl font-semibold mb-6 text-primary">Contact Information</h3>
                    <p class="text-slate-400 mb-8">Feel free to reach out to me for any questions or opportunities. I'm always open to discussing new projects, creative ideas or opportunities to be part of your vision.</p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="text-primary text-xl mr-4 mt-1">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white mb-1">Email</h4>
                                <a href="mailto:malajigopichand23@lpu.in" class="text-slate-400 hover:text-primary transition">malajigopichand23@lpu.in</a>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="text-primary text-xl mr-4 mt-1">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white mb-1">Phone</h4>
                                <a href="tel:+919705527264" class="text-slate-400 hover:text-primary transition">+91 9705527264</a>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="text-primary text-xl mr-4 mt-1">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white mb-1">Location</h4>
                                <p class="text-slate-400">Vijayawada, Andhra Pradesh, India</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-10">
                        <h4 class="font-semibold text-white mb-4">Connect with me</h4>
                        <div class="flex space-x-6">
                            <a href="https://github.com/MalajiGopiChand" target="_blank" class="tech-icon text-slate-400 hover:text-primary text-2xl transition">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="https://www.linkedin.com/in/malaji-gopi-chand/" target="_blank" class="tech-icon text-slate-400 hover:text-primary text-2xl transition">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="https://www.instagram.com/mr.gopichand.7/" target="_blank" class="tech-icon text-slate-400 hover:text-rose-500 text-2xl transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="tech-icon text-slate-400 hover:text-blue-500 text-2xl transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="lg:w-1/2">
                    <form id="contact-form" class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="name" class="block text-slate-400 mb-2">Your Name</label>
            <input type="text" id="name" name="name" class="w-full px-4 py-3 bg-slate-800 border border-slate-700 rounded-lg focus:outline-none focus:border-primary text-white contact-input" placeholder="Enter your name" required>
        </div>
        <div>
            <label for="email" class="block text-slate-400 mb-2">Your Email</label>
            <input type="email" id="email" name="email" class="w-full px-4 py-3 bg-slate-800 border border-slate-700 rounded-lg focus:outline-none focus:border-primary text-white contact-input" placeholder="Enter your email" required>
        </div>
    </div>
    <div>
        <label for="subject" class="block text-slate-400 mb-2">Subject</label>
        <input type="text" id="subject" name="subject" class="w-full px-4 py-3 bg-slate-800 border border-slate-700 rounded-lg focus:outline-none focus:border-primary text-white contact-input" placeholder="What's this about?" required>
    </div>
    <div>
        <label for="message" class="block text-slate-400 mb-2">Your Message</label>
        <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 bg-slate-800 border border-slate-700 rounded-lg focus:outline-none focus:border-primary text-white contact-input" placeholder="Hello Gopi, I'd like to talk about..." required></textarea>
    </div>
    <div id="form-message" class="text-sm mt-2"></div>
    <button type="submit" class="w-full bg-gradient-to-r from-primary to-secondary text-white px-6 py-3 rounded-lg font-semibold hover:opacity-90 transition transform hover:scale-[1.02] glow-box">
        Send Message
    </button>
</form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-darker py-12 border-t border-slate-800">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <a href="#home" class="font-bold text-2xl text-primary flex items-center">
                        <span class="w-3 h-3 bg-primary rounded-full mr-2"></span>
                        <span>Gopi Chand</span>
                    </a>
                    <p class="text-slate-500 mt-2">Full Stack Developer & Photographer</p>
                </div>
                
                <div class="flex space-x-6">
                    <a href="https://github.com/MalajiGopiChand" target="_blank" class="text-slate-400 hover:text-primary transition">
                        <i class="fab fa-github text-xl"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/malaji-gopi-chand/" target="_blank" class="text-slate-400 hover:text-primary transition">
                        <i class="fab fa-linkedin-in text-xl"></i>
                    </a>
                    <a href="https://www.instagram.com/mr.gopichand.7/" target="_blank" class="text-slate-400 hover:text-rose-500 transition">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-slate-400 hover:text-blue-500 transition">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                </div>
            </div>
            
            <div class="border-t border-slate-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-slate-500 text-sm mb-4 md:mb-0">© 2023 Gopi Chand. All rights reserved.</p>
                <div class="flex space-x-6">
                    <a href="#" class="text-slate-500 hover:text-primary text-sm transition">Privacy Policy</a>
                    <a href="#" class="text-slate-500 hover:text-primary text-sm transition">Terms of Service</a>
                    <a href="#" class="text-slate-500 hover:text-primary text-sm transition">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#home" id="back-to-top" class="fixed bottom-8 right-8 bg-primary text-white w-12 h-12 rounded-full flex items-center justify-center opacity-0 invisible transition-all duration-300 hover:bg-secondary">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- JavaScript -->
    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
        
        // Back to top button
        const backToTopButton = document.getElementById('back-to-top');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('opacity-0', 'invisible');
                backToTopButton.classList.add('opacity-100', 'visible');
            } else {
                backToTopButton.classList.remove('opacity-100', 'visible');
                backToTopButton.classList.add('opacity-0', 'invisible');
            }
        });
        
        // Typed.js initialization
        document.addEventListener('DOMContentLoaded', () => {
            const typed = new Typed('#typed', {
                strings: [
                    "Full Stack Developer",
                    "C/C++ Programmer",
                    "Java & Python Enthusiast",
                    "Web Developer",
                    "Photographer"
                ],
                typeSpeed: 50,
                backSpeed: 30,
                loop: true,
                showCursor: true,
                cursorChar: '|',
                smartBackspace: true
            });
        });
        
        // Three.js Background
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('threejs-container');
            
            // Only initialize Three.js if container exists
            if (container) {
                const scene = new THREE.Scene();
                const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
                const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
                
                renderer.setSize(window.innerWidth, window.innerHeight);
                container.appendChild(renderer.domElement);
                
                // Create floating cubes
                const cubes = [];
                const geometry = new THREE.BoxGeometry(1, 1, 1);
                
                for (let i = 0; i < 15; i++) {
                    const material = new THREE.MeshBasicMaterial({ 
                        color: Math.random() * 0xffffff,
                        transparent: true,
                        opacity: 0.2,
                        wireframe: true
                    });
                    
                    const cube = new THREE.Mesh(geometry, material);
                    
                    // Random position
                    cube.position.x = Math.random() * 20 - 10;
                    cube.position.y = Math.random() * 20 - 10;
                    cube.position.z = Math.random() * 20 - 10;
                    
                    // Random rotation
                    cube.rotation.x = Math.random() * Math.PI;
                    cube.rotation.y = Math.random() * Math.PI;
                    
                    // Random size
                    const scale = Math.random() * 0.5 + 0.5;
                    cube.scale.set(scale, scale, scale);
                    
                    // Store original positions for floating animation
                    cube.userData = {
                        originalY: cube.position.y,
                        speed: Math.random() * 0.02 + 0.01,
                        rotationSpeedX: Math.random() * 0.01,
                        rotationSpeedY: Math.random() * 0.01
                    };
                    
                    scene.add(cube);
                    cubes.push(cube);
                }
                
                camera.position.z = 5;
                
                // Handle window resize
                window.addEventListener('resize', () => {
                    camera.aspect = window.innerWidth / window.innerHeight;
                    camera.updateProjectionMatrix();
                    renderer.setSize(window.innerWidth, window.innerHeight);
                });
                
                // Animation loop
                function animate() {
                    requestAnimationFrame(animate);
                    
                    // Animate cubes
                    cubes.forEach(cube => {
                        // Floating animation
                        cube.position.y = cube.userData.originalY + Math.sin(Date.now() * cube.userData.speed) * 2;
                        
                        // Rotation
                        cube.rotation.x += cube.userData.rotationSpeedX;
                        cube.rotation.y += cube.userData.rotationSpeedY;
                    });
                    
                    renderer.render(scene, camera);
                }
                
                animate();
            }
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                }
            });
        });
        
        // Animate elements when they come into view
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.animate-fadeIn');
            
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;
                
                if (elementPosition < windowHeight - 100) {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }
            });
        };
        
        window.addEventListener('scroll', animateOnScroll);
        window.addEventListener('load', animateOnScroll);
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('network-canvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    const config = {
        nodeCount: 80,
        maxDistance: 160,
        nodeRadius: 2.5,
        lineWidth: 0.8,
        mouseRepulsion: 100
    };

    const nodes = [];
    const mouse = {
        x: 0,
        y: 0
    };

    for (let i = 0; i < config.nodeCount; i++) {
        nodes.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            vx: Math.random() * 2 - 1,
            vy: Math.random() * 2 - 1
        });
    }

    function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        ctx.beginPath();
        for (let i = 0; i < nodes.length; i++) {
            const node = nodes[i];
            ctx.moveTo(node.x, node.y);
            ctx.arc(node.x, node.y, config.nodeRadius, 0, Math.PI * 2);
        }
        ctx.fillStyle = 'rgba(99, 102, 241, 0.8)';
        ctx.fill();

        for (let i = 0; i < nodes.length; i++) {
            for (let j = i + 1; j < nodes.length; j++) {
                const nodeA = nodes[i];
                const nodeB = nodes[j];
                const dx = nodeB.x - nodeA.x;
                const dy = nodeB.y - nodeA.y;
                const distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < config.maxDistance) {
                    ctx.beginPath();
                    ctx.moveTo(nodeA.x, nodeA.y);
                    ctx.lineTo(nodeB.x, nodeB.y);
                    ctx.lineWidth = config.lineWidth;
                    ctx.strokeStyle = `rgba(99, 102, 241, ${1 - distance / config.maxDistance})`;
                    ctx.stroke();
                }
            }
        }
    }

    function update() {
        for (let i = 0; i < nodes.length; i++) {
            const node = nodes[i];
            node.x += node.vx;
            node.y += node.vy;

            if (node.x < 0 || node.x > canvas.width) {
                node.vx *= -1;
            }
            if (node.y < 0 || node.y > canvas.height) {
                node.vy *= -1;
            }
        }
    }

    function animate() {
        requestAnimationFrame(animate);
        draw();
        update();
    }

    canvas.addEventListener('mousemove', function(event) {
        mouse.x = event.clientX;
        mouse.y = event.clientY;
    });

    canvas.addEventListener('mouseleave', function() {
        for (let i = 0; i < nodes.length; i++) {
            const node = nodes[i];
            node.vx = Math.random() * 2 - 1;
            node.vy = Math.random() * 2 - 1;
        }
    });

    animate();
});
    </script>
    <script>
// Contact form submission (AJAX, no page reload)
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    const formMessage = document.getElementById('form-message');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            formMessage.textContent = '';
            formMessage.style.color = '#6366f1';

            // Collect form data
            const formData = new FormData(form);

            // Send via AJAX (fetch)
            fetch('send_mail.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(result => {
                formMessage.textContent = result;
                formMessage.style.color = '#10b981'; // green
                form.reset();
            })
            .catch(error => {
                formMessage.textContent = 'Failed to send message. Please try again later.';
                formMessage.style.color = '#ef4444'; // red
            });
        });
    }
});
    </script>
</body>
</html>