<?php
$route = $_SERVER['REQUEST_URI'];
$route = preg_replace("/\/(en|br)(?!([a-z]))/", "", $route);
$route = $route ? $route : '/';

switch ($route) {
    case '/':
        include './pages/articles.html';
        break;
    case '/tools':
        include './pages/tools.html';
        break;
    case '/portfolio':
        include './pages/portfolio.html';
        break;
    case '/admin':
        include './pages/admin.html';
        break;
    case '/timer-tools':
        include '404.html';
        break;
    case '/us-conversor':
        include '404.html';
        break;
    case '/random-generator':
        include '404.html';
        break;
    case preg_match('/^\/article\/\d+$/', $route) === 1:
        articleRoute($route);
        break;
    case '/tool/1':
        include './pages/tool_list/tool1.html';
        break;
    case '/registration':
        include './pages/registration.html';
        break;
    case '/login':
        include './pages/login.html';
        break;
    case '/profile':
        include './pages/profile.html';
        break;
    default:
        include '404.html';
        break;
}

function articleRoute($route): void
{
    switch ($route) {
        case '/article/1':
            include './pages/articles/article1.html';
            break;
        case '/article/2':
            include './pages/articles/article2.html';
            break;
        default:
            include '404.html';
            break;
    }
}
