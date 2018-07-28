<?php
	require '../forest-show-2.php';
	require '../forest-show-ravenna-directions.php';
?>
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
            opacity: 0;
            transition: opacity 3s;
            font-family: 'Times New Roman', serif;
            font-style: italic;
            letter-spacing: -0.75px;
        }
        div {
            margin: 0 auto;
            max-width: 600px;
        }
        .wrapper {
            opacity: 0;
            transition: opacity 2s 1s;
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
		#directions {
			display: none;
		}
		#directions li {
			opacity: 0;
			transition: opacity 1s;
		}
    </style>
</head>
<body>
<div>
    <h1>secret forest show</h1>
</div>
<div class="wrapper">
    <p>
        August 4, 2018, 7:30 pm
    </p>
    <p>
        Neil Welch and John Teske<br />
        with Samantha Boshnack, Greg Campbell, Ebony, and Noel Kennon.
    </p>
    <ol>
		<?php $starting_location = 'We\'ll meet at at the Cowen Park entrance on ' .
			'<a href="https://goo.gl/maps/XDLt7" target="_blank" title="View on Google maps" style="text-decoration: underline;">' .
				'NE 61st and Brooklyn Ave NE' .
			'</a> ' .
			'and walk to the performance area together.'
		?>
		<?php echo_direction(
			$starting_location,
			'150718-1.jpg')
		?>
		<li>
			<p>
				If you're arriving late and we've already left, follow the path down the ravine.
				<a href="#directions" id="show-directions">Show me the way.</a>
			</p>
		</li>
    </ol>
    <ol id="directions" style="padding-top: 1em">
		<?php foreach ($directions as $key=>$dir) {
		    echo_direction(
				($key + 1) . '. ' . $dir->text,
				$dir->image
			);
		} ?>
    </ol>
</div>
<script>
    function deferImg() {
        var h1 = document.getElementsByTagName('h1')[0];
        var wrapper = document.getElementsByClassName('wrapper')[0];

        // h1.innerHTML = 'shh&hellip;';
        h1.style.opacity = 1;

        var imgs = document.getElementsByTagName('img');
        for (var i = 0; i < imgs.length; i++) {
            var src = imgs[i].getAttribute('data-src');
            if (src) {
                imgs[i].setAttribute('src', src);
            }
        }

        // h1.innerHTML = 'secret forest show';
        wrapper.style.opacity = 1;
    }
	window.onload = deferImg;

	var directions = document.getElementById('directions');

	function fadeInDirection(index) {
		setTimeout(function () {
			directions.children[index].style.opacity = 1;
		}, index * 300);
	}

	document.getElementById('show-directions').addEventListener('click', function() {
		directions.style.display = 'block';
		for (var i = 0; i < directions.children.length; i++) {
			fadeInDirection(i);
		}
	});
</script>
</body>
</html>
