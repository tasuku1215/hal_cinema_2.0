# HAL Cinema Website

本サイトは Laravel で作っているので、ダウンロード後、フォーマットしてご利用ください。

## 作成場所

・北山：ホーム画面  
・小澤：スケジュール画面  
・細見：アンケート画面  
・杉森：料金、映画登録画面  
・國政：管理画面

## 動かない場合

可能性として、env ファイルが存在していない可能性があります。  
`env.example`の中身を作成した env ファイルにコピーしてください。

```
cp .env.example .env
```

↑ もしかしたら mac でしか動かない可能性があるので、その場合は調べて実行してください。

## マイグレーション & シーダー

```
php artisan migrate:refresh --seed
```

を実行してマイグレーション、シーダーを適応してください。
