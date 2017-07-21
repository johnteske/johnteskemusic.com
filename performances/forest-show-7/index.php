<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>shh...</title>
    <style>
        body {
            background-color: #fffcf9;
            padding: 22px 44px;
            font-family: 'Courier New', Courier, monospace;
        }
        h1 {
            font-family: 'Times New Roman', serif;
            font-style: italic;
            letter-spacing: -0.75px;
        }
        div {
            margin: 0 auto;
            max-width: 600px;
        }
        ol {
            padding: 0;
            list-style: none;
        }
        li {
            margin-bottom: 2em;
        }
        img {
            width: 100%;
        }
    </style>
</head>
<body>
<div>
    <h1>secret forest show</h1>
    <p>
        July 29, 2017, 7:30 pm
    </p>
    <p>
        Neil Welch and John Teske<br />
        with Greg Campbell and Haley Freedlund
    </p>
    <p>
        B.Y.O. blanket and bugspray
    </p>
    <ol>
        <li>
            <a href="https://www.google.com/maps/@47.664711,-122.411557,321m/data=!3m1!1e3?hl=en-US">
                <img data-src="img/1200/map.png" />
            </a>
            <p>
                Starting location:<br />
                <a href="https://www.google.com/maps/dir//Discovery+Park,+3801+Discovery+Park+Blvd,+Seattle,+WA+98199/@47.657302,-122.4076847,17z/data=!4m15!1m6!3m5!1s0x549015f0e18e409f:0x519842caa4fa6320!2sDiscovery+Park!8m2!3d47.657302!4d-122.405496!4m7!1m0!1m5!1m1!1s0x549015f0e18e409f:0x519842caa4fa6320!2m2!1d-122.405496!2d47.657302">Discovery Park</a>, north parking lot<br />
                Accessible by bike, <a href="http://kingcounty.gov/depts/transportation/metro/schedules-maps/033.aspx">Route 33</a>, car
            </p>
        </li>
        <li>
            <img data-src="img/1200/1.jpg" />
            <p>
                1. Go to the traffic island with the three large trees near the entrance to the parking lot.
            </p>
        </li>
        <li>
            <img data-src="img/1200/2.jpg" />
            <p>
                2. Notice the trail to the south. Enter.
            </p>
        </li>
        <li>
            <img data-src="img/1200/3.jpg" />
            <p>
                3. At the first fork, take a left.
            </p>
        </li>
        <li>
            <img data-src="img/1200/4.jpg" />
            <p>
                4. Take a right at the T.
            </p>
        </li>
        <li>
            <img data-src="img/1200/5.jpg" />
            <p>
                5. Take the smaller trail forking to the left.
            </p>
        </li>
        <li>
            <img data-src="img/1200/6.jpg" />
            <p>
                6. Take a sharp right.
            </p>
        <li>
            <img data-src="img/1200/7.jpg" />
            <p>
                7. You've arrived.
            </p>
        </li>
    </ol>
</div>
<script>
    function deferImg() {
        var imgDefer = document.getElementsByTagName('img');
        for (var i = 0; i < imgDefer.length; i++) {
            var src = imgDefer[i].getAttribute('data-src');
            if (src) {
                imgDefer[i].setAttribute('src', src);
            }
        }
    }
    window.onload = deferImg;
</script>
</body>
</html>