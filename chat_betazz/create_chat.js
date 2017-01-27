function create_chat(){
	//container
	var bd = document.body;
	var container = new Element('div',	{'id':'container'});
	var rtop = new Element('b',	{'class':'rtop'});

	var r1 = new Element('b',	{'class':'r1'});
	var r2 = new Element('b',	{'class':'r2'});
	var r3 = new Element('b',	{'class':'r3'});
	var r4 = new Element('b',	{'class':'r4'});

	var rbottom = new Element('b',	{'class':'rbottom'});

	var r5 = new Element('b',	{'class':'r4'});
	var r6 = new Element('b',	{'class':'r3'});
	var r7 = new Element('b',	{'class':'r2'});
	var r8 = new Element('b',	{'class':'r1'});

	var content = new Element('div',	{'id':'content'});	
	//temoin
	var temoin = new Element('div', {'id': 'temoin',  events:{'click':function(){open_chat();}}}) ;
	//a 
	var a = new Element('div',{'id':'a'});
	//b 
	var b = new Element('div',{'id':'b'});
	//h1 closer 
	var closer = new Element('h1', {'id': 'closer',  events:{'click':function(){closechat();}}}) ;
	closer.innerHTML = 'X';
	//h1 titre 
	var titre = new Element('h1',{'id':'titre'});
	titre.innerHTML = 'ajax chat client';
	//bloc
	var bloc = new Element('div',{'id':'bloc'});
	//mychat
	var mychat = new Element('div',{'id':'mychat'});
	//users
	var userz = new Element('div',{'id':'userz'});
	//div pour les smileys
	var imgz = new Element('div',{'id':'imgz'});
	//smileys
	var baseurl = "images/smilies/";
	var sm_1 = new Element('img', {'src': baseurl + 'sm_biggrin.gif',  events:{'click':function(){add_value(':)');}}}) ;
	var sm_2 = new Element('img', {'src': baseurl + 'sad.gif',  events:{'click':function(){add_value(':(');}}}) ;
	var sm_3 = new Element('img', {'src': baseurl + 'sm_upset.gif',  events:{'click':function(){add_value(':s');}}}) ;
	var sm_4 = new Element('img', {'src': baseurl + 'sm_bigeek.gif',  events:{'click':function(){add_value(':o');}}}) ;
	var sm_5 = new Element('img', {'src': baseurl + 'sm_confused.gif',  events:{'click':function(){add_value(':|');}}}) ;
	var sm_6 = new Element('img', {'src': baseurl + 'sm_wink.gif',  events:{'click':function(){add_value(';)');}}}) ;
	var sm_7 = new Element('img', {'src': baseurl + 'sm_razz.gif',  events:{'click':function(){add_value(':p');}}}) ;
	var sm_8 = new Element('img', {'src': baseurl + 'sm_cool.gif',  events:{'click':function(){add_value('8)');}}}) ;
	var sm_9 = new Element('img', {'src': baseurl + 'sm_dead.gif',  events:{'click':function(){add_value('8|');}}}) ;
	var sm_10 = new Element('img', {'src': baseurl + 'sm_sigh.gif',  events:{'click':function(){add_value(':-(');}}}) ;
	var sm_11 = new Element('img', {'src': baseurl + 'biggrin.gif',  events:{'click':function(){add_value(':D');}}}) ;
	var sm_12 = new Element('img', {'src': baseurl + 'sm_cry.gif',  events:{'click':function(){add_value('8-(');}}}) ;

	//inputz
	var message  = new Element('input', {'type':'text', 'id':'message'});
	var envoyer = new Element('input', {'type':'button','id':'envoyer', 'value':'envoyer', events:{'click':function(){send_message();}}});

	container.injectInside(bd);

	rtop.injectInside(container);
	r1.injectInside( rtop);
	r2.injectInside( rtop);
	r3.injectInside( rtop);
	r4.injectInside( rtop);
	
	content.injectInside(container);
	
	rbottom.injectInside( container);
	r5.injectInside( rbottom);
	r6.injectInside( rbottom);
	r7.injectInside( rbottom);
	r8.injectInside( rbottom);
	
	temoin.injectInside( bd);
	closer.injectInside(content);
	titre.injectInside(content);
	a.injectInside(content);
	b.injectInside(content);
	bloc.injectInside(content);
	mychat.injectInside(bloc);
	userz.injectInside(bloc);
	//smileys
	imgz.injectInside(content);
	sm_1.injectInside(imgz);
	sm_2.injectInside(imgz);
	sm_3.injectInside(imgz);
	sm_4.injectInside(imgz);
	sm_5.injectInside(imgz);
	sm_6.injectInside(imgz);
	sm_7.injectInside(imgz);
	sm_8.injectInside(imgz);
	sm_9.injectInside(imgz);
	sm_10.injectInside(imgz);
	sm_11.injectInside(imgz);
	sm_12.injectInside(imgz);

	message.injectInside(content);
	envoyer.injectInside(content);
	return;
}

