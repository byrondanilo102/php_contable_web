<?php // apc_compile_dir.php
function apc_compile_dir($root, $recursively = true){
    $compiled   = true;
    switch($recursively){
        case    true:
            foreach(glob($root.DIRECTORY_SEPARATOR.'*', GLOB_ONLYDIR) as $dir)
                $compiled   = $compiled && apc_compile_dir($dir, $recursively);
        case    false:
            foreach(glob($root.DIRECTORY_SEPARATOR.'*.php') as $file)
                $compiled   = $compiled && apc_compile_file($file);
            break;
    }
    return  $compiled;
}

function formatSizeUnits($bytes) {
	
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
            
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
            
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
            
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
            
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
            
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
}
?>