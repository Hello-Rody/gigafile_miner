<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>『君たちはどう生き残るか』操作画面</title>
    <script type="text/javascript">
        currentFNo1 = 0;

        function next_text1() {
            if (window.event.keyCode == 13) {
                currentFNo1++;
                currentFNo1 %= document.mainForm.elements.length;
                document.mainForm[currentFNo1].focus();
                return false;
            }
            return true;
        }

        currentFNo2 = 0;

        function next_text2() {
            if (window.event.keyCode == 13) {
                currentFNo2++;
                currentFNo2 %= document.scoreForm.elements.length;
                document.scoreForm[currentFNo2].focus();
                return false;
            }
            return true;
        }
    </script>
</head>


<?php
function file_getline($file_path, $filename, $lineNumber)
{
    $handle = fopen($file_path . $filename, "r");
    if ($handle) {
        $currentLine = 0;
        while (($line = fgets($handle)) !== false) {
            $currentLine++;
            if ($currentLine === $lineNumber) {
                fclose($handle);
                return trim($line);
            }
        }
        fclose($handle);
    }
    return null;
}

function count_file($folder_path)
{
    $file = glob($folder_path . "*");
    $countfile = 0;
    if ($file != false) {
        $countfile = count($file);
    }
    return $countfile;
}

function create_file($folder_path, $content)
{
    $filename = $folder_path . (count_file($folder_path) + 1);
    touch($filename);
    $fp = fopen($filename, "w");
    fputs($fp, $content);
    fclose($fp);
}

function alert_message($message)
{
    $alert = "<script type='text/javascript'>alert('" . $message . "');</script>";
    echo $alert;
}

function name_check($folder_path, $name)
{
    for ($i = 1; $i <= count_file($folder_path); $i++) {
        $string = file_getline($folder_path, $i, 1);
        if ($name == $string) {
            return false;
        }
    }
    return true;
}

function authorization()
{
    $folder_path = "/home/rody/howtosurvive/teams/";
    if ($_POST["num1"] == $_POST["num2"] and $_POST["num1"] != "") {
        $date = date('m-d H:i:s');
        $result = name_check($folder_path, $_POST["num1"]);
        if ($result) {
            $content = $_POST["num1"] . "\n" . "0";
            create_file($folder_path, $content);
            alert_message("送信しました");
        } else {
            alert_message("チーム名が存在します");
        }
    } elseif ($_POST["num1"] != $_POST["num2"]) {
        alert_message("チーム名が一致しません");
    } elseif ($_POST["num1"] == "") {
        alert_message("チーム名を入力してください");
    }
}
if (isset($_POST["sent"])) {
    if ($_POST["pass"] == "HidehikoTensai") {
        authorization();
    } else {
        alert_message("パスワードが間違っています");
    }
}


?>


<body>
    <div class="header">
        <h1>『君たちはどう生き残るか』操作画面</h1>
    </div>
    <div class="register">
        <h2>登録</h2>
        <p>チーム名に記号は使わせないように</p>
        <form name="mainForm" action="wjnkf7hLidO4qh0B7qjk.php" method="post">
            <input type="text" name="num1" autocomplete="off" placeholder="チーム名を入力" onKeyDown="return next_text1();">
            <input type="text" name="num2" autocomplete="off" placeholder="もう一度入力" onKeyDown="return next_text1();">
            <input type="password" name="pass" autocomplete="off" placeholder="パスワードを入力" onKeyDown="return next_text1();">
            <input type="submit" name="sent" value="送信">
        </form>
    </div>
    <br>
    <div class="score">
        <h2>スコア</h2>
        <form name="scoreForm" action="wjnkf7hLidO4qh0B7qjk.php" method="post">
            <input type="text" name="num1" autocomplete="off" placeholder="チーム番号を入力" onKeyDown="return next_text2();">
            <input type="text" name="num2" autocomplete="off" placeholder="もう一度入力" onKeyDown="return next_text2();">
            <input type="text" name="score" autocomplete="off" placeholder="スコアを入力" onKeyDown="return next_text2();">
            <input type="password" name="pass" autocomplete="off" placeholder="パスワードを入力" onKeyDown="return next_text2();">
            <input type="submit" name="sent" value="送信">
        </form>
    </div>
    <br>
    <div class="data_table">
        <h2>ボード</h2>
        <table border="1">
            <tr>
                <th>番号</th>
                <th>グループ名</th>
                <th>スコア</th>
                <th>時間</th>
            </tr>
            <?php
            $folder_path = "/home/rody/howtosurvive/teams/";
            for ($i = 1; $i <= count_file($folder_path); $i++) {
                echo "            <tr>\n";
                echo "                <td>" . $i . "</td>\n";
                $group_name = file_getline($folder_path, $i, 1);
                echo "                <td>" . $group_name . "</td>\n";
                $group_score = file_getline($folder_path, $i, 2);
                echo "                <td>" . $group_score . "</td>\n            </tr>\n";
            }
            ?>
        </table>
    </div>
</body>

</html>