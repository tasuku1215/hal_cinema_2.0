var settings = {
    "async": true,
    "crossDomain": true,
    "url": "https://api.themoviedb.org/3/search/movie",
    // "url": "https://api.themoviedb.org/3/movie/550",
    // "url": "https://api.themoviedb.org/3/search/movie",
    // "url": "https://api.themoviedb.org/3/movie/550?api_key=bbf910baabf4da5f906d912fc361aee2",
    "data": {
        "api_key": "bbf910baabf4da5f906d912fc361aee2",
        "query": "ドラえもん",
        "language":"ja",
    },
    "method": "GET",
    "headers": {
        // "x-rapidapi-host": "movie-database-imdb-alternative.p.rapidapi.com",
        // "x-rapidapi-key": "bc70d1ca63msh04bfb775284e8d3p151464jsnf27f4a09b61d"
    }
};

$.ajax(settings).done(function (response) {
    console.log(response);
});
