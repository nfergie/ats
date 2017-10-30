$(document).ready(function(){
	$('#applicant_form').bootstrapValidator({
		feedbackIcons:{
			valid: 'glyphicion glyphicion-ok',
			invalid: 'glyphicion glyphicion-remove',
			validating: 'glyphicion glyphicion-refresh'
		},
		fields:{
			first_name:{
				validators:{
					stringLength:{
						min:2,
					},
					notEmpty:{
						message:'Please supply First Name'
					}
				}
			},
			last_name:{
				validators:{
					stringLength:{
						min:2,
					},
					notEmpty:{
						message:'Please supply Last Name'
					}
				}
			},
			email:{
				validators:{
					notEmpty:{
						message:'Plesase supply email address'
					},
					emailAddress:{
						message: 'Please supply a valid email address'
					}
				}
			},
			AppDate:{
				validators:{
					notEmpty:{
						message: 'Please choose Application Date'
					}
				}
			},
			plat:{
				validators:{
					notEmpty:{
						message: 'Please choose Platform'
					}
				}
			},
			position:{
				validators:{
					notEmpty:{
						message: 'Please pick at least one'
					}
				}
			}
		}
	})
	// .on('success.form.bv', function(e){
	// 	$('#success_message').slideDown({opacity: "show"}, "slow")
	// 		$('#applicant_form').data('bootstrapValidator').resetForm();

	// 		e.preventDefault();

	// 		var $form = $(e.target);

	// 		var fv = $from.data('bootstrapValidator');

	// 		$.post($form.attr('action'), $form.seralize(), function(result){
	// 			console.log(result);
	// 		}, 'json');
	// });
});