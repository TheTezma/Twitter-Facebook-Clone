<?php
session_start();
include 'dbconnect.php';
include 'Twit-Func.php';
include 'format.php';

$GetTrends = $Connect -> query("SELECT * FROM trending ORDER BY hits LIMIT 10");
while($Trends = $GetTrends -> fetch_array()):
?>
<span class="trending-title">Trending</span>

<div class="trend-box">
	<a class="trend" href="hashtag/<?= $Trends['hashtag'] ?>">#<?= $Trends['hashtag'] ?></a><br>
	<span class="trend-hits"><?= $Trends['hits'] ?></span>
</div>

<style type="text/css">
	.trending-title {
		margin-left: 5px;
		color: #66757F;
		font-size: 20px;
	}
	.trend-box {
		padding: 5px;
	}
	.trend {

	}
	.trend-hits {

	}
</style>
<?php
endwhile;
?>