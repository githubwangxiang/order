/*public js xianhuachneg.com*/
/*Tab Search style*/
function selectsearch(theA,word)
{
    obj=document.getElementById("selectsearch").getElementsByTagName("a");
    for(var i=0;i< obj.length;i++ )
    {
       obj[i].className='';
   }
   //设置选中的添加choose类名
   theA.className='choose';
    //设置表单的提交页面
  /*if(word=='restaurant_name')
  {
  	//商家
      document.getElementById('main_a_serach').action="/Home/Info/searchr";//Test urlsearch_s.html
  }else if(word=='food_name')
  {
     //食品
  	document.getElementById('main_a_serach').action="/Home/Info/searchf";//Test urlsearch_p.html
  }*/
}



//INDEX TAB LIST
window.onload = function ()
{
	var oLi = document.getElementById("Indextab").getElementsByTagName("li");
	var oUl = document.getElementById("Indexcontent").getElementsByTagName("ul");
	for(var i = 0; i < oLi.length; i++)
	{
		oLi[i].index = i;
		oLi[i].onclick = function ()
		{
			for(var n = 0; n < oLi.length; n++) oLi[n].className="";
			this.className = "current";
			for(var n = 0; n < oUl.length; n++) oUl[n].style.display = "none";
			oUl[this.index].style.display = "block"
		}	
	}
}
/*change radio background color*/
function changeColor(arg){  
var rdCount = document.getElementsByName("rdColor").length;  
for(i=1;i<=rdCount;i++){  
document.getElementById("style"+i).style.fontWeight = "normal"; 
document.getElementById("style"+i).style.backgroundColor = "";
document.getElementById("style"+i).style.boxShadow = "none"; 
document.getElementById("style"+i).style.border = "none";
}  
document.getElementById("style"+arg).style.backgroundColor = "#fff5cc";
document.getElementById("style"+arg).style.fontWeight = "bold";
document.getElementById("style"+arg).style.boxShadow = "3px 2px 10px #dedede";
document.getElementById("style"+arg).style.border = "1px #ffe580 solid";
}
