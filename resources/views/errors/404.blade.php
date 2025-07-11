
<style>
* {
    margin: 0;
    font-family: 'Oswald', sans-serif;
    user-select: none;
}

.wrapper {
    background-image: url(data:image/png;base64,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);
    background-color: #beefa3;
    height: 100vh;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}

.container {
    padding: 66px 16px 66px;
    border: 1px solid white;
    text-align: center;
    color: white;
    width: 92%;
    max-width: 400px;
    margin: 0 4% 0 4%;
}

.container .title {
    font-size: 120px;
}

.container .description {
    font-size: 48px;
}

.glitch {
    position: relative;
}

.glitch:before {
    content: attr(data-text);
    position: absolute;
    text-shadow: 1px 0 blue;
    top: 0;
    left: -4px;
    color: white;
    overflow: hidden;
    clip: rect(0, 900px, 0, 0);
    -webkit-animation: glitch 3s infinite linear alternate-reverse;
    animation: glitch 3s infinite linear alternate-reverse;
    height: 100%;
    width: 100%;
}

.glitch:after {
    content: attr(data-text);
    position: absolute;
    text-shadow: -1px 0 red;
    top: 0;
    left: 4px;
    color: white;
    overflow: hidden;
    clip: rect(0, 900px, 0, 0);
    -webkit-animation: glitch 2s infinite linear alternate-reverse;
    animation: glitch 2s infinite linear alternate-reverse;
    height: 100%;
    width: 100%;
}

@-webkit-keyframes glitch {
    0% {
        clip: rect(24px, 9999px, 136px, 0);
    }
    5% {
        clip: rect(142px, 9999px, 83px, 0);
    }
    10% {
        clip: rect(82px, 9999px, 37px, 0);
    }
    15% {
        clip: rect(51px, 9999px, 78px, 0);
    }
    20% {
        clip: rect(150px, 9999px, 39px, 0);
    }
    25% {
        clip: rect(66px, 9999px, 122px, 0);
    }
    30% {
        clip: rect(141px, 9999px, 33px, 0);
    }
    35% {
        clip: rect(126px, 9999px, 17px, 0);
    }
    40% {
        clip: rect(125px, 9999px, 124px, 0);
    }
    45% {
        clip: rect(34px, 9999px, 22px, 0);
    }
    50% {
        clip: rect(54px, 9999px, 71px, 0);
    }
    55% {
        clip: rect(34px, 9999px, 135px, 0);
    }
    60% {
        clip: rect(150px, 9999px, 98px, 0);
    }
    65% {
        clip: rect(26px, 9999px, 32px, 0);
    }
    70% {
        clip: rect(50px, 9999px, 2px, 0);
    }
    75% {
        clip: rect(144px, 9999px, 77px, 0);
    }
    80% {
        clip: rect(135px, 9999px, 53px, 0);
    }
    85% {
        clip: rect(131px, 9999px, 143px, 0);
    }
    90% {
        clip: rect(127px, 9999px, 133px, 0);
    }
    95% {
        clip: rect(24px, 9999px, 125px, 0);
    }
    100% {
        clip: rect(30px, 9999px, 147px, 0);
    }
}

@keyframes glitch {
    0% {
        clip: rect(24px, 9999px, 136px, 0);
    }
    5% {
        clip: rect(142px, 9999px, 83px, 0);
    }
    10% {
        clip: rect(82px, 9999px, 37px, 0);
    }
    15% {
        clip: rect(51px, 9999px, 78px, 0);
    }
    20% {
        clip: rect(150px, 9999px, 39px, 0);
    }
    25% {
        clip: rect(66px, 9999px, 122px, 0);
    }
    30% {
        clip: rect(141px, 9999px, 33px, 0);
    }
    35% {
        clip: rect(126px, 9999px, 17px, 0);
    }
    40% {
        clip: rect(125px, 9999px, 124px, 0);
    }
    45% {
        clip: rect(34px, 9999px, 22px, 0);
    }
    50% {
        clip: rect(54px, 9999px, 71px, 0);
    }
    55% {
        clip: rect(34px, 9999px, 135px, 0);
    }
    60% {
        clip: rect(150px, 9999px, 98px, 0);
    }
    65% {
        clip: rect(26px, 9999px, 32px, 0);
    }
    70% {
        clip: rect(50px, 9999px, 2px, 0);
    }
    75% {
        clip: rect(144px, 9999px, 77px, 0);
    }
    80% {
        clip: rect(135px, 9999px, 53px, 0);
    }
    85% {
        clip: rect(131px, 9999px, 143px, 0);
    }
    90% {
        clip: rect(127px, 9999px, 133px, 0);
    }
    95% {
        clip: rect(24px, 9999px, 125px, 0);
    }
    100% {
        clip: rect(30px, 9999px, 147px, 0);
    }
}


/****** Fonts ******/


/* latin */

@font-face {
    font-family: 'Oswald';
    font-style: normal;
    font-weight: 400;
    src: local('Oswald Regular'), local('Oswald-Regular'), url(./fonts/Oswald-Regular.ttf) format('truetype');
    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
}


/* latin */

@font-face {
    font-family: 'Oswald';
    font-style: normal;
    font-weight: 500;
    src: local('Oswald Medium'), local('Oswald-Medium'), url(./fonts/Oswald-Medium.ttf) format('truetype');
    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
}
</style>
<div class="wrapper">
    <!-- MAIN -->
    <div class="container" data-text="404">
        <div class="title glitch" data-text="404">
            404
        </div>
        <div class="description glitch" data-text="PAGE NOT FOUND">
            PAGE NOT FOUND
        </div>
    </div>
    <!-- END MAIN -->
</div>
