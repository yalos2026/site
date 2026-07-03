<?php
header('Content-Type: text/html; charset=utf-8');
require_once 'film-all.php';

// Получаем ID фильма из URL
$filmId = isset($_GET['id']) ? strtolower(trim($_GET['id'])) : '';

// Определяем язык
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'ru';
if (!in_array($lang, ['ru', 'en'])) $lang = 'ru';

// Проверяем существование фильма
$films = ($lang === 'ru') ? $filmsRu : $filmsEn;
if (!isset($films[$filmId])) {
    die('Фильм не найден');
}

$film = $films[$filmId];
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($film['title']) ?> | GP Film</title>
	<link rel="icon" type="image/jpeg" href="images/logo.jpg">
<link rel="apple-touch-icon" href="images/logo.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            background: #060B1F;
            color: white;
            overflow-x: hidden;
            font-family: 'Inter', sans-serif;
        }
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: radial-gradient(circle at top, rgba(42,82,255,.18), transparent 40%);
            pointer-events: none;
            z-index: -2;
        }
        body::after {
            content: "";
            position: fixed;
            inset: 0;
            background-image: url("https://www.transparenttextures.com/patterns/asfalt-dark.png");
            opacity: .05;
            animation: grain 8s steps(10) infinite;
            pointer-events: none;
            z-index: 9999;
        }
        @keyframes grain {
            0% { transform: translate(0,0); }
            20% { transform: translate(-5%,5%); }
            40% { transform: translate(5%,-5%); }
            60% { transform: translate(-3%,3%); }
            80% { transform: translate(3%,-3%); }
            100% { transform: translate(0,0); }
        }

        .top-bar {
            position: fixed;
            top: 0; left: 0;
            width: 100%;
            padding: 22px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            background: rgba(0,0,0,.2);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255,255,255,.05);
        }
        .logo-area {
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .small-logo {
            width: 48px;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(58,114,255,.3);
        }
        .logo-area h1 {
            font-family: 'Cinzel', serif;
            font-size: 28px;
            letter-spacing: 6px;
        }
        nav {
            display: flex;
            gap: 40px;
            align-items: center;
        }
        nav a {
            position: relative;
            color: white;
            text-decoration: none;
            opacity: .72;
            transition: .4s;
            font-size: 14px;
            letter-spacing: 2px;
        }
        nav a:hover { opacity: 1; }
        nav a::after {
            content: "";
            position: absolute;
            left: 0; bottom: -8px;
            width: 0%; height: 1px;
            background: #7fa8ff;
            transition: .5s;
        }
        nav a:hover::after { width: 100%; }

        .lang-switch {
            display: flex;
            gap: 8px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 2px;
            border: 1px solid rgba(127, 168, 255, 0.3);
            padding: 8px 14px;
            border-radius: 6px;
            cursor: pointer;
            user-select: none;
            margin-left: 20px;
            transition: all 0.3s;
        }
        .lang-switch:hover {
            border-color: rgba(127, 168, 255, 0.6);
            background: rgba(127, 168, 255, 0.05);
        }
        .lang-option {
            color: rgba(255, 255, 255, 0.5);
            transition: color 0.3s;
            padding: 2px 4px;
            text-decoration: none;
        }
        .lang-option.active {
            color: #7fa8ff;
            text-shadow: 0 0 10px rgba(127, 168, 255, 0.5);
        }
        .lang-option:hover { color: #a8c4ff; }
        .lang-divider { color: rgba(255, 255, 255, 0.3); }

        .film-page {
            padding: 140px 8% 80px;
            min-height: 100vh;
        }

        .film-header {
            text-align: center;
            margin-bottom: 60px;
        }
        .film-header h1 {
            font-family: 'Cinzel', serif;
            font-size: clamp(32px, 5vw, 56px);
            letter-spacing: 4px;
            margin-bottom: 15px;
            text-shadow: 0 0 30px rgba(127, 168, 255, 0.3);
        }
        .film-header .film-year {
            font-family: 'Cinzel', serif;
            font-size: 24px;
            color: #7fa8ff;
            letter-spacing: 3px;
            margin-bottom: 10px;
        }
        .film-header .film-type {
            font-size: 14px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.6);
        }

        .film-content {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 60px;
            align-items: start;
            max-width: 1400px;
            margin: 0 auto;
        }

        .film-poster {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 30px 80px rgba(0,0,0,.6);
            border: 1px solid rgba(255,255,255,.06);
            background: rgba(0,0,0,.5);
        }
        .film-poster img {
            width: 100%;
            height: auto;
            display: block;
            aspect-ratio: 2/3;
            object-fit: cover;
        }

        .film-info {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .info-block {
            background: rgba(255,255,255,.03);
            border: 1px solid rgba(255,255,255,.06);
            border-radius: 16px;
            padding: 30px;
            backdrop-filter: blur(10px);
        }
        .info-block h3 {
            font-family: 'Cinzel', serif;
            font-size: 16px;
            letter-spacing: 3px;
            color: #7fa8ff;
            margin-bottom: 15px;
            text-transform: uppercase;
        }
        .info-block p {
            font-size: 16px;
            line-height: 1.8;
            opacity: .9;
        }
        .info-block .meta-row {
            display: flex;
            gap: 10px;
            margin-bottom: 12px;
            font-size: 15px;
            line-height: 1.6;
        }
        .info-block .meta-label {
            color: #7fa8ff;
            font-weight: 500;
            min-width: 120px;
            letter-spacing: 1px;
        }
        .info-block .meta-value {
            opacity: .9;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-top: 40px;
            color: #7fa8ff;
            text-decoration: none;
            font-size: 14px;
            letter-spacing: 2px;
            transition: all 0.3s;
        }
        .back-link:hover {
            color: #a8c4ff;
            transform: translateX(-5px);
        }

        footer {
            padding: 70px;
            text-align: center;
            background: black;
            border-top: 1px solid rgba(255,255,255,.06);
            opacity: .55;
            font-size: 14px;
        }

        @media (max-width: 900px) {
            .top-bar {
                flex-direction: column;
                gap: 20px;
                padding: 15px 20px;
            }
            nav { flex-wrap: wrap; justify-content: center; gap: 15px; }
            nav a { font-size: 11px; }
            .film-content {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            .film-page { padding: 120px 5% 60px; }
            .film-header h1 { font-size: 32px; }
            .info-block { padding: 20px; }
            .info-block .meta-row { flex-direction: column; gap: 4px; }
            .info-block .meta-label { min-width: auto; }
        }
    </style>
</head>
<body>

<div class="top-bar">
    <div class="logo-area">
        <img class="small-logo" src="images/logo.jpg">
        <h1><?= $lang === 'ru' ? 'ГРУППА КОМПАНИЙ GP' : 'GP GROUP' ?></h1>
    </div>
    <nav>
        <a href="index.html#about"><?= $lang === 'ru' ? 'О НАС' : 'ABOUT' ?></a>
        <a href="index.html#showreel"><?= $lang === 'ru' ? 'ШОУРИЛ' : 'SHOWREEL' ?></a>
        <a href="index.html#projects"><?= $lang === 'ru' ? 'ПРОЕКТЫ' : 'PROJECTS' ?></a>
        <a href="index.html#posters"><?= $lang === 'ru' ? 'ДИСТРИБУЦИЯ' : 'DISTRIBUTION' ?></a>
        <a href="index.html#awards"><?= $lang === 'ru' ? 'НАГРАДЫ' : 'AWARDS' ?></a>
        <a href="index.html#contacts"><?= $lang === 'ru' ? 'КОНТАКТЫ' : 'CONTACTS' ?></a>

        <div class="lang-switch">
            <a href="?id=<?= urlencode($filmId) ?>&lang=ru" class="lang-option <?= $lang === 'ru' ? 'active' : '' ?>">RU</a>
            <span class="lang-divider">|</span>
            <a href="?id=<?= urlencode($filmId) ?>&lang=en" class="lang-option <?= $lang === 'en' ? 'active' : '' ?>">EN</a>
        </div>
    </nav>
</div>

<div class="film-page">
    <div class="film-header">
        <h1><?= htmlspecialchars($film['title']) ?></h1>
        <div class="film-year"><?= htmlspecialchars($film['year']) ?></div>
        <div class="film-type"><?= htmlspecialchars($film['type']) ?></div>
    </div>

    <div class="film-content">
        <div class="film-poster">
            <img src="<?= htmlspecialchars($film['image']) ?>" alt="<?= htmlspecialchars($film['title']) ?>">
        </div>

        <div class="film-info">
            <div class="info-block">
                <h3><?= $lang === 'ru' ? 'Описание' : 'Description' ?></h3>
                <p><?= nl2br(htmlspecialchars($film['description'])) ?></p>
            </div>

            <div class="info-block">
                <h3><?= $lang === 'ru' ? 'Информация' : 'Information' ?></h3>
                <div class="meta-row">
                    <span class="meta-label"><?= $lang === 'ru' ? 'Режиссёр' : 'Director' ?>:</span>
                    <span class="meta-value"><?= htmlspecialchars($film['director']) ?></span>
                </div>
                <div class="meta-row">
                    <span class="meta-label"><?= $lang === 'ru' ? 'В ролях' : 'Cast' ?>:</span>
                    <span class="meta-value"><?= htmlspecialchars($film['cast']) ?></span>
                </div>
                <?php if (!empty($film['episodes'])): ?>
                <div class="meta-row">
                    <span class="meta-label"><?= $lang === 'ru' ? 'Серии' : 'Episodes' ?>:</span>
                    <span class="meta-value"><?= htmlspecialchars($film['episodes']) ?></span>
                </div>
                <?php endif; ?>
                <?php if (!empty($film['duration'])): ?>
                <div class="meta-row">
                    <span class="meta-label"><?= $lang === 'ru' ? 'Хронометраж' : 'Duration' ?>:</span>
                    <span class="meta-value"><?= htmlspecialchars($film['duration']) ?></span>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <a href="index.html#projects" class="back-link">
        ← <?= $lang === 'ru' ? 'Вернуться к проектам' : 'Back to projects' ?>
    </a>
</div>

<footer>
    <span>© 2026 GP FILM. <?= $lang === 'ru' ? 'Все права защищены' : 'All rights reserved' ?></span>
</footer>

</body>
</html>