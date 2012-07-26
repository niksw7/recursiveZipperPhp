


// anew line is added
function unzipfiles($srczip,$destzip)
{
  
$zip = new ZipArchive;
     $res = $zip->open($srczip);
     if ($res === TRUE) {
         $zip->extractTo($destzip);// c:\do
         $zip->close();
		 $filelist=scandir($destzip,1);
		 foreach($filelist as $file)
		{
			//echo 'insid foreach    '.'=='.substr($file,-3,3).'<br/>';
		if(substr($file,-3,3)=="zip")
		{
			//this is  a comment to just check the working.
			//echo 'src1='."$destzip.'/'.$file".'<br/>dest1='."$destzip/".substr($file , 0, strlen($file)-4  );
			unzipfiles($destzip.'/'.$file, $destzip.'/'.substr($file , 0, strlen($file)-4  ) ) ;
			
			}	
		} 
		 
		// print_r($filelist);
         return 1;
     } else {
         return 0;
     }
}