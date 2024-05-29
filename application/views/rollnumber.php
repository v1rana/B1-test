<?php  defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('user_id')) {  ?>

	
<?php
    //print_r($currentuserdata);
?>

<!DOCTYPE html>
<html>
	<head>		
		<style>
			html, body, div, span, applet, object, iframe,h1, h2, h3, h4, h5, h6, p, blockquote, pre,a, abbr, acronym, address, big, cite, code,del, dfn, em, img, ins, kbd, q, s, samp,small, strike, strong, sub, sup, tt, var,b, u, i, center,dl, dt, dd, ol, ul, li,fieldset, form, label, legend,table, caption, tbody, tfoot, thead, tr, th, td,article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary,time, mark, audio, video {
			margin: 0;	padding: 0;	border: 0;	font-size: 100%;	font: inherit;	vertical-align: baseline;}
			/* HTML5 display-role reset for older browsers */
			article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {	display: block;}
			body {	line-height: 1;}
			ol, ul {	list-style: none;}
			blockquote, q {	quotes: none;}
			blockquote:before, blockquote:after,q:before, q:after {	content: '';	content: none;}
			table {	border-collapse: collapse;	border-spacing: 0;}			
			.whole-content {text-align:center;padding:50px;font-size:15px;margin:50px; border:#000 solid 1px;}
			.top-heading {margin-bottom:15px;display:block;}
			.whole-content h1 {font-size:30px; font-weight:bold;text-transform:uppercase;margin-bottom:15px;}
			.whole-content p{font-size: 14px; line-height:20px; font-weight:normal;margin-bottom:20px;}
			figure {height:120px; width:100px;border:#000 solid 1px;float:right;}			
			.inner-ul {display:block;padding-left:15px;}
			.inner-ul li span {margin-right:4px;}
			.inner-ul li {display:block; margin-top:15px;}
			form {text-align:left;}
			form table tr td:first-child {width:200px;}
			form table td {padding-top:20px;font-size:17px;}
			footer {text-align:left;}
			footer strong {font-size:24px; font-weight:bold;}
			.footer-ul {margin-top:10px;}
			.footer-ul  li +li{margin-top:15px;}
			.footer-ul  li p {padding-left:15px; padding-top:8px;}
		</style>
	</head>	
	<body>
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
                        <button onclick="myFunction()">Print</button>
					</form>
				</div>				
			</div>
		</section>


        <script>
            function myFunction() {
                window.print();
            }
        </script>


	</body>	
</html>   



<?php } else {
    redirect(base_url() . 'main/index');
    
}?>