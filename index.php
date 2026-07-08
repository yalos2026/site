<!DOCTYPE html>
<html lang="ru">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>ГРУППА КОМПАНИЙ GP</title>
<link rel="icon" type="image/jpeg" href="images/logo.jpg">
<link rel="apple-touch-icon" href="images/logo.jpg">

<!-- FONTS -->

<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

:root {
    --bg-deep: #060B1F;
    --bg-dark: #0a0f1f;
    --accent-blue: #7fa8ff;
    --accent-blue-light: #a8c4ff;
    --text-primary: #ffffff;
    --text-secondary: rgba(255, 255, 255, 0.75);
    --text-muted: rgba(255, 255, 255, 0.5);
    --border: rgba(255, 255, 255, 0.08);
    --glow-blue: rgba(127, 168, 255, 0.4);
}

*{
  margin:0;
  padding:0;
  box-sizing:border-box;
}

html{
  scroll-behavior:smooth;
}

body{
  background: var(--bg-deep);
  color: var(--text-primary);
  overflow-x:hidden;
  font-family:'Inter',sans-serif;
  line-height: 1.6;
}

body::before{
  content:"";
  position:fixed;
  inset:0;
  background:
    radial-gradient(ellipse at top left, rgba(127, 168, 255, 0.15), transparent 50%),
    radial-gradient(ellipse at bottom right, rgba(42, 82, 255, 0.12), transparent 50%),
    radial-gradient(circle at center, rgba(42, 82, 255, 0.1), transparent 60%);
  pointer-events:none;
  z-index:-2;
}

body::after{
  content:"";
  position:fixed;
  inset:0;
  background-image:
  url("https://www.transparenttextures.com/patterns/asfalt-dark.png");
  opacity:.08;
  animation:grain 8s steps(10) infinite;
  pointer-events:none;
  z-index:9999;
  mix-blend-mode: overlay;
}

@keyframes grain{
  0%{transform:translate(0,0);}
  20%{transform:translate(-5%,5%);}
  40%{transform:translate(5%,-5%);}
  60%{transform:translate(-3%,3%);}
  80%{transform:translate(3%,-3%);}
  100%{transform:translate(0,0);}
}

.top-bar{
  position:fixed;
  top:0;
  left:0;
  width:100%;
  padding:20px 60px;
  display:flex;
  justify-content:space-between;
  align-items:center;
  z-index:1000;
  background: rgba(6, 11, 31, 0.85);
  backdrop-filter:blur(20px);
  border-bottom: 1px solid var(--border);
}

.logo-area{
  display:flex;
  align-items:center;
  gap:18px;
}

.small-logo{
  width:44px;
  border-radius:8px;
  box-shadow: 0 0 20px var(--glow-blue);
  border: 1px solid rgba(127, 168, 255, 0.3);
}

.logo-area h1{
  font-family:'Cinzel',serif;
  font-size:22px;
  font-weight:700;
  letter-spacing:5px;
  background: linear-gradient(135deg, #fff 0%, var(--accent-blue-light) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

nav{
  display:flex;
  gap:32px;
  align-items:center;
}

nav a{
  position:relative;
  color: var(--text-secondary);
  text-decoration:none;
  transition: all 0.3s;
  font-size:12px;
  font-weight:500;
  letter-spacing:2px;
}

nav a:hover{
  color: var(--accent-blue-light);
}

nav a::after{
  content:"";
  position:absolute;
  left:0;
  bottom:-8px;
  width:0%;
  height:1px;
  background: var(--accent-blue);
  transition: width 0.4s;
}

nav a:hover::after{
  width:100%;
}

.lang-switch {
  display: flex;
  gap: 6px;
  font-size: 11px;
  font-weight: 600;
  letter-spacing: 2px;
  border: 1px solid rgba(127, 168, 255, 0.3);
  padding: 6px 12px;
  border-radius: 4px;
  cursor: pointer;
  user-select: none;
  margin-left: 16px;
  transition: all 0.3s;
}

.lang-switch:hover {
  border-color: var(--accent-blue);
  box-shadow: 0 0 15px var(--glow-blue);
}

.lang-option {
  color: var(--text-muted);
  transition: color 0.3s;
  padding: 2px 6px;
}

.lang-option.active {
  color: var(--accent-blue-light);
  text-shadow: 0 0 8px var(--glow-blue);
}

.lang-option:hover {
  color: var(--accent-blue-light);
}

.lang-divider {
  color: rgba(127, 168, 255, 0.3);
}

.slideshow-container{
  position:relative;
  width:96%;
  max-width:1850px;
  height:86vh;
  margin:90px auto 40px auto;
  overflow:hidden;
  border-radius:24px;
  box-shadow:
    0 35px 100px rgba(0,0,0,.6),
    0 0 80px rgba(127, 168, 255, 0.08);
  border: 1px solid var(--border);
}

.mySlides{
  display:none;
  position:absolute;
  width:100%;
  height:100%;
  animation:fade 1.4s ease;
}

.mySlides img {
  position: absolute;
  top: 45%;
  left: 50%;
  width: 80%;
  height: 80%;
  object-fit: cover;
  object-position: center center;
  transform: translate(-50%, -50%) scale(1);
  transition: transform 8s ease;
}

.slide-text {
  position: absolute;
  left: 8%;
  bottom: 0%;
  z-index: 20;
  animation: slideReveal 1.8s ease forwards;
}

.slide-subtitle{
  color: var(--accent-blue-light);
  letter-spacing:4px;
  margin-bottom:18px;
  opacity:.9;
  font-size:14px;
  font-weight: 500;
}

.slide-text h2{
  font-family:'Cinzel',serif;
  font-size:70px;
  font-weight: 900;
  line-height:1.05;
  letter-spacing:5px;
  text-shadow: 0 0 40px rgba(0,0,0,.5);
  background: linear-gradient(180deg, #ffffff 0%, #a8b8d8 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.prev,
.next{
  position:absolute;
  top:50%;
  transform:translateY(-50%);
  width:60px;
  height:60px;
  display:flex;
  align-items:center;
  justify-content:center;
  background: rgba(0,0,0,.18);
  backdrop-filter:blur(10px);
  color: var(--text-primary);
  font-size:28px;
  cursor:pointer;
  z-index:50;
  transition:.4s;
  border: 1px solid var(--border);
}

.prev{ left:25px; }
.next{ right:25px; }

.prev:hover,
.next:hover{
  background: rgba(127, 168, 255, 0.15);
  border-color: var(--accent-blue);
  color: var(--accent-blue-light);
  box-shadow: 0 0 30px var(--glow-blue);
  transform: translateY(-50%) scale(1.08);
}

.dots{
  position:absolute;
  bottom:40px;
  width:100%;
  text-align:center;
  z-index:100;
}

.dot{
  width:10px;
  height:10px;
  margin:0 6px;
  border-radius:50%;
  display:inline-block;
  background: rgba(255,255,255,.4);
  transition:.4s;
  cursor: pointer;
}

.active-dot{
  background: var(--accent-blue);
  transform:scale(1.4);
  box-shadow: 0 0 15px var(--glow-blue);
}

section{
  padding:140px 8%;
  position: relative;
}

section h2{
  font-family:'Cinzel',serif;
  font-size:58px;
  font-weight: 900;
  letter-spacing:5px;
  margin-bottom:70px;
  position:relative;
  background: linear-gradient(180deg, #ffffff 0%, #a8b8d8 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

section h2::after{
  content:"";
  position:absolute;
  left:0;
  bottom:-18px;
  width:120px;
  height:2px;
  background: linear-gradient(to right, var(--accent-blue), transparent);
  box-shadow: 0 0 10px var(--glow-blue);
}

.text-block{
  max-width:900px;
  line-height:2;
  opacity:.82;
  font-size:18px;
  color: var(--text-secondary);
}

.projects {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 40px;
}

.project {
  position: relative;
  overflow: hidden;
  background: rgba(0, 0, 0, .72);
  border: 1px solid var(--border);
  border-radius: 16px;
  backdrop-filter: blur(14px);
  transform: translateY(100px);
  opacity: 0;
  transition: all 0.8s cubic-bezier(.17, .85, .438, .99);
  box-shadow: 0 20px 60px rgba(0, 0, 0, .45);
  cursor: pointer;
  aspect-ratio: 16 / 10;
}

.project.show {
  opacity: 1;
  transform: translateY(0);
}

.project:hover {
  transform: translateY(-12px);
  border-color: var(--accent-blue);
  box-shadow:
    0 30px 80px rgba(0, 0, 0, 0.6),
    0 0 60px var(--glow-blue);
}

.project img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 1.2s ease;
}

.project:hover img {
  transform: scale(1.08);
}

.project::before {
  content: "";
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  height: 70%;
  background: linear-gradient(to top,
    rgba(0, 0, 0, 0.95) 0%,
    rgba(0, 0, 0, 0.6) 50%,
    transparent 100%);
  z-index: 2;
  pointer-events: none;
  transition: height 0.5s ease;
}

.project:hover::before {
  height: 100%;
  background: linear-gradient(to top,
    rgba(0, 0, 0, 0.95) 0%,
    rgba(0, 0, 0, 0.4) 60%,
    transparent 100%);
}

.project::after {
  content: "";
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 0;
  height: 2px;
  background: linear-gradient(90deg, transparent, var(--accent-blue), transparent);
  box-shadow: 0 0 15px var(--glow-blue);
  transition: width 0.5s ease;
  z-index: 3;
}

.project:hover::after {
  width: 100%;
}

.project-content {
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  padding: 30px;
  z-index: 10;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  pointer-events: none;
  transform: translateY(20px);
  transition: transform 0.5s ease;
}

.project:hover .project-content {
  transform: translateY(0);
}

.project-content h3 {
  font-family: 'Cinzel', serif;
  font-size: 28px;
  font-weight: 700;
  letter-spacing: 2px;
  margin: 0;
  color: #fff;
  text-shadow: 0 2px 20px rgba(0,0,0,.8), 0 0 30px rgba(0,0,0,.5);
  line-height: 1.2;
  transition: color 0.4s ease, text-shadow 0.4s ease;
}

.project:hover .project-content h3 {
  color: var(--accent-blue-light);
  text-shadow: 0 2px 20px rgba(0,0,0,.8), 0 0 20px var(--glow-blue);
}

#posters {
  padding: 80px 8%;
  position: relative;
}

#posters h2 {
  font-family: 'Cinzel', serif;
  font-size: 48px;
  font-weight: 900;
  letter-spacing: 5px;
  margin-bottom: 40px;
  position: relative;
  text-align: left;
  background: linear-gradient(180deg, #ffffff 0%, #a8b8d8 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

#posters h2::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -15px;
  width: 120px;
  height: 2px;
  background: linear-gradient(to right, var(--accent-blue), transparent);
  box-shadow: 0 0 10px var(--glow-blue);
}

.carousel-container {
  position: relative;
  width: 100%;
  overflow: hidden;
  padding: 20px 0;
  mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
  -webkit-mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
}

.carousel-track {
  display: flex;
  gap: 24px;
  width: max-content;
  animation: scrollLeft 45s linear infinite;
  will-change: transform;
}

.carousel-track:hover {
  animation-play-state: paused;
}

.carousel-slide {
  flex: 0 0 auto;
  width: 220px;
  aspect-ratio: 2 / 3;
  position: relative;
  border-radius: 14px;
  overflow: hidden;
  box-shadow: 0 15px 40px rgba(0, 0, 0, .5);
  border: 1px solid var(--border);
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  cursor: pointer;
}

.carousel-slide:hover {
  transform: translateY(-8px) scale(1.03);
  box-shadow: 0 25px 60px rgba(127, 168, 255, .25);
  border-color: var(--accent-blue);
  z-index: 10;
}

.carousel-slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.6s ease;
}

.carousel-slide:hover img {
  transform: scale(1.08);
}

.carousel-caption {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 25px 16px 16px;
  background: linear-gradient(to top, rgba(0,0,0,.95), transparent 60%);
  font-family: 'Cinzel', serif;
  font-size: 14px;
  font-weight: 700;
  letter-spacing: 2px;
  text-align: center;
  color: var(--accent-blue-light);
  opacity: 0.95;
  pointer-events: none;
}

@keyframes scrollLeft {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

#awards {
  padding: 120px 8%;
  position: relative;
}

.awards-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 30px;
  margin-top: 50px;
}

.award-card {
  position: relative;
  background: rgba(255, 255, 255, 0.03);
  border: 1px solid rgba(127, 168, 255, 0.15);
  border-radius: 20px;
  padding: 40px 25px 30px;
  text-align: center;
  transform: translateY(100px);
  opacity: 0;
  transition: all 0.8s cubic-bezier(.17,.85,.438,.99);
}

.award-card.show {
  opacity: 1;
  transform: translateY(0);
}

.award-card:hover {
  transform: translateY(-10px);
  border-color: var(--accent-blue);
  box-shadow: 0 25px 60px rgba(127, 168, 255, 0.15);
  background: rgba(127, 168, 255, 0.03);
}

.award-icon {
  width: 160px;
  height: 160px;
  margin: 0 auto 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(255, 255, 255, 0.03);
  border: 2px solid rgba(127, 168, 255, 0.3);
  border-radius: 20px;
  padding: 18px;
  overflow: hidden;
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.award-card:hover .award-icon {
  transform: scale(1.08);
  box-shadow: 0 15px 40px rgba(127, 168, 255, 0.3);
  border-color: var(--accent-blue);
}

.award-icon img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  display: block;
  filter: drop-shadow(0 6px 20px rgba(0, 0, 0, 0.3));
  transition: transform 0.4s ease;
}

.award-card h3 {
  font-family: 'Cinzel', serif;
  font-size: 17px;
  font-weight: 700;
  letter-spacing: 1.5px;
  margin-bottom: 10px;
  color: var(--text-primary);
  line-height: 1.3;
}

.award-meta {
  font-family: 'Inter', sans-serif;
  font-size: 13px;
  color: var(--accent-blue-light);
  letter-spacing: 1px;
  margin-bottom: 8px;
  font-weight: 600;
  opacity: 0.95;
}

.award-film {
  font-size: 14px;
  opacity: 0.7;
  line-height: 1.5;
  margin: 0;
  color: var(--text-secondary);
}

.video-wrapper {
  position: relative;
  width: 100%;
  max-width: 1600px;
  margin: 0 auto;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 30px 80px rgba(0,0,0,.5), 0 0 60px rgba(127, 168, 255, 0.08);
  border: 1px solid var(--border);
  background: #000;
}

.video-wrapper video {
  width: 100%;
  height: auto;
  display: block;
  aspect-ratio: 16 / 9;
}

.contacts-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 30px;
  margin-top: 40px;
}

.contact-col {
  background: rgba(255, 255, 255, 0.03);
  border: 1px solid var(--border);
  border-radius: 16px;
  padding: 30px;
  transition: all 0.3s;
}

.contact-col:hover {
  border-color: var(--accent-blue);
  background: rgba(127, 168, 255, 0.03);
  transform: translateY(-5px);
}

.contact-col h3 {
  font-family: 'Cinzel', serif;
  font-size: 16px;
  font-weight: 700;
  letter-spacing: 2px;
  margin-bottom: 15px;
  color: var(--accent-blue-light);
}

.contact-col p {
  font-size: 14px;
  line-height: 1.6;
  opacity: 0.85;
  margin-bottom: 8px;
  color: var(--text-secondary);
}

footer{
  padding:50px;
  text-align:center;
  background: rgba(0, 0, 0, 0.4);
  border-top: 1px solid var(--border);
  font-size: 12px;
  letter-spacing: 2px;
  color: var(--text-muted);
}

@keyframes slideReveal {
  0% {
    opacity: 0;
    transform: translateY(-30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fade{
  from{ opacity:.4; }
  to{ opacity:1; }
}

@media (max-width: 1200px) {
  .projects {
    grid-template-columns: repeat(2, 1fr);
    gap: 35px;
  }
  .awards-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
  }
  .contacts-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 900px){
  .top-bar{
    flex-direction:column;
    gap:12px;
    padding:12px 20px;
  }
  nav{
    flex-wrap:wrap;
    justify-content:center;
    gap:12px;
  }
  nav a {
    font-size: 10px;
    letter-spacing: 1px;
  }
  .logo-area h1 {
    font-size: 16px;
    letter-spacing: 3px;
  }
  .small-logo {
    width: 36px;
  }

  .slideshow-container {
    height: 50vh;
    margin-top: 100px;
    border-radius: 16px;
    width: 96%;
  }
  .mySlides img {
    width: 100% !important;
    height: 100% !important;
    top: 50%;
    transform: translate(-50%, -50%) scale(1);
  }
  .slide-text { left: 6%; bottom: 8%; }
  .slide-text h2 { font-size: 32px; letter-spacing: 2px; }
  .slide-subtitle { font-size: 11px; }
  .prev, .next { width: 44px; height: 44px; font-size: 18px; }
  .dots { bottom: 16px; }

  section { padding: 80px 5%; }
  section h2 { font-size: 36px; letter-spacing: 3px; margin-bottom: 40px; }

  .projects{
    grid-template-columns:1fr;
    gap: 25px;
  }

  .project-content h3 {
    font-size: 24px;
  }

  .awards-grid {
    grid-template-columns: 1fr;
    gap: 30px;
  }
  .award-card { padding: 30px 20px 25px; }
  .award-icon { width: 120px; height: 120px; }
  .award-card h3 { font-size: 16px; }
  .award-meta { font-size: 12px; }
  .award-film { font-size: 13px; }

  .contacts-grid {
    grid-template-columns: 1fr;
    gap: 20px;
  }
}

@media (max-width: 600px) {
  .slide-text h2 { font-size: 24px; }
  .project-content h3 { font-size: 20px; }
  .project-content { padding: 20px; }
}

@media (max-width: 480px) {
  .carousel-slide { width: 140px; }
  .carousel-track { gap: 16px; }
}

</style>
</head>

<body>

<div class="top-bar">

  <div class="logo-area">

    <img class="small-logo" src="images/logo.jpg">

    <h1 data-i18n="nav.logo">ГРУППА КОМПАНИЙ GP</h1>

  </div>

  <nav>

    <a href="#about" data-i18n="nav.about">О НАС</a>
    <a href="#showreel" data-i18n="nav.showreel">ШОУРИЛ</a>
    <a href="#projects" data-i18n="nav.projects">ПРОЕКТЫ</a>
    <a href="#posters" data-i18n="nav.distribution">ДИСТРИБУЦИЯ</a>
    <a href="#awards" data-i18n="nav.awards">НАГРАДЫ</a>
    <a href="#agency" data-i18n="nav.authors">АВТОРАМ</a>
    <a href="#contacts" data-i18n="nav.contacts">КОНТАКТЫ</a>

    <div class="lang-switch" onclick="toggleLanguage()">
      <span class="lang-option active" id="lang-ru">RU</span>
      <span class="lang-divider">|</span>
      <span class="lang-option" id="lang-en">EN</span>
    </div>

  </nav>

</div>

<div class="slideshow-container">

  <div class="mySlides fade">
    <img src="images/logotype2.jpg">
    <div class="slide-text">
      <h2 data-i18n="slide1.title">КИНОКОМПАНИЯ GP</h2>
      <div class="slide-subtitle" data-i18n="slide1.subtitle">ПРЕДСТАВЛЯЕТ</div>
    </div>
  </div>

  <div class="mySlides fade">
    <img src="images/furc1.jpg">
    <div class="slide-text">
      <h2 data-i18n="slide2.title">ФУРЦЕВА</h2>
      <div class="slide-subtitle" data-i18n="slide2.subtitle">ЛУЧШАЯ РОЛЬ ИРИНЫ РОЗАНОВОЙ</div>
    </div>
  </div>

  <div class="mySlides fade">
    <img src="images/Czatmen.png">
    <div class="slide-text">
      <h2 data-i18n="slide3.title">ЗАТМЕНИЕ</h2>
      <div class="slide-subtitle" data-i18n="slide3.subtitle">НОВАЯ ПРЕМЬЕРА</div>
    </div>
  </div>

  <div class="mySlides fade">
    <img src="images/art.jpg">
    <div class="slide-text">
      <h2 data-i18n="slide4.title">АРБАТСКИЕ ТАЙНЫ</h2>
      <div class="slide-subtitle" data-i18n="slide4.subtitle">РОМАН О СТАРОЙ МОСКВЕ</div>
    </div>
  </div>

  <div class="mySlides fade">
    <img src="images/rusg.jpg">
    <div class="slide-text">
      <h2 data-i18n="slide5.title">РУССКИЕ ГОРКИ</h2>
      <div class="slide-subtitle" data-i18n="slide5.subtitle">ИСТОРИЧЕСКАЯ САГА</div>
    </div>
  </div>

  <div class="mySlides fade">
    <img src="images/otraj-radugi.jpg">
    <div class="slide-text">
      <h2 data-i18n="slide6.title">ОТРАЖЕНИЕ РАДУГИ</h2>
      <div class="slide-subtitle" data-i18n="slide6.subtitle">ДЕТЕКТИВНЫЙ СЕРИАЛ</div>
    </div>
  </div>

  <div class="mySlides fade">
    <img src="images/vtumgl.jpg">
    <div class="slide-text">
      <h2 data-i18n="slide7.title">В ТУМАНЕ</h2>
      <div class="slide-subtitle" data-i18n="slide7.subtitle">ПРИЗЕР КАННСКОГО ФЕСТИВАЛЯ</div>
    </div>
  </div>

  <div class="mySlides fade">
    <img src="images/dolp.png">
    <div class="slide-text">
      <h2 data-i18n="slide8.title">ДОЛГИЙ ПУТЬ ДОМОЙ</h2>
      <div class="slide-subtitle" data-i18n="slide8.subtitle">ЖИЗНЕННАЯ ДРАМА</div>
    </div>
  </div>

  <a class="prev" onclick="changeSlide(-1)">❮</a>
  <a class="next" onclick="changeSlide(1)">❯</a>

  <div class="dots">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
    <span class="dot" onclick="currentSlide(5)"></span>
    <span class="dot" onclick="currentSlide(6)"></span>
    <span class="dot" onclick="currentSlide(7)"></span>
    <span class="dot" onclick="currentSlide(8)"></span>
  </div>

</div>

<section id="about">

  <h2 data-i18n="about.title">О НАС</h2>

  <div class="text-block">

    <p data-i18n="about.p1">Группа компаний GP занимается производством художественных фильмов,</p>
    <p data-i18n="about.p2">сериалов для Первого канала и канала Россия с 1999 года.</p>

    <br><br>

    <p data-i18n="about.p3">В Группу компаний GP входят:</p>
    <p data-i18n="about.p4">Кинокомпания «Джи Пи» - производство кино и телефильмов.</p>
    <p data-i18n="about.p5">Компания «Инотэк» студия «пост-продакшн».</p>
    <br><br>

    <p data-i18n="about.p6">Кинокомпания GP рассматривает варианты сотрудничества по следующим направлениям:</p>
    <p data-i18n="about.p7">-Сценарии кино-теле проектов;</p>
    <p data-i18n="about.p8">-Копродукция и совместное производство кино-теле-видео контента;</p>
    <p data-i18n="about.p9">-Производство видео-продукции по заказу;</p>
    <p data-i18n="about.p10">-Дистрибуция российского и иностранного кино-теле-контента.</p>

  </div>

</section>

<section id="showreel">
  <h2 data-i18n="showreel.title">ШОУРИЛ</h2>

  <div class="video-wrapper">
    <video
      controls
      preload="metadata"
      poster="images/logotype2.jpg"
      playsinline
      webkit-playsinline
      muted
    >
      <source src="images/output2.mp4" type="video/mp4">
    </video>
  </div>
</section>

<section id="projects">

  <h2 data-i18n="projects.title">ПРОЕКТЫ</h2>

    <div class="project" data-movie="затмение">
      <img src="images/znam.png" alt="затмение">
      <div class="project-content"><h3 data-i18n="movie.eclipse">ЗАТМЕНИЕ</h3></div>
    </div>

    <div class="projects">

    <div class="project" data-movie="арбатские тайны">
      <img src="images/arbatckietaini1.jpg" alt="Арбатские тайны">
      <div class="project-content"><h3 data-i18n="movie.arbat">АРБАТСКИЕ ТАЙНЫ</h3></div>
    </div>

    <div class="project" data-movie="русские горки">
      <img src="images/russgorki3.jpg" alt="Русские горки">
      <div class="project-content"><h3 data-i18n="movie.russian">РУССКИЕ ГОРКИ</h3></div>
    </div>

    <div class="project" data-movie="отражение радуги">
      <img src="images/otrajr.png" alt="Отражение радуги">
      <div class="project-content"><h3 data-i18n="movie.reflection">ОТРАЖЕНИЕ РАДУГИ</h3></div>
    </div>

    <div class="project" data-movie="брак понарошку">
      <img src="images/brakponaroshku.png" alt="Брак понарошку">
      <div class="project-content"><h3 data-i18n="movie.fake">БРАК ПОНАРОШКУ</h3></div>
    </div>

    <div class="project" data-movie="новогодний рейс">
      <img src="images/novreis.png" alt="Новогодний рейс">
      <div class="project-content"><h3 data-i18n="movie.newyear">НОВОГОДНИЙ РЕЙС</h3></div>
    </div>

    <div class="project" data-movie="желание">
      <img src="images/jel.png" alt="Желание">
      <div class="project-content"><h3 data-i18n="movie.desire">ЖЕЛАНИЕ</h3></div>
    </div>

    <div class="project" data-movie="долгий путь домой">
      <img src="images/dolpd.jpg" alt="Долгий путь домой">
      <div class="project-content"><h3 data-i18n="movie.longway">ДОЛГИЙ ПУТЬ ДОМОЙ</h3></div>
    </div>

    <div class="project" data-movie="фурцева">
      <img src="images/furceva.png" alt="Фурцева">
      <div class="project-content"><h3 data-i18n="movie.furtseva">ФУРЦЕВА</h3></div>
    </div>

    <div class="project" data-movie="частный заказ">
      <img src="images/chastnizakaz.jpg" alt="Частный заказ">
      <div class="project-content"><h3 data-i18n="movie.private">ЧАСТНЫЙ ЗАКАЗ</h3></div>
    </div>

    <div class="project" data-movie="за 5 минут до января">
      <img src="images/za5minutdojanvar.jpg" alt="За 5 минут до января">
      <div class="project-content"><h3 data-i18n="movie.5min">ЗА 5 МИНУТ ДО ЯНВАРЯ</h3></div>
    </div>

    <div class="project" data-movie="если любишь прости">
      <img src="images/eslilubishprosti.jpg" alt="Если любишь прости">
      <div class="project-content"><h3 data-i18n="movie.iflove">ЕСЛИ ЛЮБИШЬ — ПРОСТИ</h3></div>
    </div>

    <div class="project" data-movie="если нам судьба">
      <img src="images/eslinamsudba.jpg" alt="Если нам судьба">
      <div class="project-content"><h3 data-i18n="movie.fate">ЕСЛИ НАМ СУДЬБА</h3></div>
    </div>

    <div class="project" data-movie="капитанские дети">
      <img src="images/kapdeti.jpg" alt="Капитанские дети">
      <div class="project-content"><h3 data-i18n="movie.captains">КАПИТАНСКИЕ ДЕТИ</h3></div>
    </div>

    <div class="project" data-movie="найти мужа в большом городе">
      <img src="images/naitimujavbolgorode.jpg" alt="Найти мужа в большом городе">
      <div class="project-content"><h3 data-i18n="movie.husband">НАЙТИ МУЖА В БОЛЬШОМ ГОРОДЕ</h3></div>
    </div>

    <div class="project" data-movie="ты меня слышишь">
      <img src="images/timenyaslishish.jpg" alt="Ты меня слышишь?">
      <div class="project-content"><h3 data-i18n="movie.hear">ТЫ МЕНЯ СЛЫШИШЬ?</h3></div>
    </div>

    <div class="project" data-movie="в тумане">
      <img src="images/vtumane.jpg" alt="В тумане">
      <div class="project-content"><h3 data-i18n="movie.fog">В ТУМАНЕ</h3></div>
    </div>

    <div class="project" data-movie="родственный обмен">
      <img src="images/rodstvenniiobmen.jpg" alt="Родственный обмен">
      <div class="project-content"><h3 data-i18n="movie.relative">РОДСТВЕННЫЙ ОБМЕН</h3></div>
    </div>

    <div class="project" data-movie="процесс">
      <img src="images/proces.png" alt="Процесс">
      <div class="project-content"><h3 data-i18n="movie.trial">ПРОЦЕСС</h3></div>
    </div>

    <div class="project" data-movie="непрощенные">
      <img src="images/neprozshennie.png" alt="Непрощенные">
      <div class="project-content"><h3 data-i18n="movie.unforgiven">НЕПРОЩЁННЫЕ</h3></div>
    </div>

    <div class="project" data-movie="как бы не так">
      <img src="images/kakbinetak.jpg" alt="Как бы не так">
      <div class="project-content"><h3 data-i18n="movie.notquite">КАК БЫ НЕ ТАК</h3></div>
    </div>
	
    <div class="project" data-movie="дата собственной смерти">
      <img src="images/suvenirotvarfumera.jpg" alt="Дата собственной смерти">
      <div class="project-content"><h3 data-i18n="movie.date">ДАТА СОБСТВЕННОЙ СМЕРТИ</h3></div>
    </div>

    <div class="project" data-movie="сувенир от парфюмера">
      <img src="images/suvenirotvarfumera.jpg" alt="Сувенир от парфюмера">
      <div class="project-content"><h3 data-i18n="movie.gift">СУВЕНИР ОТ ПАРФЮМЕРА</h3></div>
    </div>

    <div class="project" data-movie="серебряный бор">
      <img src="images/sereb-bor.jpg" alt="Серебряный бор">
      <div class="project-content"><h3 data-i18n="movie.silver">СЕРЕБРЯНЫЙ БОР</h3></div>
    </div>

    <div class="project" data-movie="строптивая мишень">
      <img src="images/stroptovayamishen2.jpg" alt="Строптивая мишень">
      <div class="project-content"><h3 data-i18n="movie.stubborn">СТРОПТИВАЯ МИШЕНЬ</h3></div>
    </div>

    <div class="project" data-movie="служба доверия">
      <img src="images/clujbadoveria.jpg" alt="Служба доверия">
      <div class="project-content"><h3 data-i18n="movie.trust">СЛУЖБА ДОВЕРИЯ</h3></div>
    </div>

    <div class="project" data-movie="кроткая">
      <img src="images/krotkaya.jpg" alt="Кроткая">
      <div class="project-content"><h3 data-i18n="movie.gentle">КРОТКАЯ</h3></div>
    </div>

    <div class="project" data-movie="требуется няня">
      <img src="images/trebuetsyanyna.png" alt="Требуется няня">
      <div class="project-content"><h3 data-i18n="movie.nanny">ТРЕБУЕТСЯ НЯНЯ</h3></div>
    </div>

    <div class="project" data-movie="нелегал">
      <img src="images/nelegal.jpg" alt="Нелегал">
      <div class="project-content"><h3 data-i18n="movie.illegal">НЕЛЕГАЛ</h3></div>
    </div>

    <div class="project" data-movie="2 цвета страсти">
      <img src="images/2cvetastrasti.jpg" alt="2 цвета страсти">
      <div class="project-content"><h3 data-i18n="movie.colors">ДВА ЦВЕТА СТРАСТИ</h3></div>
    </div>

    <div class="project" data-movie="механическая сюита">
      <img src="images/mehsiuta.jpg" alt="Механическая сюита">
      <div class="project-content"><h3 data-i18n="movie.mechanical">МЕХАНИЧЕСКАЯ СЮИТА</h3></div>
    </div>

    <div class="project" data-movie="желтый карлик">
      <img src="images/jeltiikarlik.jpg" alt="Желтый карлик">
      <div class="project-content"><h3 data-i18n="movie.yellow">ЖЁЛТЫЙ КАРЛИК</h3></div>
    </div>

    <div class="project" data-movie="алмазы на десерт">
      <img src="images/almasi-na-desert.jpg" alt="Алмазы на десерт">
      <div class="project-content"><h3 data-i18n="movie.diamonds">АЛМАЗЫ НА ДЕСЕРТ</h3></div>
    </div>

    <div class="project" data-movie="за кулисами">
      <img src="images/zakulisami.jpg" alt="За кулисами">
      <div class="project-content"><h3 data-i18n="movie.behind">ЗА КУЛИСАМИ</h3></div>
    </div>

    <div class="project" data-movie="алхимики">
      <img src="images/alhimiki.jpg" alt="Алхимики">
      <div class="project-content"><h3 data-i18n="movie.alchemists">АЛХИМИКИ</h3></div>
    </div>

  </div>
</section>

<section id="posters">

  <h2 data-i18n="posters.title">ДИСТРИБУЦИЯ</h2>

  <div class="carousel-container">
    <div class="carousel-track">

      <div class="carousel-slide">
        <img src="images/4zvez.jpg">
        <div class="carousel-caption" data-i18n="dist.4stars">4 ЗВЕЗДЫ</div>
      </div>

      <div class="carousel-slide">
        <img src="images/29palm.jpg">
        <div class="carousel-caption" data-i18n="dist.29palms">29 ПАЛЬМ</div>
      </div>

      <div class="carousel-slide">
        <img src="images/cherven.jpg">
        <div class="carousel-caption" data-i18n="dist.venus">ЧЕРНАЯ ВЕНЕРА</div>
      </div>

      <div class="carousel-slide">
        <img src="images/dandy.jpg">
        <div class="carousel-caption" data-i18n="dist.dandy">ДЭНДИ</div>
      </div>

      <div class="carousel-slide">
        <img src="images/demonl.jpg">
        <div class="carousel-caption" data-i18n="dist.demon">ДЕМОН-ЛЮБОВНИК</div>
      </div>

      <div class="carousel-slide">
        <img src="images/egobrat.jpg">
        <div class="carousel-caption" data-i18n="dist.brother">ЕГО БРАТ</div>
      </div>

      <div class="carousel-slide">
        <img src="images/drjiznj.jpg">
        <div class="carousel-caption" data-i18n="dist.otherlife">ДРУГАЯ ЖИЗНЬ ЖЕНЩИНЫ</div>
      </div>

      <div class="carousel-slide">
        <img src="images/gorod.jpg">
        <div class="carousel-caption" data-i18n="dist.city">ГОРОД ПОТЕРЯННЫХ ДУШ</div>
      </div>

      <div class="carousel-slide">
        <img src="images/happyen.jpg">
        <div class="carousel-caption" data-i18n="dist.happyend">ХЭППИ ЭНД</div>
      </div>

      <div class="carousel-slide">
        <img src="images/jiznobet.jpg">
        <div class="carousel-caption" data-i18n="dist.promised">ЖИЗНЬ ОБЕТОВАННАЯ</div>
      </div>

      <div class="carousel-slide">
        <img src="images/kopiaverna.jpg">
        <div class="carousel-caption" data-i18n="dist.copy">КОПИЯ ВЕРНА</div>
      </div>

      <div class="carousel-slide">
        <img src="images/korobitva.png">
        <div class="carousel-caption" data-i18n="dist.royal">КОРОЛЕВСКАЯ БИТВА</div>
      </div>

      <div class="carousel-slide">
        <img src="images/krasnsirena.jpg">
        <div class="carousel-caption" data-i18n="dist.siren">КРАСНАЯ СИРЕНА</div>
      </div>

      <div class="carousel-slide">
        <img src="images/mallil.jpg">
        <div class="carousel-caption" data-i18n="dist.lilly">МАЛЫШКА ЛИЛЛИ</div>
      </div>

      <div class="carousel-slide">
        <img src="images/malpal.jpg">
        <div class="carousel-caption" data-i18n="dist.fingers">МАЛЕНЬКИЕ ПАЛЬЧИКИ</div>
      </div>

      <div class="carousel-slide">
        <img src="images/nashvarv.jpg">
        <div class="carousel-caption" data-i18n="dist.barbarians">НАШЕСТВИЕ ВАРВАРОВ</div>
      </div>

      <div class="carousel-slide">
        <img src="images/neobrat.jpg">
        <div class="carousel-caption" data-i18n="dist.irreversible">НЕОБРАТИМОСТЬ</div>
      </div>

      <div class="carousel-slide">
        <img src="images/neznakomka.png">
        <div class="carousel-caption" data-i18n="dist.stranger">НЕЗНАКОМКА</div>
      </div>

      <div class="carousel-slide">
        <img src="images/odinuhodit.jpg">
        <div class="carousel-caption" data-i18n="dist.oneleaves">ОДИН УХОДИТ-ДРУГОЙ ОСТАЕТСЯ</div>
      </div>

      <div class="carousel-slide">
        <img src="images/pohishen.jpg">
        <div class="carousel-caption" data-i18n="dist.kidnapping">ПОХИЩЕНИЕ ДЛЯ БЕТТИ ФИШЕР</div>
      </div>

      <div class="carousel-slide">
        <img src="images/sin.jpg">
        <div class="carousel-caption" data-i18n="dist.son">СЫН</div>
      </div>

      <div class="carousel-slide">
        <img src="images/teplaevodi.jpg">
        <div class="carousel-caption" data-i18n="dist.warmwater">ТЕПЛАЯ ВОДА ПОД КРАСНЫМ МОСТОМ</div>
      </div>

      <div class="carousel-slide">
        <img src="images/timtomas.jpg">
        <div class="carousel-caption" data-i18n="dist.tom">ТОМ И ТОМАС</div>
      </div>

      <div class="carousel-slide">
        <img src="images/4zvez.jpg">
        <div class="carousel-caption" data-i18n="dist.4stars">4 ЗВЕЗДЫ</div>
      </div>
      <div class="carousel-slide">
        <img src="images/29palm.jpg">
        <div class="carousel-caption" data-i18n="dist.29palms">29 ПАЛЬМ</div>
      </div>
      <div class="carousel-slide">
        <img src="images/cherven.jpg">
        <div class="carousel-caption" data-i18n="dist.venus">ЧЕРНАЯ ВЕНЕРА</div>
      </div>

    </div>
  </div>

</section>

<section id="awards">

  <h2 data-i18n="awards.title">НАГРАДЫ</h2>

  <div class="awards-grid">

    <div class="award-card">
      <div class="award-icon"><img src="images/kan.jpg"></div>
      <h3 data-i18n="award1.title">Приз ФИПРЕССИ за лучший фильм</h3>
      <p class="award-meta" data-i18n="award1.meta">65-ый Каннский кинофестиваль</p>
      <p class="award-film" data-i18n="award1.film">Фильм «В тумане»</p>
    </div>

    <div class="award-card">
      <div class="award-icon"><img src="images/12mgn.png"></div>
      <h3 data-i18n="award2.title">Лучшая режиссерская работа</h3>
      <p class="award-meta" data-i18n="award2.meta">IX Международный кинофестиваль им.Вячеслава Тихонова «17 МГНОВЕНИЙ…»</p>
      <p class="award-film" data-i18n="award2.film">Сериал «Арбатские тайны»</p>
    </div>

    <div class="award-card">
      <div class="award-icon"><img src="images/1000001228.jpg"></div>
      <h3 data-i18n="award3.title">Номинант на лучший мелодраматический сериал</h3>
      <p class="award-meta" data-i18n="award3.meta">ТЭФИ, 2026</p>
      <p class="award-film" data-i18n="award3.film">Сериал «Арбатские тайны»</p>
    </div>

    <div class="award-card">
      <div class="award-icon"><img src="images/znameni.png"></div>
      <h3 data-i18n="award4.title">Специальный приз «РГ МЕДИА»</h3>
      <p class="award-meta" data-i18n="award4.meta">V фестиваль контента стриминговых платформ ORIGINAL+</p>
      <p class="award-film" data-i18n="award4.film">Сериал «Затмение»</p>
    </div>

    <div class="award-card">
      <div class="award-icon"><img src="images/zolor.png"></div>
      <h3 data-i18n="award5.title">Лучшая женская роль</h3>
      <p class="award-meta" data-i18n="award5.meta">Золотой орел,2012</p>
      <p class="award-film" data-i18n="award5.film">Сериал «Фурцева»</p>
    </div>

    <div class="award-card">
      <div class="award-icon"><img src="images/zolor.png"></div>
      <h3 data-i18n="award6.title">Лучшая мужская роль</h3>
      <p class="award-meta" data-i18n="award6.meta">Золотой орел,2007</p>
      <p class="award-film" data-i18n="award6.film">Сериал «Частный заказ»</p>
    </div>

    <div class="award-card">
      <div class="award-icon"><img src="images/1000001228.jpg"></div>
      <h3 data-i18n="award7.title">Лучшая мужская роль</h3>
      <p class="award-meta" data-i18n="award7.meta">ТЭФИ,2007</p>
      <p class="award-film" data-i18n="award7.film">Сериал «Капитанские дети»</p>
    </div>

    <div class="award-card">
      <div class="award-icon"><img src="images/1000001212.jpg"></div>
      <h3 data-i18n="award8.title">Главный приз</h3>
      <p class="award-meta" data-i18n="award8.meta">IV Международный кинофестиваль Русское зарубежье</p>
      <p class="award-film" data-i18n="award8.film">Фильм «Незнакомка»</p>
    </div>

    <div class="award-card">
      <div class="award-icon"><img src="images/1000001229.jpg"></div>
      <h3 data-i18n="award9.title">Второй приз конкурса ТВ-ШОК</h3>
      <p class="award-meta" data-i18n="award9.meta">Кинофестиваль Киношок, 2014</p>
      <p class="award-film" data-i18n="award9.film">Сериал «Новогодний рейс»</p>
    </div>

    <div class="award-card">
      <div class="award-icon"><img src="images/1000001202.jpg"></div>
      <h3 data-i18n="award10.title">Номинант на лучший телевизионный фильм</h3>
      <p class="award-meta" data-i18n="award10.meta">Премия АПКиТ</p>
      <p class="award-film" data-i18n="award10.film">Сериал «Если любишь-прости»</p>
    </div>

    <div class="award-card">
      <div class="award-icon"><img src="images/1000001227.jpg"></div>
      <h3 data-i18n="award11.title">Лучший дебют</h3>
      <p class="award-meta" data-i18n="award11.meta">Х Международный фестиваль военного кино имени Ю.Н. Озерова</p>
      <p class="award-film" data-i18n="award11.film">Фильм «В тумане»</p>
    </div>

    <div class="award-card">
      <div class="award-icon"><img src="images/vityz.png"></div>
      <h3 data-i18n="award12.title">Гран-при</h3>
      <p class="award-meta" data-i18n="award12.meta">XXII международный кинофорум "Золотой Витязь"</p>
      <p class="award-film" data-i18n="award12.film">Фильм «В тумане»</p>
    </div>

    <div class="award-card">
      <div class="award-icon"><img src="images/kan.jpg"></div>
      <h3 data-i18n="award13.title">Номинант в категории лучший фильм</h3>
      <p class="award-meta" data-i18n="award13.meta">70-ый Каннский кинофестиваль</p>
      <p class="award-film" data-i18n="award13.film">Фильм «Кроткая»</p>
    </div>

    <div class="award-card">
      <div class="award-icon"><img src="images/slon.png"></div>
      <h3 data-i18n="award14.title">Лучшая женская роль</h3>
      <p class="award-meta" data-i18n="award14.meta">V кинопремия "Белый слон"</p>
      <p class="award-film" data-i18n="award14.film">Сериал «Требуется няня»</p>
    </div>

    <div class="award-card">
      <div class="award-icon"><img src="images/rubez.png"></div>
      <h3 data-i18n="award15.title">Специальный приз жюри</h3>
      <p class="award-meta" data-i18n="award15.meta">IX фестиваль военно-патриотических фильмов "Волоколамский рубеж"</p>
      <p class="award-film" data-i18n="award15.film">Фильм «В тумане»</p>
    </div>

  </div>
</section>

<section id="agency">

  <h2 data-i18n="agency.title">АВТОРАМ</h2>

  <div class="text-block">

  <p data-i18n="agency.p1">Мы рассматриваем заявки на полнометражные фильмы, сериалы и анимационные проекты:</p>
  <p data-i18n="agency.p2">1. В теме письма обязательно указывается «Название» и «Формат, жанр»</p>
  <p data-i18n="agency.p3">2. В самой заявке обязательно указываются следующие параметры:</p>
  <p data-i18n="agency.p4">a. Имя автора(-ов) и контактные данные</p>
  <p data-i18n="agency.p5">b. Название проекта</p>
  <p data-i18n="agency.p6">c. Формат, жанр</p>
  <p data-i18n="agency.p7">d. Хронометраж</p>
  <p data-i18n="agency.p8">e. Аудитория</p>
  <p data-i18n="agency.p9">f. Краткий синопсис</p>
  <p data-i18n="agency.p10">g. Развернутый синопсис/заявка</p>
  <p data-i18n="agency.p11">h. Описание главных героев</p>

  </div>

</section>

<section id="contacts">

  <h2 data-i18n="contacts.title">КОНТАКТЫ</h2>

  <div class="contacts-grid">

    <div class="contact-col">
      <h3 data-i18n="contacts.company">КИНОКОМПАНИЯ «ДЖИ ПИ»</h3>
      <p data-i18n="contacts.address">Москва, Гоголевский бульвар</p>
      <p data-i18n="contacts.address2">дом 17, строение 1, офис 400</p>
      <p data-i18n="contacts.phone">Телефоны: 8(495)6371201, 8(495)6371208</p>
      <p>Email: kino@gpfilm.ru</p>
    </div>

    <div class="contact-col">
      <h3 data-i18n="contacts.rent1">ПРОКАТ КОСТЮМА</h3>
      <h3 data-i18n="contacts.rent2">И РЕКВИЗИТА</h3>
      <p data-i18n="contacts.rentphone">Телефон: 89255904611</p>
      <p>Email: rentprops.gp@gmail.com</p>
    </div>

    <div class="contact-col">
      <h3 data-i18n="contacts.scripts">АВТОРАМ СЦЕНАРИЕВ</h3>
      <p>Email: kino@gpfilm.ru</p>
    </div>

    <div class="contact-col">
      <h3 data-i18n="contacts.pr">PR - СЛУЖБА</h3>
      <p>Email: oi@gpfilm.ru</p>
    </div>
  </div>

</section>

<footer>
  <span data-i18n="footer.text">© 2026 GP FILM. Все права защищены</span>
</footer>

<script>

const translations = {
    ru: {
        'nav.logo': 'ГРУППА КОМПАНИЙ GP',
        'nav.about': 'О НАС',
        'nav.showreel': 'ШОУРИЛ',
        'nav.projects': 'ПРОЕКТЫ',
        'nav.distribution': 'ДИСТРИБУЦИЯ',
        'nav.awards': 'НАГРАДЫ',
        'nav.authors': 'АВТОРАМ',
        'nav.contacts': 'КОНТАКТЫ',

        'slide1.title': 'КИНОКОМПАНИЯ GP',
        'slide1.subtitle': 'ПРЕДСТАВЛЯЕТ',
        'slide2.title': 'ФУРЦЕВА',
        'slide2.subtitle': 'ЛУЧШАЯ РОЛЬ ИРИНЫ РОЗАНОВОЙ',
        'slide3.title': 'ЗАТМЕНИЕ',
        'slide3.subtitle': 'НОВАЯ ПРЕМЬЕРА',
        'slide4.title': 'АРБАТСКИЕ ТАЙНЫ',
        'slide4.subtitle': 'РОМАН О СТАРОЙ МОСКВЕ',
        'slide5.title': 'РУССКИЕ ГОРКИ',
        'slide5.subtitle': 'ИСТОРИЧЕСКАЯ САГА',
        'slide6.title': 'ОТРАЖЕНИЕ РАДУГИ',
        'slide6.subtitle': 'ДЕТЕКТИВНЫЙ СЕРИАЛ',
        'slide7.title': 'В ТУМАНЕ',
        'slide7.subtitle': 'ПРИЗЕР КАННСКОГО ФЕСТИВАЛЯ',
        'slide8.title': 'ДОЛГИЙ ПУТЬ ДОМОЙ',
        'slide8.subtitle': 'ЖИЗНЕННАЯ ДРАМА',

        'about.title': 'О НАС',
        'about.p1': 'Группа компаний GP занимается производством художественных фильмов,',
        'about.p2': 'сериалов для Первого канала и канала Россия с 1999 года.',
        'about.p3': 'В Группу компаний GP входят:',
        'about.p4': 'Кинокомпания «Джи Пи» - производство кино и телефильмов.',
        'about.p5': 'Компания «Инотэк» студия «пост-продакшн».',
        'about.p6': 'Кинокомпания GP рассматривает варианты сотрудничества по следующим направлениям:',
        'about.p7': '-Сценарии кино-теле проектов;',
        'about.p8': '-Копродукция и совместное производство кино-теле-видео контента;',
        'about.p9': '-Производство видео-продукции по заказу;',
        'about.p10': '-Дистрибуция российского и иностранного кино-теле-контента.',

        'showreel.title': 'ШОУРИЛ',
        'projects.title': 'ПРОЕКТЫ',
        'posters.title': 'ДИСТРИБУЦИЯ',
        'awards.title': 'НАГРАДЫ',

        // Названия фильмов в карточках
        'movie.eclipse': 'ЗАТМЕНИЕ',
        'movie.arbat': 'АРБАТСКИЕ ТАЙНЫ',
        'movie.russian': 'РУССКИЕ ГОРКИ',
        'movie.reflection': 'ОТРАЖЕНИЕ РАДУГИ',
        'movie.fake': 'БРАК ПОНАРОШКУ',
        'movie.newyear': 'НОВОГОДНИЙ РЕЙС',
        'movie.desire': 'ЖЕЛАНИЕ',
        'movie.longway': 'ДОЛГИЙ ПУТЬ ДОМОЙ',
        'movie.furtseva': 'ФУРЦЕВА',
        'movie.private': 'ЧАСТНЫЙ ЗАКАЗ',
        'movie.5min': 'ЗА 5 МИНУТ ДО ЯНВАРЯ',
        'movie.iflove': 'ЕСЛИ ЛЮБИШЬ — ПРОСТИ',
        'movie.fate': 'ЕСЛИ НАМ СУДЬБА',
        'movie.captains': 'КАПИТАНСКИЕ ДЕТИ',
        'movie.husband': 'НАЙТИ МУЖА В БОЛЬШОМ ГОРОДЕ',
        'movie.hear': 'ТЫ МЕНЯ СЛЫШИШЬ?',
        'movie.fog': 'В ТУМАНЕ',
        'movie.relative': 'РОДСТВЕННЫЙ ОБМЕН',
        'movie.trial': 'ПРОЦЕСС',
        'movie.unforgiven': 'НЕПРОЩЁННЫЕ',
        'movie.notquite': 'КАК БЫ НЕ ТАК',
        'movie.date': 'ДАТА СОБСТВЕННОЙ СМЕРТИ',
        'movie.gift': 'СУВЕНИР ОТ ПАРФЮМЕРА',
        'movie.silver': 'СЕРЕБРЯНЫЙ БОР',
        'movie.stubborn': 'СТРОПТИВАЯ МИШЕНЬ',
        'movie.trust': 'СЛУЖБА ДОВЕРИЯ',
        'movie.gentle': 'КРОТКАЯ',
        'movie.nanny': 'ТРЕБУЕТСЯ НЯНЯ',
        'movie.illegal': 'НЕЛЕГАЛ',
        'movie.colors': 'ДВА ЦВЕТА СТРАСТИ',
        'movie.mechanical': 'МЕХАНИЧЕСКАЯ СЮИТА',
        'movie.yellow': 'ЖЁЛТЫЙ КАРЛИК',
        'movie.diamonds': 'АЛМАЗЫ НА ДЕСЕРТ',
        'movie.behind': 'ЗА КУЛИСАМИ',
        'movie.alchemists': 'АЛХИМИКИ',

        // Дистрибуция
        'dist.4stars': '4 ЗВЕЗДЫ',
        'dist.29palms': '29 ПАЛЬМ',
        'dist.venus': 'ЧЕРНАЯ ВЕНЕРА',
        'dist.dandy': 'ДЭНДИ',
        'dist.demon': 'ДЕМОН-ЛЮБОВНИК',
        'dist.brother': 'ЕГО БРАТ',
        'dist.otherlife': 'ДРУГАЯ ЖИЗНЬ ЖЕНЩИНЫ',
        'dist.city': 'ГОРОД ПОТЕРЯННЫХ ДУШ',
        'dist.happyend': 'ХЭППИ ЭНД',
        'dist.promised': 'ЖИЗНЬ ОБЕТОВАННАЯ',
        'dist.copy': 'КОПИЯ ВЕРНА',
        'dist.royal': 'КОРОЛЕВСКАЯ БИТВА',
        'dist.siren': 'КРАСНАЯ СИРЕНА',
        'dist.lilly': 'МАЛЫШКА ЛИЛЛИ',
        'dist.fingers': 'МАЛЕНЬКИЕ ПАЛЬЧИКИ',
        'dist.barbarians': 'НАШЕСТВИЕ ВАРВАРОВ',
        'dist.irreversible': 'НЕОБРАТИМОСТЬ',
        'dist.stranger': 'НЕЗНАКОМКА',
        'dist.oneleaves': 'ОДИН УХОДИТ-ДРУГОЙ ОСТАЕТСЯ',
        'dist.kidnapping': 'ПОХИЩЕНИЕ ДЛЯ БЕТТИ ФИШЕР',
        'dist.son': 'СЫН',
        'dist.warmwater': 'ТЕПЛАЯ ВОДА ПОД КРАСНЫМ МОСТОМ',
        'dist.tom': 'ТОМ И ТОМАС',

        'award1.title': 'Приз ФИПРЕССИ за лучший фильм',
        'award1.meta': '65-ый Каннский кинофестиваль',
        'award1.film': 'Фильм «В тумане»',
        'award2.title': 'Лучшая режиссерская работа',
        'award2.meta': 'IX Международный кинофестиваль им.Вячеслава Тихонова «17 МГНОВЕНИЙ…»',
        'award2.film': 'Сериал «Арбатские тайны»',
        'award3.title': 'Номинант на лучший мелодраматический сериал',
        'award3.meta': 'ТЭФИ, 2026',
        'award3.film': 'Сериал «Арбатские тайны»',
        'award4.title': 'Специальный приз «РГ МЕДИА»',
        'award4.meta': 'V фестиваль контента стриминговых платформ ORIGINAL+',
        'award4.film': 'Сериал «Затмение»',
        'award5.title': 'Лучшая женская роль',
        'award5.meta': 'Золотой орел,2012',
        'award5.film': 'Сериал «Фурцева»',
        'award6.title': 'Лучшая мужская роль',
        'award6.meta': 'Золотой орел,2007',
        'award6.film': 'Сериал «Частный заказ»',
        'award7.title': 'Лучшая мужская роль',
        'award7.meta': 'ТЭФИ,2007',
        'award7.film': 'Сериал «Капитанские дети»',
        'award8.title': 'Главный приз',
        'award8.meta': 'IV Международный кинофестиваль Русское зарубежье',
        'award8.film': 'Фильм «Незнакомка»',
        'award9.title': 'Второй приз конкурса ТВ-ШОК',
        'award9.meta': 'Кинофестиваль Киношок, 2014',
        'award9.film': 'Сериал «Новогодний рейс»',
        'award10.title': 'Номинант на лучший телевизионный фильм',
        'award10.meta': 'Премия АПКиТ',
        'award10.film': 'Сериал «Если любишь-прости»',
        'award11.title': 'Лучший дебют',
        'award11.meta': 'Х Международный фестиваль военного кино имени Ю.Н. Озерова',
        'award11.film': 'Фильм «В тумане»',
        'award12.title': 'Гран-при',
        'award12.meta': 'XXII международный кинофорум "Золотой Витязь"',
        'award12.film': 'Фильм «В тумане»',
        'award13.title': 'Номинант в категории лучший фильм',
        'award13.meta': '70-ый Каннский кинофестиваль',
        'award13.film': 'Фильм «Кроткая»',
        'award14.title': 'Лучшая женская роль',
        'award14.meta': 'V кинопремия "Белый слон"',
        'award14.film': 'Сериал «Требуется няня»',
        'award15.title': 'Специальный приз жюри',
        'award15.meta': 'IX фестиваль военно-патриотических фильмов "Волоколамский рубеж"',
        'award15.film': 'Фильм «В тумане»',

        'agency.title': 'АВТОРАМ',
        'agency.p1': 'Мы рассматриваем заявки на полнометражные фильмы, сериалы и анимационные проекты:',
        'agency.p2': '1. В теме письма обязательно указывается «Название» и «Формат, жанр»',
        'agency.p3': '2. В самой заявке обязательно указываются следующие параметры:',
        'agency.p4': 'a. Имя автора(-ов) и контактные данные',
        'agency.p5': 'b. Название проекта',
        'agency.p6': 'c. Формат, жанр',
        'agency.p7': 'd. Хронометраж',
        'agency.p8': 'e. Аудитория',
        'agency.p9': 'f. Краткий синопсис',
        'agency.p10': 'g. Развернутый синопсис/заявка',
        'agency.p11': 'h. Описание главных героев',

        'contacts.title': 'КОНТАКТЫ',
        'contacts.company': 'КИНОКОМПАНИЯ «ДЖИ ПИ»',
        'contacts.address': 'Москва, Гоголевский бульвар',
        'contacts.address2': 'дом 17, строение 1, офис 400',
        'contacts.phone': 'Телефоны: 8(495)6371201, 8(495)6371208',
        'contacts.rent1': 'ПРОКАТ КОСТЮМА',
        'contacts.rent2': 'И РЕКВИЗИТА',
        'contacts.rentphone': 'Телефон: 89255904611',
        'contacts.scripts': 'АВТОРАМ СЦЕНАРИЕВ',
        'contacts.pr': 'PR - СЛУЖБА',

        'footer.text': '© 2026 GP FILM. Все права защищены'
    },
    en: {
        'nav.logo': 'GP GROUP',
        'nav.about': 'ABOUT',
        'nav.showreel': 'SHOWREEL',
        'nav.projects': 'PROJECTS',
        'nav.distribution': 'DISTRIBUTION',
        'nav.awards': 'AWARDS',
        'nav.authors': 'FOR AUTHORS',
        'nav.contacts': 'CONTACTS',

        'slide1.title': 'GP FILM COMPANY',
        'slide1.subtitle': 'PRESENTS',
        'slide2.title': 'FURTSEVA',
        'slide2.subtitle': 'BEST ROLE BY IRINA ROZANOVA',
        'slide3.title': 'ECLIPSE',
        'slide3.subtitle': 'NEW PREMIERE',
        'slide4.title': 'ARBAT MYSTERIES',
        'slide4.subtitle': 'ROMANCE OF OLD MOSCOW',
        'slide5.title': 'RUSSIAN ROLLER COASTER',
        'slide5.subtitle': 'HISTORICAL SAGA',
        'slide6.title': 'REFLECTION OF THE RAINBOW',
        'slide6.subtitle': 'DETECTIVE SERIES',
        'slide7.title': 'IN THE FOG',
        'slide7.subtitle': 'CANNES FESTIVAL PRIZE WINNER',
        'slide8.title': 'LONG WAY HOME',
        'slide8.subtitle': 'LIFE DRAMA',

        'about.title': 'ABOUT US',
        'about.p1': 'GP Group produces feature films,',
        'about.p2': 'TV series for Channel One and Russia Channel since 1999.',
        'about.p3': 'GP Group includes:',
        'about.p4': 'GP Film Company - production of feature and TV films.',
        'about.p5': 'Inotek Company - post-production studio.',
        'about.p6': 'GP Film Company considers cooperation in the following areas:',
        'about.p7': '-Screenplays for film and TV projects;',
        'about.p8': '-Co-production and joint production of film and TV content;',
        'about.p9': '-Custom video production;',
        'about.p10': '-Distribution of Russian and foreign film and TV content.',

        'showreel.title': 'SHOWREEL',
        'projects.title': 'PROJECTS',
        'posters.title': 'DISTRIBUTION',
        'awards.title': 'AWARDS',

        // Movie titles in English
        'movie.eclipse': 'ECLIPSE',
        'movie.arbat': 'ARBAT MYSTERIES',
        'movie.russian': 'RUSSIAN ROLLER COASTER',
        'movie.reflection': 'REFLECTION OF THE RAINBOW',
        'movie.fake': 'FAKE MARRIAGE',
        'movie.newyear': 'NEW YEAR FLIGHT',
        'movie.desire': 'DESIRE',
        'movie.longway': 'LONG WAY HOME',
        'movie.furtseva': 'FURTSEVA',
        'movie.private': 'PRIVATE ORDER',
        'movie.5min': '5 MINUTES BEFORE JANUARY',
        'movie.iflove': 'IF YOU LOVE, FORGIVE',
        'movie.fate': "IF IT'S OUR FATE",
        'movie.captains': "CAPTAIN'S CHILDREN",
        'movie.husband': 'FINDING A HUSBAND IN A BIG CITY',
        'movie.hear': 'DO YOU HEAR ME?',
        'movie.fog': 'IN THE FOG',
        'movie.relative': 'RELATIVE EXCHANGE',
        'movie.trial': 'THE TRIAL',
        'movie.unforgiven': 'THE UNFORGIVEN',
        'movie.notquite': 'NOT QUITE',
        'movie.date': 'DATE OF HIS OWN DEATH',
        'movie.gift': 'A GIFT FROM THE PERFUMER',
        'movie.silver': 'SILVER PINE FOREST',
        'movie.stubborn': 'STUBBORN TARGET',
        'movie.trust': 'TRUST SERVICE',
        'movie.gentle': 'A GENTLE CREATURE',
        'movie.nanny': 'NANNY NEEDED',
        'movie.illegal': 'ILLEGAL',
        'movie.colors': 'TWO COLORS OF PASSION',
        'movie.mechanical': 'MECHANICAL SUITE',
        'movie.yellow': 'YELLOW DWARF',
        'movie.diamonds': 'DIAMONDS FOR DESSERT',
        'movie.behind': 'BEHIND THE SCENES',
        'movie.alchemists': 'ALCHEMISTS',

        // Distribution in English
        'dist.4stars': '4 STARS',
        'dist.29palms': '29 PALMS',
        'dist.venus': 'BLACK VENUS',
        'dist.dandy': 'DANDY',
        'dist.demon': 'DEMON LOVER',
        'dist.brother': 'HIS BROTHER',
        'dist.otherlife': "A WOMAN'S OTHER LIFE",
        'dist.city': 'CITY OF LOST SOULS',
        'dist.happyend': 'HAPPY END',
        'dist.promised': 'PROMISED LIFE',
        'dist.copy': 'CERTIFIED COPY',
        'dist.royal': 'ROYAL BATTLE',
        'dist.siren': 'RED SIREN',
        'dist.lilly': 'LITTLE LILLY',
        'dist.fingers': 'TINY FINGERS',
        'dist.barbarians': 'BARBARIAN INVASION',
        'dist.irreversible': 'IRREVERSIBLE',
        'dist.stranger': 'THE STRANGER',
        'dist.oneleaves': 'ONE LEAVES, THE OTHER STAYS',
        'dist.kidnapping': 'KIDNAPPING FOR BETTY FISHER',
        'dist.son': 'THE SON',
        'dist.warmwater': 'WARM WATER UNDER A RED BRIDGE',
        'dist.tom': 'TOM AND THOMAS',

        'award1.title': 'FIPRESCI Prize for Best Film',
        'award1.meta': '65th Cannes Film Festival',
        'award1.film': 'Film "In the Fog"',
        'award2.title': 'Best Director',
        'award2.meta': 'IX Vyacheslav Tikhonov International Film Festival "17 MOMENTS..."',
        'award2.film': 'Series "Arbat Mysteries"',
        'award3.title': 'Nominee for Best Melodrama Series',
        'award3.meta': 'TEFI, 2026',
        'award3.film': 'Series "Arbat Mysteries"',
        'award4.title': 'Special Prize "RG MEDIA"',
        'award4.meta': 'V ORIGINAL+ Streaming Platform Content Festival',
        'award4.film': 'Series "Eclipse"',
        'award5.title': 'Best Actress',
        'award5.meta': 'Golden Eagle, 2012',
        'award5.film': 'Series "Furtseva"',
        'award6.title': 'Best Actor',
        'award6.meta': 'Golden Eagle, 2007',
        'award6.film': 'Series "Private Order"',
        'award7.title': 'Best Actor',
        'award7.meta': 'TEFI, 2007',
        'award7.film': "Series \"Captain's Children\"",
        'award8.title': 'Grand Prix',
        'award8.meta': 'IV Russian Abroad International Film Festival',
        'award8.film': 'Film "The Stranger"',
        'award9.title': 'Second Prize of TV-SHOCK Competition',
        'award9.meta': 'Kinoshok Film Festival, 2014',
        'award9.film': 'Series "New Year Flight"',
        'award10.title': 'Nominee for Best TV Film',
        'award10.meta': 'APKiT Prize',
        'award10.film': 'Series "If You Love, Forgive"',
        'award11.title': 'Best Debut',
        'award11.meta': 'X International Military Film Festival named after Y.N. Ozerov',
        'award11.film': 'Film "In the Fog"',
        'award12.title': 'Grand Prix',
        'award12.meta': 'XXII International Film Forum "Golden Knight"',
        'award12.film': 'Film "In the Fog"',
        'award13.title': 'Nominee for Best Film',
        'award13.meta': '70th Cannes Film Festival',
        'award13.film': 'Film "A Gentle Creature"',
        'award14.title': 'Best Actress',
        'award14.meta': 'V White Elephant Film Award',
        'award14.film': 'Series "Nanny Needed"',
        'award15.title': 'Special Jury Prize',
        'award15.meta': 'IX Volokolamsk Border Military-Patriotic Film Festival',
        'award15.film': 'Film "In the Fog"',

        'agency.title': 'FOR AUTHORS',
        'agency.p1': 'We consider applications for feature films, TV series, and animation projects:',
        'agency.p2': '1. The email subject must include "Title" and "Format, genre"',
        'agency.p3': '2. The application must include the following parameters:',
        'agency.p4': 'a. Author name(s) and contact information',
        'agency.p5': 'b. Project title',
        'agency.p6': 'c. Format, genre',
        'agency.p7': 'd. Runtime',
        'agency.p8': 'e. Target audience',
        'agency.p9': 'f. Brief synopsis',
        'agency.p10': 'g. Detailed synopsis/treatment',
        'agency.p11': 'h. Main character descriptions',

        'contacts.title': 'CONTACTS',
        'contacts.company': 'GP FILM COMPANY',
        'contacts.address': 'Moscow, Gogolevsky Boulevard',
        'contacts.address2': 'building 17, structure 1, office 400',
        'contacts.phone': 'Phones: 8(495)6371201, 8(495)6371208',
        'contacts.rent1': 'COSTUME RENTAL',
        'contacts.rent2': 'AND PROPS',
        'contacts.rentphone': 'Phone: 89255904611',
        'contacts.scripts': 'FOR SCREENWRITERS',
        'contacts.pr': 'PR DEPARTMENT',

        'footer.text': '© 2026 GP FILM. All rights reserved'
    }
};

let currentLang = 'ru';

function toggleLanguage() {
    currentLang = currentLang === 'ru' ? 'en' : 'ru';
    document.documentElement.lang = currentLang;

    document.getElementById('lang-ru').classList.toggle('active', currentLang === 'ru');
    document.getElementById('lang-en').classList.toggle('active', currentLang === 'en');

    document.querySelectorAll('[data-i18n]').forEach(el => {
        const key = el.getAttribute('data-i18n');
        if (translations[currentLang][key]) {
            el.textContent = translations[currentLang][key];
        }
    });

    localStorage.setItem('lang', currentLang);
}

document.addEventListener('DOMContentLoaded', function() {
    const savedLang = localStorage.getItem('lang');
    if (savedLang && savedLang !== 'ru') {
        currentLang = savedLang;
        document.getElementById('lang-ru').classList.remove('active');
        document.getElementById('lang-en').classList.add('active');
        document.documentElement.lang = currentLang;

        document.querySelectorAll('[data-i18n]').forEach(el => {
            const key = el.getAttribute('data-i18n');
            if (translations[currentLang][key]) {
                el.textContent = translations[currentLang][key];
            }
        });
    }
    initMovieClicks();
});

const scrollElements = document.querySelectorAll('.project, .award-card');

const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if(entry.isIntersecting){
      entry.target.classList.add('show');
    }
  });
},{ threshold: 0.15 });

scrollElements.forEach(el => {
  observer.observe(el);
});

let slideIndex = 1;
let slideTimer;

showSlides(slideIndex);
startAutoSlide();

function changeSlide(n){
  clearTimeout(slideTimer);
  showSlides(slideIndex += n);
  startAutoSlide();
}

function currentSlide(n){
  clearTimeout(slideTimer);
  showSlides(slideIndex = n);
  startAutoSlide();
}

function showSlides(n){
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");

  if(n > slides.length){ slideIndex = 1; }
  if(n < 1){ slideIndex = slides.length; }

  for(let i = 0; i < slides.length; i++){
    slides[i].style.display = "none";
  }

  for(let i = 0; i < dots.length; i++){
    dots[i].classList.remove("active-dot");
  }

  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].classList.add("active-dot");
}

function startAutoSlide(){
  slideTimer = setTimeout(()=>{
    changeSlide(1);
  },7000);
}

function initMovieClicks() {
    document.querySelectorAll('.project[data-movie]').forEach(project => {
        project.addEventListener('click', function(e) {
            if (e.target.closest('a')) return;
            const movieKey = this.getAttribute('data-movie').toLowerCase();
            const lang = currentLang || 'ru';
            window.location.href = `film.php?id=${encodeURIComponent(movieKey)}&lang=${lang}`;
        });
    });
}

if (document.readyState !== 'loading') {
    initMovieClicks();
}

</script>

</body>
</html>