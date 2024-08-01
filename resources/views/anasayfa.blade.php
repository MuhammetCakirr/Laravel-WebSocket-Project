<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous"/>
    <style>
        body {
            background-color: #F0F2F5;
            font-family: "Arial";
        }

        strong {
            font-weight: 600;
        }

        .notification {
            width: 360px;
            padding: 15px;
            background-color: white;
            border-radius: 16px;
            position: fixed;
            bottom: 15px;
            left: 15px;
            transform: translateY(200%);
            animation: noti 2s infinite forwards alternate ease-in;

            &-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 15px;
            }

            &-title {
                font-size: 16px;
                font-weight: 500;
                text-transform: capitalize;
            }

            &-close {
                cursor: pointer;
                width: 30px;
                height: 30px;
                border-radius: 30px;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #F0F2F5;
                font-size: 14px;
            }

            &-container {
                display: flex;
                align-items: flex-start;
            }

            &-media {
                position: relative;
            }

            &-user-avatar {
                width: 60px;
                height: 60px;
                border-radius: 60px;
                object-fit: cover;
            }

            &-reaction {
                width: 30px;
                height: 30px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 30px;
                color: white;
                background-image: linear-gradient(45deg, #0070E1, #14ABFE);
                font-size: 14px;
                position: absolute;
                bottom: 0;
                right: 0;
            }

            &-content {
                width: calc(100% - 60px);
                padding-left: 20px;
                line-height: 1.2;
            }

            &-text {
                margin-bottom: 5px;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
                padding-right: 50px;

            }

            &-timer {
                color: #1876F2;
                font-weight: 600;
                font-size: 14px;
            }

            &-status {
                position: absolute;
                right: 15px;
                top: 50%;
                /* transform: translateY(-50%); */
                width: 15px;
                height: 15px;
                background-color: #1876F2;
                border-radius: 50%;
            }
        }

        @keyframes noti {
            50% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="notification">
        <div class="notification-header">
            <h3 class="notification-title">New notification</h3>

        </div>
        <div class="notification-container">

            <div class="notification-content">
                <p class="notification-text">
                    <strong>evondev</strong>, <strong>Trần Anh Tuấn</strong> and 154 others react to your post in
                    <strong>Cộng đồng Frontend Việt Nam</strong>
                </p>
                <span class="notification-timer">a few seconds ago</span>
            </div>
            <span class="notification-status"></span>
        </div>
    </div>
</body>

</html>
