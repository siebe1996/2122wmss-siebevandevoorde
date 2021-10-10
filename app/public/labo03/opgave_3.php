
<?php
$pwd = getcwd();
$fileArr = [];
foreach (new DirectoryIterator('.') as $file) {
    if($file->isDot()) continue;
    if (is_dir($file)){
        $fileArr[$file ->getFilename()] = 'folder';
    }
    else{
        $fileArr[$file ->getFilename()] = $file -> getExtension();
    }
    //print $file->getFilename() . '<br>';
}
?>

<!doctype html>
<html>
<head>
	<title>test</title>
	<meta charset="utf-8" />
	<style>
		ul {
			margin: 0;
			padding: 0;
		}
		li {
			list-style: none;
			display: block;
			height: 24px;
			line-height: 24px;
			font-family: monospace;
		}

		li:nth-child(2n) {
			background: rgba(0,0,0,0.05);
		}

		li:hover {
			background: #c2e1ff;
		}

		li img {
			margin-right: 4px;
			position: relative;
			top: 4px;
		}
	</style>
</head>
<body>


	<h1>Browsing <code><?php echo $pwd;?></code></h1>

    <ul>
        <?php
        foreach ($fileArr as $key => $value){
        ?>
        <li>
            <a href="<?php echo $key ?>" >
                <img src="
                <?php

                echo './icons/'.$value.'.gif';

                ?>
                " />
                <?php echo $key?>
            </a>
            <?php
            if(!is_dir($key)) {
                echo '<em>('.filesize($key).'bytes)</em>';
                }
            ?>

        </li>
        <?php
        }
        ?>
    </ul>

    <!--
	<ul>
		<li><a href="opgave_3.php?path=files"><img src="icons/up.gif" />..</a></li>
		<li><a href="opgave_3.php?path=files%2Fimages%2Ficons"><img src="icons/folder.gif" />icons</a></li>
		<li><a href="opgave_3.php?path=files%2Fimages%2Fthumbnails"><img src="icons/folder.gif" />thumbnails</a></li>
		<li><a href="files/images/test.jpg"><img src="icons/jpg.gif" />test.jpg</a> <em>(2kB)</em></li>
		<li><a href="files/images/test2.jpg"><img src="icons/jpg.gif" />test2.jpg</a> <em>(4kB)</em></li>
		<li><a href="files/images/test.zip"><img src="icons/zip.gif" />test.zip</a> <em>(20kB)</em></li>
	</ul>
	-->

</body>
</html>