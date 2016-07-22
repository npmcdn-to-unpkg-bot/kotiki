<?php
	//Класс базы данных
	class Tdb
	{
		public $login;
		public $pass;
		public $host;
		public $port;
		public $dbname;
		public $bConnected;
		public $mysqli;
		function __construct($plogin,$ppass,$pdbname,$phost="127.0.0.1")
		{
			$this->login=$plogin;
			$this->pass=$ppass;
			$this->host=$phost;
			$this->port=3306;
			$this->dbname=$pdbname;
			$this->bConnected=false;
		}

		//Инициализация
		public function init()
		{
			date_default_timezone_set("Europe/Moscow");
			$data=
			array(
				"usr_admin" => array(			//Таблица администраторов
					"id"=>array("counter",0),
					"email"=>array("text",0),	//Логин/email
					"pass"=>array("text",0),	//Пароль
					"data"=>array(
						array(
							"email"=>"email@gmail.com",
							"pass"=>"123"
						)
					),
					"repeat"=>1,					//Количество однотипных строк
				),

				"proj" => array(					//Таблица проекты
					"id"=>array("counter",0),
					"hdr_shrt"=>array("text",0),	//Короткий заголовок проекта
					"desc_shrt"=>array("text",0),	//Короткое описание проекта
					"hdr_ful"=>array("text",0),		//Полный заголовок проекта в отдельном окне
					"desc_ful"=>array("text",0),	//Полное описание проекта в отдельном окне
					"data"=>array(
						array(
							"hdr_shrt"=>"Короткий заголовок проекта",
							"desc_shrt"=>"Короткое описание проекта",
							"hdr_ful"=>"Полный заголовок проекта в отдельном окне",
							"desc_ful"=>"Полное описание проекта в отдельном окне"
						)
					),
					"repeat"=>20,					//Количество однотипных строк
				),

				"imgs" => array(					//Таблица Картинки
					"id"=>array("counter",0),
					"id_proj"=>array("int",11),		//id проекта
					"fpath"=>array("text",0),		//Путь до файла
					"ftitle"=>array("text",0),		//Заголовок файла
					"fhref"=>array("text",0),		//Ссылка на файл на стороннем ресурсе
					"whtuse"=>array("int",2),		//1-Использовать ссылку на сторонний ресурс 0-использовать локальный ресурс
					"sz"=>array("int",11),			//размер файла
					"data"=>array(
						array(
							"id_proj"=>"1",
							"fpath"=>"files/code.zip",
							"ftitle"=>"Скачать файл",
							"fhref"=>"http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip",
							"whtuse"=>"0",
							"sz"=>0
						)
					),
					"repeat"=>20,					//Количество однотипных строк
				),

				"fils" => array(					//Таблица файлы
					"id"=>array("counter",0),
					"id_proj"=>array("int",11),		//id проекта
					"fpath"=>array("text",0),		//Путь до файла
					"ftitle"=>array("text",0),		//Заголовок файла
					"fhref"=>array("text",0),		//Ссылка на файл на стороннем ресурсе
					"whtuse"=>array("int",2),		//1-Использовать ссылку на сторонний ресурс 0-использовать локальный ресурс
					"sz"=>array("int",11),			//размер файла
					"data"=>array(
						array(
							"id_proj"=>"1",
							"fpath"=>"files/code.zip",
							"ftitle"=>"Скачать файл",
							"fhref"=>"http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip",
							"whtuse"=>"0",
							"sz"=>0
						)
					),
					"repeat"=>20,					//Количество однотипных строк
				),

				"tags" => array(					//Таблица облака тегов
					"id"=>array("counter",0),
					"proj_id"=>array("int",11),		//id проекта
					"tag"=>array("text",0),			//текст тега
					"tag_pri"=>array("int",5),		//Приоритет тега 0-без приоритета в конец
					"data"=>array(
						array(
							"proj_id"=>"1",
							"tag"=>"javascript",
							"tag_pri"=>"0"
						)
					),
					"repeat"=>10,
				),

				"cards" => array(					//Таблица карт
					"id"=>array("counter",0),
					"hdr_card"=>array("text",0),	//заголовок карты
					"desc_card"=>array("text",0),	//описание карты
					"data"=>array(
						array(
							"hdr_card"=>"Заголовок карты",
							"desc_card"=>"Текст карты"
						)
					),
					"repeat"=>10,
				),

				"proj_tags" => array(				//Таблица связи проекта и тега
					"id"=>array("counter",0),
					"id_proj"=>array("int",11),		//id проекта
					"id_tag"=>array("int",11),		//id тега
					"data"=>array(
						array(
							"id_proj"=>"1",
							"id_tag"=>"1"
						)
					),
					"repeat"=>10,
				),

				"proj_cards" => array(				//Таблица связи проекта и карты
					"id"=>array("counter",0),
					"id_proj"=>array("int",11),		//id проекта
					"id_card"=>array("int",11),		//id карты
					"num"=>array("int",11),			//номер проекта в карте
					"data"=>array(
						array(
							"id_proj"=>"1",
							"id_card"=>"1",
							"num"=>"1"
						)
					),
					"repeat"=>10,
				)

			);

			$qry="";
			foreach(array_keys($data) as $tblname)
			{
				$datas=array();
				$qry="DROP TABLE ".$tblname;
				$this->mysqli->query($qry);

				//repeat
				$repeat_count=0;
				foreach(array_keys($data[$tblname]) as $field)
				{
					if($field=="repeat")	$repeat_count=$data[$tblname][$field];
				}
				//Создание таблицы и заполнение
				$qry="CREATE TABLE ".$tblname."(";				
				//Массив таблицы
				foreach(array_keys($data[$tblname]) as $field)
				{
					//Проход по полям
					$field_one=$data[$tblname][$field];
					if($field!="data" && $field!="repeat")
					{
						if ($field_one[0] == "counter")
							$qry .= $field . " INT NOT NULL AUTO_INCREMENT PRIMARY KEY,";
						else
						{
							if($field_one[1]==0)
								$qry .= $field . " " . $field_one[0].",";
							else
								$qry .= $field . " " . $field_one[0] . "(" . $field_one[1] . "),";
						}
					}
				}
				$qry=substr($qry,0,-1).")";
				//Создание таблицы
				if(!$this->mysqli->query($qry))
					print("Error ".$qry."<br>");

				//Вставка данных в таблицу
				$datas=$data[$tblname]["data"];
				for($ii=0;$ii<$repeat_count;$ii++)
				for($i=0;$i<count($datas);$i++)
				{
					$onedata=$datas[$i];
					$arrs=array();
					$arrs_quot=array();
					$qry="INSERT INTO ".$tblname." (";
					foreach(array_keys($onedata) as $field)
					{
						$qry.=$field.",";
						array_push($arrs,$onedata[$field]);
						$type=$data[$tblname][$field][0];
						$quot="";
						if($type=="char" ||$type=="text" ||$type=="date" ||$type=="time")
							$quot="\"";
						array_push($arrs_quot,$quot);
					}
					$qry=substr($qry,0,-1).") VALUES (";
					for($j=0;$j<count($arrs);$j++)
					{
						$qry.=$arrs_quot[$j].$arrs[$j].$arrs_quot[$j].",";
					}
					$qry=substr($qry,0,-1);
					$qry.=")";
					if(!$this->mysqli->query($qry))
						print("Error ".$qry." ".$this->mysqli->error."<br>");
				}
			}
		}

		public function connect()
		{
			$this->bConnected=true;
			$this->mysqli = new mysqli($this->host, $this->login, $this->pass, $this->dbname);
			if (mysqli_connect_error())
			{
				$this->bConnected=false;
				print("DB not connected");
				exit(0);
			}
			$this->mysqli->set_charset("utf8");
		}

		function __destruct()
		{
			$this->mysqli->close();
		}
	}
?>