	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datatable</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>

	</head>
	<body>
		<table id="donations">
			<thead>
	<tr style="background-color: rgb(20,107,164);color:white;">
                            <th>Date</th>
                            <th>Patient_Id</th>
                            <th>Patient_Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Contact_Details</th>
                            <th>Medical_History</th>
                            <th>Investigations_Done</th>
                            <th>Diagnosis</th>
                        </tr>
                    </thead>
<tbody>

<?php

$host='localhost';
$dbusername='root';
$dbpassword='';
$dbname='patient_handbook_dev';
$conn = mysqli_connect($host,$dbusername,$dbpassword, $dbname);

if($conn->connect_error)
{
 die('Connection Failed :'.$conn->connect_error);
}
else
{

 $query = "SELECT * from Details";
                                $result = mysqli_query($conn,$query);
while ($res = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>".$res['Date']."</td>";
                                    echo "<td>".$res['Patient_Id']."</td>";
                                    echo "<td>".$res['Patient_Name']."</td>";
                                    echo "<td>".$res['Age']."</td>";
                                    echo "<td>".$res['Gender']."</td>";
                                    echo "<td>".$res['Contact_Details']."</td>";
                                    echo "<td>".$res['Medical_History']."</td>";
                                    echo "<td>".$res['Investigations_Done']."</td>";
                                    echo "<td>".$res['Diagnosis']."</td>";
                                    echo "</tr>";
                                }

                            }
?>

    </script>
    </tbody>
</table>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#donations').DataTable();
    });
    var donations = $('#donations').DataTable();
 
$('#donations').on( 'click', 'tbody tr', function () {
    donations.row( this ).delete();
} );

var donations1 = $('#donations').DataTable();
 
$('#donations').on( 'click', 'tbody tr', function () {
    donations1.row( this ).delete( {
        buttons: [
            { label: 'Cancel', fn: function () { this.close(); } },
            'Delete'
        ]
    } );
} );

</script>




</body>
</html>