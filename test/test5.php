Error:

Illuminate\Database\QueryException
SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 's Place' at line 1 (SQL: INSERT INTO `place` (`name`) VALUES ('Jimmy's Place'))


Solution:

$place = "Jimmy's Place";
$sql = "INSERT INTO `place` (`name`) VALUES (".$place.")";
//DB::insert($sql); //Laravel Query
$this->db->query($sql);
exit;
