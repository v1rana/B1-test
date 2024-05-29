<?php 
//exit;
 defined('BASEPATH') OR exit('No direct script access allowed');   ?>
<?php if($this->session->userdata('Candidate_data')) { 
	
		// echo "<pre>";
		// print_r($this->session->userdata('Candidate_data'));
		// print_r($info);
		// exit;
		
		
		$pic = $info[0]['photo'];
	
?>

<section class="instruction-page">
	<div class="container">
		<div class="row align-items-end">
			<div class="col-xs-12 col-sm-6">
				<h1><span>Welcome</span> <?php echo $info[0]['firstname']." ".$info[0]['lastname']; ?>,</h1>
				<div class="belt-no">
					<span>Belt Number : <strong><?php echo $info[0]['beltnumber']; ?></strong></span>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<figure><?php
					if($info[0]['photo'] !=''){echo "<img class=img-fluid src=".base_url()."assets/images/candidates/$pic>";} else { echo "<img class=img-fluid src=".base_url()."assets/images/candidates/user2.png>";}  ?></figure>
			</div>
		</div>
		
		<div class="row">	
			<div class="col-xs-12 col-sm-12">		
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-sm candi-table">
						<thead>
							<tr>
								<th>IMPORTANT INSTRUCTIONS/GUIDELINES FOR ‘LOWER SCHOOL ENTRANCE TEST, 2020’ AND SELECTION OF CANDIDATES IN LIST B-1 UNDER 62% CATEGORY FOR THE YEAR 2020.</th>
								<th> वर्ष 2020 के लिए निम्न विद्यालय प्रवेष परीक्षा (लोअर स्कूल इन्ट्रैंस टैस्ट) तथा 62 प्रतिषत श्रेणी में सूची बी-1 में उम्मीदवारो के चयन के लिए महत्वपूर्ण हिदायतेध्मार्गदर्षनः-</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1. All eligible constables appearing in this ‘Online’ Lower School Entrance Test-2020 will be called ‘Candidate’.</td>
								<td>1.  इस ऑनलाइन बी0-1 परीक्षा, 2020 में उपस्थित होने वाले सभी पात्र सिपाही उम्मीदवार कहलाये  जाएगें।</td>
							</tr>
							<tr>
								<td>2. All eligible candidates must have <strong>a valid Email ID</strong> for their awareness about the test procedure.</td>
								<td>2.  सभी उम्मीदवारो के पास परीक्षा प्रक्रिया के बारे में उसकी जानकारी के लिए <strong>एक वैध ईमेल आई. डी. </strong>होनी चाहिये। </td>
							</tr>
							<tr>
								<td>3. The familiarization regarding Online B-I Test will be done during the Mock-Test of all candidates.  </td>
								<td>3.  सभी परीक्षार्थियों को अभ्यास/मॉक परीक्षा के दौरान ऑनलाइन बी-1 परीक्षा का अभ्यास कराया जाएगा।</td>
							</tr>
							<tr>
								<td>4. They should report to the examination hall an hour before the start of examination in uniform along with his/her proper ID Card;</td>
								<td>4.  उन्हे अपने उचित पहचान पत्र (आई. डी. कार्ड) सहित पूर्ण वर्दी  में परीक्षा शुरू होने से एक घंटा पूर्व परीक्षा हाल  में रिपोर्ट करनी चाहिये। </td>
							</tr>
							<tr>
								<td>5. No entry shall be allowed after test starts.</td>
								<td>5.  परीक्षा शुरू होने के बाद प्रवेष की अनुमति नहीं दी जायेगी।</td>
							</tr>
							<tr>
								<td>6. A copy of admit card along with passward will be handed over to the candidates before commencing the Online B-1 Test.</td>
								<td>6. सभी परीक्षार्थियों को ऑनलाइन बी-1 परीक्षा शुरू होने से पूर्व एडमिट कार्ड (पासवर्ड सहित) की प्रति दी जाएगी। </td>
							</tr>
							<tr>
								<td>7. Use of Mobile Phone or any electronic device will strictly be prohibited during the Online B-1 Test.</td>
								<td>7.  आनॅलाईन परीक्षा के दौरान परीक्षा भवनो  में उम्मीदवार को मोबाईल या किसी भी प्रकार के इलैक्ट्रोनिक उपकरण का प्रयोग करने की अनुमति नहीं है। </td>
							</tr>
							<tr>
								<td>8. The copy of result card duly signed by registrar will be handed over to the candidates after completion of the exam.</td>
								<td>8.  सभी परीक्षार्थियों को ऑनलाइन बी-1 परीक्षा समाप्त होने के बाद रजिस्ट्रार द्वारा हस्ताक्षरित रिजल्ट कार्ड की प्रति प्रदान की जाएगी।</td>
							</tr>
							<tr>
								<td>9. Every candidate has to sign the final result card and submit it to the registrar for official record.</td>
								<td>9.  सभी परीक्षार्थियों को उपरोक्त रिजल्ट कार्ड की स्वयं द्वारा एक हस्ताक्षरित प्रति रजिस्ट्रार को कार्यालय रिकार्ड के लिए जमा करवानी होगी। </td>
							</tr>
							<tr>
								<td>10. Any discrepancy must be brought to the notice of the respective registrar and Admin. </td>
								<td>10.  कोई भी अनियम्मितता निष्चित रूप से सम्बधिंत रजिस्ट्रार एवं ऐडमिन के संज्ञान में लाई जानी चाहिए।</td>
							</tr>
							<tr>
								<td>11. It must be ensured that ‘COVID-19’ pandemic related protocols, as prescribed by Central and State Health authorities, from time to time, are followed properly. </td>
								<td>11.  यह सुनिश्चित किया जाना चाहिए कि केंद्र और राज्य के स्वास्थ्य अधिकारियों द्वारा समय-समय  पर निर्धारित ‘कोविड-19‘ महामारी संबंधी प्रोटोकॉल का ठीक से पालन किया जाए। </td>
							</tr>
						</tbody>
					</table>
					
					
					<table class="table table-bordered table-hover table-sm candi-table">
						<thead>
							<tr>
								<th>Important instructions/guidelines for Login</th>
								<th>लोगिन के लिए महत्वपूर्ण हिदायते / मार्गदर्षनः- </th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1. The mode of examination for Lower School Entrance Test is an ‘online’ for selection in list B-1 under 62% category  for admission in Lower School Course for the year 2020;</td>
								<td>1. वर्ष 2020 के लिए निम्न विद्यायल पाठयक्रम (लोअर स्कूल कोर्स) में प्रवेष के लिए 62 प्रतिषत श्रेणी में सूची बी-1 में चयन के लिए निम्न विद्यालय प्रवेष परीक्षा (लोअर स्कूल इन्ट्रैंस टैस्ट) ऑनलाइन परीक्षा की पद्धति है।  </td>
							</tr>
							<tr>
								<td>2. This online test will be of 90 (ninety) minutes duration and will be finished automatically after such duration;</td>
								<td>2. यह ऑनलाइन परीक्षा 90 (नब्बे) मिनट की अवधि की होगी तथा इस अवधि के बाद स्वतः समाप्त हो जायेगी। </td>
							</tr>
							<tr>
								<td>3. There will be total 140 multiple-choice questions in the said test;  </td>
								<td>3. उक्त परीक्षा में वस्तुनिष्ठ किस्म के कुल 140 बहुविकल्पीय (multiple-choice) प्रष्न होंगे तथा negative marking भी की जाएगी।  </td>
							</tr>
							<tr>
								<td>4. Each question will have four responses suggested as answers, out of which only one that seems appropriate must be selected.</td>
								<td>4. प्रष्न प्रकृति में बहुविकल्पीय (multiple-choice) किस्म के होगे। प्रत्येक प्रष्न उत्तर के रूप में सुझाए गये चार उत्तरों के होगें, जिसमें से जो एक उचित दिखाई दे उसे चुना जाना चाहिये। </td>
							</tr>
							<tr>
								<td>5. Each questions carries one mark with a provision of <strong>negative marking at the rate 0.25 mark</strong> for marking an incorrect answer and zero marks for not attempting the question;</td>
								<td>5. प्रत्येक प्रष्न एक अंक का होगा तथा प्रष्न का हल न करने के लिए षून्य अंक दिया जायेगा। <strong>गलत उत्तर का चयन (मार्क) करने पर 0.25 अंक</strong> की दर से नकारात्मक अंक देने के प्रावधान होगें। </td>
							</tr>
							<tr>
								<td>6. The answer of those questions which have already been attempted can be changed/modified again during the test before final submission.</td>
								<td>6. परीक्षा के अन्त में final "submit" बटन दबाने से पहले उन प्रष्नों के उत्तर जो पहले हल कर दिये गये है को परीक्षा के दौरान दोबारा बदला जा सकता है / संसोधित किया जा सकता है।  </td>
							</tr>
							<tr>
								<td>7. The candidates shall have to score a minimum of fifty percent to qualify in this ‘online test’ and only those candidates who qualify shall be allowed to appear in the parade test and for eventual selection within 62% category of list B, 2020.  </td>
								<td>7. उम्मीदवार को इस ऑनलाइन परीक्षा में उत्तीर्ण (पास) होने के लिए कम से कम 50 प्रतिषत अंक लेने होंगे तथा केवल उन उम्मीदवारो को ही जो उत्तीर्ण (पास) है सूची  बी-1 2020 के 62 प्रतिषत श्रेणी में परेड परीक्षा में हाजिर होने तथा अन्तिम चयन के लिए अनुमति प्रदान की जाएगी। </td>
							</tr>
							<tr>
								<td>8. Candidates should report to the examination hall an hour before the start of examination. No entry shall be allowed after test starts.</td>
								<td>8. उम्मीद्वार को परीक्षा के शुरू होने से एक घंटा पहले परीक्षा हाल में रिपोर्ट करनी चाहिये।  </td>
							</tr>
							<tr>
								<td>9. After submission of the test candidate will not be allowed to re-enter the test hall</td>
								<td>9. परीक्षा की प्रस्तुति के बाद उम्मीदवार को परीक्षा हाल में पुनः प्रवेष करने के लिए अनुमति नही दी जायेगी।  </td>
							</tr>
							<tr>
								<td>10. Alert message will be displayed at 30, 20 and 10 minutes prior the prescribed time limit (90 minutes) for this ‘Online Test’.</td>
								<td>10. ऑनलाइन परीक्षा के प्रारम्भ के निर्धारित समय सीमा से 30, 20 तथा 10 मिनट पहले चेतावनी संदेष प्रदर्षित किया जायेगा। </td>
							</tr>
							<tr>
								<td>11. The candidate must preserve his / her admit card until the examination process is over, since it will be required at the time of Parade Test.</td>
								<td>11. उम्मीदवार को परीक्षा प्रक्रिया समाप्त होने तक अपना एडमिट कार्ड सुरक्षित रखना चाहिये जैसा कि यह परेड परीक्षा के समय पर अपेक्षित होगा। </td>
							</tr>
							<tr>
								<td>12. Candidates can approach the Centre Superintendent/ Invigilator/Registrar in the room if they require any technical assistance, first aid emergency or any information regarding the test.</td>
								<td>12. उम्मीदवारों को परीक्षा के बारे में यदि कोई तकनीकि सहायता, आपात के समय प्राथमिक सहायता या कोई सुझाव अपेक्षित है, तो वे कक्ष में केन्द्र अधीक्षक/ निरीक्षक/ रजिस्ट्रार के पास जा सकते है।   </td>
							</tr>
							<tr>
								<td>13. The candidate is prohibited to use any textbook, course notes, or receive help from a proctor or any outside source.</td>
								<td>13. उम्मीदवार के लिए किसी पाठ्य पुस्तक, पाठ्य क्रम नोट का प्रयोग करना या सहायता प्राप्त करना निषिद्ध होगा।  </td>
							</tr>
							<tr>
								<td>14. If the candidate is found in possession of books / any other printed material / any other paper from which he /she might take assistance, he/she is liable to be treated as DISQUALIFIED. Similarly, if the candidate is found giving or obtaining, (or attempting to give or obtain) assistance from any source, he or she is liable to be DISQUALIFIED.</td>
								<td>14. यदि उम्मीदवार के पास कोई पुस्तक / कोई अन्य मुद्रित सामग्री  / कोई अन्य कागज पाया जाता है जिससे वह सहायता ले सकता है / सकती है, तो वह निरर्हित (अयोग्य) के रूप में समझे जाने के लिए उत्तरदायी होगा / होगी। इसी प्रकार, यदि उम्मीदवार किसी स्त्रोत से कोई सहायता देता हुआ या प्राप्त करता हुआ पाया जाता है, तो वह निरर्हित (अयोग्य) के रूप उत्तरदायी होगा / होगी।   </td>
							</tr>
							<tr>
								<td>15. If any candidate is found using any unscrupulous means during the examination, he/she shall be disqualified and necessary disciplinary action would be taken against him/her. </td>
								<td>15. यदि कोई उम्मीदवार परीक्षा के दौरान किसी अनैतिक साधन का प्रयोग करते हुये पाया जाता है तो निरर्हित (अयोग्य) होगाध्होगी तथा उसके विरूद्व आवष्यक अनुषासनिक कार्यावाही की जायेगी।  </td>
							</tr>
						</tbody>
					</table>
					
					<table class="table table-bordered table-hover table-sm candi-table">
						<thead>
							<tr>
								<th>Important instructions/guidelines for Logout (Finishing) </th>
								<th>लॉग आऊट (समापन) के लिए महत्वपूर्ण हिदायते / मार्गदर्षनः- </th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1. Candidate can see his/her online test result after finishing the same.</td>
								<td>1. उम्मीदवार परीक्षा के समापन के बाद अपना ऑनलाइन परीक्षा परिणाम देख सकता / सकती है। </td>
							</tr>
							<tr>
								<td>2. A <strong>hard copy of his/her result card/sheet</strong> duly signed by the registrar shall be given to the candidate, after completion of said ‘Online’ Test. </td>
								<td>2. सभी परीक्षार्थियों को ऑनलाइन बी-1 परीक्षा समाप्त होने के बाद रजिस्ट्रार द्वारा हस्ताक्षरित रिजल्ट कार्ड की प्रति प्रदान की जाएगी।</td>
							</tr>
							<tr>
								<td>3. A copy of the same duly signed by the candidates must have to submit to the Registrar for official record.</td>
								<td>3. सभी परीक्षार्थियों को उपरोक्त रिजल्ट कार्ड की स्वयं द्वारा हस्ताक्षरित प्रति रजिस्ट्रार को कार्यालय रिकार्ड के लिए जमा करवानी होगी। </td>
							</tr>
							<tr>
								<td>4. <strong>It should be clearly noted that</strong> after completion of time, i.e. 01 hour 30 minutes from login, the system will logout automatically and after that, the answers of the questions could not be changed in any way.</td>
								<td>4. यह स्पष्ट रूप से ध्यान में रखना चाहिये की समय की समाप्ति अर्थात लॉगिन से 1 घंटा 30 मिनट के बाद प्रणाली स्वतः लॉग आऊट (बन्द) हो जायेगी तथा उसके पश्चात प्रष्नों के उतर को किसी भी तरीके से बदला नहीं जा सकता है।  </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
		
		<div class="row">	
			<div class="col-xs-12 col-sm-12">	
				<div class="submit-buttons d-flex justify-content-between">
					<form action="<?php echo base_url('main/examlogin');?>">
						<input type="submit" class="login-button1 btn btn-danger" value="Exit">
					</form>
					<form action="<?php echo base_url('test/login');?>">
						<!--div id="element"-->
							<!--button class="login-button1" value="">Start Test</button-->
							<input type="submit" class="login-button btn btn-success" value="Next">
						<!--/div-->
					</form>
				
				</div>
			</div>
		</div>
	</div>
</section>
<?php } else {
    redirect(base_url() . 'main/examlogin');
    
}?>  
	