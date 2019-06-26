$(document).ready(function(){
if($("#publico").attr("checked",true)){
  $("#publicoval").val("1");
}
else {
    $("#publicoval").val("0");
}


$("#enlace").keyup(function(){
  $("#imagen").attr("required",false);
  $("#enlace").attr("required",true);
});

$("#imagen").click(function(){
  $("#enlace").val("");
  $("#enlace").attr("required",false);
  $("#imagen").attr("required",true);
});

$("#publico").click(function(){
  // alert($("#publicoval").val());
if($(this).attr("checked",true)){
  $("#publicoval").val("1");
  // alert($("#publicoval").val());
}
else {
  $("#publicoval").val("0");
  // alert($("#publicoval").val());
}
});
// Remove a few plugins from the default setup.
DecoupledEditor
    .create( document.querySelector( '#editor' ),{
      language: 'es'
    })
    .then( editor => {

        const toolbarContainer = document.querySelector( '#toolbar-container' );
        toolbarContainer.appendChild( editor.ui.view.toolbar.element );

    } )
    .catch( error => {
        console.error( error );
    } );

DecoupledEditor
    .create( document.querySelector( '#editor2' ),{
      language: 'es'
    } )
    .then( editor => {
        const toolbarContainer = document.querySelector( '#toolbar-container2' );

        toolbarContainer.appendChild( editor.ui.view.toolbar.element );
    } )
    .catch( error => {
        console.error( error );
    } );
});
