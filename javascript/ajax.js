/***************************************************
Makes the XmlHTTPRequest and fetches the result
in short this is AJAX
***************************************************/
function loadFragmentInToElement(fragment_url, element_id, func) 
{ 
	
	if(window.XMLHttpRequest)
	{
		try 
		{
			xmlhttp = new XMLHttpRequest();
		} 
		catch(e)
		{
			xmlhttp = false;
		}
	// branch for IE/Windows ActiveX version
	} 
	else if(window.ActiveXObject) 
	{
		try 
		{
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			try
			{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			} 
			catch(e) 
			{
				xmlhttp = false;
			}
		}
	}
	
	
	var element = document.getElementById(element_id); 
	
	element.innerHTML = ''; 

	//xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	//alert(xmlhttp.open("GET",fragment_url));
	xmlhttp.open("GET",fragment_url); 
	xmlhttp.onreadystatechange = function() 
	{ 
	//alert(xmlhttp.status); 
	  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	  { 
		element.innerHTML = xmlhttp.responseText; 
		//alert(xmlhttp.responseText); 
		/*if(func){
		  func();
		}*/
	  } 
	} 
	xmlhttp.send(null); 
}
