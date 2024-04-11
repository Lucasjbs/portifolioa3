<?php

namespace Portifolio\Workbench\Service;

class AdminProtectedData
{
    public function getIndexPage(): string
    {
        $htmlContent = '<div class="page_content">';
        $htmlContent .= '<div id="articleList" class="swiper-container">';
        $htmlContent .= '<ul class="swiper-wrapper">';
        $filePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'admin_page_index.json';
        if (file_exists($filePath)) {
            $file = file_get_contents($filePath);
            $data = json_decode($file, true);
            foreach ($data as $item) {
                $htmlContent .= '<li class="swiper-slide">';
                $htmlContent .= '<div class="grid_block">';
                $htmlContent .= '<a href="' . $item['hyperlink_reference'] . '" class="block_thumb" target="_blank">';
                $htmlContent .= '<img src="' . $item['image_source'] . '" alt="' . $item['image_description'] . '">';
                $htmlContent .= '</a>';
                $htmlContent .= '<div class="article_category ' . $item['article_category_class'] . '">' . $item['article_category_name'] . '</div>';
                $htmlContent .= '<a href="' . $item['hyperlink_reference'] . '" title="' . $item['title_description'] . '" class="block_title" target="_blank">' . $item['title_name'] . '</a>';
                $htmlContent .= '<div class="creator_name">';
                $htmlContent .= '<a href="' . $item['hyperlink_creator'] . '" target="_blank">' . $item['creator_name'] . '</a>';
                $htmlContent .= '</div>';
                $htmlContent .= '</div>';
                $htmlContent .= '</li>';
            }
            $htmlContent .= '</ul>';
            $htmlContent .= '</div>';
            $htmlContent .= '</div>';
            return $htmlContent;
        }

        return "Content Not Found!";
    }

    public function getTextlogPage(int $pageIndex): string
    {
        $fileName = "textlog$pageIndex.html";
        $filePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . $fileName;
        if (file_exists($filePath)) {
            $file = file_get_contents($filePath);
            return $file;
        }

        return "Content Not Found!";
    }
}
