var username = "";
var current  = 0;
var added    = "";
var curUser  = "";
var vistem   = 0;
var isOutChat= 0;
var fisrt    = 0;
var users    = new Array();
function startSession(user){
	 username = user;
	get_messages();//init
	var timer = setInterval("get_messages()", 500);
}

function get_messages() {
	var request = new Request.JSON({
			url:'jserver_xml.php?action=get&user='+username,
			onComplete:function(jsonObj) {
				handle_response(jsonObj.messages);
			}
		}).send();
}

function handle_response(messages){
var news   = new Array();
users = [];
	for(i=0;i<messages.length;i++){
	var matches  = 0;
	var matchesb = 0;
		if(messages[i].lu!=0){
			for(j=0;j<news.length;j++){
				if(news[j]==messages[i].user)matches++;
			}
			if(matches==0)news.push(messages[i].user);
		}
		
		for(l=0;l<users.length;l++){
			if(users[l]==messages[i].user)matchesb++;
		}
		if(matchesb==0)users.push(messages[i].user);
	}
	//alert(messages);
	showUsers(users,messages,news);

	showMess(users[current],messages);
}

function showUsers(users,messages,news){
//affiche les utilisateurs
	var userz = $('userz');
	userz.innerHTML = '';	
	var nbuz = users.length;
	if(nbuz==0)return;
	curUser = nbuz - 1;
	var userz_ul = document.createElement('ul');
	userz.appendChild(userz_ul);
	for (var j=0; j < users.length; j++) {//affiche les utilisateur
			var new_li       = document.createElement('li');
			new_li.id        = "li"+j; 
			var da_span      = document.createElement('span');
			var img          = document.createElement('img');
			img.src          = "images/croix.png";
			img.className    = "imgclose";
			da_span.innerHTML = users[j]+"&nbsp;&nbsp;&nbsp;";
			var da_span_content = da_span.innerHTML;
			if(da_span_content == da_span.innerHTML && added!=""){
						current = users.length-1;
						added   ="";
				}
				
			da_span.id       = j;
			img.id           = j;		
			
			for(var k = 0; k<news.length; k++){//flashe les nouveaux messages
				 if(news[k] == users[j] && news[k] != users[current])  {
						da_span.className = "flash";
						new_li.className = "flash";
					}
					if(news!=""){
						if(isOutChat==0){
								$('temoin').setStyle('visibility','visible');
								$('temoin').innerHTML = "nouveau(x) message(s): ";
								for(i=0;i<news.length;i++){
									$('temoin').innerHTML += news[i]+" ";
								}
								if(vistem==0){
								new Fx.Tween($('temoin')).start('bottom', '-60px', '0px');;
								vistem++;
							}
						}
					}
					
				}
				
			da_span.onclick	 = function() {//evt clic sur la span
				    this.className	           = "focus";	
					current        	           = this.id;	
					$("li"+this.id).className = "focus";
					curUser          = this.innerHTML;
					document.getElementById("temoin").className = "temz";
					showMess(this.innerHTML,messages);
					set_reads(this.innerHTML);
			}
		    img.onclick     = function() {	//evt clic sur l'image: on supprime l'utilisateur
					if(current == this.id){
						if(this.id!=0){
							current = this.id-1;
						}else{
							current = 0;
						}
					}
					if(current>this.id){
						current--;
					}
					eff_user(users[this.id], this.id, nbuz);
		} 
		if(j==current) {//gestion d focus
			da_span.className = "focus";
			new_li.className = "focus";
		}else{
			//if(da_span.className!="flash" )da_span.className = "basic";
		}
		userz_ul.appendChild(new_li);
		new_li.appendChild(da_span);
		if(users.length>1){//si il y a + d1 util on ajoute une image style boutton supprimer
			new_li.appendChild(img);
		}
	}
	for(i=0;i<news.length;i++){
		if(news[i]==users[current] && isOutChat==1)set_reads(users[current]);//alert("news "+news[i]+ " users " +users[current])
	}
}

function showMess(user,messages){//affiche les messages suivant l'utilisateur
	var mychat = $('mychat');
	var str = "<ul>";	
	for (var i=0; i < messages.length; i++) {
		var mymess    = messages[i].message;	
		var myuser    = messages[i].user;
		var me        = messages[i].me;
		if(myuser == user){
		  if(mymess!=""){
		   if(mymess!=undefined){
				if(me==1){
				str += "<li><b> moi </b>: " + mymess +"</li>";
				}else{
				str += "<li><b>"+ user + '</b>: ' + mymess +"</li>";
				}
			}
		  }
		}
	}
	str += "</ul>";
	mychat.innerHTML=str;
    mychat.scrollTop = mychat.scrollHeight;
}


function send_message(){	
	var dest = users[current];
	if(dest==undefined) return;
	var message = $('message').value;
	if (message == '') {
		alert('essaye d ecrire un message...');
		return false;
	}
	// envoie le message
	var request = new Request.JSON({
			url:'jserver_xml.php?action=add&user='+ username + '&dest=' + dest + '&message=' + message,
			onComplete:function(jsonObj) {
				handle_response(jsonObj.messages);
			}
		}).send();
	$('message').value = '';
	$('message').focus();
}


function set_reads(myuser) {
	var request = new Request.JSON({
			url:'jserver_xml.php?action=set_reads&user='+ username +'&cible='+ myuser,
			onComplete:function(jsonObj) {
				handle_response(jsonObj.messages);
			}
		}).send();
}

function add_client(client) {
	curUser = client;
	if(client==username){
		alert("tu veux chatter tout seul?");
		return;
		}
	var matches = 0;
	if(users.indexOf(client)>=0 && isOutChat==0){
	  open_chat();
	  return;
	}
	added = client;
	var request = new Request.JSON({
			url:'jserver_xml.php?action=add_client&user='+ username +'&client='+ client,
			onComplete:function(jsonObj) {
				handle_response(jsonObj.messages);
			}
		}).send();
	  open_chat();
}

function eff_user(myuser, id, nb){
	if(current==id){
		if(current>0){
		current -=1;
		}else{
		current=0;
		}
	} 
	if(nb==2)current=0;
	var request = new Request.JSON({
			url:'jserver_xml.php?action=eff_user&user='+ username +'&cible='+ myuser,
			onComplete:function(jsonObj) {
				handle_response(jsonObj.messages);
			}
		}).send();
}

function add_value(value){
	$('message').value += value;
	document.getElementById('message').focus();
}

function standbychat(){//fin de session
	$('message').blur();
	var userz       = $('userz');
	var mychat      = $('mychat');
	var container   = $('container');
	current         = -1;
	container.fade('out');
	userz.innerHTML = mychat.innerHTML = '';
	isOutChat = 0;
	vistem    = 0;
}

function closechat(){//fin de session : on vide la table messages + cache la fenetre!
	eff_user("all",0);
	standbychat();
}

function open_chat(){
	current = 0;
	var container = $("container");
	container.fade('in');
	container.makeDraggable();
	$('temoin').setStyle('visibility','hidden');
	isOutChat = 1;
}

function hitkey() {
	send_message();
}
//ajoute l'evt sur la touche enter!
Element.Events.keyenter = {
	base: 'keyup',
	condition: function(e){
		return e.key=='enter';
	}
};
//controlleurs <a> rel chat et enter
window.addEvent('domready', function(){
	create_chat();
	$('container').setStyle('opacity','0');//cache le container
	$('temoin').setStyle('visibility','hidden');//cache le temoin
	$('message').addEvent('keyenter', function(e){
		e.stop();
		hitkey();
	});	
	$$('a').addEvent('click',function(el){
		if(this.getAttribute('rel') == "chat"){
			add_client(this.getAttribute('name'));	
		};
	});
	
	$('container').addEvent('mouseover',function(el){
		$('message').focus();
	});
	window.addEvent('unload', function(){
		standbychat();
	})

});