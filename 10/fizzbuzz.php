<?php
for ($i = 1; $i <= 100; $i += 1) {
  echo $i;
  if ($i % 3 == 0 && $i % 5 == 0) {
    echo ':FizzBuzz';
  } elseif ($i % 5 == 0) {
    echo ':Buzz';
  } elseif ($i % 3 == 0) {
    echo ':Fizz';
  }
  echo '<br>';
}
?>