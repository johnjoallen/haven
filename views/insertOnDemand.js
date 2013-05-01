/* This script and many more are available free online at
The JavaScript Source!! http://javascript.internet.com
Created by: Bontrager Connection, LLC | http://www.willmaster.com/Licensed under: U.S. Copyright
 */

var DefaultName = "gift";
var DefaultNameIncrementNumber = 0;

// No further customizations required.
function AddFormField(id,type,name,value,tag) {
if(! document.getElementById && document.createElement) { return; }
var inhere = document.getElementById(id);
var formfield = document.createElement("input");
if(name.length < 1) {
   DefaultNameIncrementNumber++;
   name = String(DefaultName + DefaultNameIncrementNumber);
   }
formfield.name = name;
formfield.type = type;
formfield.value = value;
if(tag.length > 0) {
   var thetag = document.createElement(tag);
   thetag.appendChild(formfield);
   inhere.appendChild(thetag);
   }
else { inhere.appendChild(formfield); }
} // function AddFormField()

