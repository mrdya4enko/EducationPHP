<?php
/**
 * Created by PhpStorm.
 * User: dyachenko
 * Date: 22.11.16
 * Time: 21:10
 */

$header = template('header', ['title' => 'Hello World!']);
$content = template('content', ['content' => "Lorem ipsum...", 'meta' => 'Author info']);
$footer = template('footer', ['copy' => "Copyright " . date('Y')]);


echo $header, $content, $footer;

/**
 * @param  string $template
 * @param  array $vars
 * @return string
 */
function template($template, $vars)
{
    $file = $template . '.phtml';
    if (file_exists($file)) {
        foreach ($vars as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include $file;
        return ob_get_clean();
    }
}