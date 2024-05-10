<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href='{{ asset("css/error.css") }}'>
    <title>ERROR</title>
</head>

<body>
    <div class="container">
        <div class="main_wrapper">
            <div class="main">
                <div class="antenna">
                    <div class="antenna_shadow"></div>
                    <div class="a1"></div>
                    <div class="a1d"></div>
                    <div class="a2"></div>
                    <div class="a2d"></div>
                    <div class="a_base"></div>
                </div>
                <div class="tv">
                    <div class="cruve">
                        <svg xml:space="preserve" viewBox="0 0 189.929 189.929" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1" class="curve_svg">
                            <path d="M70.343,70.343c-30.554,30.553-44.806,72.7-39.102,115.635l-29.738,3.951C-5.442,137.659,11.917,86.34,49.129,49.13
        C86.34,11.918,137.664-5.445,189.928,1.502l-3.95,29.738C143.041,25.54,100.895,39.789,70.343,70.343z"></path>
                        </svg>
                    </div>
                    <div class="display_div">
                        <div class="screen_out">
                            <div class="screen_out1">
                                <div class="screen">
                                    <span class="notfound_text"> NOT FOUND</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lines">
                        <div class="line1"></div>
                        <div class="line2"></div>
                        <div class="line3"></div>
                    </div>
                    <div class="buttons_div">
                        <div class="b1">
                            <div></div>
                        </div>
                        <div class="b2"></div>
                        <div class="speakers">
                            <div class="g1">
                                <div class="g11"></div>
                                <div class="g12"></div>
                                <div class="g13"></div>
                            </div>
                            <div class="g"></div>
                            <div class="g"></div>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <div class="base1"></div>
                    <div class="base2"></div>
                    <div class="base3"></div>
                </div>
            </div>
            <div class="text_404">
                <div class="text_4041">4</div>
                <div class="text_4042">0</div>
                <div class="text_4043">4</div>
            </div>
        </div>
        <button class="button" onclick="window.location.href='{{ route("Book Store") }}'">
            <div class="bgContainer">
                <span>Hover</span>
                <span>Hover</span>
            </div>
            <div class="arrowContainer">
                <svg width="25" height="25" viewBox="0 0 45 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M43.7678 20.7678C44.7441 19.7915 44.7441 18.2085 43.7678 17.2322L27.8579 1.32233C26.8816 0.34602 25.2986 0.34602 24.3223 1.32233C23.346 2.29864 23.346 3.88155 24.3223 4.85786L38.4645 19L24.3223 33.1421C23.346 34.1184 23.346 35.7014 24.3223 36.6777C25.2986 37.654 26.8816 37.654 27.8579 36.6777L43.7678 20.7678ZM0 21.5L42 21.5V16.5L0 16.5L0 21.5Z" fill="black"></path>
                </svg>
            </div>
        </button>
    </div>
</body>

</html>