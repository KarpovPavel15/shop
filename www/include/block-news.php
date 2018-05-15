<div id="block-news">
    <center><img id="news-prev" src="./images/img-prev.png" /></center>
<div id="newsticker">
<ul>

    <?php
    mysqli_query($link, "SET NAMES utf8");
    $result = mysqli_query($link,"SELECT * FROM news ORDER BY id DESC");
    If (mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);
        do
        {
            echo '
<li>
<span>'.$row["date"].'</span>
<a href="" >'.$row["title"].'</a>
<p>'.$row["text"].'</p>
</li>
';
        }
        while ($row = mysqli_fetch_array($result));
    }
    ?>
</ul>
</div>
    <center><img id="news-prev" src="./images/img-next.png" /></center>



</div>