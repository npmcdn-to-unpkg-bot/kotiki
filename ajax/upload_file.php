<?php
	//Сгенерировать имя файла
	function genFilName($len)
	{
		$alf="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$res="";
		for($i=0;$i<$len;$i++)
		{
			$indx=rand(0,strlen($alf)-1);
			$res.=substr($alf,$indx,1);
		}
		return $res;
	}

	$path=substr($_SERVER['SCRIPT_FILENAME'],0,strrpos($_SERVER['SCRIPT_FILENAME'],"/"));
	$path=substr($path,0,strrpos($path,"/")+1)."files/tmp/";

	$path_url=substr($_SERVER['SCRIPT_NAME'],0,strrpos($_SERVER['SCRIPT_NAME'],"/"));
	$path_url=substr($path_url,0,strrpos($path_url,"/")+1);
	$path_url="http://".$_SERVER["HTTP_HOST"].$path_url."files/";

	//Подготовка временной папки
	function clear_path($pth_dir)
	{
		$files1 = scandir($pth_dir);
		for($i=0;$i<count($files1);$i++)
			if($files1[$i]!=".keep" && $files1[$i]!="." && $files1[$i]!="..")		unlink($pth_dir.$files1[$i]);
	}
	if(!file_exists($path)) 	mkdir($path);
	else						clear_path($path);

	if(isset($_FILES["file"]["tmp_name"]))
	{
		$forig_name=$_FILES["file"]["name"];
		$ext="";
		$indx=strrpos($forig_name,".");
		if(!($indx===false))
		{
			$ext=substr($forig_name,$indx);
		}
		$fname_gen=genFilName(10).$ext;
		$path_out=$path.$fname_gen;
		$url_out=$path_url.$fname_gen;
		move_uploaded_file($_FILES["file"]["tmp_name"], $path_out);
		print("[\"".$path_out."\",\"".$url_out."\",\"".$fname_gen."\"]");
	}
	else
		print("error");
?>