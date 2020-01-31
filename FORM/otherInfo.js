function show_hide(my_obj, id)
{
    var chk = my_obj.checked;
    if(chk===true)
    {   
        document.getElementById("otherInformation").style.display="block";
    }
    else
    {
        document.getElementById("otherInformation").style.display="none";
    }
}
function show_hideButton(my_obj){
    document.getElementById("update").style.display = 'block';
    document.getElementById("submit").style.display = 'none';
}