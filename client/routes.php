<?php
$route = $_SERVER['REQUEST_URI'];
$route = preg_replace("/\/(en|br)(?!([a-z]))/", "", $route);
$route = $route ? $route : '/';

switch ($route) {
        // Article Block
    case '/':
        include './pages/articles.html';
        break;
    case preg_match('/^\/article\/\d+$/', $route) === 1:
        articleRoute($route);
        break;
        // Tools Block
    case '/tools':
        include './pages/tools.html';
        break;
    case '/tool/1':
        include './pages/tool_list/tool1.html';
        break;
        // Portfolio Block
    case '/portfolio':
        include './pages/portfolio.html';
        break;
    case '/portfolio/pdf':
        include './pages/portfolio-pdf.html';
        break;
        // Admin Block
    case '/admin':
        include './pages/admin.html';
        break;
    case preg_match('~^/admin/textlog/\d+$~', $route) === 1:
        include './pages/adminTextLog.html';
        break;
        // Subsection Block
    case '/timer-tools':
        include '404.php';
        break;
    case '/us-conversor':
        include '404.php';
        break;
    case '/random-generator':
        include '404.php';
        break;
        // Login Block
    case '/registration':
        include './pages/registration.html';
        break;
    case '/login':
        include './pages/login.html';
        break;
    case '/logout':
        include './pages/logout.html';
        break;
    case '/profile':
        include './pages/profile.html';
        break;
        // Error Block
    default:
        include '404.php';
        break;
}

function articleRoute($route): void
{
    // include "./pages/articles/article$id.html";
    switch ($route) {
        case '/article/1':
            include './pages/articles/article1.html';
            break;
        case '/article/2':
            include './pages/articles/article2.html';
            break;
        case '/article/3':
            include './pages/articles/article3.html';
            break;
        case '/article/4':
            include './pages/articles/article4.html';
            break;
        case '/article/5':
            include './pages/articles/article5.html';
            break;
        default:
            include '404.php';
            break;
    }
}
