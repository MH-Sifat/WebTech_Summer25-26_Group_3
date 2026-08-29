
function searchJobs() {
    let keyword = document.getElementById('keyword').value;
    let location = document.getElementById('location').value;
    let jobType = document.getElementById('jobType').value;
    let response = document.getElementById("jobResults");


    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response.innerHTML = this.responseText;
        }
        else {
            document.getElementById("jobResults").innerHTML = this.status;
        }
    }

    xhttp.open("POST", "../Controller/jobs-controller.php", true);
    xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhttp.send("keyword=" + keyword + "&location=" + location + "&jobType=" + jobType);
}
