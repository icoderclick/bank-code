<?php

#this code for comments

function replace_text_link($comment, $replacement = '******', $status = true)
{
    if (!$status)
        return $comment;

    #replace text link
    #--> 1. get tag a
    preg_match_all('/<a(.*?)<\/a>/s', $comment, $matches);
    $all_link = $matches[0];

    #--> 2.strip tags and replace text
    $text_links = [];
    foreach ($all_link as $link) {
        $text_links[] = strip_tags($link);
    }
    foreach ($text_links as $text) {
        $comment = preg_replace("/{$text}/", $replacement, $comment);
    }

    return $comment;
}
add_filter('comment_text', 'replace_text_link');



