 <?php 

			$data =mysqli_query($con, 'Select * from complaint');
			while($sql = mysqli_fetch_array($data))
			{  ?>
			<tr>
                <td><?php echo $sql[0]; ?></td>
                <td><?php echo $sql[1]; ?></td>
                <td><?php echo $sql[2]; ?></td>
                <td>Mahesh</td>
                <td>28-01-2019</td>
            </tr>
            <?php } 
			
			
			?>