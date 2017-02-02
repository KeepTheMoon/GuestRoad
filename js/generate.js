var chars=new Array( "abcdefghijklmnopqrstuvwxyz".split(''),"abcdefghijklmnopqrstuvwxyz".toUpperCase().split(''),"0123456789".split(''),"!\"#$%&'()*+,-./:;<=>?@[\\]^_`{|}~".split(''));
function generate(){
	var level=3
	var long=6
	if(long<level){alert('La longueur doit Ãªtre au moins Ã©gale au niveau.');
	               return false;}
	 
	var rep=new Array();
	myrand=new Date().getMilliseconds();
	 
	while(level>1){ 
		templong=Math.ceil(Math.random(myrand)*(long-(--level))) ;
		rep.push(templong);
		long=long-templong;
		}
		rep.push(long)
	var password=new Array();
	var i=-1;
	while(rep[++i]){
		BaseL=chars[i].length
		j=-1;
		while((j++<rep[i]-1) && (password.push (chars[i][Math.floor(Math.random(Math.pow(new Date().getMilliseconds(),3))*BaseL)]))){}
		}
	var mdp=password.sort(sortRand).reverse().sort(sortRand).sort(sortRand).reverse().join('')
	return mdp;
}
function test(){
	window.alert(generate());
}


function sortRand(){return (Math.round(Math.random(myrand))-0.5); }
