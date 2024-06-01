<?php
// 连接到MySQL数据库
$servername = "127.0.0.1"; // MySQL服务器地址
$username = "root"; // MySQL用户名
$password = "pa55w0rd"; // MySQL密码
$database = "mcbbs"; // 数据库名

$page_view_number = null;

// 创建连接
$conn = new mysqli($servername, $username, $password);

// 检查连接是否成功
if ($conn->connect_error) {
    die("炸咯(＾Ｕ＾)ノ~: " . $conn->connect_error);
}

// 创建数据库
$sql_create_database = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql_create_database) === TRUE) {
    // 选择数据库
    $conn->select_db($database);
    
    // 创建user_ips表
    $sql_create_table_ips = "CREATE TABLE IF NOT EXISTS user_ips (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        ip_address VARCHAR(50) NOT NULL
    )";
    if ($conn->query($sql_create_table_ips) === TRUE) {
        // echo "user_ips表已创建或已存在<br>";
    } else {
        // echo "Error creating user_ips表: " . $conn->error . "<br>";
    }

    // 创建pageviews表
    $sql_create_table_pageviews = "CREATE TABLE IF NOT EXISTS pageviews (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        views INT(10) UNSIGNED DEFAULT 0
    )";
    if ($conn->query($sql_create_table_pageviews) === TRUE) {
        // echo "pageviews表已创建或已存在<br>";
    } else {
        // echo "Error creating pageviews表: " . $conn->error . "<br>";
    }
} else {
    // echo "Error creating database: " . $conn->error . "<br>";
}

// 获取用户IP地址
$user_ip = $_SERVER['REMOTE_ADDR'];

// 检查数据库中是否存在该IP地址
$sql_check_ip = "SELECT * FROM user_ips WHERE ip_address = '$user_ip'";
$result_check_ip = $conn->query($sql_check_ip);

// 如果数据库中不存在该IP地址，则增加页面浏览量
if ($result_check_ip->num_rows == 0) {
    $sql_insert_ip = "INSERT INTO user_ips (ip_address) VALUES ('$user_ip')";
    if ($conn->query($sql_insert_ip) === TRUE) {
        $sql_update_pageviews = "UPDATE pageviews SET views = views + 1";
        $conn->query($sql_update_pageviews);
    } else {
        // echo "Error: " . $sql_insert_ip . "<br>" . $conn->error;
    }
}


// 查询并输出访问量
$sql_get_pageviews = "SELECT views FROM pageviews";
$result_pageviews = $conn->query($sql_get_pageviews);
if ($result_pageviews->num_rows > 0) {
    $row = $result_pageviews->fetch_assoc();
    // echo "页面浏览量: " . $row["views"] . "<br>";
    $page_view_number = $row["views"];
} else {
    echo "无法获取页面浏览量<br>";
}

// 关闭数据库连接
$conn->close();
?>
<!DOCTYPE html><html lang='zh'><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>MCBBS 神教</title><meta name="description" content=""><meta name="viewport" content="width=device-width, initial-scale=1.0"><script>window.va = window.va || function(){(window.vaq = window.vaq || []).push(arguments)};</script><style>h1{font-weight:500;color:#4caf50;margin-bottom:-16px}h2{opacity:.8}h2,h3,h4{font-weight:300;line-height:2}a[href]{color:#4caf50;text-decoration:none}a[href]:hover{opacity:.8;text-decoration:underline}hr{border:0;border-top:black 1px solid;opacity:.3}html{max-width:800px;margin:auto;background:#fafafa;font-family:Candara,Helvetica,Microsoft Yahei,sans-serif}@media(prefers-color-scheme:dark){html{background:#1f1f1f;color:#f0f0f0}code{background:#3c3c3c}hr{border-color:#fafafa}}</style></head><body><h1>回来吧 MCBBS</h1><h2>千万人的信仰</h2><h3>眼前景象，忧伤难掩。MCBBS，昔日众人栖息之所，今已销声匿迹。<br>忆起当年，此地熙熙攘攘，生机勃勃，今则只余一片寂静。<br>自二零一零年诞生以来，乃无数MC玩家之心灵家园。<br>于此，可尽情创造、探索、交流，分享喜怒哀乐。<br>每一篇帖子，每一番回复，皆我心意之交融，皆我游戏生涯之一部分。<br>昔日，我于MCBBS结识诸多志同道合之友。<br>共商游戏技艺，分享建造心得，乃至游戏之外，亦成知己。<br>于此虚拟之地，寻得一片属于己者之天地，彼此相伴、相扶、相励。<br>然，现实乃为残酷。岁月流逝，MCBBS渐陷沉寂。<br>闭站之讯传来，初以为暂时之停顿，然现实却残酷告诉，MCBBS已逝。<br>往日熟悉之景，往日热络之境，今随风而逝，唯余一抹忧伤。<br>我永怀念曾伴我成长之MCBBS，怀念与我共游戏之友。<br>虽闭站，然于我记忆中永存。<br>愿其于虚拟之境安息，愿我永怀其美好。<br>MCBBS，再会，愿尔于游戏之天堂永自由飞扬。<br></h3><hr><h2>回来吧！ MCBBS！</h2><center>2024 © mcbbs.xin<br><?php echo "IP " .$user_ip. "";?>| 访问人数： <?php echo $page_view_number ?><br>Powered by <a href="https://github.com/YangLine/mcbbs.xin">YangLine</a> | 由 Craft Space Team 无力驱动</center><br><br><br><br><br><br><br><br><br><br><video src="https://vdse.bdstatic.com//192d9a98d782d9c74c96f09db9378d93.mp4" controls id="rick"></video><h1>你被骗了
<script>
var video = document.getElementById('rick');
document.addEventListener('DOMContentLoaded', function() {
  video.play().catch(function(error) {
    document.addEventListener('click', function() {
      video.play();
    });
  });
});
</script>
</body></html>
