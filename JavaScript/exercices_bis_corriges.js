// Conversion des francs en euros

function conversion(x){
	return x/6.55957;
}

console.log(conversion(100));

// Conversion des heures, minutes, secondes en secondes

function heures_to_secondes(h,m,s){
	return h*3600+m*60+s;
}

console.log(heures_to_secondes(2,17,54));

// Calcul du nombre de secondes de différence entre deux horaires

function difference(h1,m1,s1,h2,m2,s2){
	var diff = Math.abs(heures_to_secondes(h1,m1,s1) - heures_to_secondes(h2,m2,s2));

	return "La différence est de " + diff + " secondes, soit " + Math.floor(diff/3600) + "h" + Math.floor((diff%3600)/60) + "m" + (diff%60) + "s";
}

console.log(difference(2,17,54,5,48,27));

// Somme de tous les éléments de m à n (ou n à m, si m>n)

function somme(m,n){
	var sum = 0;

	if(m<n){
		for(var i=m;i<=n;i++)
			sum += i;
	}else{
		for(var i=n;i<=m;i++)
			sum += i;
	}

	return sum;
}

console.log(somme(5,8));

// Calcul de la factorielle de n

function fact(n){
	for(var i=n-1;i>1;i--)
		n *= i;

	return n;
}

console.log(fact(5));

// Moyenne de tous les éléments d'un tableau

function moyenne(tab){
	var res = 0;

	for(var i=0;i<tab.length;i++)
		res += tab[i];

	return res/tab.length;
}

console.log(moyenne([5,9,4,3,8]));

// Moyenne de la longueur de tous les éléments d'un tableau

function moyenne_longueur(tab){
	var res = 0;

	for(var i=0;i<tab.length;i++){
		res += tab[i].length;
	}

	return res/tab.length;
}

console.log(moyenne_longueur(["test","bonjour","voila"]));

// Renvoi d'un nombre aléatoire entre n et m

function hasard(n,m){
	if(n<m)
		return Math.round(Math.random()*(m-n)+n);
	else
		return Math.round(Math.random()*(n-m)+m);
}

console.log(hasard(2,10));

// Fonction qui fait deviner un nombre aléatoire à l'utilisateur en fonction de bornes m et n

function devine_nombre(n,m){
	var sol = hasard(n,m);
	var rep=null;
	var nb = 0;

	while(rep != sol){
		rep = prompt("Quelle est votre proposition ?");
		nb++;
		if(rep > sol)
			alert("Trop grand !");
		else if(rep < sol)
			alert("Trop petit !");
	}

	return "Bravo, vous avez trouvé en " + nb + " tentatives";
}

console.log(devine_nombre(0,100));

// Fonction où l'ordinateur tente de deviner un nombre passé en paramètre en fonction de bornes n et m définies

function ordi_devine(sol,n,m){
	var rep = null;

	while(rep != sol){
		rep = hasard(n,m);
		console.log("Ma réponse : " + rep);
		if(rep > sol){
			console.log("Trop grand !");
			m = rep-1;
		}else if(rep < sol){
			console.log("Trop petit !");
			n = rep+1;
		}
	}

	return "Bravo, vous avez trouvé";
}

console.log(ordi_devine(54,0,100));

// Fonction qui vérifie si un élément existe dans un tableau et renvoie son indice (-1 s'il n'existe pas)

function in_array(element,tab){
	for(var i=0;i<tab.length;i++){
		if(element == tab[i])
			return i;
	}
	return -1;
}

// Fonction qui vérifie que le login et le mot de passe rentré par un utilisateur existent et correspondent

var tab_login = ["Jp","David","Mike"];
var tab_pass = ["1234","5678","0000"];

function verifie_login(){
	var login = prompt("Entrez votre login");
	var index = null;
	var pass = null;

	if((index=in_array(login,tab_login)) != -1){
		pass = prompt("Entrez votre mot de passe");

		if(tab_pass[index] != pass){
			console.log("Mauvais mot de passe");
			return false;
		}else{
			console.log("Connexion");
			return true;
		}
	}else{
		console.log("Votre login n'existe pas");
		tab_login.push(login);
		pass = prompt("Quel mot de passe souhaitez-vous ?");
		tab_pass.push(pass);
	}

	return false;
}

console.log(verifie_login());
