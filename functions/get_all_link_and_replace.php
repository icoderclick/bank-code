#get all link and replace to my custom link in comments

function get_all_link_and_replace($comment, $my_link = '', $status = false)
{
    if (!$status)
        return $comment;
    $pattern = '~[a-z]+://\S+~';

    if (preg_match_all($pattern, $comment, $out)) {

        if (sizeof($out[0]) > 0) {
            $my_link = $my_link . '"';
            foreach ($out[0] as $link) {
                $comment = str_replace($link, $my_link, $comment);
            }
        }
    }

    return $comment;
}
add_filter('comment_text', 'get_all_link_and_replace');
