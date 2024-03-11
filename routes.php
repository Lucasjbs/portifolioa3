<?php
// $route = $_GET['route'] ?? '/';
$route = $_SERVER['REQUEST_URI'] ?? '/';

switch ($route) {
    case '/':
        include './articles.html';
        break;
    case '/tools':
        include './tools.html';
        break;
    case '/portfolio':
        include './portfolio.html';
        break;
    case '/admin':
        include './admin.html';
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
        include './tool_list/tool1.html';
        break;
    case '/registration':
        include './registration.html';
        break;
    case '/profile':
        include './profile.html';
        break;
    default:
        include '404.html';
        break;
}

function articleRoute($route): void
{
    switch ($route) {
        case '/article/1':
            include './articles/article1.html';
            break;
        case '/article/2':
            include './articles/article2.html';
            break;
        default:
            include '404.html';
            break;
    }
}
