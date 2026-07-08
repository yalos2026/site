<?php
require_once 'film-all.php';

$filmId = isset($_GET['id']) ? strtolower(trim($_GET['id'])) : '';
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'ru';
if (!in_array($lang, ['ru', 'en'])) $lang = 'ru';

$films = ($lang === 'ru') ? $filmsRu : $filmsEn;
if (!isset($films[$filmId])) {
    die($lang === 'ru' ? 'Фильм не найден' : 'Film not found');
}

$film = $films[$filmId];

// Переводы для UI
$t = [
    'ru' => [
        'info' => 'Информация',
        'director' => 'Режиссёр',
        'screenwriter' => 'Сценарий',
        'cinematographer' => 'Оператор',
        'composer' => 'Композитор',
        'production_designer' => 'Художник',
        'cast' => 'В ролях',
        'episodes' => 'Серии',
        'logline' => 'Логлайн',
        'description' => 'Описание',
        'back' => '← Вернуться к проектам',
        'about' => 'О НАС',
        'showreel' => 'ШОУРИЛ',
        'projects' => 'ПРОЕКТЫ',
        'distribution' => 'ДИСТРИБУЦИЯ',
        'awards' => 'НАГРАДЫ',
        'contacts' => 'КОНТАКТЫ',
        'company' => 'ГРУППА КОМПАНИЙ GP',
    ],
    'en' => [
        'info' => 'Information',
        'director' => 'Director',
        'screenwriter' => 'Screenwriter',
        'cinematographer' => 'Cinematographer',
        'composer' => 'Composer',
        'production_designer' => 'Production Designer',
        'cast' => 'Cast',
        'episodes' => 'Episodes',
        'logline' => 'Logline',
        'description' => 'Description',
        'back' => '← Back to projects',
        'about' => 'ABOUT',
        'showreel' => 'SHOWREEL',
        'projects' => 'PROJECTS',
        'distribution' => 'DISTRIBUTION',
        'awards' => 'AWARDS',
        'contacts' => 'CONTACTS',
        'company' => 'GP GROUP',
    ]
][$lang];
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($film['title']) ?> | GP Film</title>
    <link rel="icon" type="image/jpeg" href="images/logo.jpg">
    <link rel="apple-touch-icon" href="images/logo.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;700;900&family=Inter:wght@300;400;500;600&family=Bebas+Neue&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-deep: #060B1F;
            --bg-dark: #0a0f1f;
            --bg-card: rgba(255, 255, 255, 0.03);
            --accent-blue: #7fa8ff;
            --accent-blue-light: #a8c4ff;
            --text-primary: #ffffff;
            --text-secondary: rgba(255, 255, 255, 0.75);
            --text-muted: rgba(255, 255, 255, 0.5);
            --border: rgba(255, 255, 255, 0.08);
            --glow-blue: rgba(127, 168, 255, 0.4);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        body {
            background: var(--bg-deep);
            color: var(--text-primary);
            overflow-x: hidden;
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background:
                radial-gradient(ellipse at top left, rgba(127, 168, 255, 0.15), transparent 50%),
                radial-gradient(ellipse at bottom right, rgba(42, 82, 255, 0.12), transparent 50%),
                radial-gradient(circle at center, rgba(42, 82, 255, 0.1), transparent 60%);
            pointer-events: none;
            z-index: -2;
        }

        body::after {
            content: "";
            position: fixed;
            inset: 0;
            background-image: url("https://www.transparenttextures.com/patterns/asfalt-dark.png");
            opacity: .08;
            animation: grain 8s steps(10) infinite;
            pointer-events: none;
            z-index: 9999;
            mix-blend-mode: overlay;
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
            padding: 20px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            background: rgba(6, 11, 31, 0.85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
        }

        .logo-area { display: flex; align-items: center; gap: 18px; }
        .small-logo {
            width: 44px;
            border-radius: 8px;
            box-shadow: 0 0 20px var(--glow-blue);
            border: 1px solid rgba(127, 168, 255, 0.3);
        }
        .logo-area h1 {
            font-family: 'Cinzel', serif;
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 5px;
            background: linear-gradient(135deg, #fff 0%, var(--accent-blue-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        nav { display: flex; gap: 32px; align-items: center; }
        nav a {
            position: relative;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 2px;
        }
        nav a:hover { color: var(--accent-blue-light); }
        nav a::after {
            content: "";
            position: absolute;
            left: 0; bottom: -8px;
            width: 0%; height: 1px;
            background: var(--accent-blue);
            transition: width 0.4s;
        }
        nav a:hover::after { width: 100%; }

        .lang-switch {
            display: flex;
            gap: 6px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 2px;
            border: 1px solid rgba(127, 168, 255, 0.3);
            padding: 6px 12px;
            border-radius: 4px;
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
            text-decoration: none;
        }
        .lang-option.active {
            color: var(--accent-blue-light);
            text-shadow: 0 0 8px var(--glow-blue);
        }
        .lang-option:hover { color: var(--accent-blue-light); }
        .lang-divider { color: rgba(127, 168, 255, 0.3); }

        .film-hero {
            padding: 140px 8% 60px;
            max-width: 1600px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 760px 1fr;
            gap: 60px;
            align-items: start;
            position: relative;
            animation: fadeIn 1s ease;
        }

        .film-hero::before {
            content: "";
            position: absolute;
            top: 120px;
            left: 8%;
            right: 8%;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--accent-blue), transparent);
            opacity: 0.3;
        }

        .film-poster-wrap {
            position: sticky;
            top: 120px;
        }

        .film-poster {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow:
                0 30px 80px rgba(0, 0, 0, 0.8),
                0 0 60px rgba(127, 168, 255, 0.15),
                inset 0 0 0 1px rgba(255, 255, 255, 0.1);
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            aspect-ratio: 4/3;
            background: #000;
        }

        .film-poster::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 60%, rgba(0,0,0,0.6) 100%);
            z-index: 1;
            pointer-events: none;
        }

        .film-poster::after {
            content: "";
            position: absolute;
            inset: -2px;
            background: linear-gradient(135deg, var(--accent-blue), transparent 40%, transparent 60%, var(--accent-blue-light));
            border-radius: 14px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.5s;
        }

        .film-poster:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow:
                0 40px 100px rgba(0, 0, 0, 0.9),
                0 0 80px var(--glow-blue),
                0 0 120px var(--glow-blue);
        }

        .film-poster:hover::after { opacity: 1; }

        .film-poster img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.8s ease;
        }

        .film-poster:hover img { transform: scale(1.05); }

        .film-info-main {
            padding-top: 20px;
        }

        .film-meta-line {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .meta-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            background: rgba(127, 168, 255, 0.08);
            border: 1px solid rgba(127, 168, 255, 0.25);
            border-radius: 20px;
            font-family: 'Cinzel', serif;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 2px;
            color: var(--accent-blue-light);
        }

        .meta-chip svg {
            width: 14px;
            height: 14px;
            fill: var(--accent-blue);
        }

        .film-title {
            font-family: 'Cinzel', serif;
            font-size: clamp(40px, 6vw, 72px);
            font-weight: 900;
            line-height: 1.05;
            letter-spacing: 2px;
            margin-bottom: 24px;
            background: linear-gradient(180deg, #ffffff 0%, #a8b8d8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 60px rgba(127, 168, 255, 0.2);
        }

        .film-logline {
            font-size: 20px;
            font-style: italic;
            line-height: 1.6;
            color: var(--text-secondary);
            padding: 24px 0;
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            margin-bottom: 32px;
            position: relative;
        }

        .film-logline::before {
            content: """;
            position: absolute;
            top: 10px;
            left: -10px;
            font-family: 'Cinzel', serif;
            font-size: 80px;
            color: var(--accent-blue);
            opacity: 0.3;
            line-height: 1;
        }

        .action-buttons {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 28px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 2px;
            text-decoration: none;
            transition: all 0.3s;
            cursor: pointer;
            border: none;
            background: linear-gradient(135deg, var(--accent-blue), #5a88e0);
            color: #fff;
            box-shadow: 0 8px 30px var(--glow-blue);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 40px var(--glow-blue);
            background: linear-gradient(135deg, var(--accent-blue-light), var(--accent-blue));
        }

        .btn-primary svg {
            width: 18px;
            height: 18px;
            fill: currentColor;
        }

        .film-details {
            max-width: 1600px;
            margin: 0 auto;
            padding: 60px 8%;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 60px;
            animation: slideUp 1s ease 0.2s backwards;
        }

        .section-title {
            font-family: 'Cinzel', serif;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 4px;
            color: var(--accent-blue-light);
            margin-bottom: 24px;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title::before {
            content: "";
            width: 30px;
            height: 1px;
            background: var(--accent-blue);
            box-shadow: 0 0 10px var(--glow-blue);
        }

        .description-block {
            font-size: 16px;
            line-height: 1.9;
            color: var(--text-secondary);
        }

        .description-block p {
            margin-bottom: 16px;
        }

        .info-sidebar {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 32px;
            backdrop-filter: blur(10px);
            height: fit-content;
            position: sticky;
            top: 120px;
            transition: all 0.3s;
        }

        .info-sidebar:hover {
            border-color: rgba(127, 168, 255, 0.3);
            box-shadow: 0 0 40px rgba(127, 168, 255, 0.08);
        }

        .info-row {
            display: flex;
            gap: 16px;
            padding: 18px 0;
            border-bottom: 1px solid var(--border);
            align-items: flex-start;
        }

        .info-row:last-child { border-bottom: none; }

        .info-icon {
            flex-shrink: 0;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: rgba(127, 168, 255, 0.08);
            border: 1px solid rgba(127, 168, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .info-row:hover .info-icon {
            background: rgba(127, 168, 255, 0.15);
            border-color: var(--accent-blue);
            box-shadow: 0 0 15px var(--glow-blue);
        }

        .info-icon svg {
            width: 18px;
            height: 18px;
            fill: var(--accent-blue);
        }

        .info-content {
            flex: 1;
            min-width: 0;
        }

        .info-label {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 2px;
            color: var(--accent-blue-light);
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .info-value {
            font-size: 14px;
            line-height: 1.5;
            color: var(--text-primary);
        }

        .back-nav {
            max-width: 1600px;
            margin: 0 auto;
            padding: 40px 8% 80px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 2px;
            transition: all 0.3s;
            padding: 12px 20px;
            border: 1px solid var(--border);
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.02);
        }

        .back-link:hover {
            color: var(--accent-blue-light);
            border-color: var(--accent-blue);
            background: rgba(127, 168, 255, 0.05);
            transform: translateX(-4px);
            box-shadow: 0 0 20px var(--glow-blue);
        }

        .back-link svg {
            width: 16px;
            height: 16px;
            fill: currentColor;
            transition: transform 0.3s;
        }

        .back-link:hover svg { transform: translateX(-4px); }

        footer {
            padding: 50px;
            text-align: center;
            background: rgba(0, 0, 0, 0.4);
            border-top: 1px solid var(--border);
            font-size: 12px;
            letter-spacing: 2px;
            color: var(--text-muted);
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 1400px) {
            .film-hero {
                grid-template-columns: 600px 1fr;
                gap: 40px;
            }
        }

        @media (max-width: 1100px) {
            .film-hero {
                grid-template-columns: 500px 1fr;
                gap: 30px;
            }
        }

        @media (max-width: 900px) {
            .top-bar {
                flex-direction: column;
                gap: 12px;
                padding: 12px 20px;
            }
            nav { flex-wrap: wrap; justify-content: center; gap: 12px; }
            nav a { font-size: 10px; letter-spacing: 1px; }
            .logo-area h1 { font-size: 16px; letter-spacing: 3px; }
            .small-logo { width: 36px; }

            .film-hero {
                grid-template-columns: 1fr;
                padding: 120px 5% 40px;
                gap: 30px;
            }

            .film-poster-wrap {
                position: relative;
                top: 0;
                max-width: 100%;
                margin: 0 auto;
            }

            .film-title { font-size: 36px; }
            .film-logline { font-size: 16px; }
            .film-logline::before { font-size: 60px; }

            .film-details {
                grid-template-columns: 1fr;
                padding: 40px 5%;
                gap: 40px;
            }

            .info-sidebar {
                position: relative;
                top: 0;
            }

            .back-nav { padding: 20px 5% 60px; }
        }

        @media (max-width: 600px) {
            .film-title { font-size: 28px; letter-spacing: 1px; }
            .meta-chip { font-size: 10px; padding: 4px 12px; }
            .action-buttons { flex-direction: column; }
            .btn-primary, .btn-secondary { width: 100%; justify-content: center; }
        }
    </style>
</head>
<body>

<div class="top-bar">
    <div class="logo-area">
        <a href="index.php"><img class="small-logo" src="images/logo.jpg" alt="GP Film"></a>
        <h1><?= $t['company'] ?></h1>
    </div>
    <nav>
        <a href="index.php#about"><?= $t['about'] ?></a>
        <a href="index.php#showreel"><?= $t['showreel'] ?></a>
        <a href="index.php#projects"><?= $t['projects'] ?></a>
        <a href="index.php#posters"><?= $t['distribution'] ?></a>
        <a href="index.php#awards"><?= $t['awards'] ?></a>
        <a href="index.php#contacts"><?= $t['contacts'] ?></a>

        <div class="lang-switch">
            <a href="?id=<?= urlencode($filmId) ?>&lang=ru" class="lang-option <?= $lang === 'ru' ? 'active' : '' ?>">RU</a>
            <span class="lang-divider">|</span>
            <a href="?id=<?= urlencode($filmId) ?>&lang=en" class="lang-option <?= $lang === 'en' ? 'active' : '' ?>">EN</a>
        </div>
    </nav>
</div>

<section class="film-hero">
    <div class="film-poster-wrap">
        <div class="film-poster">
            <img src="<?= htmlspecialchars($film['image']) ?>" alt="<?= htmlspecialchars($film['title']) ?>">
        </div>
    </div>

    <div class="film-info-main">
        <div class="film-meta-line">
            <span class="meta-chip">
                <svg viewBox="0 0 24 24"><path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 002 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10z"/></svg>
                <?= htmlspecialchars($film['year']) ?>
            </span>
            <span class="meta-chip">
                <svg viewBox="0 0 24 24"><path d="M18 4l2 4h-3l-2-4h-2l2 4h-3l-2-4H8l2 4H7L5 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V4h-4z"/></svg>
                <?= htmlspecialchars($film['type']) ?>
            </span>
            <?php if (!empty($film['episodes'])): ?>
            <span class="meta-chip">
                <svg viewBox="0 0 24 24"><path d="M4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm16-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8 12.5v-9l6 4.5-6 4.5z"/></svg>
                <?= htmlspecialchars($film['episodes']) ?>
            </span>
            <?php endif; ?>
            </div>

        <h1 class="film-title"><?= htmlspecialchars($film['title']) ?></h1>

        <?php if (!empty($film['logline'])): ?>
        <p class="film-logline"><?= nl2br(htmlspecialchars($film['logline'])) ?></p>
        <?php endif; ?>

        <div class="action-buttons">
            <a href="#details" class="btn-primary">
                <svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                <?= $lang === 'ru' ? 'Подробнее' : 'More info' ?>
            </a>
        </div>
    </div>
</section>

<section class="film-details" id="details">
    <div class="description-section">
        <h2 class="section-title"><?= $t['description'] ?></h2>
        <div class="description-block">
            <p><?= nl2br(htmlspecialchars($film['description'])) ?></p>
        </div>
    </div>

    <aside class="info-sidebar">
        <h2 class="section-title"><?= $t['info'] ?></h2>

        <div class="info-row">
            <div class="info-icon">
                <svg viewBox="0 0 24 24"><path d="M18 4l2 4h-3l-2-4h-2l2 4h-3l-2-4H8l2 4H7L5 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V4h-4z"/></svg>
            </div>
            <div class="info-content">
                <div class="info-label"><?= $t['director'] ?></div>
                <div class="info-value"><?= htmlspecialchars($film['director']) ?></div>
            </div>
        </div>

        <?php if (!empty($film['screenwriter'])): ?>
        <div class="info-row">
            <div class="info-icon">
                <svg viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
            </div>
            <div class="info-content">
                <div class="info-label"><?= $t['screenwriter'] ?></div>
                <div class="info-value"><?= htmlspecialchars($film['screenwriter']) ?></div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (!empty($film['cinematographer'])): ?>
        <div class="info-row">
            <div class="info-icon">
                <svg viewBox="0 0 24 24"><path d="M17 10.5V7c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h12c.55 0 1-.45 1-1v-3.5l4 4v-11l-4 4z"/></svg>
            </div>
            <div class="info-content">
                <div class="info-label"><?= $t['cinematographer'] ?></div>
                <div class="info-value"><?= htmlspecialchars($film['cinematographer']) ?></div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (!empty($film['composer'])): ?>
        <div class="info-row">
            <div class="info-icon">
                <svg viewBox="0 0 24 24"><path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/></svg>
            </div>
            <div class="info-content">
                <div class="info-label"><?= $t['composer'] ?></div>
                <div class="info-value"><?= htmlspecialchars($film['composer']) ?></div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (!empty($film['production_designer'])): ?>
        <div class="info-row">
            <div class="info-icon">
                <svg viewBox="0 0 24 24"><path d="M12 22C6.49 22 2 17.51 2 12S6.49 2 12 2s10 4.04 10 9c0 3.31-2.69 6-6 6h-1.77c-.28 0-.5.22-.5.5 0 .12.05.23.13.33.41.47.64 1.06.64 1.67A2.5 2.5 0 0112 22zm0-18c-4.41 0-8 3.59-8 8s3.59 8 8 8c.28 0 .5-.22.5-.5 0-.16-.08-.28-.14-.35-.41-.46-.63-1.05-.63-1.65a2.5 2.5 0 012.5-2.5H16c2.21 0 4-1.79 4-4 0-3.86-3.59-7-8-7z"/><circle cx="6.5" cy="11.5" r="1.5"/><circle cx="9.5" cy="7.5" r="1.5"/><circle cx="14.5" cy="7.5" r="1.5"/><circle cx="17.5" cy="11.5" r="1.5"/></svg>
            </div>
            <div class="info-content">
                <div class="info-label"><?= $t['production_designer'] ?></div>
                <div class="info-value"><?= htmlspecialchars($film['production_designer']) ?></div>
            </div>
        </div>
        <?php endif; ?>

        <div class="info-row">
            <div class="info-icon">
                <svg viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
            </div>
            <div class="info-content">
                <div class="info-label"><?= $t['cast'] ?></div>
                <div class="info-value"><?= htmlspecialchars($film['cast']) ?></div>
            </div>
        </div>
    </aside>
</section>

<div class="back-nav">
    <a href="index.php#projects" class="back-link">
        <svg viewBox="0 0 24 24"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
        <?= $t['back'] ?>
    </a>
</div>

<footer>
    <span>© 2026 GP FILM. <?= $lang === 'ru' ? 'Все права защищены' : 'All rights reserved' ?></span>
</footer>

</body>
</html>