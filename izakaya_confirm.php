<?php

mb_http_output('utf-8');
mb_internal_encoding('utf-8');
// header('Content=Type: text/xml;charset=UTF-8');

$key = "7c32cebda785eda6";
$address = $_GET["address"];
$category = $_GET["category"];

$url = "http://webservice.recruit.co.jp/hotpepper/gourmet/v1/?key=".$key."&address=".$address."&keyword=".$category."&count=100&format=json";

//渡したいパラメータ
// $params = [
//     'query' => [
//         'key' => $key,
//         'address' => $address,
//         'keyword' => $category,
//         'format' => 'json',
//     ],
// ];
// $json_param = json_encode($params);

$headers = [
    'Content-Type: application/json',
    'Accept-Charset: UTF-8',
];

/* curlセッションを初期化する*/
$ch = curl_init();

/* curlオプションを設定する */
// curl_setopt(セッション, 項目名, 設定値);
curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_POST, TRUE);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $json_param);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/* curlを実行し、その内容を$result変数に保存 */
$result = curl_exec($ch);

//PHPで扱えるようにJson文字列をデコードする
$data = json_decode($result, true);
/* curlセッションを終了する */
curl_close($ch);

//$result内のresults.shopをjQUeryに渡す
$shops_json = json_encode($data['results']['shop']);

// echo json_encode($result);
// $length = count($result);
// echo '<script>console.log(' . json_encode($result) . ');</script>';

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>randomlunch</title>
    <style>
        #view{
            padding: 10px;
            border: 4px solid #6f28bb;
            width: 50%px;
            background-color: aliceblue;
            height:800px;
            overflow: auto;
        }
        img{
            display: flex;
            width: 150px;
        }
        #view>div{
            border-bottom: 1px dotted #3838ab;
            font-size:medium;
        }
        .bold{
            font-weight: bold;
        }
        h2{
            font-size:x-large;
            color:#f1071e;
        }
        #back{
            font-size:x-large;
        }
    </style>
</head>
<body>
    <div>
        <h1>
           <span id="area"></span> 今日のランチはこれ！ <input type="button" value="再検索" id="back">
        </h1>
        <div id="view"></div>
    </div>
    <!-- div>div*5でdivの中にdivを5つ作成できる -->
    <!-- <div> 
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        console.log(<?=$shops_json?>);
        let shops = <?=$shops_json?>;
        console.log(shops);

        if(shops.length > 0){
            const selected = randomSelect(shops.slice(), 3);
 
            // 配列shopsからランダムにnum個の要素を取り出す          
            function randomSelect(shops, num){
                let new_shops = [];
                
                while(new_shops.length < 3 && shops.length > 0){
                    // 配列からランダムな要素を選ぶ
                    const rand = Math.floor(Math.random() * shops.length);
                    // 選んだ要素を別の配列に登録する
                    new_shops.push(shops[rand]);
                    // もとの配列からは削除する
                    shops.splice(rand, 1);
                    
                };
                console.log(new_shops);

                $(function(){
                let html = ""; //HTML文字を追加していく
                for(let i=0; i<new_shops.length; i++){
                    html += `
                        <div> 
                            <div>店名：${new_shops[i].name}</div>
                            <div>住所：${new_shops[i].address}</div>
                            <div>アクセス：${new_shops[i].access}</div>
                            <div>おすすめ：${new_shops[i].catch}</div>
                            <div>価格帯：${new_shops[i].budget.name}</div>
                            <div>URL：<a href="${new_shops[i].urls.pc}">${new_shops[i].urls.pc}</a></div>
                            <div><img src="${new_shops[i].photo.pc.l}"></div>
                        </div>
                    `;//「Shit+@」 バッククォート
                }
                $("#view").append(html);
                });
            };
        };

        //再検索時には、izakaya.phpに戻す
        $("#back").on("click",function(){
            location.replace("izakaya.php");
        });



            // function randomSelected(shops, num) {
            //     const copyArray = [shops];
            //     const new_shops = [copyArray(3)].map(() => {
            //         const randomStartIndex = Math.floor(Math.random() * copyArray.length);
            //         return copyArray.splice(randomStartIndex, 1).at();
            //     });

            //     console.log(new_shops);
                



    </script>
</body>
</html>


