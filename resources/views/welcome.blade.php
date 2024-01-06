<!doctype html>
<div lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.css"/>
        <script src="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
        <style>
            .container {
                width: 1000px;
                margin-top:200px;
                margin-left: auto;
                margin-right: auto;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <h1>PingPong test language for lsofphp-api</h1>
        <p>Click button to check:</p>
        <button onclick="sendNotify()">click to send packet with epoch time</button>
        <hr>
        <p>Created by <a href="https://github.com/ryczek02">@ryczek02</a></p>


    </body>
</div>
<script>
    function sendNotify() {
        var epoch = Date.now();
        fetch('http://localhost:80/send_specified?message=' + epoch);
    }

    function pushNotify(msg) {
        new Notify({
            status: parseInt(msg) < 100 ? 'success' : 'warning',
            title: "PING",
            text: msg,
            speed: 300,
            customClass: null,
            customIcon: null,
            showIcon: true,
            showCloseButton: true,
            autoclose: false,
            autotimeout: 3000,
            gap: 20,
            distance: 20,
            type: 1,
            position: 'right top'
        })
    }

    const url = new URL('http://localhost:9000/.well-known/mercure');

    url.searchParams.append('topic', 'public-topic-1');
    const es = new EventSource(url);
    es.onmessage = (msg) => {
        var recieve = Date.now();
        console.log('ping pong test:' + recieve - msg.data);
        pushNotify((recieve - msg.data) + "ms")
    }
</script>

</html>

