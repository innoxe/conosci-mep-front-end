import './main.scss';

console.log('Hello World!');


async function loadJSON (url: any) {
  const res = await fetch(url);
  return await res.json();
}


export async function loadPost() {
  const data = await loadJSON('https://127.0.0.1:8000/posts');
  console.log(data);
}

// Get td address and company table to expand
var tdexpand = document.getElementsByClassName("td_expand");

var myFunction = function() {
  var attribute = this.getAttribute("data-header");
  var idattribute = this.getAttribute("data-id");
  var idrow = document.getElementById("hidden_row_"+attribute+"_"+idattribute)
  idrow.classList.toggle("hidden_row");
  var icon = this.querySelector('.right .icon-'+attribute+'-'+idattribute);
  icon.classList.toggle('rotate'); 
  var tdselect = document.getElementsByClassName("td_"+attribute+"_"+idattribute)[0].classList.toggle("select-td"+attribute) ;
  //var tdselect = this.querySelector("td_"+attribute);
  //tdselect.classList.toggle("select-td"+attribute);
};

for (var i = 0; i < tdexpand.length; i++) {
  tdexpand[i].addEventListener('click', myFunction, false);
}
