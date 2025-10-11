<div class="main_preloader">
    <div class="preloader-floating-circles">
        <div class="f_circleG" id="frotateG_01"></div>
        <div class="f_circleG" id="frotateG_02"></div>
        <div class="f_circleG" id="frotateG_03"></div>
        <div class="f_circleG" id="frotateG_04"></div>
        <div class="f_circleG" id="frotateG_05"></div>
        <div class="f_circleG" id="frotateG_06"></div>
        <div class="f_circleG" id="frotateG_07"></div>
        <div class="f_circleG" id="frotateG_08"></div>
    </div>
</div>

<style>
    .main_preloader {
        width: 100%;
        height: 130px;
        position: relative;
        align-items: center;
        justify-content: center;
        top: 0;
        left: 0;
        z-index: 999;
        background: transparent;
        display: none;
    }

    .preloader-floating-circles {
        position: relative;
        width: 80px;
        height: 80px;
        margin: auto;
        z-index: 9999;
        transform: scale(0.6);
        -o-transform: scale(0.6);
        -ms-transform: scale(0.6);
        -webkit-transform: scale(0.6);
        -moz-transform: scale(0.6);
    }

    .preloader-floating-circles .f_circleG {
        position: absolute;
        background-color: white;
        height: 14px;
        width: 14px;
        display: block !important;
        border-radius: 7px;
        -o-border-radius: 7px;
        -ms-border-radius: 7px;
        -webkit-border-radius: 7px;
        -moz-border-radius: 7px;
        animation-name: f_fadeG;
        -o-animation-name: f_fadeG;
        -ms-animation-name: f_fadeG;
        -webkit-animation-name: f_fadeG;
        -moz-animation-name: f_fadeG;
        animation-duration: 0.672s;
        -o-animation-duration: 0.672s;
        -ms-animation-duration: 0.672s;
        -webkit-animation-duration: 0.672s;
        -moz-animation-duration: 0.672s;
        animation-iteration-count: infinite;
        -o-animation-iteration-count: infinite;
        -ms-animation-iteration-count: infinite;
        -webkit-animation-iteration-count: infinite;
        -moz-animation-iteration-count: infinite;
        animation-direction: normal;
        -o-animation-direction: normal;
        -ms-animation-direction: normal;
        -webkit-animation-direction: normal;
        -moz-animation-direction: normal;
    }

    .preloader-floating-circles #frotateG_01 {
        left: 0;
        top: 32px;
        animation-delay: 0.2495s;
        -o-animation-delay: 0.2495s;
        -ms-animation-delay: 0.2495s;
        -webkit-animation-delay: 0.2495s;
        -moz-animation-delay: 0.2495s;
    }

    .preloader-floating-circles #frotateG_02 {
        left: 9px;
        top: 9px;
        animation-delay: 0.336s;
        -o-animation-delay: 0.336s;
        -ms-animation-delay: 0.336s;
        -webkit-animation-delay: 0.336s;
        -moz-animation-delay: 0.336s;
    }

    .preloader-floating-circles #frotateG_03 {
        left: 32px;
        top: 0;
        animation-delay: 0.4225s;
        -o-animation-delay: 0.4225s;
        -ms-animation-delay: 0.4225s;
        -webkit-animation-delay: 0.4225s;
        -moz-animation-delay: 0.4225s;
    }

    .preloader-floating-circles #frotateG_04 {
        right: 9px;
        top: 9px;
        animation-delay: 0.509s;
        -o-animation-delay: 0.509s;
        -ms-animation-delay: 0.509s;
        -webkit-animation-delay: 0.509s;
        -moz-animation-delay: 0.509s;
    }

    .preloader-floating-circles #frotateG_05 {
        right: 0;
        top: 32px;
        animation-delay: 0.5955s;
        -o-animation-delay: 0.5955s;
        -ms-animation-delay: 0.5955s;
        -webkit-animation-delay: 0.5955s;
        -moz-animation-delay: 0.5955s;
    }

    .preloader-floating-circles #frotateG_06 {
        right: 9px;
        bottom: 9px;
        animation-delay: 0.672s;
        -o-animation-delay: 0.672s;
        -ms-animation-delay: 0.672s;
        -webkit-animation-delay: 0.672s;
        -moz-animation-delay: 0.672s;
    }

    .preloader-floating-circles #frotateG_07 {
        left: 32px;
        bottom: 0;
        animation-delay: 0.7585s;
        -o-animation-delay: 0.7585s;
        -ms-animation-delay: 0.7585s;
        -webkit-animation-delay: 0.7585s;
        -moz-animation-delay: 0.7585s;
    }

    .preloader-floating-circles #frotateG_08 {
        left: 9px;
        bottom: 9px;
        animation-delay: 0.845s;
        -o-animation-delay: 0.845s;
        -ms-animation-delay: 0.845s;
        -webkit-animation-delay: 0.845s;
        -moz-animation-delay: 0.845s;
    }

    @keyframes f_fadeG {
        0% {
            background-color: #8b5cf6;
        }

        100% {
            background-color: white;
        }
    }

    @-webkit-keyframes f_fadeG {
        0% {
            background-color: #8b5cf6;
        }

        100% {
            background-color: white;
        }
    }
</style>
