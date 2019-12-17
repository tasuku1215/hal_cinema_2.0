function movieSearch() {
    var movies = [];
    var cnt = 0;

    var settings = {
        "url": "https://api.themoviedb.org/3/search/movie",
        "data": {
            "api_key": "bbf910baabf4da5f906d912fc361aee2",
            "query": "ドラえもん",
            "language": "ja",
        },
        "method": "GET",
    };
    $.ajax(settings).done(function (response) {
        response.results.forEach(function (data) {
            console.log(data.original_title);
            movies.push(data.original_title);
        });
    });
    return movies;
}

$(document).ready(function () {
    //オートコンプリートに設定する値
    arr = movieSearch();
    console.log(arr);
    console.log(arr.length);
    console.log(arr[0]);
    //オートコンプリート値を設定する
    for (var key in arr) {
        console.log(key);
    }
    $.each(arr, function (index, value) {
        console.log(index + ':' + value);
    });
    for (var i = 0; i < arr.length; i++) {
        let op = document.createElement("option");
        op.value = arr[i].value;
        document.getElementById("dt1").appendChild(op);
    }
});
