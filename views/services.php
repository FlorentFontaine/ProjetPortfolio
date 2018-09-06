<div class="slideshow">
	<ul>
<?php
foreach ($services as $value) {
    echo '  <li>
                <div class="title"> '.$value['s_titre'].'</div><br>
                <img src=" ./medias/' . $value['s_img'] . '" width="400" height="200"><br>
                <div class="cont">'.$value['s_contenu'].'</div>
            </li>';
    }
 ?>
	</ul>
</div>