	//Clear an input file
	function CleanInputFile(id){	
		id1 = "#"+id;
		var aux = $(id1).clone();
		aux.css('display','none');
		aux.val("");
		$(id1).after(aux);
		$(id1).remove();
		aux.attr('id',id)
		aux.show();
	}
	
	 //check the file extension. Also a validation server side will be required
	function validate(elem, tipo,tamanio_val){
		var archivo = $(elem);
		var nombre = archivo.val();
		var extension = nombre.substring(nombre.lastIndexOf(".")).toLowerCase();
		if (extension != "."+tipo){
			$("#error").html("<img src='images/cross.png'> El tipo del archivo es incorrecto...");
			$("#correcto").html("");
			$("#"+archivo.attr('id')).css("color","red");
			CleanInputFile(archivo.attr('id'));
		}
		else{
			$("#error").html("");
			$("#"+archivo.attr('id')).css("color","black");
			ajaxFileUpload(archivo.attr('id'), archivo.attr('name'), tamanio_val);
		}
	}
	/* 
	 * AjaxFileUpload call
	 * id: input ID 
	 * name: files[] (multiple files)
	 * size: max file size
	 */
	function ajaxFileUpload(id,name,size){
		$("#loading").ajaxStart(function(){   //loading image
			$(this).show();
		})
		.ajaxComplete(function(){ 
			$(this).hide();
		});
		$.ajaxFileUpload({
				url:'ajaxfileprocess/doajaxfileupload.php', //server side process
				secureuri:false,
				fileElementId:id,
				dataType: 'json',
				fileElementName: name,	//input name (see ajaxfileupload.js)
				data:{name:'logan', id:'id'},
				success: function (data, status){
					if(typeof(data.error) != 'undefined'){
					$('#error').html("");
					$('#correcto').html("");
						if(data.error != ''){
								if (data.error == "Error1")
									$('#error').html("<img src='images/cross.png'> The file size exceeds the maximum allowed by the server");
								else if(data.error  == "Error2")
									$('#error').html("<img src='images/cross.png'> There was an error when trying to check the file, try again");
								else if (data.error == "Error3")
									$('#error').html("<img src='images/cross.png'> Can not check the file by its extension");
								CleanInputFile(id);
						}else{
							if (data.msg > size){
								CleanInputFile(id);
								$("#"+id).css("color","red");
								$('#error').html("<img src='images/cross.png'> File size exceeded");
							}
							else{
								$('#correcto').html("<img src='images/accept.png'> Size Ok: "+data.msg+" bytes");
							}
						}
					}
				},
				error: function (data, status, e)
				{
					CleanInputFile(arch);
					$('#error').html("<img src='images/cross.png'> The file size exceeds the maximum allowed by the server");
				}
			}
		)
	}