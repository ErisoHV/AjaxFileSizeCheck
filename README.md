# AjaxFileSizeChecker
**Check file size using Ajax and JQuery**

Based on [ajaxfileupload plugin](http://www.phpletter.com/Our-Projects/AjaxFileUpload/) by Yvind Saltvik

**Modifications**

- The content of the input is not cleaned after checking the file with Ajax
- The file size is checked in the *OnChange* event

**Use**
- Call: `ajaxFileUpload(id,name,size)` in the field's OnChange event and/or
- Modify the `myFileValidator->ajaxFileUpload(id,name,size)` logic:

```
function ajaxFileUpload(id,name,size){
		$("#loading").ajaxStart(function(){   //loading image OPTIONAl
			$(this).show();
		})
		.ajaxComplete(function(){ 
			$(this).hide();
		});
		$.ajaxFileUpload({
				url:'ajaxfileprocess/doajaxfileupload.php', //Your server side validation process
				secureuri:false,
				fileElementId:id,
				dataType: 'json',
				fileElementName: name,	//input name (see ajaxfileupload.js) MANDATORY
				data:{name:'logan', id:'id'},
				success: function (data, status){
					if(typeof(data.error) != 'undefined'){
					//...
						if(data.error != ''){
							//Your logic
						}else{
							if (data.msg > size){
								//SIZE ERROR - your logic
							}
							else{
							//CORRECT SIZE - your logic
							}
						}
					}
				},
				error: function (data, status, e)
				{
				  //SIZE ERROR - your logic
				}
			}
		)
	}
	
