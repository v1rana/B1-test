<?php  defined('BASEPATH') OR exit('No direct script access allowed');   ?>
	
<section class="whole-content">
	<div class="container">
		<header>
			<h1>Haryana Police</h1><br>					
			<h2>B1 Test Registration Card</h2>					
		</header>
		<div class="content-box">
			<form >
				<figure>
					
				</figure>
				<table>
					<tbody>
						<tr>
							<td>Name : </td>
							<td><span><?php echo $currentuserdata[0]['firstname']."".$currentuserdata[0]['lastname']; ?></span></td>
						</tr>
						<tr>
							<td>Belt Number : </td>
							<td><span><?php echo $currentuserdata[0]['beltnumber']; ?></span></td>
						</tr>
						<tr>
							<td>Date of Birth : </td>
							<td><span><?php echo $currentuserdata[0]['dob']; ?></span></td>
						</tr>
						<tr>
							<td>Test Code : </td>
							<td><span><?php echo $currentuserdata[0]['testcode']; ?></span></td>
						</tr>
					</tbody>
				</table>
				<br><br><br>
				<a href="<?php base_url('registration/printdata'); ?>" target="_blank">Print</a>
			</form>
		</div>				
	</div>
</section>
		