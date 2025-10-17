<?php
// PHP code for handling the contact form submission
$message_sent = false;
if(isset($_POST['email']) && $_POST['email'] != ''){
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $userName = $_POST['name'];
        $userEmail = $_POST['email'];
        $messageSubject = $_POST['subject'];
        $message = $_POST['message'];
        $to = "your.email@example.com"; // <-- IMPORTANT: Change this to your email
        $body = "From: ".$userName."\r\nEmail: ".$userEmail."\r\nMessage: ".$message."\r\n";
        // mail($to, $messageSubject, $body); // Uncomment this on a live server
        $message_sent = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sufiyanu Alh Sani | Web Developer Portfolio</title>
    <style>
        /* === ADVANCED & FUTURISTIC CSS === */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        :root {
            /* Futuristic Dark Mode Palette */
            --primary-accent: #00f5c9; /* Vibrant Cyan/Green */
            --secondary-accent: #f700ff; /* Vibrant Magenta */
            --bg-dark: #111827; /* Deep Navy/Black */
            --bg-card: rgba(31, 41, 55, 0.5); /* Semi-transparent card bg */
            --text-light: #f3f4f6;
            --text-dark: #9ca3af; /* Muted text for paragraphs */
            --border-glow: rgba(0, 245, 201, 0.3);
            --shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.7;
            background-color: var(--bg-dark);
            color: var(--text-light);
            overflow-x: hidden;
        }

        .container { max-width: 1100px; margin: auto; padding: 0 2rem; position: relative; z-index: 2; }

        /* --- Header --- */
        header {
            background: rgba(17, 24, 39, 0.7);
            backdrop-filter: blur(15px);
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0; left: 0; z-index: 1000;
            border-bottom: 1px solid rgba(243, 244, 246, 0.1);
        }
        header .container { display: flex; justify-content: space-between; align-items: center; }
        header h1 { font-size: 1.8rem; font-weight: 700; color: var(--text-light); }
        header nav ul { display: flex; list-style: none; }
        header nav ul li { margin-left: 25px; }
        header nav ul li a { color: var(--text-light); text-decoration: none; font-weight: 600; transition: color 0.3s ease; }
        header nav ul li a:hover { color: var(--primary-accent); }

        /* --- Hero Section --- */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center; justify-content: center;
            text-align: center;
            padding-top: 80px;
            position: relative;
            overflow: hidden;
            clip-path: polygon(0 0, 100% 0, 100% 90vh, 0 100%);
        }
        .hero h2 {
            font-size: 3.8rem; font-weight: 700; margin-bottom: 0.5rem;
            background: linear-gradient(45deg, var(--primary-accent), var(--text-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .hero p { font-size: 1.3rem; color: var(--text-dark); }
        .profile-image-container {
            width: 220px; height: 220px; border-radius: 50%;
            border: 5px solid var(--primary-accent);
            margin: 0 auto 1.5rem auto;
            overflow: hidden;
            box-shadow: 0 0 40px var(--border-glow);
            transition: transform 0.4s ease;
        }
        .profile-image-container:hover { transform: scale(1.05); }
        .profile-image-container img { width: 100%; height: 100%; object-fit: cover; }
        
        .blob { position: absolute; border-radius: 50%; filter: blur(100px); opacity: 0.4; z-index: 0; }
        .blob1 { width: 400px; height: 400px; top: -100px; left: -100px; background: var(--primary-accent); animation: move 20s infinite alternate; }
        .blob2 { width: 300px; height: 300px; bottom: -50px; right: -50px; background: var(--secondary-accent); animation: move 25s infinite alternate-reverse; }
        @keyframes move {
            from { transform: translate(0, 0) rotate(0deg); }
            to { transform: translate(100px, 50px) rotate(180deg); }
        }

        /* --- General Section Styling --- */
        section { padding: 6rem 0; position: relative; }
        .section-title { text-align: center; font-size: 2.5rem; margin-bottom: 4rem; }
        
        /* --- About Section --- */
        #about .about-content { display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: center; }
        #about h3 { color: var(--primary-accent); }
        #about ul { list-style: none; margin-top: 1rem; }
        #about ul li { background: var(--bg-card); padding: 10px 15px; margin-bottom: 10px; border-radius: 8px; border-left: 3px solid var(--primary-accent); }

        /* --- CV Timeline Section --- */
        #cv { background: #1a2336; }
        .timeline { position: relative; max-width: 800px; margin: 0 auto; }
        .timeline::after { content: ''; position: absolute; width: 2px; background: var(--bg-card); top: 0; bottom: 0; left: 50%; margin-left: -1px; }
        .timeline-item { padding: 10px 40px; position: relative; width: 50%; }
        .timeline-item.left { left: 0; }
        .timeline-item.right { left: 50%; }
        .timeline-item::after { content: ''; position: absolute; width: 20px; height: 20px; right: -10px; background: var(--bg-dark); border: 4px solid var(--primary-accent); top: 20px; border-radius: 50%; z-index: 1; }
        .timeline-item.right::after { left: -10px; }
        .timeline-item .timeline-content { padding: 20px 30px; background: var(--bg-card); backdrop-filter: blur(10px); position: relative; border-radius: 8px; box-shadow: var(--shadow); border: 1px solid rgba(243, 244, 246, 0.1); }

        /* --- Projects Section --- */
        .projects-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2.5rem; }
        .project-card { background: var(--bg-card); backdrop-filter: blur(15px); border-radius: 15px; border: 1px solid rgba(243, 244, 246, 0.1); overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease; position: relative; }
        .project-card:hover { transform: translateY(-10px); box-shadow: 0 0 30px var(--border-glow); }
        .project-info { padding: 1.5rem; }
        .project-info h3 { font-size: 1.4rem; color: var(--primary-accent); }
        .project-info p { color: var(--text-dark); margin-bottom: 1.5rem; }
        .project-link { display: inline-block; background: var(--primary-accent); color: var(--bg-dark); padding: 0.7rem 1.5rem; text-decoration: none; border-radius: 50px; font-weight: 600; transition: all 0.3s ease; }
        .project-link:hover { background: var(--text-light); transform: scale(1.05); }

        /* --- Contact Section --- */
        .contact-info-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }
        .contact-item {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            background: var(--bg-card);
            padding: 1.5rem;
            border-radius: 10px;
            border: 1px solid rgba(243, 244, 246, 0.1);
        }
        .contact-item svg { width: 40px; height: 40px; fill: var(--primary-accent); flex-shrink: 0; }
        .contact-item h4 { color: var(--text-light); margin-bottom: 0.25rem; font-weight: 600; }
        .contact-item p { color: var(--text-dark); font-size: 0.9rem; line-height: 1.4; }

        .contact-form { max-width: 800px; margin: 0 auto; text-align: center; }
        .form-group { margin-bottom: 1.5rem; }
        .form-group input, .form-group textarea { width: 100%; padding: 1rem; background: var(--bg-card); border: 1px solid rgba(243, 244, 246, 0.1); color: var(--text-light); border-radius: 8px; font-family: 'Poppins', sans-serif; }
        .form-group input::placeholder, .form-group textarea::placeholder { color: var(--text-dark); }
        .submit-btn { width: 100%; padding: 1rem; font-size: 1rem; font-weight: 600; border-radius: 8px; border: none; cursor: pointer; background: var(--primary-accent); color: var(--bg-dark); transition: all 0.3s ease; }
        .submit-btn:hover { background: var(--text-light); }

        /* --- Footer & Scroll Button --- */
        footer { text-align: center; padding: 2rem 0; background: #0c1221; }
        .reveal { opacity: 0; transform: translateY(100px); transition: all 1s ease; }
        .reveal.active { opacity: 1; transform: translateY(0px); }
        #scrollTopBtn { display: none; position: fixed; bottom: 20px; right: 30px; z-index: 99; border: none; outline: none; background-color: var(--primary-accent); color: var(--bg-dark); cursor: pointer; padding: 12px 15px; border-radius: 50%; font-size: 18px; box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Dear Customer, Welcome !!!</h1>
            <nav>
                <ul>
                    <li><a href="#about">About</a></li>
                    <li><a href="#cv">CV</a></li>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero" id="home">
            <div class="blob blob1"></div>
            <div class="blob blob2"></div>
            <div class="container">
                <div class="profile-image-container">
                    <img src="avatar.jpg" alt="Sufiyanu Alh Sani">
                </div>
                <h2>Sufiyanu Alh Sani</h2>
                <p>Web Application Developer & Computer Scientist</p>
            </div>
        </section>

        <section id="about" class="reveal">
            <div class="container about-content">
                <div>
                    <h3>My Story</h3>
                    <p>I am a passionate Web Developer with a solid foundation in computer science from <strong>Bayero University Kano</strong>. My journey is driven by a desire to build practical and impactful web solutions, turning complex problems into elegant, interactive digital experiences.</p>
                </div>
                <div>
                     <h3>Affiliations & Achievements</h3>
                    <ul>
                        <li>Professional Member at <strong>Akash Developers Kano</strong>.</li>
                        <li>Pioneer Participant of the <strong>2nd Digitak Kano Conference</strong>.</li>
                        <li>Holder of a Professional Diploma in Web Application Development from the <strong>ALISON INSTITUTE</strong>.</li>
                    </ul>
                </div>
            </div>
        </section>
        
        <section id="cv" class="reveal">
            <div class="container">
                <h2 class="section-title">My Journey (CV)</h2>
                <div class="timeline">
                    <div class="timeline-item left"><div class="timeline-content"><h3>B.Sc. in Computer Science</h3><h4>Bayero University Kano</h4><p>Graduated with a comprehensive understanding of core computing concepts, software development life cycles, and database management.</p></div></div>
                    <div class="timeline-item right"><div class="timeline-content"><h3>Professional Diploma in Web Dev</h3><h4>ALISON INSTITUTE</h4><p>Focused on practical skills in developing, testing, and deploying robust web applications using modern technologies and best practices.</p></div></div>
                    <div class="timeline-item left"><div class="timeline-content"><h3>Freelance Web Developer</h3><h4>Professional Experience</h4><p>Developed and maintained web applications, specializing in creating dynamic user interfaces and efficient server-side logic to meet client needs.</p></div></div>
                </div>
            </div>
        </section>
        
        <section id="projects" class="reveal">
             <div class="container">
                <h2 class="section-title">My Projects</h2>
                <div class="projects-grid">
                    <div class="project-card reveal"><div class="project-info"><h3>School Management System</h3><p>An interactive system to manage student/staff data, including automated generation of academic results and reports.</p><a href="https://smssbuk.page.gd/" target="_blank" class="project-link">View Project</a></div></div>
                    <div class="project-card reveal"><div class="project-info"><h3>Alumni Website for ZSCOE 2020</h3><p>A dedicated platform serving as a central hub for reunion information, connecting former classmates and facilitating event coordination.</p><a href="https://coemarualumni2020.vercel.app/" target="_blank" class="project-link">View Project</a></div></div>
                </div>
            </div>
        </section>
        
        <section id="contact" class="reveal">
            <div class="container">
                <h2 class="section-title">Get In Touch</h2>
                
                <div class="contact-info-wrapper reveal">
                    <div class="contact-item">
                        <svg viewBox="0 0 24 24"><path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z"/></svg>
                        <div><h4>Call / Whatsapp</h4><p>07032038258</p></div>
                    </div>
                    <div class="contact-item">
                        <svg viewBox="0 0 24 24"><path d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z"/></svg>
                        <div><h4>Email</h4><p>ss2201034.com@buk.edu.ng</p></div>
                    </div>
                    <div class="contact-item">
                        <svg viewBox="0 0 24 24"><path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z"/></svg>
                        <div><h4>Address</h4><p>Maru Emirate Council, Zamfara State</p></div>
                    </div>
                </div>

                <?php if($message_sent): ?>
                    <h3 style="text-align:center; color: var(--primary-accent);">Thanks! Your message has been sent.</h3>
                <?php else: ?>
                <form class="contact-form" action="index.php#contact" method="POST">
                    <div class="form-group"><input type="text" name="name" placeholder="Your Name" required></div>
                    <div class="form-group"><input type="email" name="email" placeholder="Your Email" required></div>
                    <div class="form-group"><input type="text" name="subject" placeholder="Subject" required></div>
                    <div class="form-group"><textarea name="message" placeholder="Your Message" rows="5" required></textarea></div>
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <button onclick="scrollToTop()" id="scrollTopBtn" title="Go to top">▲</button>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Sufiyanu Alh Sani. All Rights Reserved.</p>
    </footer>

    <script>
        let scrollTopButton = document.getElementById("scrollTopBtn");
        window.onscroll = function() { scrollFunction(); revealOnScroll(); };
        function scrollFunction() {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) { scrollTopButton.style.display = "block"; } 
            else { scrollTopButton.style.display = "none"; }
        }
        function scrollToTop() { document.documentElement.scrollTop = 0; }
        function revealOnScroll() {
            var reveals = document.querySelectorAll('.reveal');
            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = reveals[i].getBoundingClientRect().top;
                var elementVisible = 150;
                if (elementTop < windowHeight - elementVisible) { reveals[i].classList.add('active'); } 
                else { reveals[i].classList.remove('active'); }
            }
        }
        document.addEventListener('DOMContentLoaded', revealOnScroll);
    </script>

</body>
</html>
```