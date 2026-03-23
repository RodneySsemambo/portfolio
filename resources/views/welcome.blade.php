<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rodney Ssemambo — Laravel Developer</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #0a0a0f;
            --surface: #13131a;
            --surface2: #1c1c27;
            --border: rgba(255,255,255,0.07);
            --accent: #4f9cf9;
            --accent2: #7c3aed;
            --accent-glow: rgba(79,156,249,0.15);
            --text: #f0f0f5;
            --muted: #7b7b8f;
            --white: #ffffff;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            overflow-x: hidden;
            cursor: none;
        }

        /* Custom cursor */
        .cursor {
            width: 10px; height: 10px;
            background: var(--accent);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            transform: translate(-50%, -50%);
            transition: transform 0.1s, width 0.3s, height 0.3s, background 0.3s;
        }
        .cursor-follower {
            width: 36px; height: 36px;
            border: 1.5px solid rgba(79,156,249,0.4);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9998;
            transform: translate(-50%, -50%);
            transition: transform 0.15s ease, width 0.3s, height 0.3s;
        }
        body:has(a:hover) .cursor { width: 16px; height: 16px; background: var(--accent2); }
        body:has(a:hover) .cursor-follower { width: 50px; height: 50px; border-color: rgba(124,58,237,0.4); }

        /* Noise overlay */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 1;
            opacity: 0.4;
        }

        /* NAV */
        nav {
            position: fixed; top: 0; left: 0; right: 0;
            z-index: 100;
            padding: 1.25rem 4rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid transparent;
            transition: all 0.4s ease;
        }
        nav.scrolled {
            background: rgba(10,10,15,0.85);
            backdrop-filter: blur(20px);
            border-bottom-color: var(--border);
        }
        .nav-logo {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.1rem;
            color: var(--white);
            text-decoration: none;
            letter-spacing: -0.02em;
        }
        .nav-logo span { color: var(--accent); }
        .nav-links { display: flex; gap: 2.5rem; list-style: none; }
        .nav-links a {
            text-decoration: none;
            color: var(--muted);
            font-size: 0.875rem;
            font-weight: 500;
            letter-spacing: 0.02em;
            transition: color 0.2s;
            position: relative;
        }
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -4px; left: 0;
            width: 0; height: 1px;
            background: var(--accent);
            transition: width 0.3s ease;
        }
        .nav-links a:hover { color: var(--white); }
        .nav-links a:hover::after { width: 100%; }
        .nav-cta {
            padding: 0.5rem 1.25rem;
            background: var(--accent);
            color: var(--bg) !important;
            border-radius: 100px;
            font-weight: 600 !important;
            font-size: 0.8rem !important;
            transition: all 0.2s !important;
        }
        .nav-cta:hover { background: #6aadff !important; transform: translateY(-1px); }
        .nav-cta::after { display: none !important; }

        /* HERO */
        #hero {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            padding: 8rem 4rem 4rem;
            gap: 4rem;
            position: relative;
            overflow: hidden;
        }

        /* Gradient orbs */
        #hero::after {
            content: '';
            position: absolute;
            top: -20%; right: -10%;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(79,156,249,0.08) 0%, transparent 70%);
            pointer-events: none;
        }
        .hero-orb {
            position: absolute;
            bottom: -10%; left: 20%;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(124,58,237,0.06) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-left { position: relative; z-index: 2; }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.35rem 0.85rem;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 100px;
            font-size: 0.75rem;
            color: var(--muted);
            margin-bottom: 2rem;
            animation: fadeUp 0.8s ease both;
        }
        .hero-badge .dot {
            width: 6px; height: 6px;
            background: #22c55e;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.3); }
        }

        .hero-name {
            font-family: 'Syne', sans-serif;
            font-size: clamp(3rem, 5vw, 4.5rem);
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: -0.03em;
            color: var(--white);
            animation: fadeUp 0.8s 0.1s ease both;
        }
        .hero-name .line2 {
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-title {
            font-size: 1rem;
            color: var(--muted);
            margin-top: 1.25rem;
            font-weight: 400;
            letter-spacing: 0.02em;
            animation: fadeUp 0.8s 0.2s ease both;
        }
        .hero-title strong { color: var(--accent); font-weight: 500; }

        .hero-desc {
            margin-top: 1.5rem;
            font-size: 1rem;
            line-height: 1.75;
            color: var(--muted);
            max-width: 480px;
            animation: fadeUp 0.8s 0.3s ease both;
        }

        .hero-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2.5rem;
            flex-wrap: wrap;
            animation: fadeUp 0.8s 0.4s ease both;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.85rem 2rem;
            background: var(--accent);
            color: var(--bg);
            text-decoration: none;
            border-radius: 100px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.25s ease;
            box-shadow: 0 0 30px rgba(79,156,249,0.25);
        }
        .btn-primary:hover {
            background: #6aadff;
            transform: translateY(-2px);
            box-shadow: 0 0 40px rgba(79,156,249,0.4);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.85rem 2rem;
            background: transparent;
            color: var(--text);
            text-decoration: none;
            border-radius: 100px;
            font-weight: 500;
            font-size: 0.9rem;
            border: 1px solid var(--border);
            transition: all 0.25s ease;
        }
        .btn-secondary:hover {
            border-color: rgba(79,156,249,0.4);
            background: var(--accent-glow);
            color: var(--white);
        }

        .hero-stats {
            display: flex;
            gap: 2.5rem;
            margin-top: 3rem;
            animation: fadeUp 0.8s 0.5s ease both;
        }
        .stat-item { }
        .stat-num {
            font-family: 'Syne', sans-serif;
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--white);
            line-height: 1;
        }
        .stat-num span { color: var(--accent); }
        .stat-label {
            font-size: 0.75rem;
            color: var(--muted);
            margin-top: 0.25rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        /* Hero right - photo */
        .hero-right {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: center;
            animation: fadeIn 1s 0.3s ease both;
        }

        .photo-frame {
            position: relative;
            width: 380px;
            height: 460px;
        }

        .photo-frame::before {
            content: '';
            position: absolute;
            inset: -2px;
            background: linear-gradient(135deg, var(--accent), var(--accent2), transparent, var(--accent));
            border-radius: 2rem;
            z-index: 0;
            animation: borderSpin 6s linear infinite;
        }

        @keyframes borderSpin {
            0% { background: linear-gradient(135deg, var(--accent), var(--accent2), transparent, var(--accent)); }
            50% { background: linear-gradient(315deg, var(--accent), var(--accent2), transparent, var(--accent)); }
            100% { background: linear-gradient(135deg, var(--accent), var(--accent2), transparent, var(--accent)); }
        }

        .photo-inner {
            position: relative;
            z-index: 1;
            width: 100%;
            height: 100%;
            border-radius: calc(2rem - 2px);
            overflow: hidden;
            background: var(--surface2);
        }

        .photo-inner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top;
        }

        /* Placeholder when no image */
        .photo-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--surface2), var(--surface));
            color: var(--muted);
            font-size: 0.85rem;
            gap: 1rem;
            text-align: center;
            padding: 2rem;
        }
        .photo-placeholder svg { opacity: 0.3; }

        .photo-card {
            position: absolute;
            bottom: -1.5rem;
            left: -2rem;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 1rem;
            padding: 0.85rem 1.25rem;
            backdrop-filter: blur(20px);
            z-index: 3;
            animation: float 4s ease-in-out infinite;
        }
        .photo-card-label { font-size: 0.7rem; color: var(--muted); text-transform: uppercase; letter-spacing: 0.05em; }
        .photo-card-value { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 1.1rem; color: var(--white); margin-top: 0.15rem; }
        .photo-card-value span { color: var(--accent); }

        .photo-card2 {
            position: absolute;
            top: 2rem;
            right: -2rem;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 1rem;
            padding: 0.85rem 1.25rem;
            backdrop-filter: blur(20px);
            z-index: 3;
            animation: float 4s 2s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .tech-pills {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-top: 0.5rem;
        }
        .tech-pill {
            padding: 0.2rem 0.6rem;
            background: var(--accent-glow);
            border: 1px solid rgba(79,156,249,0.2);
            border-radius: 100px;
            font-size: 0.65rem;
            color: var(--accent);
            font-weight: 500;
        }

        /* SECTION BASE */
        section {
            padding: 7rem 4rem;
            position: relative;
        }

        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.75rem;
            color: var(--accent);
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            margin-bottom: 1.25rem;
        }
        .section-label::before {
            content: '';
            width: 2rem;
            height: 1px;
            background: var(--accent);
        }

        .section-title {
            font-family: 'Syne', sans-serif;
            font-size: clamp(2rem, 3.5vw, 3rem);
            font-weight: 800;
            color: var(--white);
            letter-spacing: -0.03em;
            line-height: 1.1;
        }

        /* ABOUT */
        #about { background: var(--surface); }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            align-items: center;
            margin-top: 3rem;
        }

        .about-text p {
            font-size: 1rem;
            line-height: 1.8;
            color: var(--muted);
            margin-bottom: 1.25rem;
        }
        .about-text p strong { color: var(--text); font-weight: 500; }

        .about-highlights {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .highlight-card {
            padding: 1.5rem;
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 1rem;
            transition: border-color 0.3s, transform 0.3s;
        }
        .highlight-card:hover {
            border-color: rgba(79,156,249,0.3);
            transform: translateY(-3px);
        }
        .highlight-icon {
            width: 2.5rem; height: 2.5rem;
            background: var(--accent-glow);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.75rem;
            font-size: 1.1rem;
        }
        .highlight-title {
            font-family: 'Syne', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 0.25rem;
        }
        .highlight-desc { font-size: 0.8rem; color: var(--muted); line-height: 1.5; }

        /* SKILLS */
        #skills { }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-top: 3rem;
        }

        .skill-category {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 1.25rem;
            padding: 1.75rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .skill-category::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--accent), var(--accent2));
            opacity: 0;
            transition: opacity 0.3s;
        }
        .skill-category:hover { border-color: rgba(79,156,249,0.25); transform: translateY(-4px); }
        .skill-category:hover::before { opacity: 1; }

        .skill-cat-title {
            font-family: 'Syne', sans-serif;
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--accent);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 1.25rem;
        }

        .skill-tags { display: flex; flex-wrap: wrap; gap: 0.5rem; }
        .skill-tag {
            padding: 0.35rem 0.85rem;
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 100px;
            font-size: 0.8rem;
            color: var(--text);
            transition: all 0.2s;
        }
        .skill-tag:hover {
            background: var(--accent-glow);
            border-color: rgba(79,156,249,0.3);
            color: var(--accent);
        }

        /* PROJECTS */
        #projects { background: var(--surface); }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
            gap: 1.5rem;
            margin-top: 3rem;
        }

        .project-card {
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 1.5rem;
            overflow: hidden;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        .project-card:hover {
            border-color: rgba(79,156,249,0.3);
            transform: translateY(-6px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.4), 0 0 40px rgba(79,156,249,0.05);
        }

        .project-image {
            height: 200px;
            background: linear-gradient(135deg, var(--surface2), var(--surface));
            position: relative;
            overflow: hidden;
        }
        .project-image img { width: 100%; height: 100%; object-fit: cover; }
        .project-image-placeholder {
            width: 100%; height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            background: linear-gradient(135deg, #0f0f1a, #1a1a2e);
        }

        .project-badge {
            position: absolute;
            top: 1rem; right: 1rem;
            padding: 0.3rem 0.75rem;
            background: rgba(10,10,15,0.8);
            border: 1px solid var(--border);
            border-radius: 100px;
            font-size: 0.7rem;
            color: var(--accent);
            backdrop-filter: blur(10px);
            font-weight: 600;
        }

        .project-body { padding: 1.5rem; flex: 1; display: flex; flex-direction: column; }
        .project-title {
            font-family: 'Syne', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 0.75rem;
        }
        .project-desc {
            font-size: 0.875rem;
            color: var(--muted);
            line-height: 1.7;
            flex: 1;
        }

        .project-stack {
            display: flex;
            flex-wrap: wrap;
            gap: 0.4rem;
            margin-top: 1.25rem;
        }
        .stack-tag {
            padding: 0.2rem 0.6rem;
            background: var(--surface2);
            border-radius: 100px;
            font-size: 0.7rem;
            color: var(--muted);
            border: 1px solid var(--border);
        }

        .project-links {
            display: flex;
            gap: 0.75rem;
            margin-top: 1.5rem;
        }
        .project-link {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.5rem 1rem;
            border-radius: 100px;
            font-size: 0.8rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
        }
        .project-link.primary {
            background: var(--accent);
            color: var(--bg);
        }
        .project-link.primary:hover { background: #6aadff; }
        .project-link.ghost {
            border: 1px solid var(--border);
            color: var(--muted);
        }
        .project-link.ghost:hover {
            border-color: rgba(79,156,249,0.3);
            color: var(--accent);
        }

        /* CONTACT */
        #contact {
            background: var(--bg);
        }

        .contact-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            margin-top: 3rem;
            align-items: start;
        }

        .contact-info { }
        .contact-info p {
            font-size: 1rem;
            color: var(--muted);
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .contact-items { display: flex; flex-direction: column; gap: 1rem; }
        .contact-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.25rem;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 0.875rem;
            text-decoration: none;
            transition: all 0.2s;
        }
        .contact-item:hover { border-color: rgba(79,156,249,0.3); transform: translateX(4px); }
        .contact-item-icon {
            width: 2.5rem; height: 2.5rem;
            background: var(--accent-glow);
            border-radius: 0.625rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .contact-item-text { }
        .contact-item-label { font-size: 0.7rem; color: var(--muted); text-transform: uppercase; letter-spacing: 0.05em; }
        .contact-item-value { font-size: 0.9rem; color: var(--text); font-weight: 500; margin-top: 0.15rem; }

        /* Contact Form */
        .contact-form { display: flex; flex-direction: column; gap: 1rem; }

        .form-group { display: flex; flex-direction: column; gap: 0.5rem; }
        .form-group label {
            font-size: 0.8rem;
            color: var(--muted);
            font-weight: 500;
            letter-spacing: 0.03em;
        }
        .form-group input,
        .form-group textarea {
            padding: 0.875rem 1.125rem;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 0.75rem;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            resize: none;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            border-color: rgba(79,156,249,0.5);
            box-shadow: 0 0 0 3px rgba(79,156,249,0.08);
        }
        .form-group input::placeholder,
        .form-group textarea::placeholder { color: var(--muted); opacity: 0.6; }

        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

        .btn-submit {
            padding: 0.9rem 2rem;
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            color: white;
            border: none;
            border-radius: 100px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: none;
            transition: all 0.25s;
            margin-top: 0.5rem;
            box-shadow: 0 0 30px rgba(79,156,249,0.2);
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 40px rgba(79,156,249,0.35);
        }

        /* FOOTER */
        footer {
            padding: 2.5rem 4rem;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        footer p { font-size: 0.8rem; color: var(--muted); }
        .footer-links { display: flex; gap: 1.5rem; }
        .footer-links a {
            font-size: 0.8rem;
            color: var(--muted);
            text-decoration: none;
            transition: color 0.2s;
        }
        .footer-links a:hover { color: var(--accent); }

        /* ANIMATIONS */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            nav { padding: 1.25rem 2rem; }
            .nav-links { display: none; }
            #hero { grid-template-columns: 1fr; padding: 7rem 2rem 4rem; text-align: center; }
            .hero-right { order: -1; }
            .photo-frame { width: 260px; height: 320px; }
            .photo-card { left: -0.5rem; }
            .photo-card2 { right: -0.5rem; }
            .hero-desc { margin: 1.5rem auto 0; }
            .hero-actions { justify-content: center; }
            .hero-stats { justify-content: center; }
            section { padding: 5rem 2rem; }
            .about-grid, .contact-wrapper { grid-template-columns: 1fr; gap: 3rem; }
            .form-row { grid-template-columns: 1fr; }
            footer { flex-direction: column; gap: 1rem; text-align: center; }
        }

        /* Alert */
        .alert {
            padding: 0.875rem 1.25rem;
            border-radius: 0.75rem;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }
        .alert-success { background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.2); color: #4ade80; }
        .alert-error { background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.2); color: #f87171; }
    </style>
</head>
<body>

    <div class="cursor" id="cursor"></div>
    <div class="cursor-follower" id="follower"></div>

    <!-- NAV -->
    <nav id="navbar">
        <a href="#hero" class="nav-logo">RS<span>.</span></a>
        <ul class="nav-links">
            <li><a href="#about">About</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact" class="nav-cta">Hire Me</a></li>
        </ul>
    </nav>

    <!-- HERO -->
    <section id="hero">
        <div class="hero-orb"></div>

        <div class="hero-left">
            <div class="hero-badge">
                <span class="dot"></span>
                Available for remote work
            </div>

            <h1 class="hero-name">
                Rodney<br>
                <span class="line2">Ssemambo</span>
            </h1>

            <p class="hero-title">
                <strong>Laravel & PHP Developer</strong> · Kampala, Uganda 🇺🇬
            </p>

            <p class="hero-desc">
                I build production-ready web applications with clean architecture,rest Apis, real-world integrations, and comprehensive test coverage. Passionate about solving real problems with elegant code.
            </p>

            <div class="hero-actions">
                <a href="#projects" class="btn-primary">
                    View My Work
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="#contact" class="btn-secondary">
                    Get In Touch
                </a>
            </div>

            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-num">31<span>+</span></div>
                    <div class="stat-label">Tests Written</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">3<span>+</span></div>
                    <div class="stat-label">Projects Built</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">1<span>yr</span></div>
                    <div class="stat-label">Experience</div>
                </div>
            </div>
        </div>

        <div class="hero-right">
            <div class="photo-frame">
                <div class="photo-inner">
                    <img src="{{ asset('images/rodney.jpg') }}" alt="Rodney Ssemambo"> 
                    <div class="photo-placeholder">
                        <svg width="64" height="64" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        <span>Add your photo here<br><small>resources/images/rodney.jpg</small></span>
                    </div>
                </div>

                <div class="photo-card">
                    <div class="photo-card-label">Tech Stack</div>
                    <div class="tech-pills" style="margin-top:0.5rem;">
                        <span class="tech-pill">Laravel</span>
                        <span class="tech-pill">PHP 8.2</span>
                        <span class="tech-pill">MySQL</span>
                    </div>
                </div>

                
            </div>
        </div>
    </section>

    <!-- ABOUT -->
    <section id="about">
        <div class="section-label">About Me</div>
        <h2 class="section-title reveal">The person behind<br>the code</h2>

        <div class="about-grid">
            <div class="about-text reveal">
                <p>
                    I'm a <strong>self-taught Laravel & PHP developer</strong> based in Kampala, Uganda. I got into programming because I love building things that solve real problems — not just tutorial clones.
                </p>
                <p>
                    My flagship project is a <strong>full-stack healthcare booking platform</strong> complete with mobile money payments, an AI-powered chatbot, role-based dashboards, and a comprehensive test suite. I built every part of it from architecture to deployment.
                </p>
                <p>
                    I write <strong>clean, testable code</strong> with proper service layers, database migrations, and PHPUnit tests. I believe good software is software that works reliably — not just software that works once.
                </p>
                <div style="margin-top:1.5rem;">
                    <a href="https://github.com/RodneySsemambo" target="_blank" class="btn-secondary" style="display:inline-flex;">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        View GitHub Profile
                    </a>
                </div>
            </div>

            <div class="about-highlights reveal">
                <div class="highlight-card">
                    <div class="highlight-icon">🏗️</div>
                    <div class="highlight-title">Clean Architecture</div>
                    <div class="highlight-desc">Service layers, repository patterns, proper separation of concerns</div>
                </div>
                <div class="highlight-card">
                    <div class="highlight-icon">🧪</div>
                    <div class="highlight-title">Test-Driven</div>
                    <div class="highlight-desc">31 passing tests covering payments, appointments, and chat</div>
                </div>
                <div class="highlight-card">
                    <div class="highlight-icon">🔌</div>
                    <div class="highlight-title">Real Integrations</div>
                    <div class="highlight-desc">Mobile money payments, SMS, email notifications</div>
                </div>
                <div class="highlight-card">
                    <div class="highlight-icon">🐳</div>
                    <div class="highlight-title">Deployment Ready</div>
                    <div class="highlight-desc">Dockerized with Nginx, MySQL, and automated migrations</div>
                </div>
            </div>
        </div>
    </section>

    <!-- SKILLS -->
    <section id="skills">
        <div class="section-label">Skills</div>
        <h2 class="section-title reveal">What I work with</h2>

        <div class="skills-grid">
            <div class="skill-category reveal">
                <div class="skill-cat-title">Backend</div>
                <div class="skill-tags">
                    <span class="skill-tag">PHP 8.2</span>
                    <span class="skill-tag">Laravel 11</span>
                    <span class="skill-tag">Laravel Sanctum</span>
                    <span class="skill-tag">REST APIs</span>
                    <span class="skill-tag">Queue Jobs</span>
                    <span class="skill-tag">Service Classes</span>
                </div>
            </div>
            <div class="skill-category reveal">
                <div class="skill-cat-title">Frontend</div>
                <div class="skill-tags">
                    <span class="skill-tag">Livewire 3</span>
                    <span class="skill-tag">Blade Templates</span>
                    <span class="skill-tag">Tailwind CSS</span>
                    <span class="skill-tag">Alpine.js</span>
                    <span class="skill-tag">Vite</span>
                </div>
            </div>
            <div class="skill-category reveal">
                <div class="skill-cat-title">Database</div>
                <div class="skill-tags">
                    <span class="skill-tag">MySQL 8</span>
                    <span class="skill-tag">Eloquent ORM</span>
                    <span class="skill-tag">Migrations</span>
                    <span class="skill-tag">Query Builder</span>
                    <span class="skill-tag">SQLite (testing)</span>
                </div>
            </div>
            <div class="skill-category reveal">
                <div class="skill-cat-title">Admin & Tools</div>
                <div class="skill-tags">
                    <span class="skill-tag">Filament 4</span>
                    <span class="skill-tag">Filament Shield</span>
                    <span class="skill-tag">Spatie Permissions</span>
                    <span class="skill-tag">PHPUnit</span>
                    <span class="skill-tag">Composer</span>
                </div>
            </div>
            <div class="skill-category reveal">
                <div class="skill-cat-title">DevOps & Infra</div>
                <div class="skill-tags">
                    <span class="skill-tag">Docker</span>
                    <span class="skill-tag">Docker Compose</span>
                    <span class="skill-tag">Nginx</span>
                    <span class="skill-tag">Render</span>
                    <span class="skill-tag">Git & GitHub</span>
                </div>
            </div>
            <div class="skill-category reveal">
                <div class="skill-cat-title">Integrations</div>
                <div class="skill-tags">
                    <span class="skill-tag">MarzPay (MTN/Airtel)</span>
                    <span class="skill-tag">Africa's Talking SMS</span>
                    <span class="skill-tag">SMTP Email</span>
                    <span class="skill-tag">Webhook Handling</span>
                </div>
            </div>
        </div>
    </section>

    <!-- PROJECTS -->
    <section id="projects">
        <div class="section-label">Projects</div>
        <h2 class="section-title reveal">Things I've built</h2>

        <div class="projects-grid">
            <!-- Project 1 - Main -->
            <div class="project-card reveal" style="grid-column: span 1;">
                <div class="project-image">
                    <div class="project-image-placeholder">🏥</div>
                    <span class="project-badge">Featured</span>
                </div>
                <div class="project-body">
                    <div class="project-title">Doctors Booking App</div>
                    <div class="project-desc">
                        A production-ready healthcare platform. Patients book appointments, pay via MTN/Airtel Mobile Money, and chat with an AI assistant. Doctors manage schedules and earnings. Full Filament admin panel with role-based permissions.
                        For login credentials check my repo on github. 
                    </div>
                    <div class="project-stack">
                        <span class="stack-tag">Laravel 11</span>
                        <span class="stack-tag">Livewire</span>
                        <span class="stack-tag">Filament</span>
                        <span class="stack-tag">MySQL</span>
                        <span class="stack-tag">Docker</span>
                        <span class="stack-tag">PHPUnit</span>
                    </div>
                    <div class="project-links">
                        <a href="https://doctors-booking-app-production.up.railway.app/login" class="project-link primary" target="_blank">
                            Live Demo
                            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                        </a>
                        <a href="https://github.com/RodneySsemambo/Doctors_Booking_App" class="project-link ghost" target="_blank">
                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                           View Repo on GitHub
                        </a>
                    </div>
                </div>
            </div>

            <!-- Project 2 - Portfolio itself -->
            <div class="project-card reveal">
                <div class="project-image">
                    <div class="project-image-placeholder">💼</div>
                </div>
                <div class="project-body">
                    <div class="project-title">This Portfolio</div>
                    <div class="project-desc">
                        A clean, performant portfolio built with Laravel and deployed on Render. Features a contact form with database storage, smooth scroll animations, and a fully responsive dark UI.
                    </div>
                    <div class="project-stack">
                        <span class="stack-tag">Laravel</span>
                        <span class="stack-tag">Blade</span>
                        <span class="stack-tag">MySQL</span>
                        <span class="stack-tag">Docker</span>
                        <span class="stack-tag">Render</span>
                    </div>
                    <div class="project-links">
                        <a href="https://github.com/RodneySsemambo/Portifolio" class="project-link ghost" target="_blank">
                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                           View Repo On GitHub
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Project 3 - Portfolio itself -->
            <div class="project-card reveal">
                <div class="project-image">
                    <div class="project-image-placeholder">💼</div>
                </div>
                <div class="project-body">
                    <div class="project-title">This retail-management-dashboard</div>
                    <div class="project-desc">
                        A comprehensive Retail Management System built with Laravel that streamlines daily retail operations. Features include multi-shop management, category organization, user role management, and real-time daily retail tracking. Perfect for small to medium retail businesses looking to digitize their operations.
                    </div>
                    <div class="project-stack">
                        <span class="stack-tag">Laravel</span>
                        <span class="stack-tag">Blade</span>
                        <span class="stack-tag">MySQL</span>
                        <span class="stack-tag">Docker</span>
                        <span class="stack-tag">Php</span>
                        <span class="stack-tag">Retail Management</span>
                        <span class="stack-tag">Pos-System</span>
                        <span class="stack-tag">Invetory Management</span>
                    </div>
                    <div class="project-links">
                        <a href="https://github.com/RodneySsemambo/retail-management-dashboard" class="project-link ghost" target="_blank">
                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            View Repo On GitHub
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Project 4 - Portfolio itself -->
            <div class="project-card reveal">
                <div class="project-image">
                    <div class="project-image-placeholder">💼</div>
                </div>
                <div class="project-body">
                    <div class="project-title">Project Management Dashboard</div>
                    <div class="project-desc">
                         Professional project management system built with Laravel 12 & Filament 4. Features include project tracking, task management, team collaboration, role-based access control, and real-time dashboards. Perfect for businesses and organizations managing multiple projects.                    </div>
                    <div class="project-stack">
                        <span class="stack-tag">Laravel</span>
                        <span class="stack-tag">Blade</span>
                        <span class="stack-tag">MySQL</span>
                        <span class="stack-tag">Filament</span>
                    </div>
                    <div class="project-links">
                        <a href="https://github.com/RodneySsemambo/project-management-dashboard" class="project-link ghost" target="_blank">
                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            View Repo On GitHub
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Project 5 - Portfolio itself -->
            <div class="project-card reveal">
                <div class="project-image">
                    <div class="project-image-placeholder">💼</div>
                </div>
                <div class="project-body">
                    <div class="project-title">Shop Api</div>
                    <div class="project-desc">
                        # 🛒 Vanilla PHP E-Commerce System  A fully functional e-commerce platform built from scratch with pure PHP and MySQL. Demonstrates core web development concepts without framework dependencies.  ## ✨ Features - User authentication & session management - Product catalog with categories - Shopping cart functionality - Order processing system - Admin 
                    </div>
                    <div class="project-stack">
                        <span class="stack-tag">MySQL</span>
                        <span class="stack-tag">Vanilla Php</span>
                    </div>
                    <div class="project-links">
                        <a href="https://github.com/RodneySsemambo/shop-api" class="project-link ghost" target="_blank">
                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            GitHub
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Project 6 - Portfolio itself -->
            <div class="project-card reveal">
                <div class="project-image">
                    <div class="project-image-placeholder">💼</div>
                </div>
                <div class="project-body">
                    <div class="project-title">Internship Project</div>
                    <div class="project-desc">
                🔌 Livewire REST API - Internship Project A robust RESTful API built during internship demonstrating modern PHP practices with Laravel and Livewire integration. Showcases clean architecture, API design patterns, and real-world implementation. ## 📡 API Endpoints - 🔐 Authentication (JWT/Sanctum) - 👥 User management - 📦 Resource CRUD operation
                    </div>
                    <div class="project-stack">
                        <span class="stack-tag">Laravel</span>
                        <span class="stack-tag">Blade</span>
                        <span class="stack-tag">MySQL</span>
                        <span class="stack-tag">Docker</span>
                        <span class="stack-tag">Php</span>
                        <span class="stack-tag">Rest_api</span>
                        <span class="stack-tag">Livewire</span>
                        
                    </div>
                    <div class="project-links">
                        <a href="https://github.com/RodneySsemambo/internhip_api" class="project-link ghost" target="_blank">
                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            View Repo On GitHub
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Project 7 - Portfolio itself -->
            <div class="project-card reveal">
                <div class="project-image">
                    <div class="project-image-placeholder">💼</div>
                </div>
                <div class="project-body">
                    <div class="project-title">Movie-Library Api</div>
                    <div class="project-desc">
                        # 📝 Vanilla PHP CRUD Operations A complete CRUD (Create, Read, Update, Delete) application built with pure PHP. Serves as a foundation for understanding database interactions and PHP fundamentals. ## 🔧 Core Concepts Demonstrated - PHP OOP (Classes, Inheritance, Interfaces) - PDO for secure database operations - Form validation and sanitization
                    </div>
                    <div class="project-stack">
                        <span class="stack-tag">Php</span>
                        <span class="stack-tag">MySQL</span>
                    </div>
                    <div class="project-links">
                        <a href="https://github.com/RodneySsemambo/-movie-library-api" class="project-link ghost" target="_blank">
                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            View Repo On GitHub
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Project 8 - Portfolio itself -->
            <div class="project-card reveal">
                <div class="project-image">
                    <div class="project-image-placeholder">💼</div>
                </div>
                <div class="project-body">
                    <div class="project-title">Business Management Dashboard</div>
                    <div class="project-desc">
                        A Perfect Business Management System built with Laravel. Features include multi-shop management, category organization, user role management, and real-time daily retail tracking. Ideal for small to medium retail businesses looking to digitize their operations.
                    </div>
                    <div class="project-stack">
                        <span class="stack-tag">Laravel</span>
                        <span class="stack-tag">Blade</span>
                        <span class="stack-tag">MySQL</span>
                        <span class="stack-tag">Docker</span>
                        <span class="stack-tag">Filament</span>
                    </div>
                    <div class="project-links">
                        <a href="https://github.com/RodneySsemambo/business_managemant" class="project-link ghost" target="_blank">
                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            View Repo On GitHub
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section id="contact">
        <div class="section-label">Contact</div>
        <h2 class="section-title reveal">Let's work together</h2>

        <div class="contact-wrapper">
            <div class="contact-info reveal">
                <p>
                    I'm actively looking for remote Laravel/PHP developer roles. If you're building something interesting or need a reliable backend developer — let's talk.
                </p>
                <div class="contact-items">
                    <a href="mailto:ssemamborodney94@gmail.com" class="contact-item">
                        <div class="contact-item-icon">
                            <svg width="18" height="18" fill="none" stroke="#4f9cf9" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </div>
                        <div class="contact-item-text">
                            <div class="contact-item-label">Email</div>
                            <div class="contact-item-value">rodneyssemambo88@gmail.com</div>
                     

                        </div>
                       
                    </a>
                    <a href="https://github.com/RodneySsemambo" target="_blank" class="contact-item">
                        <div class="contact-item-icon">
                            <svg width="18" height="18" fill="#4f9cf9" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        </div>
                        <div class="contact-item-text">
                            <div class="contact-item-label">GitHub</div>
                            <div class="contact-item-value">RodneySsemambo</div>
                        </div>
                    </a>
                    <a href="#" class="contact-item">
                        <div class="contact-item-icon">
                            <svg width="18" height="18" fill="#4f9cf9" viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                        </div>
                        <div class="contact-item-text">
                            <div class="contact-item-label">Phone/Whatsapp Me</div>
                            <div class="contact-item-value">0756886299</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="reveal">
                @if(session('success'))
                    <div class="alert alert-success">✓ Message sent! I'll get back to you soon.</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-error">Something went wrong. Please try again.</div>
                @endif

                <form action="/contact" method="POST" class="contact-form">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" placeholder="John" required value="{{ old('first_name') }}">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" placeholder="Doe" value="{{ old('last_name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="john@company.com" required value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="subject" placeholder="Job opportunity / Project inquiry" value="{{ old('subject') }}">
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message" rows="5" placeholder="Tell me about the role or project..." required>{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn-submit">
                        Send Message →
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <p>© {{ date('Y') }} Rodney Ssemambo. Built with Laravel 🇺🇬</p>
        <div class="footer-links">
            <a href="https://github.com/RodneySsemambo" target="_blank">GitHub</a>
            <a href="mailto:ssemamborodney94@gmail.com">Email</a>
            <a href="#hero">Back to top ↑</a>
        </div>
    </footer>

    <script>
        // Custom cursor
        const cursor = document.getElementById('cursor');
        const follower = document.getElementById('follower');
        let mouseX = 0, mouseY = 0, followerX = 0, followerY = 0;

        document.addEventListener('mousemove', e => {
            mouseX = e.clientX; mouseY = e.clientY;
            cursor.style.left = mouseX + 'px';
            cursor.style.top = mouseY + 'px';
        });

        function animateFollower() {
            followerX += (mouseX - followerX) * 0.12;
            followerY += (mouseY - followerY) * 0.12;
            follower.style.left = followerX + 'px';
            follower.style.top = followerY + 'px';
            requestAnimationFrame(animateFollower);
        }
        animateFollower();

        // Nav scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 50);
        });

        // Scroll reveal
        const reveals = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    setTimeout(() => entry.target.classList.add('visible'), i * 80);
                }
            });
        }, { threshold: 0.1 });
        reveals.forEach(el => observer.observe(el));
    </script>
</body>
</html>
