function getComplaint ()
{
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
			   // Typical action to be performed when the document is ready:
			   document.getElementById("complaintTable").innerHTML = xhttp.responseText;
					 }
			};
		xhttp.open("GET", "complaintTable.php", true);
		xhttp.send();
}
function deleteComplaint(id){
if(confirm('Are You Sure to delete complaint'))
var xhttp = new XMLHttpRequest();

			xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
			   // Typical action to be performed when the document is ready:
			   document.getElementById("complaintTable").innerHTML = xhttp.responseText;
					 }
			};
xhttp.open("GET", "complaintTable.php?id="+id, true);
xhttp.send();
}
function logout()
	{
			if(confirm('are you sure to logout')){
				var xhttp = new XMLHttpRequest();

			xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
			   // Typical action to be performed when the document is ready:
					location.href = 'login.php';
					 }
			};
			xhttp.open("GET", "logout.php", true);
			xhttp.send();

			}
	}


window.onload = function() {
  getComplaint();
};
