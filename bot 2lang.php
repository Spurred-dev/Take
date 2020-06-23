<?php
error_reporting(0);
if (!file_exists("_group.txt")) {
  $g = readline("group id : ");
  file_put_contents("_group.txt", $g);
}
if (!file_exists("_ad.txt")) {
  file_put_contents("_ad.txt", "");
}
if (!file_exists("_ch.txt")) {
  file_put_contents("_ch.txt", "@Spurred");
}
if (!file_exists("_users1.txt")) {
  file_put_contents("_users1.txt");
}
if (!file_exists("_users2.txt")) {
  file_put_contents("_users2.txt");
}
if (!file_exists("_name.txt")) {
  file_put_contents("_name.txt", "@Spurred");
}
if (!file_exists("_about.txt")) {
  file_put_contents("_about.txt", "@Spurred");
}
if (!file_exists("_type1.txt")) {
  file_put_contents("_type1.txt", "c");
}
if (!file_exists("_type2.txt")) {
  file_put_contents("_type2.txt", "c");
}
if (!file_exists("_lang.txt")) {
  file_put_contents("_lang.txt", "en");
}
if (!file_exists("_token.txt")) {
  $g = readline("token : ");
  file_put_contents("_token.txt", $g);
}

function bot($method, $datas = []) {
  $token = file_get_contents("_token.txt");
  $url = "https://api.telegram.org/bot$token/" . $method;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $res = curl_exec($ch);
  curl_close($ch);
  return json_decode($res, true);
  echo json_encode($res, true);
}
function getupdates($up_id) {
  $get = bot('getupdates', ['offset' => $up_id]);
  return end($get['result']);
}
$botuser = "@" . bot('getme', ['bot']) ["result"]["username"];
file_put_contents("_ad.txt", $botuser);
function acc($acc, $cc) {
  if ( file_get_contents("_lang.txt")=='fa'){
	  bot('sendMessage', ['chat_id' => $cc, 'text' => "درحال لاگین"]);
  }
  else{
	  bot('sendMessage', ['chat_id' => $cc, 'text' => "login in"]);
  }  
  if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
  }
  define('MADELINE_BRANCH', 'deprecated');
  include 'madeline.php';
  unlink("mdddd.madeline");
  unlink("mdddd.madeline.lock");
  $settings['app_info']['api_id'] = 579315;
  $settings['app_info']['api_hash'] = '4ace69ed2f78cec268dc7483fd3d3424';
  $MadelineProto = new \danog\MadelineProto\API('mdddd.madeline', $settings);
  try {
    $vv = $MadelineProto->phone_login($acc);
    echo json_encode($vv);
    if ( file_get_contents("_lang.txt")=='fa'){
		bot('sendMessage', ['chat_id' => $cc, 'text' => "حالا کد رو به این صورت بفرست : \n /co 11111"]);
	}
	else{
		bot('sendMessage', ['chat_id' => $cc, 'text' => "Now send me the code like this : \n /co code"]);
	}
}
  catch(Exception $e) {
   if ( file_get_contents("_lang.txt")=='fa'){
		bot('sendMessage', ['chat_id' => $cc, 'text' => "نمیتونم وارد اکانت شم"]);
	}
	else{
		bot('sendMessage', ['chat_id' => $cc, 'text' => "I can't login to account"]);
	}
    return false;
  }
  while (1) {
    echo "hi";
    $last_up = $last_up;
    $get_up = getupdates($last_up + 1);
    $last_up = $get_up['update_id'];
    $message = $get_up['message'];
    $userID = $message['from']['id'];
    $chat_id = $message['chat']['id'];
    $text = $message['text'];
    if ($text) {
      if (preg_match("/\/co (.*)/", $text)) {
        $code = explode(" ", $text) [1];
        try {
          if ($code != "") {
            $value = $MadelineProto->complete_phone_login(intval($code));
            echo json_encode($value);
            bot('sendMessage', ['chat_id' => $cc, 'text' => "done login now send /run"]);
            break;
          }
        }
        catch(Exception $e) {
          echo $e->getMessage();
          if ( file_get_contents("_lang.txt")=='fa'){
				bot('sendMessage', ['chat_id' => $cc, 'text' => "لاگین با موفقیت انجام شد"]);
			}
			else{
				bot('sendMessage', ['chat_id' => $cc, 'text' => "login seccessfuly completed"]);
			}
		}
      }
    }
    sleep(1);
  }
}
function random($one, $t) {
  $out = "";
  $randomx = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
  $randomxx = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
  if ($t == "@") {
    for ($i = 0;$i < count($randomx);$i++) {
      $two = $randomx[$i];
      $out = $out . "@" . $one . $two . $two . $two . $two . "\n";
    }
    return $out;
  }
  elseif ($t == "b") {
    for ($i = 0;$i < count($randomx);$i++) {
      $two = $randomx[$i];
      $out = $out . $one . $two . $two . $two . $two . "\n";
    }
    return $out;
  }
  elseif ($t == "zx") {
    $ex = explode("-", $one);
    $o = $ex[0];
    $t = $ex[1];
    $out = $out . "@" . $o . $t . $t . $t . $t . "\n";
    $out = $out . "@" . $t . $o . $t . $t . $t . "\n";
    $out = $out . "@" . $t . $t . $o . $t . $t . "\n";
    $out = $out . "@" . $t . $t . $t . $o . $t . "\n";
    $out = $out . "@" . $t . $t . $t . $t . $o . "\n";
    $out = $out . "@" . $t . $o . $o . $o . $o . "\n";
    $out = $out . "@" . $o . $t . $o . $o . $o . "\n";
    $out = $out . "@" . $o . $o . $t . $o . $o . "\n";
    $out = $out . "@" . $o . $o . $o . $t . $o . "\n";
    $out = $out . "@" . $o . $o . $o . $o . $t . "\n";
    return $out;
  }
  elseif ($t == "*") {
    if (!preg_match("/^=/", $one)) {
      for ($i = 0;$i < count($randomx);$i++) {
        $two = $randomx[$i];
        $set = str_replace("=", $two, $one);
        $out = $out . "@" . $set . "\n";
      }
      return $out;
    }
    else {
      for ($i = 0;$i < count($randomxx);$i++) {
        $two = $randomxx[$i];
        $set = str_replace("=", $two, $one);
        $out = $out . "@" . $set . "\n";
      }
      return $out;
    }
  }
  elseif (preg_match("/list/", $t)) {
    $b = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    $o = explode("--", $t) [1];
    for ($y = 0;$y < count($b);$y++) {
      $n = $b[$y];
      print ($o . "-----" . $n . "\n");
      $out = $out . "@" . $o . $n . $n . $n . $n . "\n";
      $out = $out . "@" . $n . $o . $n . $n . $n . "\n";
      $out = $out . "@" . $n . $n . $o . $n . $n . "\n";
      $out = $out . "@" . $n . $n . $n . $o . $n . "\n";
      $out = $out . "@" . $n . $n . $n . $n . $o . "\n";
    }
    return $out;
  }
  elseif (preg_match("/nlis/", $t)) {
    $b = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    $o = explode("--", $t) [1];
    for ($y = 0;$y < count($b);$y++) {
      $n = $b[$y];
      print ($o . "-----" . $n . "\n");
      $out = $out . $n . $o . $n . $n . $n . "\n";
      $out = $out . $n . $n . $o . $n . $n . "\n";
      $out = $out . $n . $n . $n . $o . $n . "\n";
      $out = $out . $n . $n . $n . $n . $o . "\n";
    }
    return $out;
  }
}
function countUsers1($u = "2", $t = "2") {
  $lists1 = explode("\n", file_get_contents("_users1.txt"));
  $list1 = "";
  $i = 1;
  foreach ($lists1 as $user) {
    if ($user != "") {
      $list1 = $list1 . "\n$i - @$user";
      $i++;
    }
  }
  if ($list1 == "") {
    return "no user";
  }
  else {
    return $list1;
  }
  if ($t = "1") {
    $lists1 = explode("\n", $u);
    $list1 = "";
    $i = 1;
    foreach ($lists1 as $user) {
      if ($user != "") {
        $list1 = $list1 . "\n$i - @$user";
        $i++;
      }
    }
    if ($list1 == "") {
      return "no user";
    }
    else {
      return $list1;
    }
  }
}
function countUsers2($u = "2", $t = "2") {
  $lists2 = explode("\n", file_get_contents("_users2.txt"));
  $list2 = "";
  $i = 1;
  foreach ($lists2 as $user) {
    if ($user != "") {
      $list2 = $list2 . "\n$i - @$user";
      $i++;
    }
  }
  if ($list2 == "") {
    return "no user";
  }
  else {
    return $list2;
  }
  if ($t = "1") {
    $lists2 = explode("\n", $u);
    $list2 = "";
    $i = 1;
    foreach ($lists2 as $user) {
      if ($user != "") {
        $list2 = $list2 . "\n$i - @$user";
        $i++;
      }
    }
    if ($list2 == "") {
      return "no user";
    }
    else {
      return $list2;
    }
  }
}
function stats1($nn){
	$set1 = "";
	$x1 = shell_exec("pm2 show $nn");
	if (preg_match("/online/", $x1)) {
		$set1 = "run";
	}else{
		$set1 = "stop";
	}
	return $set1;
}
function stats2($nnn){
	$set2 = "";
	$x2 = shell_exec("pm2 show $nnn");
	if (preg_match("/online/", $x2)) {
		$set2 = "run";
	}else{
		$set2 = "stop";
	}
	return $set2;
}
function run($update) {
  $nn = '1checker';
  $nnn  = 'checker2';
  $message = $update['message'];
  $userID = $message['from']['id'];
  $chat_id = $message['chat']['id'];
  $text = $message['text'];
  $date = $update['callback_query']['data'];
  $group = file_get_contents("_group.txt");
  if (preg_match("/\/send (.*)/", $text)) {
    $f = str_replace("/send ", "", $text);
    bot('sendMessage', ['chat_id' => $group, 'text' => $f]);
  }
  if ($chat_id == $group) {
    $lists1 = explode("\n", file_get_contents("_users1.txt"));
	$lists2 = explode("\n", file_get_contents("_users2.txt"));
    if (preg_match("/\/add1 @(.*)/", $text)) {
      $user = explode("@", $text) [1];
      if (!in_array($user, $lists1)) {
        file_put_contents("_users1.txt", "\n" . $user, FILE_APPEND);
		if ( file_get_contents("_lang.txt")=='fa'){
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "یوزر به لیست 1 اضافه شد: @$user"]);
		}
		else{
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "user added to list 1: @$user"]);
		}
	  
      }
      else {
		  if ( file_get_contents("_lang.txt")=='fa'){
			  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "یوزر قبلا وجود داشت @$user"]);
		  }
		  else{
			  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "The user already exists @$user"]);
		  }
      }
    }
	if (preg_match("/\/add2 @(.*)/", $text)) {
      $user = explode("@", $text) [1];
      if (!in_array($user, $lists2)) {
        file_put_contents("_users2.txt", "\n" . $user, FILE_APPEND);
		if ( file_get_contents("_lang.txt")=='fa'){
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "یوزر به لیست 2 اضافه شد: @$user"]);
		}
		else{
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "user added to list 2: @$user"]);
		}
	  
      }
      else {
		  if ( file_get_contents("_lang.txt")=='fa'){
			  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "یوزر قبلا وجود داشت @$user"]);
		  }
		  else{
			  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "The user already exists @$user"]);
		  }
      }
    }
    if (preg_match("/\/lang (.*)/", $text)) {
      $lang = explode(" ", $text) [1];
      file_put_contents("_lang.txt", $lang);
	  if ( file_get_contents("_lang.txt")=='fa'){
		  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "زبان به فارسی تغییر کرد"]);
	  }
	  else{
		  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "done change the language to en"]);
	  }
	  
      
    }
	if (preg_match("/\/set1 (.*)/", $text)) {
      $t = explode(" ", $text) [1];
      file_put_contents("_type1.txt", $t);
	  if ( file_get_contents("_lang.txt")=='fa'){
		bot('sendMessage', ['chat_id' => $chat_id, 'text' => "تایپ چکر 1 تغییر کرد به: $t"]);
	  }
	  else{
		  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "done change the checker 1 type to $t"]);
	  }
    }
	if (preg_match("/\/set2 (.*)/", $text)) {
      $t = explode(" ", $text) [1];
      file_put_contents("_type2.txt", $t);
	  if ( file_get_contents("_lang.txt")=='fa'){
		bot('sendMessage', ['chat_id' => $chat_id, 'text' => "تایپ چکر2 تغییر کرد به: $t"]);
	  }
	  else{
		  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "done change the checker 2 type to $t"]);
	  }
    }
	if (preg_match("/\/del1 @(.*)/", $text)) {
      $user = explode("@", $text) [1];
      if (in_array($user, $lists1)) {
        $data1 = str_replace("\n" . $user, "", file_get_contents("_users1.txt"));
        file_put_contents("_users1.txt", $data1);
		if ( file_get_contents("_lang.txt")=='fa'){
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "یوزر از لیست 1 حذف شد: @$user"]);
		}
		else{
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "user deleted from list 1: @$user"]);
		}
      }
    }
	if (preg_match("/\/del2 @(.*)/", $text)) {
      $user = explode("@", $text) [1];
      if (in_array($user, $lists2)) {
        $data2 = str_replace("\n" . $user, "", file_get_contents("_users2.txt"));
        file_put_contents("_users2.txt", $data);
		if ( file_get_contents("_lang.txt")=='fa'){
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "یوزر از لیست 2 حذف شد @$user"]);
		}
		else{
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "user deleted from list 2: @$user"]);
		}
      }
    }
    if (preg_match("/\/list (.*)/", $text)) {
      if (preg_match("/-/", $text)) {
        $d = str_replace("/list ", "", $text);
        $x = random($d, "zx");
        bot('sendMessage', ['chat_id' => $group, 'text' => $x, ]);
      }
      elseif (!preg_match("/-/", $text) && !preg_match("/_/", $text)) {
        $d = str_replace("/list ", "", $text);
        echo $d;
        $x = random($d, "@");
        bot('sendMessage', ['chat_id' => $group, 'text' => $x, ]);
      }
      elseif (preg_match("/=/", $text)) {
        $d = str_replace("/list ", "", $text);
        echo $d;
        $x = random($d, "*");
        bot('sendMessage', ['chat_id' => $group, 'text' => $x, ]);
      }
    }
    if (preg_match("/\/delete/", $text)) {
      file_put_contents("_users1.txt", "");
	  file_put_contents("_users2.txt", "");
	  if ( file_get_contents("_lang.txt")=='fa'){
		  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "لیست ها پاکسازی شدند"]);
	  }
	  else{
	      bot('sendMessage', ['chat_id' => $chat_id, 'text' => "Both list cleared"]);
	  }
    }
	if (preg_match("/\/delall1/", $text)) {
      file_put_contents("_users1.txt", "");
	  if ( file_get_contents("_lang.txt")=='fa'){
		  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "لیست 1 پاکسازی شد"]);
	  }
	  else{
	      bot('sendMessage', ['chat_id' => $chat_id, 'text' => "All saved users from list 1 deleted"]);
	  }
    }
	if (preg_match("/\/delall2/", $text)) {
	  file_put_contents("_users2.txt", "");
	  if ( file_get_contents("_lang.txt")=='fa'){
		  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "لیست 2 پاکسازی شد"]);
	  }
	  else{
	      bot('sendMessage', ['chat_id' => $chat_id, 'text' => "All saved users from list 2 deleted"]);
	  }
    }
    if (preg_match("/\/list1/", $text)) {
		if ( file_get_contents("_lang.txt")=='fa'){
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "لیست 1: \n " . countUsers1() ]);
		}
		else{
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "list 1 usernames: \n " . countUsers1() ]);
		}
    }
	if (preg_match("/\/list2/", $text)) {
		if ( file_get_contents("_lang.txt")=='fa'){
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "لیست 2: \n " . countUsers2() ]);
		}
		else{
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "list 2 usernames: \n " . countUsers2() ]);
		}
    }
	if (preg_match("/\/lists/", $text)) {
		if ( file_get_contents("_lang.txt")=='fa'){
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "لیست 1: \n " . countUsers1() ]);
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "لیست 2: \n " . countUsers2() ]);
		}
		else{
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "list 1 usernames: \n " . countUsers1() ]);
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "list 2 usernames: \n " . countUsers2() ]);
		}
    }
    if (preg_match("/\/info/", $text)) {
      $t1 = file_get_contents("_type1.txt");
	  $t2 = file_get_contents("_type2.txt");
      $n = file_get_contents("_name.txt");
      $a = file_get_contents("_about.txt");
      $c = file_get_contents("_ch.txt");
      $set1 = stats1($nn);
	  $set2 = stats2($nnn);
	  if ( file_get_contents("_lang.txt")=='fa'){
		  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "🔰وضعیت چکر 1:\n ⭕️ $set1\n🔰 وضعیت چکر 2:\n ⭕️ $set2\n🔰 نوع چکر1 :\n ⭕️ $t1\n🔰 نوع چکر2 :\n ⭕️ $t2\n🔰نام کانال :\n ⭕️ $n\n🔰درباره کانال :\n ⭕️ $a\n🔰حق پیام :\n ⭕️ $c"]);
	  }
	  else{
		  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "🔰checker1 stats :\n ⭕️ $set1\n🔰checker2 stats :\n ⭕️ $set2\n🔰checker1 type :\n ⭕️ $t1\n🔰checker2 type :\n ⭕️ $t2\n🔰channel name :\n ⭕️ $n\n🔰channe about :\n ⭕️ $a\n🔰msg rights :\n ⭕️ $c"]);
	  }
    }
	 if (preg_match("/\/start/", $text)) {
	 bot('sendMessage', ['chat_id' => $chat_id, 'text' => "wellcome to Ashy grim Taker

get command list:
/help
لیست دستورات:
/help"]);
	 }
    if (preg_match("/\/help/", $text)) {
    	  if ( file_get_contents("_lang.txt")=='fa'){
			  			  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "
❕راهنمای دستورات❗️

🔰 تنظیمات کلی 

🆘| /help
❕لیست دستورات 
🇮🇷| /lang fa/en 
❗️انتخاب زبان
☸| /info 
❕اطلاع از وضعیت ربات
______________________
🔰خاموش و روشن کردن ربات

🔔| /runall
❗️شروع کار هردو چکر
🔔| /run1 
❕شروع کار چکر اول
🔔| /run2 
❗️شروع کار چکر دوم
🔕| /stopall 
❕توقف کار دو چکر
🔕| /stop1 
❗️توقف کار چکر اول
🔕| /stop2 
❕توقف کار چکر دوم

⭕️چکر اول به لیست 1 متصل است
⭕️چکر دوم به لیست 2 متصل است
______________________ 
🔰تنظیمات اکانت

📵| /acc +98*******
❗️وصل کردن اکانت به ربات
______________________
🔰اضافه و حذف لیست ها

🆔| /add1 @username
❕اضافه کردن ایدی به لیست 1
🆔| /add2 @username
❗️ اضافه کردن ایدی به لیست 2
❌| /del1 @username
❗حذف ایدی از لیست 1
❌| /del2 @username 
❕حذف ایدی از لیست 2
❎| /delall1
❗️ حذف کامل لیست 1  
❎| /delall2
❕ حذف کامل لیست 2 
❎| /delete
❗️ حذف کامل هردو لیست
______________________
🔰مشاهده لیست ها

📜| /list1
❕مشاهده لیست 1 
📜| /list2
❗️مشاهده لیست 2
📜| /lists
❕مشاهده لیست 1 و 2
______________________
🔰تنظیم مود چکر

🔰| /set1 a/c 
❕تنظیم مود چکر 1
🔰| /set2 a/c 
❗️تنظیم مود چکر 2

⭕️a:اکانت
⭕️c:کانال 
______________________
🔰امکانات جانبی

🔡| /sn name
❗️تنظیم نام کانال 
✳️| /sa name
❕تنظیم درباره ی کانال
🌀| /list name
❗️ساخت لیست تصادفی از ایدی ها
🔄| /sm name
❕تنظیم حقوق پیام

⭕️به جای name کارکتر مورد نظر خود را بنویسید
——————————————
🔱 سازنده: @Spurred ! "]);
			  
		  }
		  else{
			  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "❕Command list❗️

🔰 General settings 

🆘| /help
❕Get command list
🇺🇸| /lang fa/en 
❗️choose language 
☸| /info 
❕Get stats of bot
______________
🔰Turn on and off 

🔔| /runall
❗Start both checkers
🔔| /run1 
❕Start the first checker
🔔| /run2 
❗Start the second checker 
🔕| /stopall 
❕Stop both checkers
🔕| /stop1 
❗Stop the first checker
🔕| /stop2 
❕Stop the second checker 

⭕️Checker 1 is connected to list 1
⭕️Checker 2 is connected to list 2
______________ 
🔰Account settings 

📵| /acc +98*******
❗️connect an account to Bot
______________
🔰Add and delete lists

🆔| /add1 @username
❕Add a username to list 2 
🆔| /add2 @username
❗️Add a username to list 2
❌| /del1 @username
❗Delete a username from list 1
❌| /del2 @username 
❕Delete a username from list 2
❎| /delall1
❗️ Delete list 1
❎| /delall2
❕ Delete list 2
❎| /delete
❗️Delete both list
______________
🔰 See lists

📜| /list1
❕See list 1
📜| /list2
❗️See list 2
📜| /lists
❕See list 1 and 2
______________
🔰Set mode of checkers

🔰| /set1 a/c 
❕Set mode of checker1
🔰| /set2 a/c 
❗️Set mode of checker2

⭕️a: Account 
⭕️c: Channel 
______________
🔰Side features:

🔡| /sn name
❗Set channel name 
✳️| /sa name
❕Set About channel
🌀| /list name
❗️Random username list
🔄| /sm name
❕Set msg Rights

⭕️put everything you want instead of 'name' 
——————————————
🔱 Creator: @Spurred ! "]);

		  }
    }
    if (preg_match("/\/sn (.*)/", $text)) {
      $t = explode(" ", $text) [1];
      file_put_contents("_name.txt", $t);
	  if ( file_get_contents("_lang.txt")=='fa'){
		  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "اسم کانال عوض شد به: $t"]);
	  }
	  else{
		  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "done change the name to $t"]);
	  }
    }
    if (preg_match("/\/sa (.*)/", $text)) {
      $t = explode(" ", $text) [1];
      file_put_contents("_about.txt", $t);
	  	if ( file_get_contents("_lang.txt")=='fa'){
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "درباره عوض شد به: $t"]);
		}
		else{
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "done change the About to $t"]);
		}
    }
    if (preg_match("/\/sm (.*)/", $text)) {
      $t = explode(" ", $text) [1];
      file_put_contents("_ch.txt", $t);
		if ( file_get_contents("_lang.txt")=='fa'){
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "حقوق تعلق داده شد به: $t"]);
		}
		else{
			bot('sendMessage', ['chat_id' => $chat_id, 'text' => "done change the msg to $t"]);
		}
    }
    if (preg_match("/\/acc /", $text)) {
      exec("pm2 stop $nn");
	  exec("pm2 stop $nnn");
      $acc = explode(" ", $text) [1];
      acc($acc, $chat_id);
    }
    if (preg_match("/\/runall/", $text)) {
      exec("pm2 stop $nn");
	  exec("pm2 stop $nnn");
      exec("pm2 start run1.php --name $nn");
	  exec("pm2 start run2.php --name $nnn");
    }
	if (preg_match("/\/run1/", $text)) {
      exec("pm2 stop $nn");
	  exec("pm2 stop $nnn");
      exec("pm2 start run1.php --name $nn");
    }
	if (preg_match("/\/run2/", $text)) {
      exec("pm2 stop $nn");
	  exec("pm2 stop $nnn");
	  exec("pm2 start run2.php --name $nnn");
    }
    if (preg_match("/\/stopall/", $text)) {
      exec("pm2 stop $nn");
	  exec("pm2 stop $nnn");
	  if ( file_get_contents("_lang.txt")=='fa'){
		bot('sendMessage', ['chat_id' => $chat_id, 'text' => "چکر ها متوقف شدند"]);
	  }
	  else{
		bot('sendMessage', ['chat_id' => $chat_id, 'text' => "2 checkers stoped"]);
	  }
    }
	if (preg_match("/\/stop1/", $text)) {
      exec("pm2 stop $nn");
	  if ( file_get_contents("_lang.txt")=='fa'){
		bot('sendMessage', ['chat_id' => $chat_id, 'text' => "چکر 1 متوقف شد"]);
	  }
	  else{
		bot('sendMessage', ['chat_id' => $chat_id, 'text' => "checker1 stoped"]);
	  }
    }
	if (preg_match("/\/stop2/", $text)) {
      exec("pm2 stop $nnn");
	  if ( file_get_contents("_lang.txt")=='fa'){
		bot('sendMessage', ['chat_id' => $chat_id, 'text' => "چکر 2 متوقف شد"]);
	  }
	  else{
		bot('sendMessage', ['chat_id' => $chat_id, 'text' => "checker2 stoped"]);
	  }
    }
  }
}
while (true) {
  $last_up = $last_up;
  $get_up = getupdates($last_up + 1);
  $last_up = $get_up['update_id'];
  run($get_up);
  sleep(1);
}
