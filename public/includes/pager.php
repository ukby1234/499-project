<?php
	function print_pager($page, $total_page, $url)
	{
		
		if ($page > 0)
		{
			$new_url = $url . ($page - 1);
			echo "<a href=\"{$new_url}\">&lt;  Prev </a>";
		}

		for ($i = 0; $i < $total_page; $i++)
		{
			if($page != $i)
				echo "<a href=\"{$url}{$i}\">$i </a>";
			else
				echo "<strong>$i</strong>";
		}
		
		if ($page < $total_page - 1)
		{
			$new_url = $url . ($page + 1);
			echo "<a href=\"{$new_url}\">Next  &gt;</a>";
		}

	}
?>
