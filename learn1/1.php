<?php
/*正则表达式基础
	行定位符：^表示行的开始 $表示行的结尾
	单词定界符：\b匹配的是单词 \B匹配的是其他单词的一部分
	[]方括号只匹配一个字符
	选择字符：|
	连字符：- [a-zA-Z]
	排除字符：^在[]中，[^a-z]
	限定符：?匹配0或1次、+匹配1或多次、*匹配0或多次、{n}匹配前面字符n次、{n,}匹配最少n次、{n,m}最少n次最多m次
	点号字符：.匹配除了换行符外任意一个字符
	转义字符：\
	括号字符：() [0-9]{1,3}(\.[0-9]{1,3}){3}
	模式修饰符：i忽略大小写 m多文本模式
*/

	// 1
	date_default_timezone_set('PRC');
	echo date('Y-n-d H:i:s')."\n";
	
	// 字符串->数组
	$str = 'www.baidu.com';
	print_r(str_split($str,3));	
	print_r(explode('.',$str));

	//数组->字符串
	$arr = array('aaa','bbb','ccc');
	print_r(implode('',$arr)."\n");
	
	//字符串截取
	printf(substr($str,3,4)."\n");
	$str = "我叫刘晓跃，来着中国广东";
	// 按照字符数
	printf(mb_substr($str,1,5)."\n");
	// 按照字节数
	printf(mb_strcut($str,1,5)."\n");

	// 字符串替换
	$bodytag = str_replace("%body%","black","<body text='%body%'>");
	echo $bodytag."\n";
	$bodytag = preg_replace('/\%body\%/','blue',"<body text='%body%'>");
	echo $bodytag."\n";
	$str="linux is very much php";
	echo preg_replace('/linux|php/','java',$str)."\n";	
		
	// 字符串查找
	$str = "/web/a/b/index.html";
	// 第一个/的位置
	$pos = strpos($str,'/'); echo $pos."\n";
	// 最后一个/的位置
	$pos = strrpos($str,'/');echo substr($str,$pos+1)."\n";	
	// basename() dirname()
	$str = "pap is pbp and pcp";
	// 第一次匹配后停止
	preg_match('/p.p/',$str,$ms);
	var_dump($ms);
	// 一直搜索多次匹配
	preg_match_all('/p.p/',$str,$ms);
	var_dump($ms);
	$array = array("23.32","2.2.2","12.009","23.43.43");
        print_r(preg_grep("/^(\d+)?\.\d+\.\d+$/",$array));
	$email="name@example.com";
	// @以及之后部分
	echo strstr($email,'@')."\n";
	// @之前部分
	echo strstr($email,'@',true)."\n";


// 3,解释一下 PHP 的类中:protect,public,private,interface,abstract,final,static 的含义
/*
	public protected private 封装 继承 多态
	interface 接口，implement
	abstract 抽象类,不能被实例化的类，作为其他类的父类使用
	final 最后的类和方法，不能再有子类
	static 静态方法和属性，用于直接调用，类内部用self:: 外部用 classname::
*/
	class Book{
		// const static 位于data共享分区
		public static  $name = 'liuxiaoyue';
	        // 位于各个class的内存 栈？
		private $type = "book";
		public  function get_name(){
			echo self::$name."\n";
		}	
		public function set_name($name){
			self::$name = $name;
		}
		public  function get_type(){
			echo $this->type."\n";
		}	
		public function set_type($type){
			$this->type = $type;
		}

	}
	//$book = new Book;
	//$book->get_name();
	//echo Book::$name."\n";
	//Book::get_name();
	$obj = new Book();
	$obj2 =$obj;
	$obj3 = clone $obj;
	$obj->set_type("computer");
	$obj2->get_type();
	$obj3->get_type();



	$date='08/26/2003';
	echo preg_replace("/([0-9]+)\/([0-9]+)\/([0-9]+)/","\${3}/\${1}/\${2}",$date)."\n";
	 echo preg_replace('/(\d+)\/(\d+)\/(\d+)/',"$3/$1/$2",$date)."\n";


	

/*
	select * from login where name like '%admin%' limit 10 order by id;

	6,解释:左连接,右连接,内连接,索引
	left join、
	以左边为主导
	right join、
	
	inner join、
		
	index：提高检索速度 主键索引 唯一索引 普通索引
	desc select * from user where username="user5"\G;
	alter table user add index in_username(username);

	发过帖子的人：select user.username,post.info from user,post where user.id=post.user_id;
	发过帖子的人：select user.username,post.info from user inner join post on user.id=post.user_id;
	所有人发过什么帖子：select user.username,post.info from user left join post on user.id=post.user_id;
	所有人发过什么帖子：select user.username,post.info from post right join user on user.id=post.user_id;

*/




// 8,写一个函数,尽可能高效的,从一个标准 url 里取出文件的扩展名
// 高效 用官方函数  用字符串代替正则
	$url = "http://www.baidu.com/abc/de/fg.php?id=9";
	// 解析url
	$arr = parse_url($url);
	$path = $arr['path'];
	// 解析文件路径信息
	$arr2 = pathinfo($path);
	var_dump($arr2);










