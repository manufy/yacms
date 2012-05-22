{function="adminwidget_admingrupos()"}


<link rel="stylesheet" type="text/css" media="screen" href="../../themes/ui-lightness/jquery-ui-1.8.17.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="../../lib/jqgrid/css/ui.jqgrid.css" />

<script src="../../lib/jqgrid/js/i18n/grid.locale-es.js" type="text/javascript"></script>
<script src="../../lib/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>
<script type="text/javascript">    




   jQuery(document).ready(function()
    {     	

	 
	    
		jQuery("#list").jqGrid({
			url: "../Views/adminwidgets/json/admingruposjqgrid.php",
			datatype: "json",
			mtype: "GET",
			colNames:["id","nombre"],
			colModel:[
				{name:'id',index:'id', width:100,hidden:false,key:true},
				{name:'nombre',index:'nombre', width:180}
				
				],
  			 pager: '#gridpager',
             rowNum:10,
             rowList:[10,50,100],
             sortname: 'id',
             sortorder: 'asc',
             viewrecords: true,
             multiselect: false,
             imgpath: "themes/ui-lightness/images",
             caption: "Grupos"                         
		});	 // jqgrid
      }		 // ready function implementation
    );		 // readyfunction declaration
  

</script>



...
<table id="list"></table> 
<div id="gridpager"></div>


<button type="button"  id="miboton">Crear</button>

