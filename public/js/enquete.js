function movieSearch() {
    var movies = [];

    var settings = {
        "async": false,
        // "crossDomain": true,
        "url": "https://api.themoviedb.org/3/search/movie",
        // "url": "https://api.themoviedb.org/3/movie/550",
        // "url": "https://api.themoviedb.org/3/search/movie",
        // "url": "https://api.themoviedb.org/3/movie/550?api_key=bbf910baabf4da5f906d912fc361aee2",
        "data": {
            "api_key": "bbf910baabf4da5f906d912fc361aee2",
            "query": $("#title").val(),
            "language": "ja",
        },
        "method": "GET",
        // "headers": {
        // "x-rapidapi-host": "movie-database-imdb-alternative.p.rapidapi.com",
        // "x-rapidapi-key": "bc70d1ca63msh04bfb775284e8d3p151464jsnf27f4a09b61d"
        // }
    };
    $.ajax(settings).done(function (response) {
        // console.log(response);
        // console.log(response.results[0].original_title);
        response.results.forEach(function (data) {
            // console.log(data.original_title);
            movies.push(data.title);
        });
        // movies = response;
        console.log(response);
    });
    // console.log(movies);
    return movies;
}

function searchReload(arr) {
    $('#dt1').empty();
    for (var i = 0; i < arr.length; i++) {
        let op = document.createElement("option");
        op.value = arr[i];
        document.getElementById("dt1").appendChild(op);
    }
}


$(document).ready(function () {


    //オートコンプリートに設定する値
    let arr;
    // console.log(arr.length);
    // console.log(arr[0]);
    // console.log(arr[0].value);
    // $('#dt1').empty();
    arr = movieSearch();
    // console.log(arr.length);
    // console.log(arr[0]);
    //オートコンプリート値を設定する
    // for (var key in arr) {
    //     console.log(key);
    // }
    // $.each(arr, function (index, value) {
    //     console.log(index + ':' + value);
    // });
    // arr.forEach(function (value, index, array) {
    //     console.log(value);
    //     console.log(index);
    //     console.log(array);
    // })
    searchReload(arr);
    var stack = [];//入力数を保存する変数
    document.getElementById('title').addEventListener('keyup', function () {
        stack.push(1);//入力ごとに値を追加する

        //入力後0.3秒後
        setTimeout(function () {
            stack.pop();//中身を一つ取り出す
            //取り出したstackの中身がなければ処理をする
            //stackの中身がなくなるのは、一番最後の入力から0.3秒後になる
            //なので、一番最後の入力から0.3秒後に以下の処理が走る
            if (stack.length == 0) {
                //最後キー入力後に処理したいイベント
                arr = movieSearch();
                searchReload(arr);
                stack = [];//一応stackを初期化
            }
        }, 1500);
    });
});
// $(function () {
//     $('#title').MySuggest({
//         msArrayList: ['サッカー', ['野球', 'やきゅう'], 'アメフト', 'スキー', 'バレーボール', 'ラクロス', 'ラグビー', 'バスケットボール', 'ゴルフ', 'テニス', 'バドミントン', 'ソフトボール', 'ビリヤード', 'ボウリング', ['競泳', 'きょうえい'], 'カーリング', ['卓球', 'たっきゅう'],
//             'ドッジボール', 'ダーツ', 'フットサル', 'クリケット', 'ラケットボール', 'ロードレース', 'ハンマー投', 'アーチェリー', 'オートレース', ['競馬', 'けいば']]
//     });
// });
// $(function () {
//     // 3候補リストに表示するデータを配列で準備
//     var data = [
//         'accepts',
//         'action_name',
//         'add',
//         'add_column',
//         'add_index',
//         'add_timestamps',
//         'after_create',
//         'after_destroy',
//         'after_filter',
//         'all'
//     ];
//
//     // 2オートコンプリート機能を適用
//     $('#title').autocomplete({
//         source: data,
//         autoFocus: true,
//         delay: 500,
//         minLength: 2
//     });
// });
//
// var tags = ["c++", "java", "php", "coldfusion", "javascript", "asp", "ruby"];
// $("#autocomplete").autocomplete({
//     source: function (request, response) {
//         var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
//         response($.grep(tags, function (item) {
//             return matcher.test(item);
//         }));
//     }
// });
