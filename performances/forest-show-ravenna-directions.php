<?php
class Direction {
    public $text;
    public $image;

    public function  __construct($text, $image) {
      $this->text = $text;
      $this->image = $image;
    }
  }

$directions = array();

$directions[] = new Direction(
    'Take a left at the sign, head down into the ravine',
    '150718-2.jpg'
);
$directions[] = new Direction(
    'Continue straight on the trail, pass under the 15th Ave bridge',
    '150718-3.jpg'
);
$directions[] = new Direction(
    'Continue straight across the footbridge',
    '150718-4.jpg'
);
$directions[] = new Direction(
    'Pass the wooden steps on the left',
    '150718-5.jpg'
);
$directions[] = new Direction(
    'Notice the clearing to the left',
    '150718-6.jpg'
);
$directions[] = new Direction(
    'Enter, walk toward the wooden bridge',
    '150718-7.jpg'
);
$directions[] = new Direction(
    'Cross the small stream',
    '150718-8.jpg'
);
$directions[] = new Direction(
    'Take a left into the performance area',
    '150718-9.jpg'
);
?>