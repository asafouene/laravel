<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="csv_file" accept=".csv" value="csv" />
    <input type="submit" name="submit" value="Save" /></form>
<?php
if (isset($_POST['Submit'])) {
$csv = array();
dd($_FILES['csv_file']);
// check there are no errors
if($_FILES['csv_file']['error'] == 0){
$name = $_FILES['csv_file']['name'];
$ext = strtolower(end(explode('.', $_FILES['csv_file']['name'])));
$type = $_FILES['csv_file']['type'];
$tmpName = $_FILES['csv_file']['tmp_name'];

// check the file is a csv
if($ext === 'csv_file') {
if (($handle = fopen($tmpName, 'r')) !== FALSE) {
// necessary if a large csv file
set_time_limit(0);

$row = 0;

while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
// number of fields in the csv
$col_count = count($data);

// get the values from the csv
$csv[$row]['col1'] = $data[0];
$csv[$row]['col2'] = $data[1];

// inc the row
$row++;
}
fclose($handle);
}
}
}}