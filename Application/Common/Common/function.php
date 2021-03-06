<?php


	function get_avatar_name(){
		return 'temp';
	}
	
    function sendMail($to, $title, $content) {
     
        Vendor('PHPMailer.PHPMailerAutoload');     
        $mail = new PHPMailer(); //实例化
        $mail->IsSMTP(); // 启用SMTP
        $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
        $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
        $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
        $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
        $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
        $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
        $mail->AddAddress($to,"尊敬的客户");
        $mail->WordWrap = 50; //设置每行字符长度
        $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
        $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
        $mail->Subject =$title; //邮件主题
        $mail->Body = $content; //邮件内容
        $mail->AltBody = ""; //邮件正文不支持HTML的备用显示
        return($mail->Send());
    }

    function subtext($text, $length)
    {
    	if(mb_strlen($text, 'utf8') > $length)
    		return mb_substr($text, 0, $length, 'utf8').'...';
    	return $text;
    }
    

    /**
    * 格式化字节大小
    * @param  number $size      字节数
    * @param  string $delimiter 数字和单位分隔符
    * @return string            格式化后的带单位的大小
    * @author slackck <876902658@qq.com>
    */
    function format_bytes($size, $delimiter = '') {
    $units = array(' B', ' KB', ' MB', ' GB', ' TB', ' PB');
    		for ($i = 0; $size >= 1024 && $i < 5; $i++) $size /= 1024;
    		return round($size, 2) . $delimiter . $units[$i];
    }
    
    
?>