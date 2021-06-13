<?php

//　データをPOSTで受け取る
$name = $_POST['name'];
$mail = $_POST['mail'];
$movie = $_POST['movie'];
$actor = $_POST['actor'];

//文字列作成（日付）
//$str = date("Y-m-d H:i:s");

//データを変数にまとめる
$str = $name . ',' .  $mail. ',' . $movie . ',' .  $actor;

//.txt Fileにデータを保存する処理
$file = fopen("data/data.csv","a"); //対象のファイルを開く
fwrite($file,$str."\n"); //ファイルにデータを書き込む   
fclose($file); //ファイルを閉じる

?>

<html>
<head>
    <meta charset="utf-8">
    <title>File書き込み</title>
</head>
<body>
<?php
//data.csvファイルを開いて、読み込みモードに設定する
$fp = fopen('data/data.csv','r');

//テーブルタグを作成し、テーブルヘッダーで見出しを作る
echo'<table border="1">
    <tr>
    <th>名前</th>
    <th>EMAIL</th>
    <th>好きな映画</th>
    <th>好きな俳優</th>
    </tr>';

//while文でCSVファイルのデータを1つずつ繰り返し読み込む
while($data = fgetcsv($fp)){

//テーブルセルに配列の値を格納
    echo '<tr>';
    echo '<td>'.$data[0].'</td>';
    echo '<td>'.$data[1].'</td>';
    echo '<td>'.$data[2].'</td>';
    echo '<td>'.$data[3].'</td>';
    echo '</tr>';
}

//テーブルの閉じタグ
echo'</table>';

//ファイルを閉じる
fclose($fp);
?>

<ul>
    <li><a href="index.php">戻る</a></li>
</ul>

</body>
</html>