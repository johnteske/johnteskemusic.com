<?php
	$title = 'Performances';
	$class = 'perf';
	include '../header.php';?>
<!-- content -->
<?php
	$today = date('ymd');
	$files = glob('*.perf');
	$upcoming = array();
	$past = array();
	rsort($files);

	foreach($files as $item)
	{
	    if ( $today > $item ) {
	        array_push($past, $item);
	    } else {
	        array_push($upcoming, $item);
    	}
	};
	sort($upcoming);
?>
				<div class="row">
					<section class="9u$ 12u$(2)">
					<header>
						<h2>Upcoming Performances</h2>
					</header>
					</section>
				</div>
				<div class="upcoming">
<?php
	foreach ($upcoming as $file_num => $file):
		$lines = file($file); ?>
					<div class="row">
						<header class="2u 3u(2) 12u$(4) date">
							<?php // $thisdate = date_create_from_format('ymd', $lines[0] ); ?>
							<!-- <h2><?php echo $thisdate, date_format($thisdate, 'M'); ?></h2> -->
							<!-- <h2><?php echo $thisdate; ?></h2> -->

							<?php echo date("F", mktime(0, 0, 0, substr($lines[0], 2, 2), substr($lines[0], 4, 2), substr($lines[0], 0, 2))); ?>
							<?php echo substr($lines[0], 0, 2); ?>
							<?php echo substr($lines[0], 2, 2); ?>
							<?php echo substr($lines[0], 4, 2); ?>

							<?php //$thisdate = substr($lines[0], 0, 2) . "-" . substr($lines[0], 2, 2) . "-" . substr($lines[0], 4, 2); ?>
							<h2><?php echo $thisdate; ?></h2>
							<?php //$newdate =  date_create_from_format('y-m-d', '$thisdate'); ?>
							<?php //echo $newdate; ?>


 							<h3><?php echo $lines[0]; ?><?php echo $lines[1]; ?></h3>
 							<!-- <h3><?php echo $lines[0]; ?><?php echo $lines[1]; ?></h3> -->
							<p><?php echo $lines[2]; ?></p>
						</header>
						<section class="7u$ 9u$(2) 12u$(4)">
						<header>
							<h3><a class="perf-title" href="<?php echo $lines[8]; ?>"><?php echo $lines[3]; ?></a></h3>						
							<p><?php echo $lines[4]; ?></p>
						</header>
							<p>
								<?php echo $lines[5]; ?>
							</p>
							<p>
								<?php echo $lines[6]; ?>
							</p>
							<p>
								<?php echo $lines[7]; ?>
							</p>
						</section>
					</div> 
<?php endforeach; ?>
				</div>
				<div class="row">
					<section class="9u$ 12u$(2)">
					<header>
						<h2>Notable Past Performances</h2>
					</header>
					</section>
				</div>
				<div class="past">
<?php
	foreach ($past as $file_num => $file):
		$lines = file($file); ?>
					<div class="row">
						<header class="2u 3u(2) 12u$(4) date">
 							<h4><?php echo $lines[0]; ?><?php echo $lines[1]; ?></h4>
 							<!-- <h3><?php echo $lines[0]; ?><?php echo $lines[1]; ?></h3> -->
							<!-- <p><?php echo $lines[2]; ?></p> -->
						</header>
						<section class="7u$ 9u$(2) 12u$(4)">
						<header>
							<h4><a class="perf-title" href="<?php echo $lines[8]; ?>"><?php echo $lines[3]; ?></a></h4>
							<!-- <h3><a class="perf-title" href="<?php echo $lines[8]; ?>"><?php echo $lines[3]; ?></a></h3>						 -->
							<!-- <p><?php echo $lines[4]; ?></p> -->
						</header>
						<!-- RE-DO CSS SINCE I CAN JUST FILTER IT OUT HERE -->
<!-- 							<p>
								<?php echo $lines[5]; ?>
							</p>
							<p>
								<?php echo $lines[6]; ?>
							</p>
							<p>
								<?php echo $lines[7]; ?>
							</p>
 -->	
 					</section>
					</div> 
<?php endforeach; ?>
				</div>

<!-- content -->
<?php $photo = 'Photo by Blake Bumpus.';
	include '../footer.php';?>