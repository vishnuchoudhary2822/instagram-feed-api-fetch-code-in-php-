<?php
$access_token = '';

$api_url = 'https://graph.instagram.com/me/media?fields=id,permalink,caption,media_type,media_url&access_token=' . $access_token;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}

curl_close($ch);

$data = json_decode($response, true);

if (isset($data['data'])) {
    foreach ($data['data'] as $post) {
        // Process each post
        echo "Post ID: {$post['id']}<br>";
        echo "Caption: {$post['caption']}<br>";
        echo "Media Type: {$post['media_type']}<br>";
        echo "Media Type: {$post['permalink']}<br>";

        if ($post['media_type'] == 'IMAGE') {
            // echo "<img src=\"{$post['media_url']}\" alt=\"{$post['caption']}\"><br><br>";

        } else {
            echo "This post is not an image.<br><br>";
        }
    }
} else {
    echo "Error fetching data";
}
?>
