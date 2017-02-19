<?php

function getDomainUrl(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else {
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'];
}

function makeLinkFromDir($filepath) {
	global $storage_dir, $storage_url;
	return str_replace($storage_dir, $storage_url, $filepath);
}

function getExtension($filepath) {
	return pathinfo($filepath, PATHINFO_EXTENSION);
}

function getFileName($filepath) {
    return basename($filepath);
}

function isMin($filename) {
    if (strpos($filename, '.min.')) return True;
    return False;
}



function listFolderFiles($dir){

	global $extensions, $links;

    $ffs = scandir($dir);

    foreach($ffs as $ff){
        if($ff != '.' && $ff != '..'){
        	$filepath = $dir.'/'.$ff;
            if(is_dir($filepath)) {
            	listFolderFiles($filepath);
            } else {
            	$ext = getExtension($filepath);
				if (in_array($ext, $extensions)) {
					$url = makeLinkFromDir($filepath);
                    $filename = getFileName($filepath);
                    $is_min = isMin($filename);
                    $arr = [
                        'filename' => $filename,
                        'url' => $url,
                        'is_min' => $is_min,
                        'ext' => $ext,
                    ];
            		array_push($links, $arr);
				}
            }
        }
    }
    echo '</ol>';
}

?>