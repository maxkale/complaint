 <?php 
 include 'connection.php';
			 if(isset($_GET['id'])){
				deleteComplaint($_GET['id'],$con);
			}
			$data = getComplaints($con);
			$i = 1;
			while($sql = mysqli_fetch_array($data))
			{  ?>  <tr>
                <td><?php echo $i; ?></td>
				<td><?php echo $sql[6]; ?></td>
                <td><?php echo $sql[1]; ?></td>
                <td><?php echo $sql[2]; ?></td>
                <td><?php echo date('d-m-Y',strtotime($sql[4])); ?></td>
                <td><?php echo $sql[7]==1?'Teacher':'Student'; ?></td>
                <td><button class='btn btn-primary' onclick='deleteComplaint(<?php echo $sql[0];?>)'>Delete</button></td>
            </tr>
            <?php $i++; }
			
			function getComplaints($con)
			{
				if($_SESSION['loggedInUser']['id']==1){
				$where = '';
				}else{
					$where = "where user_id=".	$userId = $_SESSION['loggedInUser']['id']." ";
				}
				return mysqli_query($con,"select c.*,concat(u.first_name,' ',u.last_name) as userName,u.type from complaint c left join user u on u.id = c.user_id ".$where.' 
				 group by c.id order by date ');

			}
			
		function deleteComplaint($id,$con)
		{
			return mysqli_query($con,'delete from complaint where id = '.$id.' ');
		}
?>