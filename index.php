<html>
	<head>
		<title>Вывод даты первого вторника следующего месяца</title>
	</head>
	<body>
		<h2 align=center>Вывод даты первого вторника следующего месяца</h2>
		<?php
			if(isset($_GET['value'])){
				$Date = DateTime::createFromFormat(
					'Y-m-d',
					$_GET['value']
				);
			}
			else{
				$Date=new DateTime;
			}
		?>
		<form align=center action="index.php" method="GET">
			<input type="date" name="value" value="<?php
			if(isset($Date)){
				echo htmlspecialchars($Date-> Format('Y-m-d'));
			}
			?>">
			<input type="submit" name="result" value="Узнать результат">
		</form>
	    <?php
			if(isset($Date) && isset($_GET['result'])){
				$month = $Date -> Format('m');
				$year = $Date -> Format('Y');
				$day = $Date -> Format('d');
				$currentDate =  new DateTime;
				$currentDate -> setDate($year, $month+1, 1);
				$currentDay = $currentDate -> Format('d');
				$currentMonth = $currentDate -> Format('m');
				$currentYear = $currentDate -> Format('Y');
				for ($i=1; $i<=31; $i++) {
					$NewDate = $currentDate -> setDate($currentYear, $currentMonth, $currentDay);
					$NewDate -> Format('d.m.Y');
					$dayOfWeek = $NewDate -> Format('D');
					if($dayOfWeek=='Tue') {
						echo '<center>Дата первого вторника следующего месяца: '.$NewDate -> Format('d.m.Y').'</center>';
						break;
					}
					$currentDay =$currentDay+1;
				}
			}
		?>
	</body>
</html>
