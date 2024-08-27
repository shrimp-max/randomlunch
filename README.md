# ①課題番号-プロダクト名

飲食店検索

## ②課題内容（どんな作品か）

- ホットペッパーのAPIを利用して、場所とジャンルから飲食店を検索できる

## ③DEMO

https://ebitaku.sakura.ne.jp/izakayasagashi/izakayasakashi/php/izakayasagashi/izakaya.php

## ④作ったアプリケーション用のIDまたはPasswordがある場合

なし

## ⑤工夫した点・こだわった点

- 講義で扱ったajaxでは、ホットペッパーAPIにリクエストを送れなかったため、phpを使用した

## ⑥難しかった点・次回トライしたいこと(又は機能)

- ホットペッパーのAPIにアクセスする際に、CORSエラーに引っかかったこと
- ajaxの通信ではCORSエラーに引っかかってしまうことは早めに気づけたが、講義以外の技術を使用することにハードルを感じ、いったん距離を置いてしまった。
- 本当は、PHPで取得したデータから、ランダムで選択されるように選択できるようにしたかったが、配列からランダムで複数要素を取り出すことの実装ができなかった。

## ⑦質問・疑問・感想、シェアしたいこと等なんでも

- [質問]
- [感想]
- 習った言語以外を使ったほうが実装できそうな場面に直面した時に、初学者だからと言ってあきらめるのではなく、調べてみると、意外と使ったことない言語でも実装できた。
- 作れるものではなく、作りたいものを作ろうとしたほうが自身の成長につながる。
- PHPはデベロッパーツールにエラー箇所が出ないことがあったので、エラーログファイルを見ながら確認できた。
- [参考記事]
  - 1.ホットペッパーAPI [https://webservice.recruit.co.jp/doc/hotpepper/reference.html]
  - 2. JavaScriptでCORSエラーが出るときの対処[https://qiita.com/rahydyn/items/e9ed2480e0e649313c04]
  - 3. PHP CURLの使い方[https://qiita.com/4roro4/items/73d2b413ad0063848aa4]
