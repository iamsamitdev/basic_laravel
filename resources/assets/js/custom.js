$(function(){

	$.validator.addMethod('filesize', function (value, element, param) {
    		return this.optional(element) || (element.files[0].size <= param)
	}, 'File size must be less than {0}');

	$("form[name=form_add_book]").validate({
		rules: {
			isbn:{
				required: true,
				number: true,
				minlength: 6
			},
			title:"required",
			auther:"required",
			publisher:"required",
			cover:{
				required: true,
				extension: "jpg|jpeg|gif|png",
				filesize: 500000 // หน่วยเป็น byte
			},
		},

		messages: {
			isbn:{
				required:"กรอกข้อมูล isbn ก่อน",
				number:"ข้อมูลต้องเป็นตัวเลขเท่านั้น",
				minlength:"ไม่น้อยกว่า 6 ตัอักษร"
			},
			title:"กรอกข้อมูล title ก่อน",
			auther:"กรอกข้อมูล auther ก่อน",
			publisher:"กรอกข้อมูล publisher ก่อน",
			cover:{
				required:"เลือกไฟล์ก่อน",
				extension:"อนุญาติเฉพาะ jpg,gif,png",
				filesize:"ขนาดไฟล์ไม่เกิน 500kb"
			}
		}
	});


	/********* ส่วนของการ Read Book *******************/
	$("a#readbook").click(function(){
		// รับค่า id จาก link
		var bookid = $(this).attr('data-id');

		$.ajax({
			url:"books/detail/"+bookid,
			type:"GET",
			cache:false,

			success: function(data)
			{
				$('#book-result').html(data);
				// open modal
				$('#modal-book-detail').modal("show");
				//console.log(data);
			}
		});
	});

	/********* ส่วนของการ Edit Book *******************/
	$("a#editbook").click(function(){
		var bookid = $(this).attr('data-id');
		$.ajax({
			url:"books/edit/"+bookid,
			type:"GET",
			cache:false,

			success: function(data)
			{
				$('#editbook-result').html(data);
				// open modal
				$('#modal-edit-book').modal("show");
				//console.log(data);
			}
		});
	});

	/****************** ส่วนของการลบ ******************/
	$("input[name=submit_delete]").click(function(){
		var bookid = $(this).attr('data-book-id');

		swal({   
			 title: "Are you sure?",   
			 text: "You will not be able to recover this imaginary file!",   
			 type: "warning",   
			 showCancelButton: true,   
			 confirmButtonColor: "#DD6B55",   
			 confirmButtonText: "Yes, delete it!",   
			 cancelButtonText: "No, cancel plx!",   
			 closeOnConfirm: false,   
			 closeOnCancel: false
		}, 
		function(isConfirm){
			 if (isConfirm) {     
			 	swal("Deleted!", "Your imaginary file has been deleted.", "success");
			 	$('form[name=delete_book'+bookid+']').submit();
			 } else {     
			 	swal("Cancelled", "Your imaginary file is safe :)", "error");   
			 }
		});

		return false;
	});
});