<?php
 
 require_once "dbconnection/config.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
          <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Middle Initial</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Prc Number</th>
                <th>Dental Chapter</th>
                <th>Action</th>
                <!-- <th>Salary</th> -->
            </tr>
        </thead>
        <tbody>
        	<?php
              $query="SELECT * FROM user";
              $result_u = $conn->query($query);
             
				if ($result_u->num_rows > 0) {
			     while($row_u = $result_u->fetch_assoc()){
									
        	?>
            <tr>
                <td><?php echo $row_u["first_name"]; ?></td>
                <td><?php echo $row_u["middle_initial"]; ?></td>
                <td><?php echo $row_u["last_name"]; ?></td>
                <td><?php echo $row_u["email"]; ?></td>
                <td><?php echo $row_u["phone_number"]; ?></td>
                <td><?php echo $row_u["prc_number"]; ?></td>
                 <td><?php echo $row_u["dental_chapter"]; ?></td>
                 <td><a href="edit.php?id=<?php echo $row_u["user_id"] ?>">Edit</a> <a href="delete.php?id=<?php echo $row_u["user_id"] ?>">Delete</a></td>
            </tr>
            <?php
                 }
               }
            ?>
        </tbody>
      
    </table>


     <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
		</script>

</body>
</html>