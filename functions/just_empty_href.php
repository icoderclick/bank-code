<?php

#for empty href in comments site

function empty_just_href($comment, $status = true)
{
    if (!$status)
        return $comment;

    return preg_replace('/href="[^"]*"/', 'href=" "', $comment);

}
add_filter('comment_text', 'empty_just_href');
