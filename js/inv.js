divs1 = ['t1','t2','t3','t4','t5','t6'];
divs2 = ['s1','s2','s3'];
divs3 = ['m1','m2'];
divs4 = ['a1','a2','a3','a4','a5','a6'];
function showDiv1() {
var randomDiv1 = divs1[Math.floor(Math.random()*divs1.length)];
var div = document.getElementById(randomDiv1).style.display = 'block';
}
function showDiv2() {
var randomDiv2 = divs2[Math.floor(Math.random()*divs2.length)];
var div = document.getElementById(randomDiv2).style.display = 'block';
}
function showDiv3() {
var randomDiv3 = divs3[Math.floor(Math.random()*divs3.length)];
var div = document.getElementById(randomDiv3).style.display = 'block';
}
function showDiv4() {
var randomDiv4 = divs4[Math.floor(Math.random()*divs4.length)];
var div = document.getElementById(randomDiv4).style.display = 'block';
}
showDiv1();
showDiv2();
showDiv3();
showDiv4();