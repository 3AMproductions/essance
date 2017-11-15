/* Following lines used to dynamically include dependent javascript files. Do not alter
php-include lib.classes.js
php-include lib.domFunction.js
php-include prototype-1.4.0.js
*/

// requires lib.classes.js
var hidemail = {
  node : 'address',
  at : '[at]',
	dot : '[dot]',
	classname : 'email',
	activate : function(){
    if(!document.createElement) return;
    var emails = document.getElementsByClassName(hidemail.classname,hidemail.node);
    for (var i=0;i<emails.length;i++)
    {
      if (emails[i].firstChild.nodeValue)
      {
       	var email = emails[i].firstChild.nodeValue;
      	var title = emails[i].getAttribute('title');
      	var clas = emails[i].className;
      	email = email.replace(hidemail.at,"@").replace(hidemail.dot,".");
      	var text = document.createTextNode(email);
      	var a = document.createElement('a');
      	a.appendChild(text);
      	a.setAttribute('rel', 'contact');
      	a.setAttribute('title', title);
      	a.setAttribute('href', "mailto:" + email);
      	var parent = emails[i].parentNode;
      	var address = document.createElement('address');
      	address.appendChild(a);
      	address.className = clas;
      	parent.replaceChild(address,emails[i]);
			}
		}
    return;
	}
};

// activate_email after DOM is loaded
// requires lib.domFunction.js
domFunction(hidemail.activate, { 'address' : 'tag' });
