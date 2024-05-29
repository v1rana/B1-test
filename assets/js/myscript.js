
	 
	 const BASE = window.location.origin+'/';


$("#Password").focusout(function(){
	var var1=$('#Password').val();
	if(var1!=''){
		$.ajax({
			url:BASE.concat("Passwordencrypt/index"),
			method:"POST",
			data:{pvalue:var1},
			success:function(data5){
					$("#Password").val(data5)
			}
		});
	}
});





$("#oldpass1").focusout(function(){
	var var15=$('#oldpass1').val();
	
	if(var15!=''){
		$.ajax({
			url:BASE.concat("Passwordencrypt/oldpass1"),
			method:"POST",
			data:{oldpass1:var15},
			success:function(data19){
				$("#oldpass1").val(data19)
			}
		});
	}
});


$("#newpass1").focusout(function(){
	var var1=$('#newpass1').val();
	if(var1!=''){
		$.ajax({
			url:BASE.concat("Passwordencrypt/newpass1"),
			method:"POST",
			data:{newpass1:var1},
			success:function(data5){
				$("#newpass1").val(data5)
			}
		});
	}
});

$("#newpass2").focusout(function(){
	//alert('hiii');
	var var2=$('#newpass2').val();
	if(var2!=''){
		$.ajax({
			url:BASE.concat("Passwordencrypt/newpass2"),
			method:"POST",
			data:{newpass2:var2},
			success:function(data17){
				$("#newpass2").val(data17)
				//alert(data17);
			}
		});
	}
});


$( ".check_attempt" ).click(function(e) {
    e.preventDefault();
	
});	


$(document).ready(function(){
	
	$( ".create-admin" ).click(function(e) {
		e.preventDefault();
		$.ajax({
			url:BASE.concat("superadmin/createadminview"),
			method:"POST",
			data:{hi:"hi"},
			success:function(data){
				
				$("#nav-tabContent").html(data);
			}
		});
		
	});	
	
});


$(document).ready( function () {
	$('#table1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ]
    });				
} );


$(function () {
	$("#datepicker").datepicker({ 
		autoclose: true, 
		todayHighlight: true,		
		maxDate: new Date('2000-01-01'),
	}).datepicker('update', new Date());
});


$(function () {
	$("#datepicker2").datepicker({ 
		autoclose: true, 
		todayHighlight: true
	}).datepicker('update', new Date());
});


$(function () {
	$("#admin_datepicker").datepicker({ 
		autoclose: true, 
		todayHighlight: true
	}).datepicker('update', new Date());
});


$(document).ready( function () {
	$('#table2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ]
    });							
} );


/* $(document).ready(function(){
    $('.openPopup').on('click',function(){
		alert("hi");
        var dataURL = $(this).attr('data-href');
		var ad = $("#deactivate").attr('href',dataURL);
		$('#exampleModal').modal('show');
        // $('.modal-body').load("Are",function(){
            // $('#exampleModal').modal({show:true});
        // });
    }); 
}); */

$(document).on("click",".openPopup",function(){
	
	var dataURL = $(this).attr('data-href');
	var ad = $("#deactivate").attr('href',dataURL);
	$('#exampleModal').modal('show');
	// $('.modal-body').load("Are",function(){
		// $('#exampleModal').modal({show:true});
	// });
			
});




$("#submitbutton").click(function(){
	
	var var1=$('#phone').val();
			
	if(var1 != ''){
		if (! /^[6-9]\d{9}$/.test(var1)) {
			$('#errorspan').text('Please enter correct mobile number');
		}
	}
});



