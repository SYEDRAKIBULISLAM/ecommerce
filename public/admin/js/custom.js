/**
 * Created by PACER 6 on 12-Nov-16.
 */

//Previous Page

function goBack() {
    window.history.back();
}



$("#session-alert").fadeTo(3000, 500).slideUp(500, function(){
    $("#session-alert").alert('close');
});
