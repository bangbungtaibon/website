
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="background">
        <form method="post">

            <input type="text" name="nama" placeholder="NAMA KAMU" required autocomplete="off"><br>
            <input type="text" name="harapan" placeholder="HARAPAN KAMU KEDEPANNYA" required autocomplete="off"><br>
            
            <label for="aku"> KAMU INGIN AKU SEPERTI APA AGAR KAMU BAHAGIA ? </label>
            <input type="text"  id="aku" name="aku" required autocomplete="off"><br>

            <label for="pesan"> PESAN ATAU SARAN UNTUK KU </label>
            <input type="text" id="pesan" name="pesansatu" required autocomplete="off"><br>
            
            <button type="submit" name="kirim">SELANJUTNYA</button>
        </form>
    </div>
</body>
</html>
<style>
    *{
        margin: 0;
    }

    .background{
        position: absolute;
        left: 0px;
        top: 0px;
        width: 540px;
        height: 1204px;
        background-blend-mode: normal;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    form{
        display: flex;
        flex-direction: column;
        gap: 5px;
        box-shadow: 10px 10px 30px black;
        border-radius: 20px;
        padding: 20px;
    }

</style>


<!-- kirim pesan -->
<?php
    function aih($token, $chatid, $pesan){
        $url = "https://api.telegram.org/bot$token/sendMessage";
        $param = [
            'chat_id' => $chatid,
            'text' => $pesan            
        ];
        
        $bh = curl_init($url);
        curl_setopt($bh, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($bh, CURLOPT_POSTFIELDS, $param);
        $result = curl_exec($bh);
        curl_close($bh);
        return $result;
    }
    
    
    if(isset($_POST['kirim'])){
    $harapan = $_POST['harapan'];
    $aku = $_POST['aku'];
    $nama = $_POST['nama'];
    $pes = $_POST['pesansatu'];
    $token = "6902273821:AAE6zyTanImaOTQSE0FLv7PjZ5SYhI4W7l0";
    $chatid = "6468519474";
    $pesan = "nama\t : ". $nama ."\nharapan\t : ". $harapan. "\naku\t : ". $aku. "\npesan\t : ". $pes;
    if ($pesan) {
        echo "alert('TERIMA KASIH SUDAH MELUANGKAN WAKTU');";
    }else{
        echo "alert('ULANGI');";
    }
    $response = aih($token, $chatid, $pesan);
    // echo "Response Text Message : $response<br>";
    }
?>