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
        include '404.html';
        break;
    case '/admin':
        //section 8
        include '404.html';
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
    case '/random-generator':
        include '404.html';
        break;
    case stristr($route, '/tools/new'):
        articleRoute();
        break;
    default:
        include '404.html';
        break;
}

function articleRoute(): void
{
    include './tools.html';
}
