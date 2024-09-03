<?php
$type='none';
$version='FORMATO1';

require_once('apc_base.php');

if (isset($_POST['type']) || isset($_GET['type'])){
	if(isset($_GET['type'])) {
		$type=$_GET['type'];
	} else {
		$type=$_POST['type'];
	}
}

if($type=='clean') {
	if(function_exists('apc_clear_cache')){
		echo(apc_clear_cache() ? 'OK: CACHE CLEANED SUCESFUL' : 'ERROR: CACHE NO CLEANED').PHP_EOL;
		
		var_dump(apc_cache_info());
	}
	
} else if($type=='info') {
	
	if($version=='SIMPLE') {
		if(function_exists("apc_cache_info")) {
			var_dump(apc_cache_info());
		} else {
			echo('APC No Instalado');
		}
		
	} else if($version=='FORMATO1') {
	
		if(function_exists("apc_cache_info") && function_exists("apc_sma_info")) {
	
			  $time = time();
			
			  $mem = apc_sma_info();
			  $mem_size = $mem['num_seg']*$mem['seg_size'];
			  $mem_avail= $mem['avail_mem'];
			  $mem_used = $mem_size-$mem_avail;
			 		  
			  	  
			  // Some code taken from the file apc.php by The PHP Group.
			  $nseg = $freeseg = $fragsize = $freetotal = 0;
			  for($i=0; $i<$mem['num_seg']; $i++) {
			    $ptr = 0;
			    foreach($mem['block_lists'][$i] as $block) {
			      if ($block['offset'] != $ptr) {
			        ++$nseg;
			      }
			      $ptr = $block['offset'] + $block['size'];
			      // Only consider blocks <5M for the fragmentation %
			      if($block['size']<(5*1024*1024)) $fragsize+=$block['size'];
			      $freetotal+=$block['size'];
			    }
			    $freeseg += count($mem['block_lists'][$i]);
			  }
			
			  if ($freeseg < 2) {
			    $fragsize = 0;
			    $freeseg = 0;
			  }
			 
			  $cache_mode = 'opmode';
			  $cache=@apc_cache_info($cache_mode);
			
			  // Item hits, misses and inserts
			  $hits = $cache['num_hits'];
			  $misses = $cache['num_misses'];
			  $inserts = $cache['num_inserts'];
			
			  //
			  $req_rate = ($cache['num_hits']+$cache['num_misses'])/($time-$cache['start_time']);
			  $hit_rate = ($cache['num_hits'])/($time-$cache['start_time']); // Number of entries in cache $number_entries = $cache['num_entries'];
			  $miss_rate = ($cache['num_misses'])/($time-$cache['start_time']); // Total number of cache purges $purges = $cache['expunges'];
			  $insert_rate = ($cache['num_inserts'])/($time-$cache['start_time']);
			
			  // Number of entries in cache
			  $number_entries = $cache['num_entries'];
			
			  // Total number of cache purges
			  $purges = $cache['expunges'];
			
			  //apc_clear_cache($cache_mode);
			
			  $mem_size_format=formatSizeUnits($mem_size);
			  $mem_used_format=formatSizeUnits($mem_used);
			  
			  $mem_free=($mem_size - $mem_used);//(mem_avail - $fragsize);
			  $mem_free_format=formatSizeUnits($mem_free);
			  
			  $out = array(
			    'size: ' . $mem_size_format,//$mem_size, sprintf("%.2f", $mem_size)
			    'used: ' . $mem_used_format,//$mem_used, sprintf("%.2f", $mem_used)
			    'free: ' . $mem_free_format,//$mem_avail - $fragsize, sprintf("%.2f", $mem_avail - $fragsize)
			    'hits: ' . sprintf("%.2f", $hits * 100 / ($hits + $misses)),
			    'misses: ' . sprintf("%.2f", $misses * 100 / ($hits + $misses)),
			    'request_rate: ' . sprintf("%.2f", $req_rate),
			    'hit_rate: ' . sprintf("%.2f", $hit_rate),
			    'miss_rate: ' . sprintf("%.2f", $miss_rate),
			    'insert_rate: ' . sprintf("%.2f", $insert_rate),
			    'entries: ' . $number_entries,
			    'inserts: ' . $inserts,
			    'purges: ' . $purges,
			
			  // TODO: Delete
			        'purge_rate: ' . sprintf("%.2f", (100 - ($number_entries / $inserts) * 100)),
			  // TODO: Delete
			        'fragment_percentage: ' . sprintf("%.2f", ($fragsize/$mem_avail)*100),
			        'fragmented: ' . sprintf("%.2f", $fragsize),
			        'fragment_segments: ' . $freeseg,
			  );
			}
			else {
			  $out = array('APC-not-installed');
			}
			
			//echo implode(' ', $out);
			$table='<table border="1">';
			$file='';
			
			foreach($out as $linea) {
				$file='<tr><td>'.$linea.'</td></tr>';
				$table.=$file;
				//echo($linea);
			}
			
			$table.='</table>';
			
			echo($table);
	}
	
} else if($type=='compile') {
	
	echo    '<pre>'.PHP_EOL;
	
	if(function_exists('apc_compile_file')){
	    define('APC_CLEAR_CACHE',           true);
	    define('APC_COMPILE_RECURSIVELY',   true);
	    define('APC_COMPILE_DIR',           '.');
	    //require 'apc_base.php';
	    echo    'APC Directory Compiler '.gmdate('Y-m-d H:i:s').PHP_EOL;
	    echo    PHP_EOL.'-------------------------'.PHP_EOL;
	    if(APC_CLEAR_CACHE){
	        echo    (apc_clear_cache() ? 'OK: CACHE CLEANED SUCESFUL' : 'ERROR: CACHE NO CLEANED').PHP_EOL;
	        var_dump(apc_cache_info());
	        echo    PHP_EOL.'-------------------------'.PHP_EOL;
	    }
	    echo    'RUNTIME ERRORS'.PHP_EOL;
	    echo    (apc_compile_dir(APC_COMPILE_DIR, APC_COMPILE_RECURSIVELY) ? 'OK: CACHE CREATED' : 'ERROR:CACHE NOT CREATED').PHP_EOL;
	    echo    PHP_EOL.'-------------------------'.PHP_EOL;
	    var_dump(apc_cache_info());
	}
	else
	    echo    'APC is not present, nothing to do.'.PHP_EOL;
	echo    '</pre>';

} else {
	echo('ERROR: NONE TASK');
}

?>