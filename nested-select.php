<?php
/**
 * Using a select statement in a where clause.
 * With given variable $area, find its respective Region from the rStore Table
 * Set Region equal to that query.
 */
$sql = "SELECT * from rStore join levels_list as list on rStore.Store = list.Store where Region = (select Region from (select * from rStore where Store = '$area')ras) order by list.Store";
?>