<?php

function de_active_follow_link($comment, $status = true)
{
    if (!$status)
        return $comment;
//    return str_replace('rel="nofollow','rel="follow',$comment);
    return preg_replace('/rel="nofollow/i', 'rel="follow', $comment);
}
add_filter('comment_text', 'de_active_follow_link');

?>
