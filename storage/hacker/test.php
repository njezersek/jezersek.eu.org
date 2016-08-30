<?php
	
	echo "SELECT COUNT(*) as count FROM members WHERE displayed_name LIKE '%".str_replace(array('%', '_'), array('\%', '\_'), $_GET['search'])."%'".$never_activated_sql." ORDER BY ".$sort_part_sql;