<style>
        body{background-color: #FFFFFF}
        h2{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font-size: 30px;
            line-height: 1.2;
            color: #b6b6b6;
            margin: 0;
            font-weight: 500;
        }
    </style>

    <h2> Redirecting...</h2>
    <script>
        window.top.location.href ="<?php echo $url; ?>"
    </script>