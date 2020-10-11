// This is the javascript of portion planner
function getFoodName(str){

    if (str.length == 0) {
        document.getElementById("foodName").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("foodName").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getFoodName.php?q=" + str, true);
        xmlhttp.send();
    }

}
