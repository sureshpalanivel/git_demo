
<?php 

window.location.ADMIN + 'deal/categories',
window.location.RETAILER + 'deal/categories',

/* COPY */

$(document).on('click','#refcode_cpybtn',function(e){  
    var code = $("#referral-code").val();  
    const el = document.createElement('textarea');
	el.value = code;
	document.body.appendChild(el);
	el.select();
    document.execCommand("copy");  
    alert("Copied the code: " + code);
	document.body.removeChild(el);
});

$(document).on('click','.logoutBtn',function(e){
	e.preventDefault();
	$.ajax({        
        url: $(this).attr('href'),        
		dataType:'JSON',
        success: function (op) {
            window.location.href = op.url;
        }
    });
});

/*  MULTI IMAGE  KYC Upload */

 $('#kyc_uploadfrm').on('submit', function (e) {
        e.preventDefault();
        CURFORM = $(this);
		var data = new FormData();
		$.each($("input[type='file']",CURFORM), function(i, file) {			
			if(file.files[0] != undefined){
				data.append(file.name, file.files[0]);
			}
		});     
        $.each(CURFORM.serializeObject(), function (k, v) {		
			if(v != ''){
				data.append(k, v);
			}
        });
		$.ajax({
            url: CURFORM.attr('action'),
            data: data,
            type: 'POST',
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            success: function (op) {
			  console.log(op);			  
			    var ERR = false;
			    var ErrMsg = '';
				$.each(op, function (k, v) {					 
				    if(k == 'kyc_status'){
					    $('#offc-info #kyc_submit').show();
					    $('#offc-info #kyc_submit').html(v.submitted_doc+'/'+v.total_doc);
					    $('#offc-info #kyc_pending').hide();
					    $('#offc-info #submitted_on').text(v.submitted_date);
					   return false;
					}
					
					if(v.status == true){	
						$('#kyc_uploadfrm input[type=file]').val('');
						$('#'+k,CURFORM).hide();
						$('#'+k,CURFORM).parents('.form-group').find('h4').show();
						$('#'+k,CURFORM).parents('.form-group').find('h4 span').hide();
						$('#'+k,CURFORM).parents('.form-group').find('h4 a').attr('href',v.path);
						$('#'+k,CURFORM).parents('.form-group').find('.cancel').removeClass().addClass('label label-info edit').text($edit);
						$('#'+k,CURFORM).parents('.form-group').find('.edit').show();
						$('#'+k+'_no',CURFORM).attr('disabled','disabled');
					}else {
					    ERR = true;						
						ErrMsg += (v.msg != undefined && v.msg != '') ? v.msg+'<br>':'';					   
					}
				});	
				if(ERR == true && ErrMsg != ''){
					CURFORM.before('<div class="alert alert-danger"><a href="#" class="close" area-label="close" data-dismiss="alert">&times;</a>'+ ErrMsg + '</div>');
				}
            },
			error: function (event, xhr, settings) {
			}
        });        
    });

/* Date Convertion in js */

 row.created_on = 2018-11-10 15:58:19;
 render: function (data, type, row, meta) {
	return new String(row.created_on).dateFormat('dd-mmm-yyyy HH:MM:ss');
}

/* JavaScript valid FORM */

$('#register-form')[0].checkValidity()  //form
$('input[name="email"]')[0].validity   //input
$('input[name="email"]')[0].validity.valid  //input

/* Valid */

$('input[name="cashback[order_code]"]')[0].Validity;

/* Iunput type file */

<input type="file" style="color:transparent;" onchange="this.style.color = 'black';"/>

/* Simplest (and reliable as far as I know) hack I've found is to set the initial font color to transparent to hide the "no file chosen" text, and then change the font color to something visible on change. */

/* Prototype */

Array.prototype.add = function (e) {
        if (this.indexOf(e) < 0) {
            this.push(e);
        }
    };
    Array.prototype.remove = function (e) {
        this.splice(this.indexOf(e), 1);
    };
	
/* Validity Validate */

if(Curele[0].validity.valid == true){
    $('#reset-pin-form button[type="button"]', '#change-mobile').attr('disabled',false);      
}

/* OnkeyPress  */
  <input onkeypress="return isNumberKey(event,this)" />
  
   function isNumberKey(evt, obj) {

            var charCode = (evt.which) ? evt.which : event.keyCode
            var value = obj.value;
            var dotcontains = value.indexOf(".") != -1;
            if (dotcontains)
                if (charCode == 46) return false;
            if (charCode == 46) return true;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

  
/* In array */
if (!$.isEmptyObject(selectedImgs)) {	
	check = ($.inArray(row.id,selectedImgs)>=0 ? true:false);
}
                    }

/* Key Exist */
var obj = { key: undefined };
obj["key"] != undefined // false, but the key exists!

"key" in obj // true, regardless of the actual value

!("key" in obj) // true if "key" doesn't exist in object
!"key" in obj   // ERROR!  Equivalent to "false in obj"

obj.hasOwnProperty("key") // true

/* TAB active  */
    $('#store-form div.nav-tabs-custom ul').find('li.active').removeClass();
	$('#store-form div.nav-tabs-custom div.tab-content').find('div.tab-pane.active').removeClass('active');
	$('#store-form div.nav-tabs-custom ul').find('li:eq(0)').addClass('active');
	$('#store-form div.nav-tabs-custom div.tab-content').find('div.tab-pane:eq(0)').addClass('active');

/* array empty */

   var res = store_id.split(',');	
   res=res.filter(function(v){return v==""?false:true;}).length; or check
   [""].filter(function(v){return v==""?false:true;}).length;
   
/* Modal */

 $("#verified-payout-modal").trigger("show.bs.modal");						
 $("#mymodal").modal("show"), 

window.location.assign('http://localhost/cashbackbid_v2/');
/* OBJECT Empty */

if($.isEmptyObject(your_object)){
   alert("This Object is empty.");
   }else{
  alert("This Object is not empty.");
}

/* MINE */

$z= $('#change-pwd-frm input[name="login"]:checked').val();

if($('#deal-form #cities input:checked').length == 0) // THIS

if ($(this).is(":checked")) { 
	$('#deal-form #is_primary').attr('checked', false);
}else if($('#deal-form #cities input:checked').length == 0){
	$('#deal-form #is_primary').attr('checked', true);
}

/* Form Submit */

 var BF = $('#bussiness-form');
    BF.on('submit', function (e) {
        e.preventDefault();
        CURFORM = BF;
        BF.ajaxSubmit({   // using upload images
            url: CURFORM.attr('action'),
            dataType: 'json',
            success: function (data) {
                console.log(data);
                my_profile();
            }
        });
    });

/* MY Func */

   var len= $('#cat_link .pcat_btn').length;
	/*for (i = 0; i < len; i++) {
		txt +=$('#cat_link .pcat_btn').text();
		text += "The number is " + i + "<br>";
	}*/
	$('#cat_link .pcat_btn').each(function(){
		txt += $(this).text() +"!!!! ";
	});
	/*$.each($('.pcat_btn').length, function () {				
		txt +=$('#cat_link .pcat_btn').text();
		console.log(txt);
	}); */
	$('#cat-linage').text(txt);



/* contains */
 $('#member_updatefrm #gender option:contains('+res.data.gender+')').attr('selected', true);
 
 
 /* reset select */
 
    $('#member_updatefrm #status option[value='+res.data.status+']').val(res.data.status).attr('selected', true);
    $('#member_updatefrm input[type=file]').attr('data-default',res.data.profile_image);
	
	/Reffer retailer staff management

    $('#resetbtn').click(function (e) {
        $('input,select', $(this).closest('form')).not('[type=checkbox]').val('');
        $('input:checkbox').not('[value=UserName]').removeAttr('checked');
        t.dataTable().fnDraw();
    });

$('#member_reset', '#member_updatefrm').click(function () { 
	    $('#edit_details #member_updatefrm').find('select>option:selected').removeAttr('selected');
		$('#edit_details #member_updatefrm').find('input[type=text], select').val('');
		$('#edit_details #member_updatefrm').find('div.help-block').remove();
		$('#member_updatefrm #image-preview').attr('src',$('#member_updatefrm input[type=file]').attr('data-default'));
    });
	
	//NEW
	
	$('#member_updatefrm #gender option:contains('+res.data.gender+')').attr('selected', true);
	var gender=$('#member_updatefrm #gender option:contains('+res.data.gender+')').attr('value');
	$('#member_updatefrm #gender').attr('defaultSelected', gender).val(gender);
	
	$('#member_updatefrm #designation').attr('defaultSelected',res.data.designation_id).val(res.data.designation_id);
	$('#member_updatefrm #designation option[value='+res.data.designation_id+']').attr('selected', true);
	$('#member_updatefrm #status').attr('defaultSelected',res.data.status).val(res.data.status);
	$('#member_updatefrm #status option[value='+res.data.status+']').attr('selected', true);

	//Working
	$('#add_designationfrm select').children().removeAttr('selected');
	
	//NOT
	$('input:checkbox').not('[value=UserName]').removeAttr('checked');
	
	// checked selected length
	$('#admin-stores-form input:checked').length 
	$('#admin-stores-form input:selected').length 
	
	boxes.find(":checked").length
	boxes.find(":is(:checked)").length
	boxes.find(":not(:checked)").length
	boxes.is(":checked").length
	boxes.is(":is(:checked)").length
	boxes.is(":not(:checked)").length
	$(":checked", boxes).length
	var all = true;
	boxes.each(function(){
	   if( $(this).is(":not(:checked)") ){
		  all = false;
		  return;
	   }
	});
	
	// fa fa-icon
	$('#edit_details .box-title i').removeClass().addClass('fa fa-user-plus');

//icheck   staff admin_list.js Manage stores
$('input[type=checkbox]', $('#admin-stores-list #admin-stores')).iCheck({checkboxClass:'icheckbox_square-blue'});

change == ifChanged
Ex :
ifChecked
ifChanged
ifClicked
ifUnchecked
ifToggled
ifDisabled
ifEnabled.......

 $('#store-form-panel').on('ifChanged', '#split_working_hrs', function (evt) {
	$('#store-form input[type="checkbox"]').iCheck('check');
	$('#store-form input[type="checkbox"]').iCheck('uncheck');
 }
data: {$('#deal-form #cities input[type="checkbox"]').serializeObject()},

function printAdminStore(op) { // icheck add dynamic content
		console.log(op);
        $('#admin-stores', $('#admin-stores-list')).empty();
        if (op.stores != null) {
            $.each(op.stores, function (k, v) {
                $('#admin-stores', $('#admin-stores-list')).append(
                    $('<tr>').append(function () {
						var ele = [];
						ele.push($('<td>').append([$('<b>').text(v.store), $('<p>').text(v.address)]));
						ele.push($('<td>', {class: 'admin-store'}).append($('<label>').append([$('<div>', {class: 'flat-red'})]).append([$('<input>', {type: 'checkbox', name: 'stores[' + v.store_id + '][store_id]', value: v.store_id, checked: v.id!=''?true:false})])));
						ele.push($('<td>', {class: 'admin-store-status', style: (v.id != '' ? '' : 'display:none;')}).append($('<label>').append([$('<input>', {type: 'checkbox', name: 'stores[' + v.store_id + '][status]', checked: v.status}), ' Enable'])));
						return ele;
					})
				);
				//$('input[type=checkbox]', $('#admin-stores-list #admin-stores')).iCheck({checkboxClass:'icheckbox_square-blue'});
				$('input[type="checkbox"]').iCheck({
					checkboxClass: 'icheckbox_square-blue',
					radioClass: 'iradio_square-blue',
					increaseArea: '20%'
				});
            });			
        }
        else {
            $('#admin-stores', $('#admin-stores-list')).append($('<tr>').append($('<td>', {colspan: '3'}).text(op.msg)));
        }
    }
	
  
 /* icheck Radio && Checkbox */
 
    $('#transaction-list input[type="radio"]').iCheck({
        checkboxClass: 'icheckbox_flat-green',
		radioClass: 'iradio_flat-green'
	});
	
	$('#transaction-list input[type="checkbox"]').iCheck({
		checkboxClass: 'icheckbox_flat-blue',
		radioClass: 'iradio_flat-blue',
		increaseArea: '20%'
	});
 
 
//Number Format
function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}

/* Verify */
if(CROPPED){
	data.append('image', uploadImageFormat($('#image-preview').attr('src')));
}
$.each(CURFORM.serializeObject(), function (k, v) {
	data.append(k, v);
});

/* JQUERY */

/* JS NOT EMPTY NULL LENGTH*/
    cnt = $('#ticket_reply li').length + 1;
	if(res.attachment == null && res.attachment == '' && res.attachment == 'undefined' && res.replies.length >0){
		$('#la-attachement').text('');
	}

/* REGULAR EXPRESSION */

function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace(/[^\w ]+/g,'')
        .replace(/ +/g,'-')
        ;
}

$("#Restaurant_Name").keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
        $("#Restaurant_Slug").val(Text);        
});
$("#Restaurant_Name").keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        var regExp = /\s+/g;
        Text = Text.replace(regExp,'-');
        $("#Restaurant_Slug").val(Text);        
});
text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'').replace(/[-]+/g, '-');

/* EACH */
    $.each(op.data, function (k, v) {
	
	}
	
	cont ='';
	$.each(op.view.deal_types, function (k, v) {
		cont += '<div class="checkbox">';
		cont += '<label><input type="checkbox" name="" class="deal_type" value="'+k+'" checked disabled>'+v+'</label></div>';
	});
	
	if (op.data) {
		$.each(op.data, function (k, w) {
			$('#cities').append($('<div>', {class: 'checkbox'}).append($('<label>').append([$('<input>', {type: 'checkbox', class: 'opt', id: 'opt', name: 'deal[cities][' + w.city_id + ']', value: w.store_id}), w.city])))
		});
	}

/* DATA TABLE */
        ajax: {
            url: $('#deal_list').attr('action'),
            type: 'POST',
			data: $('#deal_listfrm').serialize(),
			data: function ( d ) { 
				return $.extend({}, d, $('input,select', '#deal_listfrm').serializeObject());				
			},
            data: function (d) {
			    d.search_term = $('#search_term').val();
                d.bcategory_id = $('#bcategory_id').val();
                d.country_id = $('#country_id').val();
                d.status = $('#status').val();
                d.is_approved = $('#is_approved').val();
                d.from_date = $('#from_date').val();
                d.to_date = $('#to_date').val();
            }, 
        },

/* OTHERS */

$("#form")[0].reset();
$('#state_editfrm #region_id').empty();
$('#region_editfrm #region').val(res.data.region);
$('#region_editfrm #country_id option:selected').removeAttr('selected');
$('#state_editfrm #country_id').trigger('reset');  //Reset Form
$('#state_editfrm #country_id').trigger('change');
$('#state_editfrm #region_id').attr('data-selected',false);
$('#state_editfrm #region_id').attr('data-selected',res.data.region_id);
$('#region_editfrm #country_id').find('option[value='+res.data.country_id+']').attr('selected',true); 
$(".reset").click(function() {
    $(this).closest('form').find("input[type=text], textarea").val("");
}); 
   // alert
    $('#states_listtbl').before('<div class="alert alert-danger">' + res.msg + '<a href="#" class="close" area-label="close" data-dismiss="alert">&times;</a></div>');
	
	
	$(document).on('submit','#profileUpdateFrm',function (e) {		
        e.preventDefault();		
        CURFORM = $(this);
		/var formData = new FormData(this);
		/var frmObj = $(this);
		/console.log(formData);return false;
        $.ajax({
            url: CURFORM.attr('action'),            
            /data: formData,			
            data: CURFORM.serialize(),			
			beforeSend:function(){
				$('#profileSaveBtn').attr('disabled',true);
				$('div.alert',CURFORM).empty();
			},
			success: function (op, textStatus, xhr) {
			console.log(op);
				$('#profileSaveBtn').attr('disabled',false);
				if(xhr.status == 200){					
					$('#profile-model').modal('hide');
					$('#account-details #marital_status').text(op.marital_status);
					$('#account-details #gardian').text(op.gardian);
					$('#account-details').prepend('<div class="alert alert-success"><a class="close" data-dismiss="alert" area-lable="close">&times;</a>'+op.msg+'</div>');
				}else{
					$('#alt-msg').html('<div class="alert alert-danger"><a class="close" data-dismiss="alert" area-lable="close">&times;</a>'+op.msg+'</div>');
				}
			},
			error: function (jqXHR, exception, op) {
				$('#profileSaveBtn').attr('disabled',false); 
				CURFORM.before('<div class="alert alert-danger">'+jqXHR.responseJSON.msg+'<a href="#" class="close" area-label="close" data-dismiss="alert">&times;</a></div>');				
			},
        });
    });
	
  //FadeOUT
    $('#states_list').fadeOut('fast',function(){
		$('#state_edit').fadeIn('slow');
	});
	
	$('.alert').fadeOut(6000);
  
  //on change
    $('#pincode_listfrm').on('change','#state_id',function(e){
		if($(this).val()!=''){
			$('#pincode_listfrm #add_btn').show();
		}
		else {
			$('#pincode_listfrm #add_btn').hide();
		}
    });  
	// Focusin 
    $('#member_updatefrm, #update_member_pwdfrm').on('focusin', 'input, select', function (e) {
		$(this).parents('.form-group').find('div.help-block').remove();
		$(this).parents('.form-group').find('.help-block').removeClass('help-block');
	});
/* LOAD SELECT */
    $('#country_id').loadSelect({
		firstOption: {key: '', value: '--Select--'},
		firstOptionSelectable: false, 
		url: window.location.ADMIN + 'country-list/active', 
		key: 'country_id',
		value: 'country',
	});  
	    // On Change
	$('#state_id').loadSelect({
		firstOption: {key: '', value: '--Select--'},
		firstOptionSelectable: false,
		url: window.location.ADMIN + 'state-list/active',
		key: 'state_id',
		value: 'state',
		dependingSelector: ['#country_id'],
	});
	$('#district_id').loadSelect({
		firstOption: {key: '', value: '--Select--'},
		firstOptionSelectable: false,
		url: window.location.ADMIN + 'district-list/active',
		key: 'district_id',
		value: 'district',
		dependingSelector: ['#state_id'],
	});  // Copy TO
	$('#pincode_id').loadSelect({
		firstOption: {key: '', value: '--Select--'},
		firstOptionSelectable: false,
		url: window.location.ADMIN + 'pincode-list/active',
		key: 'pincode_id',
		value: 'pincode',
		dependingSelector: ['#district_id'],
		copyTo:[{selector:'#locality_edit #pincode_id',key: 'pincode_id',value:'pincode'}]
	});

/* VALIDATION RULES & MSG*/
     MUF.validate({
        errorElement: 'div',
        errorClass: 'help-block',
        focusInvalid: false,
        errorPlacement: function (error, element) {
            if (element.parent().hasClass('input-group')) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        rules: {
            first_name: {required: true, maxlength: 30, lettersonly: true},
            last_name: {required: true, maxlength: 30, lettersonly: true},
            dob: {required: true, date: true},
            gender: {required: true},
            email: {required: true, email: true, maxlength: 40},
            mobile: {required: true, number: true, maxlength: 10, minlength: 10},
            location: {required: true, pattern: /^[a-zA-Z0-9,-\/ ]+$/},
            street: {required: true, pattern: /^[a-zA-Z0-9,-\/ ]+$/},
            landmark: {required: true, pattern: /^[a-zA-Z0-9,-\/ ]+$/},
        },
        messages: $member_val_message,
        submitHandler: function (form, event) {
            event.preventDefault();
            if ($(form).valid()) {
                $.ajax({
                    url: MUF.attr('action'),
                    data: $.extend({}, MUF.serializeObject(), {address: address}),
                    dataType: 'JSON',
                    type: 'POST',
                    beforeSend: function () {
                        $('.alert,div.help-block').remove();
                        $('#update_member_details').attr('disabled', true);
						$('.alert,div.help-block ,span.errmsg').remove();
						$('#deal-form span[class="errmsg"]').attr({for : '', class: ''}).empty();
                        $('body').toggleClass('loaded');
                    },
                    success: function (res) {
                        $('body').toggleClass('loaded');
                        $('#update_member_details').attr('disabled', false);
                        if (res.status == 200) {
                            t.dataTable().fnDraw();
                            $('#member_reset', '#member_updatefrm').click();
                            MUF.before('<div class="col-sm-12 alert alert-success"><a href="#" class="close" area-label="close" data-dismiss="alert">&times;</a>' + res.msg + '</div>');
                            $('.alert').fadeOut(7000);
                        } else {
                            MUF.before('<div class="col-sm-12 alert alert-danger"><a href="#" class="close" area-label="close" data-dismiss="alert">&times;</a>' + res.msg + '</div>');
                            $('.alert').fadeOut(7000);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $('body').toggleClass('loaded');
                        $('#update_member_details').attr('disabled', false);
                        responseText = $.parseJSON(jqXHR.responseText);
                        console.log(responseText);
                        $.each(responseText.errs, function (fld, msg) {
                            if ($('#member_updatefrm [name=' + fld + ']').parent().hasClass('input-group')) {
                                $('#member_updatefrm [name=' + fld + ']').parent().after("<div class='help-block'>" + msg + "</div>");
                            } else {
                                $('#member_updatefrm [name=' + fld + ']').after("<div class='help-block'>" + msg + "</div>");
                            }
                        });
                    }
                });
            }
        }
    });
    rules: { 
            pincode: { required: true, pattern:/^[a-zA-Z0-9,-\/ ]+$/},
            district_id: { required: true},
        },
    messages: $pincode_valmsg,   
 
 /* DATA TABLE */

    DEAL.LIST.TABLE = $('#deal-list-table');
    DEAL.LIST.FORM = $('#deal-list-form');
    DEAL.FORM = $('#deal-form');
    var DT = DEAL.LIST.TABLE.dataTable({
        columnDefs: [
            {className: 'text-center', targets: [0]},
            {className: 'text-center', targets: [1]},
            {className: 'text-left', targets: [2]},
            {className: 'text-left', targets: [3]},
            {className: 'text-left', targets: [4]},
            {className: 'text-left', targets: [5]},
            {className: 'text-center', targets: [6]},
            {className: 'text-center', targets: [7]},
            {className: 'text-center', targets: [8]},
            {className: 'text-center', targets: [9]}
        ],
        processing: true,
        ajax: {
            url: $('#deal_list').attr('action'),
            type: 'POST',
            data: function (d) {
                d.category_id = $('#category_id').val();
                d.search_term = $('#search_term').val();
            },
        },
        columns: [
            {
                data: 'created_on',
                name: 'created_on'
            },
            {
                data: 'deal_name',
                name: 'deal_name'
            },
            {
                name: 'bcategory_name',
                data: 'bcategory_name'
            },
            {
                name: 'currency_code',
                data: 'currency_code'
            },
            {
                name: 'original_price',
                data: 'original_price',
                render: function (data, type, row, meta) {
                    return row.original_price + ' ' + row.currency_code;
                }
            },
            {
                name: 'discount',
                data: 'discount'
            },
            {
                name: 'deal_price',
                data: 'deal_price',
                render: function (data, type, row, meta) {
                    return row.deal_price + ' ' + row.currency_code;
                }
            },
            {
                name: 'start_date',
                data: 'start_date',
                render: function (data, type, row, meta) {
                    return row.from_date + ' to<br> ' + row.end_date;
                }
            },
            {
                name: 'status',
                data: function (row, type, set) {
                    return '<span class="label label-' + row.status_class + '">' + row.status_name + '</span> ';
                }
            },
            {
                name: 'is_approved',
                data: function (row, type, set) {
                    return '<span class="label label-' + row.is_approved_class + '">' + row.is_approved + '</span> ';
                }
            },
            {
                class: 'text-center',
                orderable: false,
                render: function (data, type, row, meta) {
                    return addDropDownMenu(row.actions, true);
                }
            }
        ],
        drawCallback: function (settings) {
            if (settings.json.filters !== undefined) {
			   $('#wallet option').remove();
			   $('#currency option').remove();
			   var opt = '<option value="">All</option>'
               if(settings.json.filters.wallets) {
				  $.each(settings.json.filters.wallets,function(index,value){ 
                     opt = opt+'<option value="'+value.wallet_code+'">'+value.wallet+'</option>'
				  });
				  $('#wallet').append(opt);
               }
			    var curOpt = '<option value="">All</option>'
			    if(settings.json.filters.currencies) {
					$.each(settings.json.filters.currencies,function(index,val){ 
						curOpt = curOpt+'<option value="'+val.id+'">'+val.code+'</option>'
					});
					$('#currency').append(curOpt);
                }
            }
        },
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return data.uname;
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        }
    });
    DEAL.LIST.FORM.on('click', '#searchbtn', function (e) {
        e.preventDefault();
        DT.fnDraw();
    });
 
/* AJAX ERROR FUNCTION */
   error: function (jqXHR, textStatus, errorThrown) {
		$('body').toggleClass('loaded');	
		$('#update_pincode').attr('disabled',false);
		responseText = $.parseJSON(jqXHR.responseText);
		$.each(responseText.error,function(fld,msg){
			if($('#pincode_editfrm [name='+fld+']').parent().hasClass('input-group')){
				$('#pincode_editfrm [name='+fld+']').parent().after("<div class='help-block'>"+msg+"</div>");
			}else {
				$('#pincode_editfrm [name='+fld+']').after("<div class='help-block'>"+msg+"</div>");
			}
		}); 
	}
	
	
/* SetTimeOut */
  setTimeout(function () {
				$("#new_bank_panel").addClass("hidden");
			}, 3000);

/* Trigger */
$(document).on("click", "a", function(){
    $(this).text("It works!");
});

$(document).ready(function(){
    $("a").trigger("click");
});

/* jquery validation Error Function */
error: function (jqXHR, textStatus, errorThrown) {
	$('body').toggleClass('loaded');
	$('#send_verification_code').attr('disabled',false);							
	responseText = $.parseJSON(jqXHR.responseText);
	$.each(responseText.errs,function(fld,msg){
		if($('#change-email-form input[name='+fld+']').siblings().hasClass('input-group')){
			$('#change-email-form input[name='+fld+']').siblings().after("<div class='help-block'>"+msg+"</div>");
		} else {
			$('#change-email-form input[name='+fld+']').after("<div class='help-block'>"+msg+"</div>");
		}
		return false;
	});
},

error: function (jqXHR, textStatus, errorThrown) {
	$('input[type="submit"]', '#rating_form').attr('disabled', false);
	$('body').toggleClass('loaded');
	responseText = $.parseJSON(jqXHR.responseText);
	$.each(responseText.errs,function(fld,msg){
	
		if($('#rating_form [name='+fld+']').siblings().hasClass('input-group')){
			if(fld=='rating'){
			  $('#rating_form #'+fld+'_err').append("<div class='help-block'>"+msg+"</div>");
			}
			else {
			  $('#rating_form [name='+fld+']').siblings().after("<div class='help-block'>"+msg+"</div>");
			}
		}else {
			if(fld=='rating'){
			   $('#rating_form #'+fld+'_err').html('<span class="help-block">'+msg+'</span>');
			}
			else {
			  $(' #rating_form [name='+fld+']').after("<div class='help-block'>"+msg+"</div>");
			}
		}
	});
	return false;
},

error: function (jqXHR, textStatus, errorThrown) {
	$('#submit_btn').attr('disabled',false);
	$('body').toggleClass('loaded');
	responseText = $.parseJSON(jqXHR.responseText);
	var error = responseText.errs
	var array = JSON.stringify(error).split(",");
	$.each(array,function(i,k)
	{
		var ki = k.replace(/[\{\}]/g, "");
		//ki = ki.replace(/\"/g, "")
		ki= ki.split(":");
		$('#form_new_ticket [name='+ki[0]+']').after("<div class='help-block'>"+ki[1]+"</div>");
	});
},


/* Others */
//location.reload();
 $('.alert,div.help-block').remove();

  $('input[name="rating"]').prop('checked', false);
  $('input[name="rating"]').removeAttr('checked');
 /* Error PlacemENT */
  $(this).closest('.form-group').append($(this));
 
 errorPlacement: function(error, element) {
             if ( element.is(":radio") ) {
               //alert('oj');
            error.insertAfter( element.parent().parent());
        }
        else { // This is the default behavior of the script for all fields
            error.insertAfter( element );
        }
    },
 errorPlacement: function(error, element) {
            if (element.attr("type") == "radio") {
                error.insertBefore(element.parent());
            } else {
                error.insertAfter(element);
            }
        }	
 
/* a tag prevent action */
	$('ul.product-info li a').click(function(event) {
		event.preventDefault();
		$(this).next('div').slideToggle(200);
	});

/* Loader */
	$('body').toggleClass('loaded');
	
	//loadPreloader();    
	//removePreloader();   

/* Hide And Show */
	$(document).on('click','#send_verification_code',function (e) {
		e.preventDefault();
		$('#change-email-form').fadeOut('fast',function(){
			$('.code_verification_form').fadeIn('slow');
		});
	});
	$(document).on('click','#cancel',function (e) {
		e.preventDefault();
		$('.code_verification_form').fadeOut('fast',function(){
			$('#change-email-form').fadeIn('slow');
		});
	});	
   $('.alert').fadeOut(5000);
   
/* Alert */
	$('form').before($('<div >').attr({class: 'alert alert-success'}).html(data.msg));
    $('.alert').fadeOut(5000);
/* Redirection */
	window.location.href = op.url;
	window.location.assign(op.url);
	window.location.reload();

/* Empty Input Field */
  $("#btn3").click(function(){
        $('#verify_code').val("");
    });
	
  $(".reset").click(function() {
    $(this).closest('form').find("input[type=text], textarea").val("");
  });	
/* others */
	$('#code_verification_form').valid();
	<link rel="stylesheet" href="{{url('assets/user/plugins/iCheck/square/blue.css')}}">

/* Render */
$('#example').dataTable( {
  "columnDefs": [ {
    "targets": 0,
    "data": "download_link",
    "render": function ( data, type, full, meta ) {
      return '<a href="'+data+'">Download</a>';
	   (or)
	   data='<a href="'+data+'">Download</a>';
	   return data;
    }
  } ]
} );
        OR
		
data: function (row, type, set) {
		return '<span class="trans-text-' + row.status_name.toLowerCase + '">' + row.status_name + '</span>';
		return '<label class="label label-'+row.status_name_label+'">'+row.status_name+'</label>';
	}
/* Datatable Data pass */


Datatable Ajax

data: function(d){ 
	d._token = "{{csrf_token()}}";
        d.term = $('#term').val();
}

OR

data:{_token : "{{csrf_token()}}", term: $(this).val()};

OR

data: $(this).serialize();

OR

 "data":{
           "level": $('#level', $('#team_referral_form')).val(),
           "from": $('#from', $('#team_referral_form')).val(),
           "to": $('#to', $('#team_referral_form')).val(),
           "submit": $('#submit', $('#team_referral_form')).val()
		   }

/* Pass Array Of values In Jquery  */
var filterchk = [];
		$('#chkbox :checked').each(function() {
		   filterchk.push($(this).val());
		});
						
	d.filterchk = filterchk; 


	
	
/* Datatable getDatas */

$data['start']=$post['start'];
$data['length']=$post['length'];
$data['search']=$post['search']['value'];
$data['orderby'] = $post['columns'][$post['order'][0]['column']]['name'];
$data['order'] = $post['order'][0]['dir'];

"columns": [
                { "data": "username",'name':'uname' },
                { "data": "password",'name':'pwd' },
                { 'name':'email','data':'email',render:function(data, type, row, meta){
				return data;
				} },
           ]
	
/* Image Upload  1*/

$('#deal-form-panel').on('submit', '#deal-form', function (e) {
e.preventDefault();
CURFORM = $(this);
var data = new FormData();
/*        var includes = CKEDITOR.instances['includes'].getData();
 var terms = CKEDITOR.instances['terms'].getData();
 var instructions = CKEDITOR.instances['instructions'].getData();
 data.append('extras[includes]', includes);
 data.append('extras[terms]', terms);
 data.append('extras[instructions]', instructions); */
if (CROPPED) {
	data.append('image', uploadImageFormat($('#image-preview').attr('src')));
	CROPPED=false;
}
$.each(CURFORM.serializeObject(), function (k, v) {
	data.append(k, v);
});
$.ajax({
	url: CURFORM.attr('action'),
	data: data,
	type: 'POST',
	enctype: 'multipart/form-data',
	processData: false,
	contentType: false,
	success: function (op) {
		if (typeof (CKEDITOR) != "undefined") {
			for (name in CKEDITOR.instances) {
				CKEDITOR.instances[name].destroy()
			}
		}
		$('#deal-form #cities input').parents('label').find('.selected_stores').remove();
		$('#deal-form-panel').pageSwapTo('#deal-list');
		$('#deal-form input:checked').iCheck('uncheck');
		$('#deal-form input:checked,#is_primary').iCheck('uncheck');
		$('#deal-form').resetForm();
		DT.dataTable().fnDraw();
	}
});

/* Image Upload 2 */
$('#store-form-panel').on('submit', '#store-form', function (e) {
	e.preventDefault();		
	CURFORM = $(this);
	CURFORM.ajaxSubmit({
		type: 'POST',
		url: CURFORM.attr('action') + (CODE != null ? '/' + CODE : ''),
		dataType: 'json',
		success: function (op) {
			CODE = null;
			//console.log('Good');	
			$('#store-form input[type="checkbox"]').iCheck('uncheck');
			$('#store-form input[type="radio"]').iCheck('uncheck'); 
			$('#store-form input[type="time"]').val('');
			$('#store-form').resetForm();
			//$('#email,#mobile,#uname', '#store-form').removeAttr('disabled').removeAttr('readonly');
			$('#store-form-panel').pageSwapTo('#store-list');
			DT.fnDraw(); 
		},
		error: function (jqXHR, textStatus, errorThrown) {
			responseText = $.parseJSON(jqXHR.responseText);
			$.each(responseText.error, function (fld, msg) {
				if (fld == 'specify_working_hrs') {
					$('#specify_working_hrs_error').addClass('errmsg').html(msg);
				}
			});
		}
	});
});
	
/* Datatable */

$(function () {
//	alert(baseUrl);
    console.log($.fn.dataTable.defaults);
	var t = $('#transactionlist');
	t.DataTable({
		ordering: false,
		serverSide: true,
		processing: true,
		ordering: false,
		paging: false,  // pagination next prev paging & bPaginate are same
		bPaginate: false, // pagination next prev
		bInfo: false,  // show records 1 to 10 bInfo & Info are same
		Info: false,  // show records 1 to 10
		pagingType: 'input_page',		
		sDom: "t"+"<'col-sm-6 bottom info align'li>r<'col-sm-6 info bottom text-right'p>", 
		sLengthMenu: "_MENU_",
		autoWidth: false, //  after afect custom width
		ajax:null,
		ajax: JSON.stringify(dataSet.data), // datatable-load-from-json-object-directly
		data: dataSet.data, // datatable-load-from-json-object-directly
		columnDefs: [  //column width adjusment
			{ "className": 'text-left', "width": "15%", "targets": 0 },
			{ "className": 'text-left', "width": "20%", "targets": 1 }
		],
		oLanguage: { //0 to 20 pages data alter
			"sLengthMenu": "_MENU_",
		},
		// without send IMG
		ajax: {
			url: baseUrl + 'account/wallet/transactions',
			type: 'POST',
			data: $('#deal_listfrm').serialize(),
			data: function ( d ) { 
				return $.extend({}, d, $('input,select', '#deal_listfrm').serializeObject());				
			},
            data: function (d) {
			    d.search_term = $('#search_term').val();
                d.bcategory_id = $('#bcategory_id').val();
                d.country_id = $('#country_id').val();
                d.status = $('#status').val();
                d.is_approved = $('#is_approved').val();
                d.from_date = $('#from_date').val();
                d.to_date = $('#to_date').val();
            }, 
        },
		
		columns: [
		  	{
				data: 'created_on',
				name: 'created_on',
			},
			{
				data: 'remark',
				name: 'remark',
			},
			{
				data: 'wallet',
				name: 'wallet',
				class: 'no-wrap'
			},
			{
				name: 'paidamt',
				class: 'text-right no-wrap',
				data: function (row, type, set) {
					return '<font color="' + row.color + '">' + row.Fpaidamt + '</font>';
				}
			},
			{
				name: 'current_balance',
				data: 'Fcurrent_balance',
				class: 'text-right no-wrap'
			}
		],
		responsive: {
            details: {
                display: $.fn.dataTables.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return data[0].span;
						return "UserName: "+data.uname;
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        },
	});
	
	$('#search_btn').click(function (e) {
		t.dataTable().fnDraw();
	});
	
	$('#reset_btn').click(function (e) {
		$('input,select',$(this).closest('form')).val('');
        t.dataTable().fnDraw();
    });
	
	/*t.on('processing.dt',function( e, settings, processing ){
		if (processing){
			 $('body').toggleClass('loaded');
			 console.log('sdfg');
		}else {
			$('body').toggleClass('loaded');
			console.log('3453');
		}
	});*/
});

/* Text Editor */
$('#replay_comments').Wysihtml5();

/* Error Place ment */
   //place all errors in a <div id="errors"> element
   errorPlacement: function (error, element) {
      error.appendTo(element.parent().next());
   },
   errorPlacement: function(error, element) {
		error.appendTo("span.errMsg");
	}	
	
/* removeAttr */
	$('#region_id option:selected','#state_editfrm').removeProp('selected'); 
	$('#country_id option:selected','#state_editfrm').removeProp('selected'); 
	
/* SetTimeOut */
 setTimeout(function() {$("#msg").hide("");}, 3000);

/* require */
data-rule-required="true"

/* Jquery  RESET */
$(".reset").click(function() {
    $(this).closest('form').find("input[type=text], textarea").val("");
});
 function (form, event , index,element) {}

/* Before Send */
beforeSend: function () {
			    $('.alert,div.help-block').remove();
				$('body').toggleClass('loaded');
                $('#report_div').css('display', 'none');
				$('#accordion').css('display', 'none');
            },

/* JS NOT EMPTY NULL LENGTH VALIDATION */
cnt = $('#ticket_reply li').length + 1;
if(res.attachment == null && res.attachment == '' && res.attachment == 'undefined' && res.replies.length >0){
	$('#la-attachement').text('');
}
if (element.attachment != '' && element.attachment != 'undefined' && element.attachment != null){}

/* JS DATE*/

"render": function (data, type, row, meta) {
	return new String(row.created).dateFormat("dd-mmm-yyyy H:M:s");
}

/* JS Validation ERROR */

if($('#rating_form [name='+fld+']').parent().hasClass('input-group')){
 alert('input');
	$('#rating_form [name='+fld+']').parent().after("<div class='help-block'>"+msg+"</div>");
}else if($('#rating_form [name='+fld+']').parent().hasClass('radio-inline')){
alert('kkk');
	$('#rating_form [name='+fld+']').parent().parent().after("<div class='col-sm-12 help-block'>"+msg+"</div>");
}else {
alert('ooo');
	$('#rating_form [name='+fld+']').parent().after("<div class='col-sm-12 help-block'>"+msg+"</div>");
}

 if (element.attr("type") == "radio") {
	error.addClass('col-sm-12').insertAfter(element.parent().parent());
} else {
	error.insertAfter(element);
}

/* JS REDIRECT INDEX*/
id="row-'+row.ticket_code+'"

$('#send_replay','#reply_forms').attr('row_id',_curTicket.attr('id'));

var id = $('#send_replay','#reply_forms').attr('row_id');
$('#'+id,'#ticket_table').click(); 

/* JS FIRST LETTER AS UPPER */
  NAMMING
   src="http://placehold.it/50/FA6F57/fff&text='+element.full_name[0].toUpperCase()+'"
   
/* Validation NOT & CLOSEST */

$('input,select',$(this).closest('form')).not('[type=checkbox]').val('');
$('input:checkbox').not('[value=ticket_id]').removeAttr('checked');

/* JS VAL EMPTY REMOVE  */
jQuery('#masterdiv div').html('');
jQuery('#masterdiv div').empty();
jQuery('#masterdiv div').remove();
$("#new_ticketfrm").find("input[type='text'],input[type='file'], select, textarea").val("");


/*  SCROLL top */
	$('html, body').animate({
        scrollTop: $('span[class="errmsg"]').eq(0).offset().top
		or
		scrollTop: $('span[class="errmsg"]').eq(0).closest('div').offset().top
	}, 1000);

/*  WRAP */
var input = $( "form input:checkbox" )
  .wrap( "<span></span>" )
  .parent()
  .css({
    background: "yellow",
    border: "3px red solid"
  });

  /* FN draw callback function Datatable */
    fnDrawCallback: function( oSettings ) {
	   recordsFiltered = t.DataTable().rows().data().length;
		if(recordsFiltered > 0){
		   $("#exportbtn").show();
					   $("#printbtn").show();
		}
		else{
		 $("#exportbtn").hide();
						$("#printbtn").hide();
		}
	},
  
/* FILTER  HAS */
<span class="outer">outer span</span>
<div  class="outer">
    outer div<br>
    <span>descendant span</span>
</div>
$('.outer').filter('span'); //returns the outer span
$('.outer').has('span');    //returns the outer div

/*  REQULAR EXPRESSION  IN JQUERY*/
^[0-9a-zA-Z/ -]+$
$data = preg_replace('/[^,;a-zA-Z0-9_-]|[,;]$/s', '', $data);

location: {required: true,pattern:/^[a-zA-Z0-9,-\/ ]+$/},

/* Jquery INDEX */
      
	// RESET reset 
    $('#member_updatefrm #uname').attr('value',res.data.uname).val(res.data.uname);
	  
	//
    $('#member_reset').attr('row_id', CurEle.attr('id'));
	$('#' + $(this).attr('row_id'), '#member_listtbl').trigger('click');
	
    var idx=CurEle.closest('tr').index();
	$('.status span','#faq_listtbl tbody tr:eq('+idx+')').text(res.status_label).removeClass().addClass('label label-'+res.status_disp_class);
    var CurEle = $(this);
	alert(CurEle.closest('tr').index());return false;  /Working/
    $('#dsa_listtbl').on( 'click', 'tr', function () {
   v ar id = $('#dsa_listtbl').find('tr').index( this );	
	alert(id);
});

$('td').click(function(){
   var row_index = $(this).parent().index();
   var col_index = $(this).index();
});

var row_index = $(this).parent('table').index(); 

$( "button" ).click(function() {
  $( "div" ).each(function( index, element ) {
    // element == this
    $( element ).css( "backgroundColor", "yellow" );
    if ( $( this ).is( "#stop" ) ) {
      $( "span" ).text( "Stopped at div index #" + index );
      return false;
    }
  });
});
/* End  */

/* JS Table index  RESET */

    $('#dsa_listtbl').on( 'click', 'tr', function () {
          var id = $('#dsa_listtbl').find('tr').index( this );	
			alert(id);
	});

  // clear input except radio buttons and < select >
   $(".myinputs").not('[type=radio],[type=checkbox],select').val('');

 $('input,select',$(this).closest('form')).not('[type=checkbox]').val(''); // working
   // if yo need to reset select menu back to its default value
   $('.selectClass').val( $('.selectClass').prop('defaultSelected')); 

/* ERROR PLACEMENT */

errorPlacement: function(error, element) {
		if(element.parent().hasClass('input-group')){
			error.insertAfter(element.parent());
		}else{
		   error.insertAfter(element);
		}
	},
		
 data: $.extend({},MEF.serializeObject(),{address:address}),
   
/* Validater  DATE JQUERY */

return this.optional(element) || date.match(/^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$/);
  regex: '\\d{2} \\d{4} \\d{4}',
  pattern: '[A-Z]{2}[0-9]{5}',
  pattern: /^[A-Z]{2}[0-9]{5}$/,
  date: true
   //not date
    regx: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}$/,

	
	 $.validator.addMethod("alpha", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z ]+$/);
    }, $characters);
    $.validator.addMethod("alphanumeric", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-z0-9A-Z]+$/);
    }, $characters_number);
	
	date:true, regex: '\\d{2} \\d{4} \\d{4}'	

/*  IMG UPLOAD Using this*/
if (CROPPED) {
	data.append('image', uploadImageFormat($('#image-preview').attr('src')));
}
$.each(CURFORM.serializeObject(), function (k, v) {
	data.append(k, v);
});
 $.ajax({
	url: CURFORM.attr('action'),
	data: data,
	type: 'POST',
	enctype: 'multipart/form-data',  // using to img upload 
	processData: false,  // using to img upload 
	contentType: false,  // using to img upload 
	success: function (op) {
		$('#deal-form-panel').pageSwapTo('#deal-list');
		$('#deal-form').resetForm();
		DT.dataTable().fnDraw();
	}
});
		
/* Datea Picker */

/*  WORKING PERFECT */
	var date = new Date();
	$('#dob').datepicker({
        startDate: '-18y',
		endDate:date,
        format: "yyyy-mm-dd",
        autoclose: true
    }).change(function () {
        document.getElementById('dob').dispatchEvent(new Event('input', {
            'bubbles': true,
            'cancelable': true
        }));
    });
	

$("#dob").datepicker({
		autoclose:true,
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1,
        format: 'yyyy-mm-dd'
    });
	
	
 var PIF = $('#profile_image_form');
    //$.fn.datepicker.defaults.format = "M-d-yyyy";
    $('#dob').datepicker({
        endDate: '-18y',
        format: "yyyy-mm-dd",
        autoclose: true
    }).change(function () {
        document.getElementById('dob').dispatchEvent(new Event('input', {
            'bubbles': true,
            'cancelable': true
        }));
    });
    /* Set Default Image */
    if ($('#attachment-preview', PIF).attr('data-old-image') != '') {
        $('input', PIF).attr('data-default', $('#attachment-preview', PIF).attr('data-old-image'));
    }	
	
$("#dob").datepicker({
		//defaultDate: "+1w",
		showDropdowns: 'true',
		dateFormat: 'mm-dd-yyyy',
		startDate: '<?php echo date('m/d/Y', strtotime('-100 year'))?>',
		endDate: '<?php echo date('m/d/Y', strtotime('-18 year'))?>',
	});	
	
if ($.fn.datepicker) {
	$('#from,#from_date').datepicker({
		autoclose: true,
		changeMonth: true,
		changeYear: true,
		format: 'yyyy-mm-dd'
	}).on('changeDate', function (date) {
		$('#to,#to_date').datepicker('setStartDate', date.date);
	});
	$('#to,#to_date').datepicker({
		autoclose: true,
		changeMonth: true,
		changeYear: true,
		format: 'yyyy-mm-dd'
	}).on('changeDate', function (date) {
		$('#from,#from_date').datepicker('setEndDate', date.date);
	});
}	

$(document).ready(function() {
	var date = new Date();
  var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
  var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());

  $('#datepicker1').datepicker({
format: "mm/dd/yyyy",
todayHighlight: true,
startDate: today,
endDate: end,
autoclose: true
  });
  $('#datepicker2').datepicker({
format: "mm/dd/yyyy",
todayHighlight: true,
startDate: today,
endDate: end,
autoclose: true
  });

  $('#datepicker1,#datepicker2').datepicker('setDate', today);
});
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.1/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.1/css/bootstrap-datepicker.min.css" />
<div class="row">
  <div class="col-lg-2">
<div class="panel">
  <fieldset>
    <div class="form-group">
      <label for="datepicker1">Date</label>
      <input type="text" class="form-control" id="datepicker1">
    </div>
  </fieldset>
  <fieldset>
    <div class="form-group">
      <label for="datepicker2">Date2</label>
      <input type="text" class="form-control" id="datepicker2">
    </div>
  </fieldset>
</div>
  </div>
</div>

	
	
/*  map function */
	var a = $('.widget').map(function (){
		return $(this).attr('data-widget-name');
	}).get();
	
	<input name="new_profile_pin[]" id="a1"/>
	<input name="new_profile_pin[]" id="a2"/>
	<input name="new_profile_pin[]" id="a3"/>
	var formData = $("input[name='new_profile_pin[]']")
              .map(function(){return $(this).val();}).get();
	JS Result:
	(4) ["1", "2", "3", "4"]
    0:"1" 1:"2" 2:"3" 3:"4"
	
/* SELECT AND CHECKED AND RADIO FIND */

$(function() {
    var data = '<select><option value="1">A</option><option value="2">B</option><option value="3">C</option></select>';

    $(data).appendTo('body').find('option[value=2]').attr('selected','selected');
});
$('.selDiv option:eq(1)').prop('selected', true);
$('.selDiv option:eq(1)').attr('selected', 'selected');
var conceptName = $('#aioConceptName').find(":selected").text();
$( "#myselect option:selected" ).text();

/*  */
	<div class="form-group">
		<label class="control-label col-sm-4">{{trans('admin/member/member_list.gender')}} :</label>
		<div class="col-sm-6">
			<input type="radio" name="rating" value="1" class="radio-inline">Poor
			<input type="radio" name="rating" value="2" class="radio-inline">Good
			<input type="radio" name="rating" value="3" class="radio-inline">Excellent
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-4">{{trans('admin/member/member_list.gender')}} :</label>
		<div class="col-sm-6">
			<div class="radio">
			  <label> <input type="radio" name="rating" value="1"> Male </label>
			  <label> <input type="radio" name="rating" value="2"> Female </label>
			  <label> <input type="radio" name="rating" value="3"> Others </label>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="example-nf-rating" class="text-muted">{{trans('admin/member/member_list.gender')}} :</label><br>
		<input type="radio" name="rating" value="1" class="radio-inline">Poor
		<input type="radio" name="rating" value="2" class="radio-inline">Good
		<input type="radio" name="rating" value="3" class="radio-inline">Excellent
	</div>

/* ALERT  */
$('#view_details .box-body').children(':first').append('<div class="alert alert-danger">'+res.msg+'</div>');

<div class="form-group">
	<label class="control-label col-sm-4">{{trans('admin/member/member_list.gender')}} :</label>
	<div class="col-sm-6">
		<input type="radio" name="rating" value="1" class="radio-inline">Poor
		<input type="radio" name="rating" value="2" class="radio-inline">Good
		<input type="radio" name="rating" value="3" class="radio-inline">Excellent
	</div>
</div>
	
 window.location.replace(ajaxUrl + 'user/view_tickets');
	
 /*  Active  */
if ($('#tab-content #residence').parent().attr('class') == 'active' && $('#tab-content #residence').attr('aria-expanded') == 'true') {
	residence_address();
}
$('#tab-content').on('click', '#residence', function (e) {
	e.preventDefault();
	residence_address();
});
function residence_address() {      
	$.ajax({});
}

 **** FUNCTION ****
 /* Push & indeexOf function */
    var LoadedTabs = [];
    $('#my-deal').on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
        var target = $(e.target).attr("href");
		alert(target);
        if ($.inArray(target, LoadedTabs) < 0) {
            LoadedTabs.push(target);
            LoadedDT[target] = $(target + '-table').dataTable(DTConfig[target]);
        }
    });
	
EX:1
 $(function () {
    
	$.ajax({
        url: window.location.RETAILER + 'my-wallet/balance',
        success: function (op) {
		    console.log(op.wallet);
            if (op.wallet) {
			    var cont = '',wallets=[];
                $.each(op.wallet, function (k, v) {
					cont = '';
					
					$('#wallet_'+v.wallet_code+'', '#wallet_balance').text(v.wallet);
					
					cont += '<div class="row"><blockquote class="col-sm-3"><span class="label label-info col-sm-2"><h4>'+v.currency_symbol+'</h4></span> <div class="col-sm-10 text-muted"><em>Current Balance</em><br>'+v.current_balance+' '+v.currency_code+'</div></blockquote><blockquote class="col-sm-3"><span class="label label-success col-md-2"><h4>'+v.currency_symbol+'</h4></span><div class="col-sm-10 text-muted"><em>Withdrawable</em><br>-</div></blockquote></div><div class="clearfix"></div>'; 
					if(wallets.indexOf(v.wallet_code)<0){
					cont = '<div class="panel col-sm-12"><div class="panel-heading"><h4>'+v.wallet+'</h4></div><div class="panel-body col-sm-12"><div id="'+v.wallet_code+'">'+cont+'</div></div></div>';
						$('#wallets', '#wallet_balance').append(cont);
						wallets.push(v.wallet_code);
					}
					else{
						$('#'+v.wallet_code, '#wallets').append(cont);
					}
					
                });
            } else {
                $('#wallet_balance #balance').html('<h3 class="text-center">No Data found.<h3>');
            }
        }
    });
});


@extends('retailer.layout.layout')
@section('title', trans('general.retailer.wallet.wallet_balance')) 
@section('breadcrumb')
<li class="active"><i class="fa fa-user"></i> {{trans('general.retailer.wallet.wallet_balance')}} </li>
@stop
@section('content')
<div class="col-sm-12" id="wallet_balance">
    <div class="box box-primary">
       <!-- <div class="box-header with-border">
            <i class="fa fa-money" aria-hidden="true"></i>
            <h3 class="box-title"> {{trans('general.retailer.wallet.wallet_balance')}} </h3>
        </div> -->
        <div class="box-body">  
		<div id="wallets">
					</div>
            <div class="panel col-sm-12">
			    <div class="panel-heading"><h4 id="wallet_xpc"></h4></div>
				<div class="panel-body col-sm-12">
					<div id="balance_xpc">
					</div>
				</div>
            </div>
			<div class="panel col-sm-12">
			    <div class="panel-heading"><h4 id="wallet_cbp"></h4></div>
				<div class="panel-body col-sm-12">
					<div id="balance_cbp">
					</div>
				</div>
            </div>
			<div class="panel col-sm-12" >
			    <div class="panel-heading"><h4 id="wallet_bp"></h4></div>
				<div class="panel-body col-sm-12">
					<div id="balance_bp">
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

@include('retailer.common.cropper')
@stop
@section('scripts')
@include('retailer.common.datatable_js')
<!-- <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>  -->
<script src="{{asset('js/providers/retailer/wallet/wallet_balance.js')}}"></script>
@stop

  ****
 EX:2
 
 $(function () {
    
	$.ajax({
        url: window.location.RETAILER + 'my-wallet/balance',
        success: function (op) {
		    console.log(op.wallet);
            if (op.wallet) {
			    var cont = '';
                $.each(op.wallet, function (k, v) {
					cont = '';
					$('#wallet_'+v.wallet_code+'', '#wallet_balance').text(v.wallet);
					cont += '<div class="row"><blockquote class="col-sm-3"><span class="label label-info col-sm-2"><h4>'+v.currency_symbol+'</h4></span> <div class="col-sm-10 text-muted"><em>Current Balance</em><br>'+v.current_balance+' '+v.currency_code+'</div></blockquote><blockquote class="col-sm-3"><span class="label label-success col-md-2"><h4>'+v.currency_symbol+'</h4></span><div class="col-sm-10 text-muted"><em>Withdrawable</em><br>-</div></blockquote></div><div class="clearfix"></div>'; 
					$('#balance_'+v.wallet_code+'', '#wallet_balance').append(cont);
                });
            } else {
                $('#wallet_balance #balance').html('<h3 class="text-center">No Data found.<h3>');
            }
        }
    });
});

@extends('retailer.layout.layout')
@section('title', trans('general.retailer.wallet.wallet_balance')) 
@section('breadcrumb')
<li class="active"><i class="fa fa-user"></i> {{trans('general.retailer.wallet.wallet_balance')}} </li>
@stop
@section('content')
<div class="col-sm-12" id="wallet_balance">
    <div class="box box-primary">
       <!-- <div class="box-header with-border">
            <i class="fa fa-money" aria-hidden="true"></i>
            <h3 class="box-title"> {{trans('general.retailer.wallet.wallet_balance')}} </h3>
        </div> -->
        <div class="box-body">  
            <div class="panel col-sm-12">
			    <div class="panel-heading"><h4 id="wallet_xpc"></h4></div>
				<div class="panel-body col-sm-12">
					<div id="balance_xpc">
					</div>
				</div>
            </div>
			<div class="panel col-sm-12">
			    <div class="panel-heading"><h4 id="wallet_cbp"></h4></div>
				<div class="panel-body col-sm-12">
					<div id="balance_cbp">
					</div>
				</div>
            </div>
			<div class="panel col-sm-12" >
			    <div class="panel-heading"><h4 id="wallet_bp"></h4></div>
				<div class="panel-body col-sm-12">
					<div id="balance_bp">
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

@include('retailer.common.cropper')
@stop
@section('scripts')
@include('retailer.common.datatable_js')
<!-- <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>  -->
<script src="{{asset('js/providers/retailer/wallet/wallet_balance.js')}}"></script>
@stop

 // Functions
   map function in dashboard.js retailer side
   Push function in  wallet_balance.js retailer side
   Edit Details  in admin_list.js (staff) retailer side
 
 // Refer
 .map(), .get(), .join(), .apply(), .eval(), .call(), 
 
 //  @Keywords
 
 datatable load from json object directly - Google Search
 javascript dynamic function call with arguments - Google Search
 datatable with json object - Google Search
 jquery get array of element attributes - Google Search
 generate qrcode code in php - Google Search
 handle group of ajax calls - Google Search
 what's the purpose of for attribute in html '

 /* Google Location api URL */
https://maps.googleapis.com/maps/api/geocode/xml?address=614716+IN&key=AIzaSyBSv4zkc1apoAfsL71cTC1od4tOzNaMgJA 
 
/* LINK */
http://www.jquerybyexample.net/2013/02/jquery-convert-string-to-integer.html
https://editor.datatables.net/manual/php/validation
https://ezgif.com/overlay/ezgif-3-e9ef341b6b.png
http://timepicker.co/                                         //timepicker
https://gendelf.github.io/jquery.businessHours/               //timepicker
http://jonthornton.github.io/jquery-timepicker/               //timepicker
https://www.malot.fr/bootstrap-datetimepicker/demo.php        //timepicker
https://startbootstrap.com/bootstrap-resources/
https://www.w3schools.com/jsref/prop_text_defaultvalue.asp   //defaultValue
http://bootstrap-datepicker.readthedocs.io/en/latest/options.html#enddate
http://patternry.com/p=required-form-fields/
http://jona.ca/tools   Unused Varible detector & Unclosed html Finder
https://www.cambiaresearch.com/articles/39/how-can-i-use-javascript-to-allow-only-numbers-to-be-entered-in-a-textbox    //Only Allow numbers on keypress
https://www.xul.fr/javascript/associative.php   Js Reference
https://www.magnigenie.com/wp-bootstrap-gallery-wordpress-image-gallery-plugin/   Look Good Search Bootstrap theme
https://layerslider.kreaturamedia.com/?platform=jquery   Jquery Slider Super site
https://tympanus.net/Development/ScatteredPolaroidsGallery/   Jquery Slider good
https://amazingslider.com/examples/3d-jquery-slider/  3d image slider plugin
https://stackoverflow.com/questions/251402/create-an-empty-object-in-javascript-with-or-new-object?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa    empty array in js
https://stackoverflow.com/questions/4994201/is-object-empty   object empty in javascript NOT WORK
https://itsolutionstuff.com/post/-how-to-check-object-is-empty-or-not-in-jquery-javascript-example.html  WORKING object empty in javascript
https://stackoverflow.com/questions/13272406/convert-string-with-commas-to-array?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa    Split string to array Converstion
https://stackoverflow.com/questions/1098040/checking-if-a-key-exists-in-a-javascript-object    checking-if-a-key-exists-in-a-javascript-object
http://jsben.ch/WqlIl   Javascript - TEST
https://www.alfajango.com/blog/the-difference-between-jquerys-bind-live-and-delegate/    jquery On
http://bootstrap-datepicker.readthedocs.io/en/latest/             Bootstrap Datepicker
https://javascript.info/array   js reference

http://www.codescratcher.com/javascript/print-image-using-javascript/   QRCODE Print
https://www.ampproject.org/docs/interaction_dynamic/amp-actions-and-events  Js events
https://www.reddit.com/r/javascript/comments/yzbw9/jquery_create_empty_object_to_work_with/    js Reference

https://hackernoon.com/copying-text-to-clipboard-with-javascript-df4d4988697f   COYR text & hidden text
?>

http://127.0.0.1:8000/tickets/book/?csrfmiddlewaretoken=VDOxXT5xHOrfgHRCbBxXp9nsR1psYGU5RyronsjYvNjbd9Fkyy7P6v9nUoSQE60X&name=Kumar&age=12&gender=MA&berth_preference=UPR&Submit=