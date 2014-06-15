<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

</head>
<body>
<div id="container" style="padding: 0 20px;">
<h1> testnico </h1>
<!-- http://search.nicovideo.jp/docs/api/html5jc.html -->
<?php $default = isset($_GET['q']) ? $_GET['q'] : ''; ?>

<form target="" method="GET">
<input type="text" name="q" value="<?= $default?>" placeholder="検索クエリを入力">
    <input type="hidden" value="">
    <input type="submit" class="btn btn-default">
</form>
<?php 

define('NICONICO_API','http://api.search.nicovideo.jp/api/');

if (isset($_GET['q'])) {

    /*
    $data = array(
        'query' => $_GET['q'],
        'service' => array('video'),
        'search' => array('title'),
        'join' => array(
            'cmsid',
            'title',
            'view_counter'
        ),
        'filters' => array(
            'type' => 'equal',
            'field' => 'music_download',
            'value' => true
        ),
        'from' => 0,
        'size' => 10,
        'sort_by' => 'view_counter',
        'issuer' => 'testnico/ikuwow',
        'reason' => 'html5jc'
    );
     */

    $data = array(
        'query' => 'query',
        'service' => array('tag_video'),
        'from' => 0,
        'size' => 5,
        'issuer' => 'apiguide',
        'reason' => 'html5jc'
    );

    $headers = array(
        "Content-Type: application/json\r\n".
        "Accept: application/json\r\n"
    );
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => implode("\r\n", $headers),
            'content' => json_encode($data),
        )
    );
    var_dump($options);
    $context = stream_context_create($options);

    $contents = file_get_contents(NICONICO_API,false,$context);
    var_dump(json_decode($contents));
}

?>
</div><!-- #container -->

<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

</body>

</html>
