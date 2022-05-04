<?php include_once('headerTemplate.php'); ?>
	
		<div id='selectedMenuType' >
			<?php 
			
				include_once('config.php');
				include_once('class/cat.class.php');
			
				$catt = new CatDish($db);
				$catts = $catt->getCatts();
				
				$lastColumn = intval(count($catts) / 3) - 1;
				
				$countColumnn = 0;
				$tmp = 0;
				
				foreach($catts as $row)
				{
					$class = 'choiceItem';
					
					if($tmp++ == 3)
					{
						$countColumnn++;
						$tmp = 0;
					}
					
					if($row['id'] == 1)
						$class .= ' selChoice';
					
					if(($row['id'] % 3) > 0 && $countColumnn == $lastColumn)
						$class .= ' centerChoice';
					
					echo '<a class=\'noLink\' href=\'/cat'.$row['id'].'\' ><div class=\''.$class.'\' >'.$row['title'].'</div></a>';
				}
				
				unset($tmp); unset($lastColumn); unset($countColumnn);
			?>
		</div>
		
		<div id='menuMainPage' class='menuBox' >

			<a href='#' class='dishBox' >
				<div class='dish' >
					<img src='img/salat0_NORMAL.png' />
					
					<div class='dishTtitle' >Салат "Натали"</div>
					<div class='dishPrice' >24грн</div>
					<div class='dishDesc' >Курка варена, капуста, кукурудза, сир твердий, сухарики, майонез</div>
				</div>
			</a>
			
			<a href='#' >
				<div class='dish' >
					<img src='img/salat0_NORMAL.png' />
					
					<div class='dishTtitle' >Салат "Натали"</div>
					<div class='dishPrice' >24грн</div>
					<div class='dishDesc' >Курка варена, капуста, кукурудза, сир твердий, сухарики, майонез</div>
				</div>
			</a>
			
			<a href='#' >
				<div class='dish' >
					<img src='img/salat0_NORMAL.png' />
					
					<div class='dishTtitle' >Салат "Натали"</div>
					<div class='dishPrice' >24грн</div>
					<div class='dishDesc' >Курка варена, капуста, кукурудза, сир твердий, сухарики, майонез</div>
				</div>
			</a>
			
			<a href='#' >
				<div class='dish' >
					<img src='img/salat0_NORMAL.png' />
					
					<div class='dishTtitle' >Салат "Натали"</div>
					<div class='dishPrice' >24грн</div>
					<div class='dishDesc' >Курка варена, капуста, кукурудза, сир твердий, сухарики, майонез</div>
				</div>
			</a>

			<a href='#' >
				<div class='dish' >
					<img src='img/salat0_NORMAL.png' />
					
					<div class='dishTtitle' >Салат "Натали"</div>
					<div class='dishPrice' >24грн</div>
					<div class='dishDesc' >Курка варена, капуста, кукурудза, сир твердий, сухарики, майонез</div>
				</div>
			</a>
			
			<a href='#' >
				<div class='dish' >
					<img src='img/salat0_NORMAL.png' />
					
					<div class='dishTtitle' >Салат "Натали"</div>
					<div class='dishPrice' >24грн</div>
					<div class='dishDesc' >Курка варена, капуста, кукурудза, сир твердий, сухарики, майонез</div>
				</div>
			</a>
			
			<a href='#' >
				<div class='dish' >
					<img src='img/salat0_NORMAL.png' />
					
					<div class='dishTtitle' >Салат "Натали"</div>
					<div class='dishPrice' >24грн</div>
					<div class='dishDesc' >Курка варена, капуста, кукурудза, сир твердий, сухарики, майонез</div>
				</div>
			</a>
			
			<a href='#' >
				<div class='dish' >
					<img src='img/salat0_NORMAL.png' />
					
					<div class='dishTtitle' >Салат "Натали"</div>
					<div class='dishPrice' >24грн</div>
					<div class='dishDesc' >Курка варена, капуста, кукурудза, сир твердий, сухарики, майонез</div>
				</div>
			</a>

		</div>
		
<?php include_once('bottomTemplate.php'); ?>