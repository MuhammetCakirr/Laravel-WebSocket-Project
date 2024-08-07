<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('style.css') }}" rel="stylesheet">

    <title>Orders</title>
</head>
<body>

<div class="section" style="margin-top: 25px">
{{--    <div id="toast" class="mycss1">--}}
{{--        <div class="mycss2">--}}
{{--            <div class="mycss3">--}}
{{--                <img src="https://blog.codepen.io/wp-content/uploads/2023/09/logo-white.png" alt="codepen.png">--}}
{{--            </div>--}}
{{--            <p>Codepen</p>--}}
{{--        </div>--}}
{{--        <div class="mycss4"><span class="mycsstitle">Codepen</span> added your <br> pen <span class="mycssproj">Notication Toast.</span> to their <br> collection</div>--}}
{{--    </div>--}}
    <div id="notification-container"></div>
    <div>
        <h2 style="text-align: center">Orders</h2>
        <div class="statusBar">
            <div class="split">
                <div class="split-left">
                    @if(Auth::check())
                        <p>{{ Auth::user()->name}}</p>
                    @else
                        <p>Kullanıcı oturum açmamış.</p>
                    @endif
                </div>
                <div class="split-right" style="margin-top: 10px">
                    <p>{{ Auth::user()->branche->name}}</p>
                </div>
            </div>
        </div><!-- end statusBar -->

        @vite('resources/js/app.js')
        <div id="order-container">
            @foreach($ordersArray as $order)
                <div class="block">
                    <a href="#">
                        <div class="box box_bowShadow">
                            <span>{{$order['statusName']}} </span>
                            <div class="split">
                                <div class="split-left">
                                    <div class="totem">
                                        <p class="totem-hd">{{$order['user']['name']}}</p>
                                        <p class="totem-bd">{{$order['user']['phone']}}</p>
                                        <p class="totem-ft">{{$order['user']['email']}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="totem">
                                    <p class="totem-hd"> <b>Products: </b> {{$order['products']}}</p>
                                    <p class="totem-bd"> <b>Total: </b> {{$order['total']}}</p>
                                    <p class="totem-ft">Order Details ➡</p>
                                </div>
                                <div class="split-right">
                                    <img width="150" height="150"
                                         src="https://images.samsung.com/is/image/samsung/p6pim/tr/rt50k600ps9-tr/gallery/tr-rt6000k-top-freezer-with-twin-cooling-plus™-rt50k600p-rt50k600ps9-tr-541824690?$720_576_PNG$"/>
                                </div>

                            </div>
                            <span>{{$order['orderDate']}}</span>
                        </div><!-- end box -->
                    </a>
                </div><!-- end block -->
            @endforeach
        </div>

    </div>


</div>

<script>
    function prependOrder(order) {
        const orderHtml = `
            <div class="block animate-fadeIn">
                <a href="#">
                    <div class="box box_bowShadow">
                        <span>${order.statusName || 'N/A'}</span>
                        <div class="split">
                            <div class="split-left">
                                <div class="totem">
                                    <p class="totem-hd">${order.user.name || 'N/A'}</p>
                                    <p class="totem-bd">${order.user.phone || 'N/A'}</p>
                                    <p class="totem-ft">${order.user.email || 'N/A'}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="totem">
                                <p class="totem-hd"><b>Products: </b>${order.products || 'N/A'}</p>
                                <p class="totem-bd"><b>Total: </b>${order.total || 'N/A'}</p>
                                <p class="totem-ft">Order Details ➡</p>
                            </div>
                            <div class="split-right">
                                <img width="150" height="150" src="https://images.samsung.com/is/image/samsung/p6pim/tr/rt50k600ps9-tr/gallery/tr-rt6000k-top-freezer-with-twin-cooling-plus™-rt50k600p-rt50k600ps9-tr-541824690?$720_576_PNG$"/>
                            </div>
                        </div>
                        <span>${order.orderDate || 'N/A'}</span>
                    </div><!-- end box -->
                </a>
            </div><!-- end block -->
        `;
        const orderContainer = document.getElementById('order-container');
        orderContainer.insertAdjacentHTML('afterbegin', orderHtml);
    }
     setTimeout(() => {
        window.Echo.channel('create-order-{{ Auth::user()->branchId}}').listen('OrderCreated', (e) => {
            console.log(e);
            prependOrder(e);
            showNotification('Yeni bir sipariş alındı!');
            // const audio = new Audio('/sounds/notification.mp3');
            // audio.play();
        });
    }, 1000);
    function loadToast() {
        let toast = document.querySelector(".mycss1");
        toast.style.right = "30px";
        setTimeout(() => {
            toast.style.right = "-400px";
        }, 5000);
    }
    function showNotification(message) {
        const notification = document.createElement('div');
        notification.className = 'notification';
        notification.innerHTML = `
        <p>${message}</p>
        <button onclick="this.parentElement.remove()">×</button>
    `;
        const container = document.getElementById('notification-container');
        container.insertAdjacentElement('afterbegin', notification);
    }

</script>

</body>
</html>
